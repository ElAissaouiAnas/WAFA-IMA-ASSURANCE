<?php

class CampaignsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Campaigns';
    // public $uses = array('Campaign');
    // public $paginate = array(
        // 'limit' => 10
    // );

    function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        App::import('Vendor', 'Ctct/campaigns/index');
		// debug(json_decode(CAMPAIGNS,true));exit();
        $this->set('campaigns', json_decode(CAMPAIGNS,true));
    }
	public function edit($id = null) {
		$this->helpers = array('TinyMCE.TinyMCE');
        define("ID_CAMPAIGN", $id);
        App::import('Vendor', 'Ctct/campaigns/edit_get');
		$this->set('campaigns', json_decode(CAMPAIGNS,true));
		// debug(json_decode(CAMPAIGNS,true));exit();
        if ($this->request->is('post')) {
			$data = $this->request->data;
			// debug($data);exit();
			$data['id'] = $id;
			$data['name'] = $this->request->data['Newsletter']['name'];
			$data['subject'] = $this->request->data['Newsletter']['subject'];
			$data['from_name'] = $this->request->data['Newsletter']['from_name'];
			// $data['from_email'] = $this->request->data['Newsletter']['from_email'];
			$data['from_email'] = 'info@superdeal.ma';
			// $data['reply_to_email'] = $this->request->data['Newsletter']['reply_to_email'];
			$data['reply_to_email'] = 'info@superdeal.ma';
			$data['body'] = '<html><body><center>'.$this->request->data['Newsletter']['body'].'</center></body></html>';
			define("DATA", json_encode($data));
        	App::import('Vendor', 'Ctct/campaigns/edit_post');
                $this->Session->setFlash('Campaign a été modifié', 'alert', array(
                    'class' => 'alert-success'
                ));
                $this->redirect(array('action' => 'index'));
           
        }
    }
	public function view($id = null) {
		define("ID_CAMPAIGN", $id);
        App::import('Vendor', 'Ctct/campaigns/view');
		// debug(json_decode(CAMPAIGN_VIEW,true));exit();
		$campaign = json_decode(CAMPAIGN_VIEW,true);
        $this->set('email_content', $campaign['email_content']);
    }
	
	public function sendcampaign() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			// debug($data);exit();
		define("DATA", json_encode($data));
			
        App::import('Vendor', 'Ctct/campaigns/send');
		
		$this->Session->setFlash('Votre campagne a été envoyé.', 'alert', array(
                    'class' => 'alert-success'
                ));
                 $this->redirect(array('action' => 'index'));
    }
   // $this->redirect(array('action' => 'index'));
	}
	
	
	public function sendtest($id=null) {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (!empty($data['email'])) {
                $this->sendEmailTest($data);
                $this->Session->setFlash('Votre message test a été envoyé.', 'alert', array(
                    'class' => 'alert-success'
                ));
                //$this->redirect(array('action' => 'index'));
            }
        }
        $this->redirect(array('action' => 'index'));
    }
	 private function sendEmailTest($data) {
    	//debug($data);exit();
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->config();

        $sujet = 'Message de test depuis le site superdeal.ma';
        $mail = $data['email'];
        $id = $data['documentId'];
        
        $message =$this->view_content($id);
        //$message = "<p>mll</p>";

        try {
            $email->to(explode(',', $mail))
                    ->subject($sujet)
                    ->from(array('info@superdeal.ma' => 'Superdeal'))
                    ->emailFormat('html')
                    ->send($message);
        } catch (Exception $e) {
            $this->log($e->getMessage());
             $this->Session->setFlash('Votre message test n\'a pas été envoyé.', 'alert', array(
                    'class' => 'alert-error'
                ));
        }
    }
	
	private function view_content($id) {
		define("ID_CAMPAIGN", $id);
        App::import('Vendor', 'Ctct/campaigns/view');
		// debug(json_decode(CAMPAIGN_VIEW,true));exit();
		$campaign = json_decode(CAMPAIGN_VIEW,true);
        return $campaign['email_content'];
    }

}
