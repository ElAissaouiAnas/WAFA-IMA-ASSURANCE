<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Session;

//my classes
use App\Classes\Payzone;

//models
use App\Assurance;

class PayzoneController extends Controller
{
    
    /**
     * Controller for integrating Payzone payment gateway.
     *
     * This controller handles all operations related to integrating
     * and managing payments through the Payzone service.
     */
        

    /**
    * POST /payzone/checkout
    * name("payzone.checkout")
    * 
    * Handles the POST request for initiating the Payzone payment checkout.
    * This endpoint launches the payment form provided by Payzone.
    *
    * @return A view that displays the Payzone payment form.
    */
    public function checkout(Request $rq){
        $assurance = Assurance::find($rq->assurance_id);
        if($assurance==null) abort(404);

        $payzone = new Payzone($assurance->montant);
        $payload= $payzone->payload();

        $payload["payment_method"] = $rq->payment_method;//This variable is sourced from a form in the `paiement.blade.php` file, and it currently holds the value 'payzone'.
        
        //create transaction record
        DB::table("payzone_transactions")->insert([
            "transaction_id" => $payzone->order_id(),
            "product_id" => $assurance->id,
            "address_ip" => $rq->ip(),
            "created_at" => Carbon::now()
        ]);

        Session::put("product_id",$assurance->id);
        return view("checkout", $payload);
    }
    /**
    * GET /payzone/success
    * name("payzone.success")
    * 
    * Handles the GET request for the Payzone success callback.
    * This endpoint processes the successful payment status and updates the insurance status information.
    *
    * @return A view that displays the message of payment successful
    * @return redirection in this case
    */
    public function success(Request $rq){
        if(!Session::has("product_id"))
            abort(404);
        // find Assurance
        $assurance = Assurance::find(Session::get("product_id"));
        //forget Session
        Session::forget("product_id");
        
        return redirect()->route('confirme',base64_encode($assurance->email));
    }
    /**
     * Handle payment status changes.
     *
     * @method GET|POST /payzone/callback
     * @name payzone.callback
     *
     * This endpoint processes notifications from Payzone about payment status changes.
     * It validates the request signature and updates the status based on the received data.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * Note: This endpoint is currently not working when tested on localhost.
     */
    public function callback(Request $request){
        // Get the raw input data
        $input = $request->getContent();
        // Define the notification key (you should probably retrieve this from your configuration or environment)
        $notificationKey = env('PAYZONE_NOTIFICATION_KEY');
        // Generate the signature
        $signature = hash_hmac('sha256', $input, $notificationKey);
        // Get the signature from headers
        $headerSignature = $request->header('X-Callback-Signature');
        // Check if the signatures match
        if (strcasecmp($signature, $headerSignature) === 0) {
            // Decode the JSON input
            $inputArray = json_decode($input, true);
            // Check the status of the input
            if ($inputArray['status'] == 'CHARGED') {
                $transactionData = null;
                foreach ($inputArray['transactions'] as $transaction) {
                    if ($transaction['state'] == 'APPROVED') {
                        $transactionData = $transaction;
                    }
                }
                if ($transactionData && $transactionData['resultCode'] === 0) {                    
                    // Successful payment
                    //update table payzone_transactions
                    $transaction = DB::table("payzone_transactions")->where("transaction_id",$inputArray["id"]);
                    $transaction->update([
                                "internal_id" => $inputArray["internalId"],
                                "state" => "PAID",
                                "amount" => $transactionData["amount"],
                                "currency" => $transactionData["currency"],
                                "timestamp" => date('Y-m-d H:i:s', strtotime($transactionData["timestamp"])),
                                "details" => $input
                            ]);
                    //update table assurances
                    //this function is temporary untile we change the structur of database
                    DB::table("assurances")->where("id",$transaction->first()->product_id)
                                           ->update([
                                            "id_transaction"=>$inputArray["id"],
                                            "status"=>"PAID",
                                            "confirmed"=>"O",
                                            "confirmedDate"=>date('Y-m-d H:i:s', strtotime($transactionData["timestamp"])),
                                           ]);
                    // send Email
                    try {
                        if ($assurance->email) {
                            $assurance->type = 1;
                            Mail::to($assurance->email)->send(new Email($assurance));
                        }
                    } catch (\Throwable $th) {
                    }
                    return response()->json([
                        'status' => 'OK',
                        'message' => 'Status recorded successfully'
                    ], 200);
                } else {
                    // Payment not successful
                    DB::table("payzone_transactions")->where("transaction_id",$inputArray["id"])
                                                    ->update([
                                                        "state" => "FAILED",
                                                    ]);
                    return response()->json([
                        'status' => 'KO',
                        'message' => 'Status not recorded successfully'
                    ], 400);
                }
            } elseif ($inputArray['status'] == 'DECLINED') {
                $transactionData = null;
                foreach ($inputArray['transactions'] as $transaction) {
                    if ($transaction['state'] == 'DECLINED') {
                        $transactionData = $transaction;
                    }
                }
                DB::table("payzone_transactions")->where("transaction_id",$inputArray["id"])
                                                ->update([
                                                    "state" => "DECLINED",
                                                ]);
                

                return response()->json([
                    'status' => 'KO',
                    'message' => 'Status not recorded successfully'
                ], 400);
            }
        } else {
            DB::table("payzone_transactions")->where("transaction_id",$inputArray["id"])
                                            ->update([
                                                "state" => "DECLINED",
                                            ]);
            // Signature mismatch
            return response()->json([
                'status' => 'KO',
                'message' => 'Error signature'
            ], 400);
        }

    }
}
