<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Classes\Payzone;

use Carbon\Carbon;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
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
        $payload =  Payzone::payload($rq->assurance_id);
        $payload["payment_method"] = $rq->payment_method; // equal 'payzone'
        return view("checkout", $payload);
    }
    /**
    * GET /payzone/success
    * name("payzone.success")
    * 
    * Handles the GET request for the Payzone success callback.
    * This endpoint processes the successful payment status and updates the insurance status information.
    *
    * @return A redirect response to the appropriate page after processing the success information.
    */
    public function success(Request $rq,$key){
        //check session is not empty
        if(!Session::has("chargeId"))
            abort(404);
        // update insurance informations
        $assurance_id = base64_decode($key);
        $assurance = Assurance::find($assurance_id);
        $assurance->id_transaction= Session::get("chargeId");
        $assurance->status="PAID";
        $assurance->montant_visa= Session::get("price"); 
        $assurance->montant_service = Session::get("price");
        $assurance->paidDate = Carbon::now();
        $assurance->valid=1;
        $assurance->save();

        //forget Session
        Session::forget("chargeId");
        Session::forget("price");
        try {
            if ($assurance->email) {
                $assurance->type = 1;
                Mail::to($assurance->email)->send(new Email($assurance));
            }
        } catch (\Throwable $th) {
        }
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
    public function callback(Request $request,$key){
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
                    // find insurance
                    $assurance_id = base64_decode($key);
                    $assurance = Assurance::find($assurance_id);
                    //update informations
                    $assurance->id_transaction= $inputArray["id"];
                    $assurance->status="PAID";
                    $assurance->montant_visa= $transaction["amount"]; 
                    $assurance->montant_service = $transaction["amount"];
                    $assurance->paidDate = $transaction["timestamp"];
                    $assurance->valid=1;
                    $assurance->save();
                    // send Email
                    try {
                        if ($assurance->email) {
                            $assurance->type = 1;
                            Mail::to($assurance->email)->send(new Email($assurance));
                        }
                    } catch (\Throwable $th) {
                    }
                    // Successful payment
                    return response()->json([
                        'status' => 'OK',
                        'message' => 'Status recorded successfully'
                    ], 200);
                } else {
                    // Payment not successful
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

                return response()->json([
                    'status' => 'KO',
                    'message' => 'Status not recorded successfully'
                ], 400);
            }
        } else {
            // Signature mismatch
            return response()->json([
                'status' => 'KO',
                'message' => 'Error signature'
            ], 400);
        }

    }
}
