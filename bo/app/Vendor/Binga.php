<?php
Class BingaApi {
	
	
	const DEMO_URL  = 'http://preprod.binga.ma:8080/bingaApi/'; // Open and interact with accounts
	const PRODUCTION_URL  = 'https://api.binga.ma/bingaApi/'; // Open and interact with accounts
	
	const CHECKOUT_URL  = 'api/orders/pay'; // Open and interact with accounts
	
	/**
	 * Determines whether to use Binga's staing or production servers
	 */
	private static $production = null;
	
	/**
	 * Application's client ID
	 */
	private static $merchantId;

	/**
	 * Application's client secret
	 */
	private static $merchantSecret;
	
	/**
	 * cURL handle
	 */
	private $ch;
	
	
	/**
	 * Create a new API session
	 */
	public function __construct() {
		
	}
	/**
	 * Clean up cURL handle
	 */
	public function __destruct() {
		if ($this->ch) {
			curl_close($this->ch);
		}
	}
	
	
	public static function BingaKey($production, $merchantId, $merchantSecret) {
		self::$production    = $production;
		self::$merchantId     = $merchantId;
		self::$merchantSecret = $merchantSecret;
	}
	
	private static function getDomain() {
		if (self::$production === true) {
			return self::PRODUCTION_URL;
		}
		elseif (self::$production === false) {
			return self::DEMO_URL;
		}
		else {
			throw new RuntimeException('You must initialize the Binga SDK with BingaApi::BingaKey()');
		}
	}
			
	/**
	 * Make API calls against authenticated user
	 */
	public function request($endpoint, array $values = array()) {
		if (!$this->ch) {
			$headers = array("Accept: application/json"); // always pass the correct Content-Type header
			
			$chaine=self::$merchantId.":".self::$merchantSecret;
			$headers[] = "Authorization: Basic ".base64_encode($chaine);
			
			$this->ch = curl_init();
			curl_setopt($this->ch, CURLOPT_USERAGENT, 'BingaApi PHP SDK');
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($this->ch, CURLOPT_TIMEOUT, 30); // 30-second timeout, adjust to taste
			if (self::$production === true) {
			 curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
			}
		}
		
		$uri = self::getDomain() . $endpoint;
		
		if(!empty($values) && array_key_exists('code', $values) && $endpoint != self::CHECKOUT_URL){
			$uri.=	'/'.$values['code'];
		}
		elseif (!empty($values) && $endpoint == self::CHECKOUT_URL) {
			curl_setopt($this->ch, CURLOPT_POST, !empty($values));
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($values));
		}
//		echo $uri;exit();
		curl_setopt($this->ch, CURLOPT_URL, $uri);
		$raw = curl_exec($this->ch);
		//echo curl_errno($this->ch);exit();
//		echo $uri;exit();
		if ($errno = curl_errno($this->ch)) {
			// Set up special handling for request timeouts
			if ($errno == CURLE_OPERATION_TIMEOUTED) {
//				throw new BingaServerException("Timeout occurred while trying to connect to Binga");
				throw new Exception("Timeout occurred while trying to connect to Binga");
			}
			throw new Exception('cURL error while making API call to Binga: ' . curl_error($this->ch), $errno);
		}
		$result = json_decode($raw, true);
		/*$httpCode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
		if ($httpCode >= 4000) {
			if ($httpCode >= 5000) {
				//throw new BingaServerException($result->error_description, $httpCode, $result);
			}
			switch ($result->error) {
				case 'invalid_request':
					throw new BingaRequestException($result->error_description, $httpCode, $result);
				case 'access_denied':
				default:
					throw new BingaPermissionException($result->error_description, $httpCode, $result);
			}
		}*/
		
		return $result;
	}
}

/*class BingaException extends Exception {
	public function __construct($description = '', $http_code = FALSE, $response = FALSE, $code = 0, $previous = NULL)
	{
		$this->response = $response;

		if (!defined('PHP_VERSION_ID')) {
			$version = explode('.', PHP_VERSION);
			define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
		}

		if (PHP_VERSION_ID < 50300) {
			parent::__construct($description, $code);
		} else {
			parent::__construct($description, $code, $previous);
		}
	}
}
class BingaRequestException extends BingaException {}
class BingaPermissionException extends BingaException {}
class BingaServerException extends BingaException {}*/
