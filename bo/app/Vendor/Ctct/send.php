<?php
require_once 'autoload.php';

use Ctct\ConstantContact;
use Ctct\Components\Contacts\ContactList;
use Ctct\Components\EmailMarketing\Campaign;
use Ctct\Components\EmailMarketing\MessageFooter;
use Ctct\Components\EmailMarketing\Schedule;
use Ctct\Exceptions\CtctException;

// define("APIKEY", "4nzxeusmf76kqdemre9qkfav");
// define("ACCESS_TOKEN", "4af2adfd-9f65-424a-8365-c1f9f64a899a");

// debug(json_decode(DATA));
$data = json_decode(DATA, true);

	$myParams = array();

	$myParams['name'] = $data['name'];
	$myParams['subject'] = $data['subject'];
	$myParams['from_name'] = "Lavion.ma";
    $myParams['from_addr'] = "s.kanzallah@superdeal.ma";
    $myParams['greeting_string'] = "my greeting string";
    $myParams['reply_to_addr'] = "s.kanzallah@superdeal.ma";
    $myParams['text_content'] = "text content";
    $myParams['email_content'] = $data['message'];
    $myParams['format'] = "HTML";
    $myParams['lists'] = $data['list'];
	// print_r($myParams);exit();
try {
        $campaign = createCampaign($myParams);
        // print_r($campaign);
    } catch (CtctException $ex) {
        echo '<span class="label label-important">Error Creating Campaign</span>';
        echo '<div class="container alert-error"><pre class="failure-pre">';
        print_r($ex->getErrors());
        echo '</pre></div>';
        die();
    }
    if($data['status']!='OFF'){
    try {
    	if($data['status'] == 'LIVENOW'){
			$schedule = createSchedule($campaign->id, date('Y-m-d\TH:i:s\.000\Z',strtotime("+10 seconds")));
		}
		if($data['status'] == 'LIVE' && isset($data['date']) && !empty($data['date'])){
			$schedule = createSchedule($campaign->id, date('Y-m-d\TH:i:s\.000\Z',strtotime($data['date'])));
		}
    } catch (CtctException $ex) {
        echo '<span class="label label-important">Error Scheduling Campaign</span>';
        echo '<div class="container alert-error"><pre class="failure-pre">';
        print_r($ex->getErrors());
        echo '</pre></div>';
        die();
    }
    }
		
function createCampaign(array $params)
{
    $cc = new ConstantContact(APIKEY);
    $campaign = new Campaign();
    $campaign->name = $params['name'];
    $campaign->subject = $params['subject'];
    $campaign->from_name = $params['from_name'];
    $campaign->from_email = $params['from_addr'];
    $campaign->greeting_string = $params['greeting_string'];
    $campaign->reply_to_email = $params['reply_to_addr'];
    $campaign->text_content = $params['text_content'];
    $campaign->email_content = $params['email_content'];
    $campaign->email_content_format = $params['format'];

    // add the selected list or lists to the campaign
    if (isset($params['lists'])) {
        if (count($params['lists']) > 1) {
            foreach ($params['lists'] as $list) {
                $campaign->addList($list);
            }
        } else {
            $campaign->addList($params['lists'][0]);
        }
    }

    return $cc->addEmailCampaign(ACCESS_TOKEN, $campaign);
}

function createSchedule($campaignId, $time)
{
    $cc = new ConstantContact(APIKEY);
    $schedule = new Schedule();
    $schedule->scheduled_date = $time;
    return $cc->addEmailCampaignSchedule(ACCESS_TOKEN, $campaignId, $schedule);
}