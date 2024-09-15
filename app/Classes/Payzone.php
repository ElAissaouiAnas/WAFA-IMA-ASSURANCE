<?php

namespace App\Classes;

use Session; 

//models
use App\Assurance;

class Payzone{

    /**
    * Retrieves the assurance ID.
    * 
    * This method return information payment.
    * 
    * @return array the payload.
    */
    public static function payload($assurance_id){
        $assurance = Assurance::find($assurance_id);
        $montant = number_format($assurance->montant, 2, '.', '');
        Session::put("chargeId",time());
        Session::put("price",$montant);
        $payload = array(
            // Authentication parameters
            'merchantAccount'      => "Wafaimaassistance",
            'timestamp'       => time(),
            'skin'        => 'vps-1-vue',
            // Customer parameters
            'customerId'      =>  Session::get("chargeId"), //must be unique for each custumer
            'customerCountry' => 'MA',	
            'customerLocale' => 'en_US',		        
            // Charge parameters
            'chargeId'        => Session::get("chargeId"),					// Optional, unless required by the merchant account
            'orderId'         => Session::get("chargeId"),
            'price'           => $montant,
            'currency'        => 'MAD',
            'description'     => 'Assurance Wafa Ima Assistance',
            'displayCurrency' => 'MAD',
            'displayPrice'    => $montant,
            // Deep linking
            'mode' => 'DEEP_LINK',					
            'paymentMethod' => 'CREDIT_CARD',		
            'showPaymentProfiles' => 'false',
            'callbackUrl' => route("payzone.callback",["key" => base64_encode($assurance->id)]),
            'successUrl' => route('payzone.success', ["key" => base64_encode($assurance->id)]),
            'failureUrl' => route('formulaire'),
            'cancelUrl' => route("formulaire"),
        ); 
        // Encode the payload
        $json_payload = json_encode($payload);
        $signature    = hash('sha256',env("PAYZONE_SECRET_KEY") . $json_payload);
        return [
                "paywallUrl"=> env("PAYZONE_URL") ,
                "json_payload"=>$json_payload,
                "signature"=>$signature
            ];
    }
}