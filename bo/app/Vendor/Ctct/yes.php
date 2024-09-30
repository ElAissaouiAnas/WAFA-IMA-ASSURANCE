<?php
require_once 'autoload.php';

use Ctct\ConstantContact;
use Ctct\Components\Contacts\ContactList;
use Ctct\Components\EmailMarketing\Campaign;
use Ctct\Components\EmailMarketing\MessageFooter;
use Ctct\Components\EmailMarketing\Schedule;
use Ctct\Exceptions\CtctException;

define("APIKEY", "r2ppsbhwfshbhyrdscgsrm8y");
define("ACCESS_TOKEN", "7662189a-4f0f-4680-bd22-dc7ec328400c");
// define("APIKEY", "4nzxeusmf76kqdemre9qkfav");
// define("ACCESS_TOKEN", "4af2adfd-9f65-424a-8365-c1f9f64a899a");

	try {
		$cc = new ConstantContact(APIKEY);
	    $lists = $cc->getLists(ACCESS_TOKEN);
	    define("LISTS", json_encode($lists));
	} catch (CtctException $ex) {
	    foreach ($ex->getErrors() as $error) {
	        print_r($error);
	    }
	}