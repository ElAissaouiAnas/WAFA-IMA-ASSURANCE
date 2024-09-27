<?php

namespace App\Classes;

use Session; 

//models
use App\Assurance;

class Payzone{

    private $__public_url; //we use ngrok to generate public url pointed on our private IP
    
    private $__order_id;
    private $__price; //price that 
    private $__callback_url;
    private $__success_url;
    private $__failure_url;
    private $__cancel_url;
    /**
     * Constructor to initialize the payment object with a specified price.
     *
     * @param float $price The price associated with the order.
     */
    public function __construct($price)
    {
        // Set the public URL for the payment gateway.
        $this->__public_url = 'https://b044-41-143-2-165.ngrok-free.app';
        // Initialize the price for this payment instance.
        $this->__price = $price;
        // Generate a unique order ID based on the current timestamp.
        $this->__order_id = bin2hex(random_bytes(8)); //time();
    }
    /**
     * Retrieves the price formatted to two decimal places.
     *
     * @return string The formatted price.
     */
    private function get_price(){
        return number_format($this->__price, 2, '.', '');
    }   
    /**
     * Generates the callback URL for the payment process.
     *
     * The URL differs based on the application's debug mode.
     * that'sThe URL varies depending on whether the application is in production or development mode.
     *
     * @return string The appropriate callback URL.
     */
    private function get_callback_url(){
        return (env('APP_DEBUG'))? $this->__public_url."/wafa/payzone/callback":route("payzone.callback");
    } 
    /**
     * Retrieves the success URL to redirect users after a successful payment.
     *
     * @return string The success URL.
     */
    private function get_succes_url(){
        return route("payzone.success");
    }
    
    /**
     * Retrieves the failure URL to redirect users after a failed payment.
     *
     * @return string The failure URL.
     */
    private function get_failure_url(){
        return route('formulaire');
    }
    
    /**
     * Retrieves the cancel URL to redirect users if they cancel the payment.
     *
     * @return string The cancel URL.
     */
    private function get_cancel_url(){
        return route('formulaire');
    }

    /**
     * Retrieves the unique order ID for this payment instance.
     *
     * @return int The order ID.
     */
    public function order_id(){
        return $this->__order_id;
    }

    /**
    * Retrieves the assurance ID.
    * 
    * This method return information payment.
    * 
    * @return array the payload.
    */
    public function payload(){ 
        $payload = array(
            // Authentication parameters
            'merchantAccount'      => "Wafaimaassistance",
            'timestamp'       => time(),
            'skin'        => 'vps-1-vue',
            // Customer parameters
            'customerId'      =>  $this->order_id(), //must be unique for each custumer
            'customerCountry' => 'MA',	
            'customerLocale' => 'en_US',		        
            // Charge parameters
            'chargeId'        => $this->order_id(),					// Optional, unless required by the merchant account
            'orderId'         => $this->order_id(),
            'price'           => $this->get_price(),
            'currency'        => 'MAD',
            'description'     => 'Assurance Wafa Ima Assistance',
            'displayCurrency' => 'MAD',
            'displayPrice'    => $this->get_price(),
            // Deep linking
            'mode' => 'DEEP_LINK',					
            'paymentMethod' => 'CREDIT_CARD',		
            'showPaymentProfiles' => 'false',
            'callbackUrl' => $this->get_callback_url(), 
            'successUrl' => $this->get_succes_url(),
            'failureUrl' => $this->get_failure_url(),
            'cancelUrl' => $this->get_cancel_url(),
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