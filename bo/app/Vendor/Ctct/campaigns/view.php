<?php
require_once dirname(__FILE__).'/../autoload.php';

use Ctct\ConstantContact;
use Ctct\Components\Contacts\ContactList;
use Ctct\Components\EmailMarketing\Campaign;
use Ctct\Components\EmailMarketing\MessageFooter;
use Ctct\Components\EmailMarketing\Schedule;
use Ctct\Exceptions\CtctException;


$cc = new ConstantContact(APIKEY);


try {
    $campaigns = $cc->getEmailCampaign(ACCESS_TOKEN,ID_CAMPAIGN);
	define("CAMPAIGN_VIEW", json_encode($campaigns));
} catch (CtctException $ex) {
    foreach ($ex->getErrors() as $error) {
        print_r($error);
    }
}


