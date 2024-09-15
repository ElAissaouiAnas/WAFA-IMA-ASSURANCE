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
    /**
     * GET / 
     * name('home)
     */
    public function home(Request $request)
    {
        return view('home',['page' => 'home']);
    }
    /**
     * GET /souscrire
     * name('hiw')
     */
    public function hiw(Request $request)
    {
        return view('hiw',['page' => 'hiw']);
    }
    /**
     * GET /imprimer
     * name('imprimer')
     */
    public function imprimer(Request $request)
    {
        return view('imprimer', ['page'=>'imprimer']);
    }
    /**
     * GET /condition-generales
     * name('conditions_generales')
     */
    public function conditions_generales(Request $request)
    {
        return view('conditions_generales',['page' => 'conditions_generales']);
    }
    /**
     * GET /mentions-legales
     * name('mentions_legales')
     */
    public function mentions_legales(Request $request)
    {
        return view('mentions_legales',['page' => 'mentions_legales']);
    }
    /**
     * GET /compare-price
     * name('compare_price)
     */
    public function compare_price(Request $request)
    {
        return view('compare_price', ['page' => 'compare_price']);
    }
    /**
     * GET /contact
     * name('contact')
     */
    public function contact(Request $request)
    {
        return view('contact', ['page' => 'contact']);
    }
    /**
     * GET /contract
     * name('contract')
     */
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
            ->where(DB::raw('TRIM(company)'), '=', $request['company'])
            ->first();

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
    /**
     * GET /formulaire
     * name('formulaire')
     * return page contains form
     */
    public function formulaire($id = null)
    {
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
    /**
     * POST /paiment
     * name('paiment)
     */
    public function paiement(Request $request)
    {       
        /* $request['type'] = 'site';
        $data_tosave = $request->all();
        $data_tosave['type'] = 'site';
        $util = new Util(); */

        /* $captcha = $util->rpHash($data_tosave['defaultReal']);
        if ($captcha != $data_tosave['defaultRealHash']) {
            // echo "captcha";die();
            return Redirect::back();
        } */
        $request_test = [
            "_token" => "qN9cVXcdx3RiJ5IZ65oQTPlq8OwyNq44g4W5Me3U", "company" => "WAFA IMA ASSISTANCE", "type" => "site", "duree" => "6 mois", "date_effet" => "12/02/2024", "prenom" => "Sunt ut asperiores c", "nom" => "Sunt ut asperiores c", "cin" => "Lorem recusandae Es", "email" => "lyka@mailinator.com", "confirmationEmail" => "lyka@mailinator.com", "tel" => "0603048331", "lieunaissance" => "Aliquid amet enim u", "datenaissance" => "04/12/1994", "vehicule" => "Non", "conjoints" => "0", "enfants" => "0", "addresse" => "Perferendis et enim", "defaultRealHash" => "-810982583", "defaultReal" => "HIJDFV", "ville" => "Aliquid amet enim u", "pays" => "Maroc",
            "prenom_c1" => null, "nom_c1" => null, "datenaissance_c1" => null, "prenom_c2" => null, "nom_c2" => null, "datenaissance_c2" => null, "prenom_c3" => null, "nom_c3" => null, "datenaissance_c3" => null, "prenom_c4" => null, "nom_c4" => null, "datenaissance_c4" => null, "prenom_e1" => null, "nom_e1" => null, "datenaissance_e1" => null, "prenom_e2" => null, "nom_e2" => null, "datenaissance_e2" => null, "prenom_e3" => null, "nom_e3" => null, "datenaissance_e3" => null, "prenom_e4" => null, "nom_e4" => null, "datenaissance_e4" => null, "prenom_e5" => null, "nom_e5" => null, "datenaissance_e5" => null, "prenom_e6" => null, "nom_e6" => null, "datenaissance_e6" => null, "annee_vehicule" => null, "marque_vehicule" => null, "modele_vehicule" => null, "num_vehicule" => null, "radio-condition-2" => "2", "radio-condition-3" => "3", "radio-condition-4" => "4", "contrat_id" => "83", "prime_ttc" => "700"
        ];
        $request_test["type"] = "site";
        $data_tosave = $request_test;
        $data_tosave['type']='site';

        //===================================

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
    /**
     * GET /voucher/{id}
     * name('voucher')
     */
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
    /**
     * GET /recap
     * POST /recap
     * name('recap)
     */
    public function recap(Request $request)
    {

        $assurances = Assurance::where('email', $request['email'])
                                ->where('cin', $request['cin']);

        if ($request['code']) {
            $assurances = $assurances->where('id_transaction', $request['code']);
        }

        $assurances = $assurances->whereIn('status', ['PENDING', 'PAID'])
                                 ->orderBy('id', 'DESC')
                                 ->get();

        if (!count($assurances)) {
            return Redirect::back();
        }

        $datas = [
            'page' => 'recap',
            'assurances' => $assurances,
        ];

        return view('recap', $datas);
    }
    /**
     * GET /import
     * POST /import
     * name('import')
     */
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
    /**
     * GET /import2
     * POST /import2
     * name('import2')
     */
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
    /**
     * GET /confirm/{key}
     * POST /confirm/{key}
     * name('confirme')
     */
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

    /**
     * POST /checkout
     * name('checkout')
     */
    public function checkout(Request $request)
    {
        $cartId =  $request['assurance_id'];

        $assurance = Assurance::where('id', $cartId)->first();
        $total = number_format($assurance['montant'], 2, '.', '');

        if ($request['payment_method'] == 'mtc') {
            
            //$gateway_url = "https://payment.cmi.co.ma/fim/est3Dgate";
             $gateway_url = "https://testpayment.cmi.co.ma/fim/est3Dgate";
            //$storeKey = "MAI+1234+CMI"; //de prod
            $storeKey = "M0mnoofL2da0J3Z9"; //de test
            //$orgClientId  = "600000682";//de prod
            $orgClientId = "600000125"; //de test
            $orgAmount =  number_format($total, 2, '.', '');
            $orgOkUrl = route("confirme", base64_encode($assurance['email']));
            $orgFailUrl = route("formulaire_key", ['error' => 'Malheureusement, votre paiement a été refusé.', 'key' => base64_encode($assurance['id'])]);
            $shopurl = $orgFailUrl;
            $orgTransactionType = "PreAuth";
            $orgRnd =  microtime();
            $orgCallbackUrl = route("confirmepayement");
            $orgCurrency = "504";
            $merchantAccount = 'Wafaimaassistance';
            $paywallSecretKey = '&ZkKnb-ha3dLQlTZ';
            $paywallUrl = 'https://payment-sandbox.payzone.ma/pwthree/launch';
            $notificationKey = 'h9z8OuJm&twBqNiW';
            

            // $data_payement = array(
            //     'clientid' => $orgClientId,
            //     'amount' => $orgAmount,
            //     'okUrl' => $orgOkUrl,
            //     'failUrl' => $orgFailUrl,
            //     'TranType' => $orgTransactionType,
            //     'callbackUrl' => $orgCallbackUrl,
            //     'shopurl' => $shopurl,
            //     'currency' => $orgCurrency,
            //     'rnd' => $orgRnd,
            //     'storetype' => '3D_PAY_HOSTING',
            //     'hashAlgorithm' => 'ver3',
            //     'lang' => 'fr',
            //     'refreshtime' => '5',
            //     'BillToName' => $assurance['prenom'] . ' ' . $assurance['nom'],
            //     //'BillToCompany' => 'Axa assistance',
            //     'BillToStreet1' => $assurance['addresse'],
            //     //'BillToCity' => 'Casablanca',
            //     //'BillToStateProv' => 'Casablanca',
            //     //'BillToPostalCode' => '20230',
            //     'BillToCountry' => '504',
            //     'email' => $assurance['email'],
            //     'tel' => $assurance['tel'],
            //     'encoding' => 'UTF-8',
            //     'oid' => $cartId
            // );
            $data_payement = array(
                // Authentication parameters
                'merchantAccount'      => $merchantAccount,
                'timestamp'       => time(),
                'skin'        => 'vps-1-vue',
            
                // Customer parameters
                'customerId'      =>  time(), //must be unique for each custumer
                'customerCountry' => 'MA',	
                'customerLocale' => 'en_US',		        
            
                // Charge parameters
                'chargeId'        => time(),					// Optional, unless required by the merchant account
                'orderId'         => time(),
                'price'           => $orgAmount,
                'currency'        => 'MAD',
                'description'     => 'A Big Hat',
                'displayCurrency' => 'EUR',
                'displayPrice'    => '10',
            
                // Deep linking
                'mode' => 'DEEP_LINK',					
                'paymentMethod' => 'CREDIT_CARD',		
                'showPaymentProfiles' => 'false',	
                'callbackUrl' => 'https://test-merchant.ma/PayzonePaywall/callback.php',
                'successUrl' => "https://test-merchant.maPayzonePaywall/success.html",
                'failureUrl' => "https://test-merchant.ma/PayzonePaywall/failure.html",
                'cancelUrl' => "https://test-merchant.ma",
              );

              $json_payload = json_encode($data_payement);
              $signature    = hash('sha256', $paywallSecretKey . $json_payload);
        } elseif ($request['payment_method'] == 'binga') {
            $gateway_url = "https://api.binga.ma/bingaApi/order/prePay.action";
            // $gateway_url = "https://preprod.binga.ma/bingaApi/order/prePay.action";
            // $StoreId = '400973';
            $StoreId = '401040';
            $status = 'PRE-PAY';
            // $SLKSecretkey = '1wedyprod675kuw3e31ke9ds19quatkt';
            $SLKSecretkey = '3af432d8cd05f693c88d7e54cf43d800';
            $dataMD5 = $status . $total . $StoreId . $cartId . $assurance['email'] . $SLKSecretkey;
            $checksum = MD5($dataMD5);
            $store_id = $StoreId;
            $nextdays = time() + (7 * 24 * 60 * 60);

            $data_payement = array(
                'externalId' => $cartId,
                'expirationDate' => gmdate('Y-m-d\TH:i:s\G\M\T', $nextdays),
                'amount' => $total,
                'buyerFirstName' => $assurance['prenom'],
                'buyerLastName' => $assurance['nom'],
                'buyerEmail' => $assurance['email'],
                'buyerAddress' => $assurance['addresse'],
                'buyerPhone' => $assurance['tel'],
                'storeId' => $store_id,
                'apiVersion' => '1.1',
                'successUrl' => route('confirme', base64_encode($assurance['email'])),
                'failureUrl' => route('formulaire'),
                'bookUrl' => route('reservation'),
                'payUrl' => route('pay'),
                'orderCheckSum' => $checksum,
            );
            // dump($data_payement);exit();
        }

        $datas = [
            'page' => 'checkout',
            'data_payement' => $data_payement,
            'gateway_url' => $gateway_url,
            'store_id' => $store_id,
            'cartId' => $cartId,
            'checksum' => $checksum,
            'total' => $total,
            'data' => $request,
        ];

        // dump($data_payement);exit();

        return view('checkout', $datas);
    }
    /**
     * POST /send_mail/{type}/{id}
     * name('send_mail')
     */
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
    /**
     * POST /confirmepayment
     * name('confirmepayement')
     */
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
    /**
     * POST /reservation
     * name('reservation')
     */
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
    /**
     * POST /pay
     * name('pay')
     */
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