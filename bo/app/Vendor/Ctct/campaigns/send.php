<?php
require_once dirname(__FILE__).'/../autoload.php';

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
	
    $myParams['id'] = $data['id'];
    $myParams['status'] = $data['status'];
    $myParams['date'] = $data['date'];
    $myParams['lists'] = $data['list'];
	// debug($myParams);exit();
try {
        $campaign = updateCampaign($myParams);
        debug($campaign);exit();
    } catch (CtctException $ex) {
        echo '<span class="label label-important">Error Creating Campaign</span>';
        echo '<div class="container alert-error"><pre class="failure-pre">';
        print_r($ex->getErrors());
        echo '</pre></div>';
        die();
    }
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

	function updateCampaign(array $params)
{
    $cc = new ConstantContact(APIKEY);
    $campaign = $cc->getEmailCampaign(ACCESS_TOKEN,$params['id']);
	// debug($campaign);
    // $campaign->id = $params['id'];
	$campaign->message_footer->country='MA';
	if (isset($params['lists'])) {
        if (count($params['lists']) > 1) {
            foreach ($params['lists'] as $list) {
                $campaign->addList($list);
            }
        } else {
            $campaign->addList($params['lists'][0]);
        }
    }
// debug($campaign);exit();
    return $cc->updateEmailCampaign(ACCESS_TOKEN, $campaign);
}

function createSchedule($campaignId, $time)
{
    $cc = new ConstantContact(APIKEY);
    $schedule = new Schedule();
    $schedule->scheduled_date = $time;
    return $cc->addEmailCampaignSchedule(ACCESS_TOKEN, $campaignId, $schedule);
}