<?php
require_once dirname(__FILE__).'/../autoload.php';

use Ctct\ConstantContact;
use Ctct\Components\Contacts\ContactList;
use Ctct\Components\EmailMarketing\Campaign;
use Ctct\Components\EmailMarketing\MessageFooter;
use Ctct\Components\EmailMarketing\Schedule;
use Ctct\Exceptions\CtctException;


$data = json_decode(DATA, true);

	$myParams = array();

	$myParams['id'] = $data['id'];
	$myParams['name'] = $data['name'];
	$myParams['subject'] = $data['subject'];
	$myParams['from_name'] = $data['from_name'];
    $myParams['from_email'] = $data['from_email'];
    $myParams['reply_to_email'] = $data['reply_to_email'];
    $myParams['email_content'] = $data['body'];
	
	try {
        $campaign = updateCampaign($myParams);
        // print_r($campaign);
    } catch (CtctException $ex) {
        echo '<span class="label label-important">Error Creating Campaign</span>';
        echo '<div class="container alert-error"><pre class="failure-pre">';
        print_r($ex->getErrors());
        echo '</pre></div>';
        die();
    }
	
	function updateCampaign(array $params)
{
    $cc = new ConstantContact(APIKEY);
    $campaign = $cc->getEmailCampaign(ACCESS_TOKEN,$params['id']);
	// debug($campaign);
    $campaign->id = $params['id'];
    $campaign->name = $params['name'];
    $campaign->subject = $params['subject'];
    $campaign->from_name = $params['from_name'];
    $campaign->from_email = $params['from_email'];
    $campaign->reply_to_email = $params['reply_to_email'];
    $campaign->email_content = $params['email_content'];
	 $campaign->message_footer->country='MA';
// debug($campaign);exit();
    return $cc->updateEmailCampaign(ACCESS_TOKEN, $campaign);
}