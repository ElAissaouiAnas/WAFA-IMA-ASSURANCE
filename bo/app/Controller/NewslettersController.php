<?php

class NewslettersController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Newsletters';
    public $uses = array('Newsletter','Deal','Offre');
    public $paginate = array(
        'limit' => 10
    );

    function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
    	/*App::uses('CakeEmail', 'Network/Email');
       	$Email = new CakeEmail('gmail');
		$Email->from(array('saad.ces@gmail.com' => 'My Site'));
		$Email->to('s.kanzallah@superdeal.ma');
		
		$Email->subject('About');
		$Email->send('My message');*/
    	//mail('s.kanzallah@superdeal.ma', 'Mon Sujet', 'MonMessage');
        $this->paginate = array(
            'order' => 'Newsletter.created DESC',
			'conditions' => array('Newsletter.type ' => 1)
        );
        $this->set('newsletters', $this->paginate('Newsletter'));
    }
	
	public function template2() {
    	
        $this->paginate = array(
            'order' => 'Newsletter.created DESC',
			'conditions' => array('Newsletter.type ' => 2)
			);
        $this->set('newsletters', $this->paginate('Newsletter'));
    }
	
	public function template3() {
    	
        $this->paginate = array(
            'order' => 'Newsletter.created DESC',
			'conditions' => array('Newsletter.type ' => 3)
			);
        $this->set('newsletters', $this->paginate('Newsletter'));
    }

    public function add() {
        $this->helpers = array('TinyMCE.TinyMCE');
        $view = new View($this);
        // $html = $view->loadHelper('Html');
        $this->set('deal_ids', $this->Deal->find('list',array('fields' => array('Deal.id', 'Deal.name'))));
        $design =file_get_contents(WWW_ROOT.'/files/html/newsletter1/template.php', true );
		// echo $design;
        $defaultDeals =file_get_contents(WWW_ROOT.'/files/html/newsletter1/defaultDeal.html', true );
        $design= str_replace('LISTES_DEALS', $defaultDeals, $design);
        $this->set('template', $design);
        if ($this->request->is('post')) {
        	$this->request->data['Newsletter']['deal_ids'] = json_encode($this->request->data['Newsletter']['deal_ids']);
        	$this->request->data['Newsletter']['type'] = 1;
			$this->request->data['Newsletter']['body'] = '<html><body>'.$this->request->data['Newsletter']['body'].'</body></html>';
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash('Newsletter a été crée', 'alert', array(
                    'class' => 'alert-success'
                ));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Veuillez vérifier le formulaire', 'alert', array(
                    'class' => 'alert-error'
                ));
            }
        }
    }
	public function add3() {
        $this->helpers = array('TinyMCE.TinyMCE');
        // $view = new View($this);
        // $html = $view->loadHelper('Html');
        // $this->set('deal_ids', $this->Deal->find('list',array('fields' => array('Deal.id', 'Deal.name'))));
        $design =file_get_contents(WWW_ROOT.'/files/html/newsletter3/template.php', true );
		// echo $design;
        // $defaultDeals =file_get_contents(WWW_ROOT.'/files/html/newsletter1/defaultDeal.html', true );
        // $design= str_replace('LISTES_DEALS', $defaultDeals, $design);
        $this->set('template', $design);
        if ($this->request->is('post')) {
        	// $this->request->data['Newsletter']['deal_ids'] = json_encode($this->request->data['Newsletter']['deal_ids']);
        	$this->request->data['Newsletter']['type'] = 3;
        	$this->request->data['Newsletter']['body'] = '<html><body>'.$this->request->data['Newsletter']['body'].'</body></html>';
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash('Newsletter a été crée', 'alert', array(
                    'class' => 'alert-success'
                ));
                $this->redirect(array('action' => 'template3'));
            } else {
                $this->Session->setFlash('Veuillez vérifier le formulaire', 'alert', array(
                    'class' => 'alert-error'
                ));
            }
        }
    }
    
public function add2() {
        $this->helpers = array('TinyMCE.TinyMCE');
        $view = new View($this);
        // $html = $view->loadHelper('Html');
        $this->set('deal_ids', $this->Offre->find('list',array('fields' => array('Offre.id', 'Offre.titre'))));
        $design =file_get_contents( WWW_ROOT.'/files/html/newsletter2/template.php', true );
        $defaultDeals =file_get_contents( WWW_ROOT.'/files/html/newsletter2/defaultDeal.html', true );
        $design= str_replace('LISTES_DEALS', $defaultDeals, $design);
        $this->set('template', $design);
        if ($this->request->is('post')) {
        	$this->request->data['Newsletter']['deal_ids'] = json_encode($this->request->data['Newsletter']['deal_ids']);
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash('Newsletter a été crée', 'alert', array(
                    'class' => 'alert-success'
                ));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Veuillez vérifier le formulaire', 'alert', array(
                    'class' => 'alert-error'
                ));
            }
        }
    }

    public function edit($id = null) {
        $this->Newsletter->id = $id;
        $this->helpers = array('TinyMCE.TinyMCE');
        $view = new View($this);
        $html = $view->loadHelper('Html');
        $template = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id ' => $id)),array('fields' => array('*')));
        $this->set('template', $template['Newsletter']['body']);
        $this->set('deal_ids', $this->Deal->find('list',array('fields' => array('Deal.id', 'Deal.name'))));
        if ($this->request->is('get')) {
        	   $this->request->data = $this->Newsletter->read();
        } else {
        	$this->request->data['Newsletter']['deal_ids'] = json_encode($this->request->data['Newsletter']['deal_ids']);
			$this->request->data['Newsletter']['type'] = 1;
			$this->request->data['Newsletter']['body'] = '<html><body>'.$this->request->data['Newsletter']['body'].'</body></html>';
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash('Newsletter a été modifié', 'alert', array(
                    'class' => 'alert-success'
                ));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Veuillez vérifier le formulaire', 'alert', array(
                    'class' => 'alert-error'
                ));
            }
        }
    }
	public function edit3($id = null) {
        $this->Newsletter->id = $id;
        $this->helpers = array('TinyMCE.TinyMCE');
        // $view = new View($this);
        // $html = $view->loadHelper('Html');
        $template = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id ' => $id)),array('fields' => array('*')));
        $this->set('template', $template['Newsletter']['body']);
        $this->set('deal_ids', $this->Deal->find('list',array('fields' => array('Deal.id', 'Deal.name'))));
        if ($this->request->is('get')) {
        	   $this->request->data = $this->Newsletter->read();
        } else {
        	// $this->request->data['Newsletter']['deal_ids'] = json_encode($this->request->data['Newsletter']['deal_ids']);
			$this->request->data['Newsletter']['type'] = 3;
			$this->request->data['Newsletter']['body'] = '<html><body>'.$this->request->data['Newsletter']['body'].'</body></html>';
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash('Newsletter a été modifié', 'alert', array(
                    'class' => 'alert-success'
                ));
                $this->redirect(array('action' => 'template3'));
            } else {
                $this->Session->setFlash('Veuillez vérifier le formulaire', 'alert', array(
                    'class' => 'alert-error'
                ));
            }
        }
    }
 public function view($id = null) {
 		$this->layout = 'ajax';
        $this->Newsletter->id = $id;
        $newsletters = $this->Newsletter->read(null, $id);
        $this->set('newsletters', $newsletters);
        $this->set('deals', $this->Deal->find('all', array('conditions' => array('Deal.id' => json_decode($newsletters['Newsletter']['deal_ids'])))));
    }
 public function load($ids = null) {
 		$this->layout = 'ajax';
 		$ids= explode(',', $ids);
 		if(count($ids)==1){
 			 $this->set('deals', $this->Deal->find('all', array('conditions' => array('Deal.id ' => $ids))));
 		}elseif(count($ids)>1){
 			 $this->set('deals', $this->Deal->find('all', array('conditions' => array('Deal.id IN' => $ids))));
 		}
    }
 public function load2($ids = null) {
 		$this->layout = 'ajax';
 		$ids= explode(',', $ids);
 		if(count($ids)==1){
 			 $this->set('deals', $this->Deal->find('all', array('conditions' => array('Deal.id ' => $ids))));
 		}elseif(count($ids)>1){
 			 $this->set('deals', $this->Deal->find('all', array('conditions' => array('Deal.id IN' => $ids))));
 		}
    }

    public function delete($id = null) {
        $this->Newsletter->id = $id;

        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid Newsletter'));
        }

        if ($this->Newsletter->delete()) {
            $this->Session->setFlash(__('Newsletter deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(__('Newsletter was not deleted'), 'flash_fail');

        $this->redirect(array('action' => 'index'));
    }
    
	public function sendtest() {
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
        $email = new CakeEmail();
        $email->config();

        $sujet = 'message de test depuis le site lavion.ma';
        $mail = $data['email'];
        $id = $data['documentId'];
        
        $newsletter=$this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));
       
        $message = $newsletter['Newsletter']['body'];
        //$message = "<p>mll</p>";

        try {
            $email->to(explode(',', $mail))
                    ->subject($sujet)
                    ->from(array('info@lavion.ma' => 'Lavion.ma'))
                    ->emailFormat('html')
                    ->send($message);
        } catch (Exception $e) {
            $this->log($e->getMessage());
             $this->Session->setFlash('Votre message test n\'a pas été envoyé.', 'alert', array(
                    'class' => 'alert-error'
                ));
        }
    }
    
	public function sendcampaign() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			
			$this->Newsletter->id = $data['id'];
	
	        if (!$this->Newsletter->exists()) {
	            throw new NotFoundException(__('Invalid Newsletter'));
	        }
        
        $newsletter = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $data['id'])));
		$data['name'] = $newsletter['Newsletter']['name'].'-'.$newsletter['Newsletter']['id'].'-'.strtotime("now");
		$data['subject'] = $newsletter['Newsletter']['subject'];
		$data['message'] = $newsletter['Newsletter']['body'];
		define("DATA", json_encode($data));
		 // debug(json_encode($data));exit();
        // $message = $newsletter['Newsletter']['body'];
        // $list = json_encode($data['list']);
        // $status = $data['status'];
        // $list[0]=1;
        // define("NAME", $newsletter['Newsletter']['name'].'-'.$newsletter['Newsletter']['id'].'-'.strtotime("now"));
		// define("SUBJECT", $newsletter['Newsletter']['subject']);
		// define("FROM_NAME", "Lavion.ma");
		// define("FROM_ADDR", "s.kanzallah@superdeal.ma");
		// define("GREETING_STRING", "my greeting string");
		// define("REPLY_TO_ADDR", "s.kanzallah@superdeal.ma");
		// define("TEXT_CONTENT", "text content");
		// define("EMAIL_CONTENT", $message);
		// define("FORMAT", "HTML");
		// define("LISTS", $list);
		// define("DATA", $data);
		// if($status=='LIVENOW'){
		// define("SCHEDULE_TIME", date('Y-m-d\TH:i:s\.000\Z',strtotime("+10 seconds")));
		// }
	
    
	
        App::import('Vendor', 'Ctct/send');
		
		$this->Session->setFlash('Votre campagne a été envoyé.', 'alert', array(
                    'class' => 'alert-success'
                ));
                 $this->redirect(array('action' => 'index'));
    }
   // $this->redirect(array('action' => 'index'));
	}

}
