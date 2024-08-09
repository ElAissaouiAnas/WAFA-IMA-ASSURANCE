<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Assurance;
use App\Contrat;
use App\Util;
use DB;
use Redirect;
use Log;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PayXpert\Connect2Pay\Connect2PayClient;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $datas = [
            'page' => 'home',
        ];

        return view('home', $datas);
    }

    public function hiw(Request $request)
    {
        $datas = [
            'page' => 'hiw',
        ];

        return view('hiw', $datas);
    }

    public function imprimer(Request $request)
    {
        $datas = [
            'page' => 'imprimer',
        ];

        return view('imprimer', $datas);
    }

    public function conditions_generales(Request $request)
    {
        $datas = [
            'page' => 'conditions_generales',
        ];

        return view('conditions_generales', $datas);
    }

    public function mentions_legales(Request $request)
    {
        $datas = [
            'page' => 'mentions_legales',
        ];

        return view('mentions_legales', $datas);
    }

    public function compare_price(Request $request)
    {
        $datas = [
            'page' => 'compare_price',
        ];

        return view('compare_price', $datas);
    }

    public function contact(Request $request)
    {
        $datas = [
            'page' => 'contact',
        ];

        return view('contact', $datas);
    }

    public function contrat(Request $request)
    {
        $response = ['result' => false];

        $now = new \DateTime();
        $date = new \DateTime(date("Y-m-d", strtotime(str_replace('/', '-', $request['age']))));
        $interval = $now->diff($date);

        $datenaissance_c1 = new \DateTime(date("Y-m-d", strtotime(str_replace('/', '-', $request['datenaissance_c1']))));
        $interval_c1 = $now->diff($datenaissance_c1);

        $datenaissance_c2 = new \DateTime(date("Y-m-d", strtotime(str_replace('/', '-', $request['datenaissance_c2']))));
        $interval_c2 = $now->diff($datenaissance_c2);

        $datenaissance_c3 = new \DateTime(date("Y-m-d", strtotime(str_replace('/', '-', $request['datenaissance_c3']))));
        $interval_c3 = $now->diff($datenaissance_c3);

        $datenaissance_c4 = new \DateTime(date("Y-m-d", strtotime(str_replace('/', '-', $request['datenaissance_c4']))));
        $interval_c4 = $now->diff($datenaissance_c4);



        $age_array = $compagny = [];

        if ($interval->y >= 70 || $interval_c1->y >= 70 || $interval_c2->y >= 70 || $interval_c3->y >= 70 || $interval_c4->y >= 70) {
            $age_array[] = 'Plus de 70 ans';
        } elseif ($interval->y >= 21 && $interval->y < 70) {
            $age_array[] = 'Plus de 21 an et moins de 70 ans';
            $age_array[] = 'Moins de 70 ans';
        } elseif ($interval->y < 21) {
            $age_array[] = 'Moins de 21 ans';
            $age_array[] = 'Moins de 70 ans';
        }

        $array_sql = [
            'id',
            'age',
            'prime_ttc',
            'fees',
        ];

        $result = DB::table('contrats')
            ->select(DB::raw(implode(',', $array_sql)))
            ->where(DB::raw('TRIM(type)'), '=', $request['type'])
            ->whereIn(DB::raw('TRIM(age)'), $age_array)
            ->where(DB::raw('TRIM(duree)'), '=', $request['duree'])
            ->where(DB::raw('TRIM(company)'), '=', $request['company'])->first();

        $id = $prime_ttc = $age = 0;

        if ($result) {
            $id = $result->id;
            $age = $result->age;
            $prime_ttc = $result->prime_ttc;
            if ($request['vehicule'] == 'Oui') {
                $prime_ttc += $result->fees;
            }
        }

        $response = ['result' => true, 'id' => $id, 'age' => $age, 'prime_ttc' => $prime_ttc];

        return response()->json($response);
    }

    public function formulaire($id = null)
    {
        // dd($id);

        $assurance = $contrat = [];

        if ($id) {
            $id = base64_decode($id);
            $assurance = Assurance::where('id', $id)->first();
            $contrat = Contrat::where('id', $assurance['contrat_id'])->first();
        }

        // dump($id);
        // dump($assurance);

        $datas = [
            'assurance' => $assurance,
            'contrat' => $contrat,
            'page' => 'formulaire',
        ];

        return view('formulaire', $datas);
    }

    public function paiement(Request $request)
    {
        $request['type'] = 'site';
        $data_tosave = $request->all();
        $data_tosave['type'] = 'site';

        $util = new Util();

        $captcha = $util->rpHash($data_tosave['defaultReal']);

        if ($captcha != $data_tosave['defaultRealHash']) {
            // echo "captcha";die();
            return Redirect::back();
        }

        if (!isset($data_tosave['contrat_id']) || empty($data_tosave['contrat_id'])) {
            // echo "contrat_id";die();
            return Redirect::back();
        }

        $contrat = Contrat::where('id', $data_tosave['contrat_id'])->first();

        if ($data_tosave['vehicule'] == 'Oui') {
            $contrat['prime_ttc'] += $contrat['fees'];
        }
        if ($contrat['prime_ttc'] != $data_tosave['prime_ttc']) {
            // echo "prime_ttc";die();
            return Redirect::back();
        }
        $data_tosave['montant'] = $contrat['prime_ttc'];
        $data_tosave['totalAmount'] = $contrat['prime_ttc'];

        $data_tosave['type'] = 'site';


        $last_assurance = Assurance::create($data_tosave);

        $datas = [
            'page' => 'paiement',
            'data' => $last_assurance,
            'contrat' => $contrat,
        ];

        return view('paiement', $datas);
    }

    public function voucher($id)
    {

        $password = "assurancevoyage";
        $id = openssl_decrypt(base64_decode($id), "AES-128-ECB", $password);

        // dump($decrypted_string);die;

        $assurance = DB::table('assurances')
            ->select(DB::raw('assurances.id,assurances.prenom,assurances.nom,assurances.email,assurances.tel,assurances.montant,assurances.status,contrats.company,contrats.type,contrats.duree,contrats.prime_ht,contrats.prime_tva,contrats.prime_ttc'))
            ->join('contrats', function ($join) {
                $join->on('contrats.id', '=', 'assurances.contrat_id');
            })
            ->where('assurances.id', $id)->first();

        // try {
        //     if($assurance->email){
        //         Mail::to($assurance->email)->send(new Email($assurance));
        //     }
        // } catch (\Throwable $th) {
        //     throw $th;
        // }

        // dump($assurance);die();

        $datas = [
            'page' => 'voucher',
            'data' => $assurance,
        ];


        return view('voucher', $datas);
    }

    public function recap(Request $request)
    {

        $assurances = Assurance::where('email', $request['email'])->where('cin', $request['cin']);

        if ($request['code']) {
            $assurances = $assurances->where('id_transaction', $request['code']);
        }

        $assurances = $assurances->whereIn('status', ['PENDING', 'PAID'])->orderBy('id', 'DESC')->get();

        if (!count($assurances)) {
            return Redirect::back();
        }

        $datas = [
            'page' => 'recap',
            'assurances' => $assurances,
        ];


        return view('recap', $datas);
    }

    public function import(Request $request)
    {

        if (isset($request['id'])) {


            $id = $request['id'];

            $dossier = '/var/www/mai/files/assurances/';

            $taille_maxi = 10000000;
            $extensions = array('.jpg', '.png', '.gif', '.jpeg', '.doc', '.docx', '.pdf', '.xls', '.xlsx');


            $files = array();

            $files_data = Assurance::where('id', $request['id'])->first();


            if ($files_data) {
                $files = $files_data['files'];
                $files = explode("||", $files);
            }

            foreach ($request['file'] as $file) {
                $fichier = basename($file->getClientOriginalName());
                $taille = filesize($file->getPathname());
                $extension = strtolower(strrchr($file->getClientOriginalName(), '.'));
                $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                if (in_array($extension, $extensions) && $taille < $taille_maxi) {
                    $path = $dossier . $id . '/uf-' . $fichier;
                    $dirname = dirname($path);


                    if (!file_exists($dirname)) {
                        mkdir($dirname, 0777, true);
                    }

                    try {

                        if (move_uploaded_file($file->getPathname(), $path)) {
                            $files[] = 'uf-' . $fichier;
                        }
                    } catch (Exception $e) {
                    }
                }
            }

            try {
                Assurance::where('id', $files_data['id'])->update(array(
                    'files'      =>  implode("||", $files),
                ));
            } catch (Exception $e) {
            }
        }

        return Redirect::back();
    }

    public function import2(Request $request)
    {

        if (isset($request['id'])) {


            $id = $request['id'];

            $dossier = '/var/www/mai/files/assurances/';

            $taille_maxi = 10000000;
            $extensions = array('.jpg', '.png', '.gif', '.jpeg', '.doc', '.docx', '.pdf', '.xls', '.xlsx');


            $files = array();

            $files_data = Assurance::where('id', $request['id'])->first();


            if ($files_data) {
                $files = $files_data['userfiles'];
                $files = explode("||", $files);
            }

            foreach ($request['file'] as $file) {
                $fichier = basename($file->getClientOriginalName());
                $taille = filesize($file->getPathname());
                $extension = strtolower(strrchr($file->getClientOriginalName(), '.'));
                $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                if (in_array($extension, $extensions) && $taille < $taille_maxi) {
                    $path = $dossier . $id . '/f-' . $fichier;
                    $dirname = dirname($path);

                    if (!file_exists($dirname)) {
                        mkdir($dirname, 0777, true);
                    }

                    try {

                        if (move_uploaded_file($file->getPathname(), $path)) {
                            $files[] = 'f-' . $fichier;
                        }
                    } catch (Exception $e) {
                    }
                }
            }

            try {
                Assurance::where('id', $files_data['id'])->update(array(
                    'userfiles'      =>  implode("||", $files),
                ));
            } catch (Exception $e) {
            }
        }

        return Redirect::back();
    }

    public function confirme(Request $request, $key)
    {

        $amount = isset($_POST["amount"]) ? $_POST["amount"] : '';
      


        $email = base64_decode($key);

        $assurances = Assurance::where('email', $email)->whereIn('status', ['PENDING', 'PAID'])->orderBy('id', 'DESC')->get();

        $datas = [
            'page' => 'confirme',
            'assurances' => $assurances,
            "amount" => $amount
        ];

        return view('recap', $datas);
    }

    public function checkout(Request $request)
    {
        $cartId = $request['assurance_id'];
        $assurance = Assurance::where('id', $cartId)->first();
        $total = number_format($assurance['montant'], 2, '.', '') * 100; // Amount in cents
    
        // PayZone credentials
        $connect2pay = "https://paiement.payzone.ma";;
        $originator  = "2019120958"; // Your originator ID
        $password    = "OY0FVD4EVGNDL1XFNEDP1OW66WA0N89G!"; // Your password
    
        $c2pClient = new Connect2PayClient($connect2pay, $originator, $password);
    
        // Set all information for the payment
        $c2pClient->setOrderID($cartId);
        $c2pClient->setPaymentMethod(Connect2PayClient::PAYMENT_METHOD_CREDITCARD);
        $c2pClient->setPaymentMode(Connect2PayClient::PAYMENT_MODE_SINGLE);
        $c2pClient->setShopperID($assurance['id']);
        $c2pClient->setShippingType(Connect2PayClient::SHIPPING_TYPE_VIRTUAL);
        $c2pClient->setCurrency("EUR");
        $c2pClient->setAmount($total);
        $c2pClient->setOrderDescription("Payment of " . number_format($total / 100, 2) . " EUR");
        $c2pClient->setShopperFirstName($assurance['prenom']);
        $c2pClient->setShopperLastName($assurance['nom']);
        $c2pClient->setShopperAddress($assurance['addresse']);
        $c2pClient->setShopperZipcode("NA"); // Assuming no zipcode is available
        $c2pClient->setShopperCity("NA"); // Assuming no city is available
        $c2pClient->setShopperCountryCode("504"); // Country code for Morocco
        $c2pClient->setShopperPhone($assurance['tel']);
        $c2pClient->setShopperEmail($assurance['email']);
        $c2pClient->setCtrlCustomData("Custom data example");
        $c2pClient->setCtrlRedirectURL(route('confirme', base64_encode($assurance['email'])));
        $c2pClient->setCtrlCallbackURL(route('confirmepayement'));
    
        if ($c2pClient->validate()) {
            if ($c2pClient->preparePayment()) {
                // Save merchant token in session or database
                session(['merchantToken' => $c2pClient->getMerchantToken()]);
    
                // Redirect the customer to the payment page
                return redirect($c2pClient->getCustomerRedirectURL());
            } else {
                return back()->withErrors(['error' => "Payment preparation error: " . $c2pClient->getClientErrorMessage()]);
            }
        } else {
            return back()->withErrors(['error' => "Validation error: " . $c2pClient->getClientErrorMessage()]);
        }
    }

    public function send_mail(Request $request, $type, $id)
    {
        try {
            $assurance = Assurance::with('contrat')->find($id);
            if ($assurance->email) {
                // return view('emails.2', ['data' => $assurance]);
                $assurance->type = $type;
                Mail::to($assurance->email)->send(new Email($assurance));
            }
        } catch (\Throwable $th) {
        }
    }

    public function confirmepayement(Request $request)
    {
        // try {
        // $assurance = Assurance::with('contrat')->get()->last();
        // if ($assurance->email) {
        //     return view('emails.2', ['data' => $assurance]);
        //     $assurance->type = 1;
        //     Mail::to($assurance->email)->send(new Email($assurance));
        // }
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        // try {
        //     $http_build_query = [
        //         'User' => 'assurance_voyage',
        //         'Password' => '@ssuRV-324',
        //         'Text' => 'Le paiement de votre assurance voyage est confirmé. Votre contrat sera disponible en ligne et par e-mail sous 24 heures',
        //         'Phone' => $assurance->tel,
        //     ];

        //     if ($assurance->tel) {
        //         file_get_contents('http://download.dialy.net:8080/customerMessaging/SendSMS?' . http_build_query($http_build_query));
        //     }
        // } catch (\Throwable $th) {
        //     dd($th->getMessage());
        //     //throw $th;
        // }

        $storeKey = "M0mnoofL2da0J3Z9";
        $externalId = isset($_POST["ReturnOid"]) ? $_POST["ReturnOid"] : '';
        $postParams = array();
        foreach ($_POST as $key => $value) {
            array_push($postParams, $key);
        }

        error_log(print_r($postParams, true));

        $jsonData = json_encode($_POST);
        Assurance::where('id', $externalId)->update(['cmi_payload' => $jsonData]); //store CMI callback data for each transaction

        //calculate the hash locally and compare it with callback hash

        natcasesort($postParams);
        $hach = "";
        $hashval = "";
        foreach ($postParams as $param) {
            $paramValue = html_entity_decode(preg_replace("/\n$/", "", $_POST[$param]), ENT_QUOTES, 'UTF-8');

            $hach = $hach . "(!" . $param . "!:!" . $_POST[$param] . "!)";
            $escapedParamValue = str_replace("|", "\\|", str_replace("\\", "\\\\", $paramValue));

            $lowerParam = strtolower($param);
            if ($lowerParam != "hash" && $lowerParam != "encoding") {
                $hashval = $hashval . $escapedParamValue . "|";
            }
        }

        $escapedStoreKey = str_replace("|", "\\|", str_replace("\\", "\\\\", $storeKey));
        $hashval = $hashval . $escapedStoreKey;

        $calculatedHashValue = hash('sha512', $hashval);
        $actualHash = base64_encode(pack('H*', $calculatedHashValue));

        $retrievedHash = isset($_POST["HASH"]) ? $_POST["HASH"] : '';



        if ($retrievedHash == $actualHash && $_POST["ProcReturnCode"] == "00") {
            $type = '';

            $transaction_id = $type . $_POST['acqStan'];
            $status = 'PAID';

            Assurance::where('id', $externalId)->update(array(
                'status'       =>  $status,
                'id_transaction' =>  $transaction_id,
                'paidDate' => date('Y-m-d H:i:s'),
            ));

            $assurance = DB::table('assurances')
                ->select(DB::raw('assurances.id,assurances.prenom,assurances.nom,assurances.email,assurances.tel,assurances.montant,assurances.status,contrats.company,contrats.type,contrats.duree,contrats.prime_ht,contrats.prime_tva,contrats.prime_ttc'))
                ->join('contrats', function ($join) {
                    $join->on('contrats.id', '=', 'assurances.contrat_id');
                })
                ->where('assurances.id', $externalId)->first();

            try {
                if ($assurance->email) {
                    $assurance->type = 1;
                    Mail::to($assurance->email)->send(new Email($assurance));
                }
            } catch (\Throwable $th) {
            }

            /*
            try {
                $http_build_query = [
                    'User' => 'assurance_voyage',
                    'Password' => '@ssuRV-324',
                    'Text' => 'Le paiement de votre assurance voyage est confirmé. Votre contrat sera disponible en ligne et par e-mail sous 24 heures',
                    'Phone' => $assurance->tel,
                ];

                if ($assurance->tel) {
                    file_get_contents('http://download.dialy.net:8080/customerMessaging/SendSMS?' . http_build_query($http_build_query));
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            */
            echo "ACTION=POSTAUTH";
            exit();
        } else {
            echo "APPROVED";
            exit();
        }
        exit();
    }

    public function reservation(Request $request)
    {
        // mail('saad.kanzallah@gmail.com', 'ddddddd', json_encode($_POST));

        Log::debug('POST VALUE = ' . json_encode($_POST));


        $email = $_POST["buyerEmail"];

        $externalId = $_POST["externalId"];

        $assurance = Assurance::where('id', $externalId)->first();

        $totalAmountTx = number_format($assurance['montant'], 2, '.', '');

        $checksumMTC = $_POST["orderCheckSum"];

        $orderNumber = $_POST["code"];

        $expirationDate = $_POST["expirationDate"];

        $storeId = '401040';
        // $storeId = '400973';
        $status = 'PRE-PAY';
        // $SLKSecretkey = '1wedyprod675kuw3e31ke9ds19quatkt';
        $SLKSecretkey = '3af432d8cd05f693c88d7e54cf43d800';

        $dataMD5 = $status . $totalAmountTx . $storeId . $externalId . $email . $SLKSecretkey;

        $checksum = md5($dataMD5);

        if ($checksum == $checksumMTC && is_numeric($orderNumber) == "True" && !empty($orderNumber)) {

            $status = 'PENDING';

            $transaction_id = $orderNumber;

            Assurance::where('id', $externalId)->update(array(
                'status'       =>  $status,
                'id_transaction' =>  $transaction_id,
                'expirationDate' => $expirationDate
            ));
        } else {
            echo "0;Null;Null;Null";
        }
        exit();
    }

    public function pay(Request $request)
    {


        $email = $_POST["buyerEmail"];

        $externalId = $_POST["externalId"];

        $assurance = Assurance::where('id', $externalId)->first();

        $totalAmountTx = number_format($assurance['montant'], 2, '.', '');


        $checksumMTC = $_POST["orderCheckSum"];

        $orderNumber = $_POST["code"];

        // $storeId = '400973';
        $storeId = '401040';
        $status = 'PAY';
        // $SLKSecretkey = '1wedyprod675kuw3e31ke9ds19quatkt';
        $SLKSecretkey = '3af432d8cd05f693c88d7e54cf43d800';

        $dataMD5 = $status . $totalAmountTx . $storeId . $externalId . $email . $SLKSecretkey;

        $checksum = md5($dataMD5);

        if ($checksum == $checksumMTC && is_numeric($orderNumber) == "True" && !empty($orderNumber)) {

            $status = 'PAID';

            $type = '';

            $transaction_id = $type . $orderNumber;

            Assurance::where('id', $externalId)->update(array(
                'status'       =>  $status,
                'id_transaction' =>  $transaction_id,
                'paidDate' => date('Y-m-d H:i:s')

            ));

            $assurance = DB::table('assurances')
                ->select(DB::raw('assurances.id,assurances.prenom,assurances.nom,assurances.email,assurances.tel,assurances.montant,assurances.status,contrats.company,contrats.type,contrats.duree,contrats.prime_ht,contrats.prime_tva,contrats.prime_ttc'))
                ->join('contrats', function ($join) {
                    $join->on('contrats.id', '=', 'assurances.contrat_id');
                })
                ->where('assurances.id', $externalId)->first();

            try {
                if ($assurance->email) {
                    Mail::to($assurance->email)->send(new Email($assurance));
                }
            } catch (\Throwable $th) {
                //     //throw $th;
            }


            try {
                $http_build_query = [
                    'User' => 'assurance_voyage',
                    'Password' => '@ssuRV-324',
                    'Text' => 'Le paiement de votre assurance voyage est confirmé. Votre contrat sera disponible en ligne et par e-mail sous 24 heures',
                    'Phone' => $assurance->tel,
                ];

                if ($assurance->tel) {
                    file_get_contents('http://download.dialy.net:8080/customerMessaging/SendSMS?' . http_build_query($http_build_query));
                }
            } catch (\Throwable $th) {
                //     //throw $th;
            }

            die('100;' . gmdate('Y-m-d\TH:i:s\G\M\T'));
            exit();
        } else {
            die('000;' . gmdate('Y-m-d\TH:i:s\G\M\T'));
            exit();
        }
        exit();
    }
}