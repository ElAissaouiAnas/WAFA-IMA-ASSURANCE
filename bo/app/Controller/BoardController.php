<?php

class BoardController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Board';
    public $uses = array('Assurance','Mailhtmlbody','User','Cuser');
    public $paginate = array(
		'fields' => array(
                    'Assurance.idpayments',
					'Assurance.rdv',
					'Assurance.pnr',
					'Assurance.id_transaction',
                    'Assurance.montant_service',
                    'Assurance.montant_visa',
                    'Assurance.montant',
					'Assurance.status',
					'Assurance.user_id',
					'Assurance.expirationDate',
					'Assurance.created',
					'Assurance.updated',
					'Assurance.valid',
					'Assurance.nom',
					'Assurance.buyerEmail',
                    'Assurance.buyerPhone',
                    'Assurance.service',
                    'Assurance.files',
					'Assurance.userfiles',
					'User.username',
					'User.email',
					'Cuser.username',
					'Cuser.email'
				),
        'conditions' => array('Assurance.status !=' => 'DELETE'),
		'group'   => array('Assurance.pnr'),
		'order' => 'Assurance.idpayments DESC',
        'limit' => 10
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('pay');
    }

    public function index() {
        $this->redirect(array('action' => 'callcenter'));

		$q = $status = $type = '';
		$conditions = array('Assurance.status !=' => 'DELETE','Assurance.status !=' => 'PRE-PAY','Assurance.type' => 'Site');
		if(isset($this->request->query['q']) && !empty($this->request->query['q'])){
			
			$conditions['OR']['Assurance.pnr LIKE'] = '%'.$this->request->query["q"].'%';
			$conditions['OR']['Assurance.nom LIKE'] = '%'.$this->request->query["q"].'%';
			$conditions['OR']['Assurance.buyerEmail LIKE'] = '%'.$this->request->query["q"].'%';
					
			$q = $this->request->query["q"];
		}
		
		if(isset($this->request->query['status']) && !empty($this->request->query['status'])){
			switch ($this->request->query['status']) {
			case 'PENDING':
				$conditions['Assurance.status'] = $this->request->query['status'];
				$conditions['Assurance.expirationDate >'] = date('Y-m-d H:i:s');
				break;
			case 'PAID':
				$conditions['Assurance.status'] = $this->request->query['status'];
				$conditions['Assurance.valid'] = 0;
				break;
			case 'ISSUED':
				$conditions['Assurance.status'] = 'PAID';
				$conditions['Assurance.valid'] = 1;
				$conditions['Assurance.cancel'] = 0;
				break;
			case 'CANCELLED':
				$conditions['Assurance.status'] = 'PAID';
				$conditions['Assurance.cancel'] = 1;
				break;
			case 'EXPIRED':
				$conditions['Assurance.status'] = 'PENDING';
				$conditions['Assurance.expirationDate <'] = date('Y-m-d H:i:s');
				break;
			}
			$status = $this->request->query['status'];
		}

        if(isset($this->request->query['type']) && !empty($this->request->query['type'])){
            
            $conditions['Assurance.type'] =$this->request->query["type"];
                    
            $type = $this->request->query["type"];
        }
		
		// if (!$this->request->is('post')){
			// $conditions['Assurance.expirationDate >'] = date('Y-m-d H:i:s');
		// }
		$this->paginate = array (
					'conditions' =>  $conditions,
					'order' => 'Assurance.created DESC',
					'limit' => 20
			);
		$this->set ( 'q',  $q);
        $this->set ( 'type',  $type);
		$this->set ( 'status',  $status);
        $this->set('payments', $this->paginate('Assurance'));
        
    }

    public function callcenter() {

        $id = $this->Auth->user('id');
        $user = $this->User->find('first',array('conditions' => array('id' => $id),'fields' => array('*')));

        if (!$user['User']['login']) {
            $this->redirect(array('controller' => 'users','action' => 'info'));
        }
    
        $q = $status = $type = '';
        $conditions = array('Assurance.status !=' => 'DELETE');

        if(isset($this->request->query['q']) && !empty($this->request->query['q'])){
            
            $conditions['OR']['Assurance.nom LIKE'] = '%'.$this->request->query["q"].'%';
            $conditions['OR']['Assurance.prenom LIKE'] = '%'.$this->request->query["q"].'%';
            $conditions['OR']['Assurance.email LIKE'] = '%'.$this->request->query["q"].'%';
            $conditions['OR']['Assurance.id_transaction LIKE'] = '%'.$this->request->query["q"].'%';
                    
            $q = $this->request->query["q"];
        }

        if(isset($this->request->query['status']) && !empty($this->request->query['status'])){
            switch ($this->request->query['status']) {
            case 'PENDING':
                $conditions['Assurance.status'] = $this->request->query['status'];
                // $conditions['Assurance.expirationDate >'] = date('Y-m-d H:i:s');
                break;
            case 'ISSUED':
                $conditions['Assurance.status'] = 'PAID';
                $conditions['Assurance.files !='] = null;
                break;
            case 'COMPLETED':
                $conditions['Assurance.status'] = 'PAID';
                $conditions['Assurance.valid'] = 1;
                break;
            case 'PAID':
                $conditions['Assurance.status'] = $this->request->query['status'];
                $conditions['Assurance.files'] = null;
                break;
            }
            $status = $this->request->query['status'];
        }

        if(isset($this->request->query['type']) && !empty($this->request->query['type'])){
            
            $conditions['Assurance.type'] = $this->request->query["type"];
                    
            $type = $this->request->query["type"];
        }

        // $payments = $this->Assurance->find('all',array(
        //     'conditions' =>  $conditions,
        //     'joins' => array(
        //         array(
        //             'table' => 'contrats',
        //             'alias' => 'Contrat',
        //             'type' => 'LEFT',
        //             'conditions' => array(
        //                     'Contrat.id = Assurance.contrat_id' 
        //             ) 
        //         )
        //     ),
        //     'fields' => '*',
        //     'limit' => 100,
        //     'order' => 'Assurance.id DESC',
            
        // ));

        // echo "<pre>";
        // print_r($payments);exit();
        
        // if (!$this->request->is('post')){
            // $conditions['Assurance.expirationDate >'] = date('Y-m-d H:i:s');
        // }
        $this->paginate = array (
                    'conditions' =>  $conditions,
                    // 'joins' => array(
                    //     array(
                    //         'table' => 'contrats',
                    //         'alias' => 'Contrat',
                    //         'type' => 'LEFT',
                    //         'conditions' => array(
                    //                 'Contrat.id = Assurance.contrat_id' 
                    //         ) 
                    //     )
                    // ),
                    'order' => 'Assurance.id DESC',
                    'limit' => 20
            );
        $this->set ( 'q',  $q);
        $this->set ( 'type',  $type);
        $this->set ( 'status',  $status);
        $this->set('payments', $this->paginate('Assurance'));
        // $this->set('payments', $payments);
        $pos = $this->User->find('list',array('fields' => array('id','username')));
        // debug($pos);exit();
        $this->set ( 'pos',  $pos);
    }

    public function callcenter2() {

        $id = $this->Auth->user('id');
        $user = $this->User->find('first',array('conditions' => array('id' => $id),'fields' => array('*')));

        if (!$user['User']['login']) {
            $this->redirect(array('controller' => 'users','action' => 'info'));
        }
    
        $q = $status = $type = '';
        $conditions = array('Assurance.status !=' => 'DELETE');

        if(isset($this->request->query['q']) && !empty($this->request->query['q'])){
            
            $conditions['OR']['Assurance.pnr LIKE'] = '%'.$this->request->query["q"].'%';
            $conditions['OR']['Assurance.nom LIKE'] = '%'.$this->request->query["q"].'%';
            $conditions['OR']['Assurance.buyerEmail LIKE'] = '%'.$this->request->query["q"].'%';
            $conditions['OR']['Assurance.id_transaction LIKE'] = '%'.$this->request->query["q"].'%';
                    
            $q = $this->request->query["q"];
        }

        if(isset($this->request->query['status']) && !empty($this->request->query['status'])){
            switch ($this->request->query['status']) {
            case 'PENDING':
                $conditions['Assurance.status'] = $this->request->query['status'];
                $conditions['Assurance.expirationDate >'] = date('Y-m-d H:i:s');
                break;
            case 'PAID':
                $conditions['Assurance.status'] = $this->request->query['status'];
                $conditions['Assurance.valid'] = 0;
                break;
            case 'ISSUED':
                $conditions['Assurance.status'] = 'PAID';
                $conditions['Assurance.valid'] = 1;
                $conditions['Assurance.cancel'] = 0;
                break;
            case 'CANCELLED':
                $conditions['Assurance.status'] = 'PAID';
                $conditions['Assurance.cancel'] = 1;
                break;
            case 'EXPIRED':
                $conditions['Assurance.status'] = 'PENDING';
                $conditions['Assurance.expirationDate <'] = date('Y-m-d H:i:s');
                break;
            }
            $status = $this->request->query['status'];
        }

        $payments = $this->Assurance->find('all',array(
            'conditions' =>  $conditions,
            'joins' => array(
                array(
                    'table' => 'contrats',
                    'alias' => 'Contrat',
                    'type' => 'LEFT',
                    'conditions' => array(
                            'Contrat.id = Assurance.contrat_id' 
                    ) 
                )
            ),
            'fields' => '*',
            'order' => 'Assurance.id DESC',
            
        ));

        // echo "<pre>";
        // print_r($payments);exit();
        
        // if (!$this->request->is('post')){
            // $conditions['Assurance.expirationDate >'] = date('Y-m-d H:i:s');
        // }
        // $this->paginate = array (
        //             'conditions' =>  $conditions,
        //             'order' => 'Assurance.created DESC',
        //             'limit' => 20
        //     );
        $this->set ( 'q',  $q);
        $this->set ( 'type',  $type);
        $this->set ( 'status',  $status);
        $this->set('payments', $payments);
        $pos = $this->User->find('list',array('fields' => array('id','username')));
        // debug($pos);exit();
        $this->set ( 'pos',  $pos);
    }
    
    
	public function export() {
		$this->layout = 'xls';
		$conditions = array('Assurance.status !=' => 'DELETE');

        $conditions['Assurance.service'] = explode(',', $this->Auth->user('issuers'));
        if(isset($this->request->query['type']) && !empty($this->request->query['type'])){            
            $conditions['and']['Assurance.type'] = $this->request->query['type'];
        }

		if(isset($this->request->query['date1']) && !empty($this->request->query['date1'])){			
			$conditions['and']['Assurance.created >='] = $this->request->query['date1'];
		}
		if(isset($this->request->query['date2']) && !empty($this->request->query['date2'])){			
			$conditions['and']['Assurance.created <='] = $this->request->query['date2'];
		}
		if(isset($this->request->query['status']) && !empty($this->request->query['status'])){
			switch ($this->request->query['status']) {
			case 'PENDING':
				$conditions['Assurance.status'] = $this->request->query['status'];
				break;
			case 'PAID':
				$conditions['Assurance.status'] = $this->request->query['status'];
				$conditions['Assurance.valid'] = 0;
				break;
			case 'ISSUED':
				$conditions['Assurance.status'] = 'PAID';
				$conditions['Assurance.valid'] = 1;
				$conditions['Assurance.cancel'] = 0;
				break;
			case 'CANCELLED':
				$conditions['Assurance.status'] = 'PAID';
				$conditions['Assurance.cancel'] = 1;
				break;
			case 'EXPIRED':
				$conditions['Assurance.status'] = 'PENDING';
				$conditions['Assurance.expirationDate <'] = date('Y-m-d H:i:s');
				$conditions['Assurance.created >'] = date('Y-m-d H:i:s',time() - (90 * 24 * 60 * 60));
				break;
			case 'All':
				// $conditions['AND']['Assurance.status !='] = 'PENDING';
				break;
			}
			// $status = $this->request->data['status'];
		}
		// echo '<pre>';
		// print_r($this->request->data['status']);exit();
		// $this->paginate = array (
					// 'conditions' =>  $conditions,
					// 'order' => 'Assurance.created DESC',
					// 'limit' => 20
			// );
		$data = $this->Assurance->find('all', array(
            'conditions' => $conditions,
			'order' => 'Assurance.created DESC',
        ));
		$this->set('data',$data);
        
    }
    
	
	public function summary() {
        $id = $this->Auth->user('id');
        $user = $this->User->find('first',array('conditions' => array('id' => $id),'fields' => array('*')));

        if (!$user['User']['admin']) {
            $this->redirect(array('action' => 'callcenter'));
        }

        if (!$user['User']['login']) {
            $this->redirect(array('controller' => 'users','action' => 'info'));
        }
    
    }

    function caByMonth($id) {
        $ca = $this->Assurance->find('first', array(
            'conditions' => array('MONTH(Assurance.created)' => $id,'YEAR(Assurance.created)' => date('Y'),'Assurance.status' => 'PAID','Assurance.cancel' => 0),
            'fields' => array('MONTH(Assurance.created)  as MONTH','SUM(Assurance.montant) as CA'),
            'group' =>'YEAR(Assurance.created), MONTH(Assurance.created)'
        ));
        return $ca;
    }
	function caByMonth2($id,$y) {
        $ca = $this->Assurance->find('first', array(
            'conditions' => array('MONTH(COALESCE(Assurance.created,Assurance.created_at))' => $id,'YEAR(COALESCE(Assurance.created,Assurance.created_at))' => $y,'Assurance.status' => 'PAID','Assurance.cancel' => 0),
            'fields' => array('MONTH(COALESCE(Assurance.created,Assurance.created_at))  as MONTH','SUM(Assurance.montant) as CA'),
            'group' =>'YEAR(COALESCE(Assurance.created,Assurance.created_at)), MONTH(COALESCE(Assurance.created,Assurance.created_at))'
        ));
        return $ca;
    }
    function issuedByMonth($id,$y) {
        $ca = $this->Assurance->find('first', array(
            'conditions' => array('MONTH(Assurance.created)' => $id,'YEAR(Assurance.created)' => $y,'Assurance.status' => 'PAID','Assurance.cancel' => 0,'Assurance.valid' => 1),
            'fields' => array('MONTH(Assurance.created)  as MONTH','SUM(Assurance.montant) as CA'),
            'group' =>'YEAR(Assurance.created), MONTH(Assurance.created)'
        ));
        return $ca;
    }
    public function status() {
    
		//PAID
        $statis = $this->Assurance->find('all', array(
            'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y'),'Assurance.status !=' => 'DELETE',"not" => array ( "Assurance.paidDate" => null)),
            'fields' => array('SUBSTR(Assurance.paidDate,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && !Assurance.valid, 1, 0)) binga'),
            'group' => 'reservationdate'
        ));
		//PENDING
		$statis1 = $this->Assurance->find('all', array(
            'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y')),
            'fields' => array('SUBSTR(Assurance.created,1,10) reservationdate','SUM(IF(Assurance.status=\'PENDING\', 1, 0)) binga'),
            'group' => 'reservationdate'
        ));
		//ISSEUD
		$statis2 = $this->Assurance->find('all', array(
            'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y'),'Assurance.status !=' => 'DELETE',"not" => array ( "Assurance.confirmedDate" => null)),
            'fields' => array('SUBSTR(Assurance.confirmedDate,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && Assurance.valid && !Assurance.cancel, 1, 0)) binga'),
            'group' => 'reservationdate'
        ));
		//CANCELED
		$statis3 = $this->Assurance->find('all', array(
            'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y')),
            'fields' => array('SUBSTR(Assurance.created,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && Assurance.cancel, 1, 0)) binga'),
            'group' => 'reservationdate'
        ));
        $totals = $this->Assurance->find('all', array(
            'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y'),'Assurance.status !=' => 'DELETE',"not" => array ( "Assurance.paidDate" => null)),
            'fields' => array('SUBSTR(Assurance.paidDate,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && !Assurance.valid, Assurance.montant, 0)) total'),
            'group' => 'reservationdate'
        ));
		$totals1 = $this->Assurance->find('all', array(
            'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y')),
            'fields' => array('SUBSTR(Assurance.created,1,10) reservationdate','SUM(IF(Assurance.status=\'PENDING\', Assurance.montant, 0)) total'),
            'group' => 'reservationdate'
        ));
		$totals2 = $this->Assurance->find('all', array(
            'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y'),'Assurance.status !=' => 'DELETE',"not" => array ( "Assurance.confirmedDate" => null)),
            'fields' => array('SUBSTR(Assurance.confirmedDate,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && Assurance.valid && !Assurance.cancel, Assurance.montant, 0)) total','COUNT(IF(Assurance.status=\'PAID\' && Assurance.valid && !Assurance.cancel, 1, 0)) count_total'),
            'group' => 'reservationdate'
        ));
		$totals3 = $this->Assurance->find('all', array(
            'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y')),
            'fields' => array('SUBSTR(Assurance.created,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && Assurance.cancel, Assurance.montant, 0)) total'),
            'group' => 'reservationdate'
        ));
        $pending = $this->Assurance->find('count', array(
            'conditions' => array('YEAR(Assurance.created)' => date("Y"),'MONTH(Assurance.created)' => date("m"), 'TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP(),TIMESTAMP(Assurance.created))) <' => 57600, 'Assurance.status' => 'PENDING')
        ));
        $paid = $this->Assurance->find('count', array(
            'conditions' => array('YEAR(Assurance.created)' => date("Y"),'MONTH(Assurance.created)' => date("m"), 'Assurance.status' => 'PAID', 'Assurance.valid' => 0)
        ));
		$issued = $this->Assurance->find('count', array(
            'conditions' => array('YEAR(Assurance.created)' => date("Y"),'MONTH(Assurance.created)' => date("m"), 'Assurance.status' => 'PAID', 'Assurance.valid' => 1, 'Assurance.cancel' => 0)
        ));
        $lastCa = $this->Assurance->find('first', array(
            'conditions' => array('YEAR(Assurance.created)' => date("Y"),'MONTH(Assurance.created)' => date("m"), 'Assurance.status' => 'PAID', 'Assurance.cancel' => 0),
            'fields' => array('IF(SUM(IF(Assurance.status=\'PAID\', 1, 0)) IS NULL,0,SUM(IF(Assurance.status=\'PAID\', 1, 0))) count','REPLACE(FORMAT(IF(SUM(Assurance.montant) IS NULL ,0,SUM(Assurance.montant)), 0), ",", " ") CA'),
        ));
		// debug($lastCa);exit();
        $archived = $this->Assurance->find('count', array(
            'conditions' => array('MONTH(Assurance.created)' => date("m"),'TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP(),TIMESTAMP(Assurance.created))) >=' => 57600, 'Assurance.status' => 'PENDING')
        ));
        
        $arrayDate = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' =>'Apr', '05' =>'May', '06' =>'Jun', '07' =>'Jul', '08' =>'Aug', '09' =>'Sep', '10' =>'Oct', '11' =>'Nov', '12' =>'Dec');
    	for ($i = 11; $i >= 0; $i--) {
    		$months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
    	}
    	$chiffre_affaires = "[";
    	$chiffre_affaires_d = "[";
        $monthly_sales_x = "[";
        $monthly_sales_z = "[";
        $monthly_sales_y = "[";
        $total = $monthly_sales_total = $monthly_sales_total_z = 0;
        foreach ($months as $key => $value) {
    		$v = explode("-", $value);
    		// echo $arrayDate[$v[1]];
           // $key++;
            $ca = $this->caByMonth2($v[1],$v[0]);
            if(isset($ca) && !empty($ca)){
                $total+=$ca[0]['CA'];
            }
			if($key == 11){
                // $chiffre_affaires.="['".$value."', ".$total."]";
                $chiffre_affaires.=ceil($total);
                $chiffre_affaires_d.="'".$arrayDate[$v[1]]."'";
            }else{
                // $chiffre_affaires.="['".$value."', ".$total."],";
                $chiffre_affaires.=ceil($total).",";
                $chiffre_affaires_d.="'".$arrayDate[$v[1]]."',";
            }

            $monthly_sales_ca = $this->issuedByMonth($v[1],$v[0]);
            if(isset($monthly_sales_ca) && !empty($monthly_sales_ca)){
                $monthly_sales_total=$monthly_sales_ca[0]['CA'];
            }else{
                $monthly_sales_total=0;
            }
            $monthly_sales_ca_z = $this->issuedByMonth($v[1],$v[0]-1);
            if(isset($monthly_sales_ca_z) && !empty($monthly_sales_ca_z)){
                $monthly_sales_total_z=$monthly_sales_ca_z[0]['CA'];
            }else{
                $monthly_sales_total_z=0;
            }
            if($key == 11){
                $monthly_sales_x.=ceil($monthly_sales_total);
                $monthly_sales_z.=ceil($monthly_sales_total_z);
                $monthly_sales_y.="'".$arrayDate[$v[1]]."'";
            }else{
                $monthly_sales_x.=ceil($monthly_sales_total).",";
                $monthly_sales_z.=ceil($monthly_sales_total_z).",";
                $monthly_sales_y.="'".$arrayDate[$v[1]]."',";
            }
            
        }
        $chiffre_affaires.="]";
        $chiffre_affaires_d.="]";

        $monthly_sales_x.="]";
        $monthly_sales_z.="]";
        $monthly_sales_y.="]";
		
		$dates_array = array();
		$statisticsDate = "[";
        foreach ($statis1 as $key => $value) {
			$dates_array[$value[0]['reservationdate']] = 0;
            if($key == count($statis1) - 1){
                    $statisticsDate.="'".substr($value[0]['reservationdate'],5,9)."'";
                }else{
                    $statisticsDate.="'".substr($value[0]['reservationdate'],5,9)."',";
                }
            
        }
        $statisticsDate.="]";
		
		$paid_array = $dates_array;
		
		foreach ($statis as $key => $value) {
			$paid_array[$value[0]['reservationdate']] = $value[0]['binga'];
		}
		
		
        $statistics = "[";
		
		foreach ($paid_array as $key => $value) {
                    $statistics.=$value.",";            
        }
		$statistics =rtrim($statistics, ",");
		
        // foreach ($statis as $key => $value) {
            // if($key == count($statis) - 1){
                    // $statistics.=$value[0]['binga'];
                // }else{
                    // $statistics.=$value[0]['binga'].",";
                // }
            
        // }
        $statistics.="]";
		$statistics1 = "[";
        foreach ($statis1 as $key => $value) {
            if($key == count($statis1) - 1){
                    $statistics1.=$value[0]['binga'];
                }else{
                    $statistics1.=$value[0]['binga'].",";
                }
            
        }
        $statistics1.="]";
		
		$isseud_array = $dates_array;
		
		foreach ($statis2 as $key => $value) {
			$isseud_array[$value[0]['reservationdate']] = $value[0]['binga'];
		}
		
		$statistics2 = "[";
        foreach ($isseud_array as $key => $value) {
                    $statistics2.=$value.",";            
        }
		$statistics2 =rtrim($statistics2, ",");
        $statistics2.="]";
		$statistics3 = "[";
        foreach ($statis3 as $key => $value) {
            if($key == count($statis3) - 1){
                    $statistics3.=$value[0]['binga'];
                }else{
                    $statistics3.=$value[0]['binga'].",";
                }
            
        }
        $statistics3.="]";
		
		$paid_total_array = $dates_array;
		
		foreach ($totals as $key => $value) {
			$paid_total_array[$value[0]['reservationdate']] = ceil($value[0]['total']);
		}
		
		
        $total = "[";
		
		foreach ($paid_total_array as $key => $value) {
                    $total.=$value.",";            
        }
		$total =rtrim($total, ",");
		
        // $total = "[";
        
        // foreach ($totals as $key => $value) {
            // if($key == count($totals) - 1){
                    // $total.=ceil($value[0]['total']);
                // }else{
                    // $total.=ceil($value[0]['total']).",";
                // }            
        // }
        $total.="]";
		$total1 = "[";
        
        foreach ($totals1 as $key => $value) {
            if($key == count($totals1) - 1){
                    $total1.=ceil($value[0]['total']);
                }else{
                    $total1.=ceil($value[0]['total']).",";
                }            
        }
        $total1.="]";
		
		$isseud_total_array = $average_order_total_array = $dates_array;
		
		foreach ($totals2 as $key => $value) {
            $isseud_total_array[$value[0]['reservationdate']] = ceil($value[0]['total']);
			$average_order_total_array[$value[0]['reservationdate']] = ceil($value[0]['total']/$value[0]['count_total']);
		}
		
		$total2 = $average_order_total = "[";
        foreach ($isseud_total_array as $key => $value) {
                    $total2.=$value.",";            
        }
        $total2 =rtrim($total2, ",");
        foreach ($average_order_total_array as $key => $value) {
                    $average_order_total.=$value.",";            
        }
		$average_order_total =rtrim($average_order_total, ",");
        // foreach ($totals2 as $key => $value) {
            // if($key == count($totals2) - 1){
                    // $total2.=ceil($value[0]['total']);
                // }else{
                    // $total2.=ceil($value[0]['total']).",";
                // }            
        // }
        $total2.="]";
        $average_order_total.="]";
		$total3 = "[";
        
        foreach ($totals3 as $key => $value) {
            if($key == count($totals3) - 1){
                    $total3.=ceil($value[0]['total']);
                }else{
                    $total3.=ceil($value[0]['total']).",";
                }            
        }
        $total3.="]";
		$totalDate = "[";
        
        foreach ($totals1 as $key => $value) {
            if($key == count($totals1) - 1){
                    $totalDate.="'".substr($value[0]['reservationdate'],5,9)."'";
                }else{
                    $totalDate.="'".substr($value[0]['reservationdate'],5,9)."',";
                }            
        }
        $totalDate.="]";
        $arr = array("lastCa" => $lastCa ,"status" => "[['PAID',".$paid."],['ISSUED',".$issued."],['PENDING',".$pending."]]", "status2" => $chiffre_affaires,"status2_d" => $chiffre_affaires_d, "status3" => $statistics,"status31" => $statistics1,"status32" => $statistics2,"status33" => $statistics3, "datestatus3" => $statisticsDate, "status4" => $total,"status5" => $total1,"status6" => $total2,"status7" => $total3, "datestatus4" => $totalDate, "monthly_sales_x" => $monthly_sales_x,"monthly_sales_z" => $monthly_sales_z, "monthly_sales_y" => $monthly_sales_y, "average_order_value_x" => $totalDate, "average_order_value_y" => $average_order_total);
        echo json_encode($arr);
        exit();
        
    }

    public function graph($type = null) {

        //debut du code PHP
        // $timestart=microtime(true);

        try {
            switch ($type) {
            case '1':
                $lastCa = $this->Assurance->find('first', array(
                    'conditions' => array('YEAR(Assurance.created)' => date("Y"),'MONTH(Assurance.created)' => date("m"), 'Assurance.status' => 'PAID', 'Assurance.cancel' => 0),
                    'fields' => array('IF(SUM(IF(Assurance.status=\'PAID\', 1, 0)) IS NULL,0,SUM(IF(Assurance.status=\'PAID\', 1, 0))) count','REPLACE(FORMAT(IF(SUM(Assurance.montant) IS NULL ,0,SUM(Assurance.montant)), 0), ",", " ") CA'),
                ));
                $arr = array("lastCa" => $lastCa);
                echo json_encode($arr);
                // exit();
                break;
            case '2':
                $paid = $this->Assurance->find('count', array(
                    'conditions' => array('YEAR(COALESCE(Assurance.created,Assurance.created_at))' => date("Y"), 'MONTH(COALESCE(Assurance.created,Assurance.created_at))' => date("m"), 'Assurance.status' => 'PAID', 'Assurance.files IS NULL')
                ));
                $pending = $this->Assurance->find('count', array(
                    'conditions' => array('YEAR(COALESCE(Assurance.created,Assurance.created_at))' => date("Y"), 'MONTH(COALESCE(Assurance.created,Assurance.created_at))' => date("m"), 'Assurance.status' => 'PENDING')
                ));
               
                $issued = $this->Assurance->find('count', array(
                    'conditions' => array('YEAR(COALESCE(Assurance.created,Assurance.created_at))' => date("Y"), 'MONTH(COALESCE(Assurance.created,Assurance.created_at))' => date("m"), 'Assurance.status' => 'PAID', 'Assurance.files IS NOT NULL')
                ));
                $arr = array(
                    array('label'  => 'ISSUED', 'value' => $issued), 
                    array('label'  => 'PAID', 'value' => $paid), 
                    array('label'  => 'PENDING', 'value' => $pending)
                );
                echo json_encode($arr);
                // exit();
                break;
            case '3':
                // $arrayDate = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' =>'Apr', '05' =>'May', '06' =>'Jun', '07' =>'Jul', '08' =>'Aug', '09' =>'Sep', '10' =>'Oct', '11' =>'Nov', '12' =>'Dec');
                for ($i = 11; $i >= 0; $i--) {
                    $months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
                }

                $arr = array();

                $total = 0;
                foreach ($months as $key => $value) {
                    $v = explode("-", $value);
                    $ca = $this->caByMonth2($v[1],$v[0]);
                    if(isset($ca) && !empty($ca)){
                        $total+=$ca[0]['CA'];
                    }
                    // $arr[] = array('label'  => $arrayDate[$v[1]], 'value' => ceil($total));
                    $arr[] = array('y'  => $v[0].'-'.$v[1], 'item1' => ceil($total) );
                }
                echo str_replace("'y'", 'y', str_replace("'item1'", 'item1', json_encode($arr)) ) ;
                // exit();
                break;
            case '4':
                //PAID
                $results = $this->Assurance->find('all', array(
                    'conditions' => array(
                        'DATEDIFF(CURRENT_DATE(),SUBSTR(COALESCE(Assurance.created,Assurance.created_at),1,10)) <' => 29,
                        'YEAR(COALESCE(Assurance.created,Assurance.created_at))' => date('Y'),
                        // 'Assurance.status !=' => 'DELETE',
                        // "not" => array ( "Assurance.paidDate" => null)
                    ),
                    'fields' => array(
                        'SUBSTR(COALESCE(Assurance.created,Assurance.created_at),1,10) reservationdate',
                        'SUM(IF(Assurance.status=\'PAID\' && Assurance.files IS NULL, 1, 0)) paid',
                        'SUM(IF(Assurance.status=\'PAID\' && Assurance.files IS NULL, Assurance.montant, 0)) ca_paid',
                        'SUM(IF(Assurance.status=\'PENDING\', 1, 0)) pending',
                        'SUM(IF(Assurance.status=\'PENDING\', Assurance.montant, 0)) ca_pending',
                        'SUM(IF(Assurance.status=\'PAID\' && Assurance.files IS NOT NULL, 1, 0)) isseud',
                        'SUM(IF(Assurance.status=\'PAID\' && Assurance.files IS NOT NULL, Assurance.montant, 0)) ca_isseud',
                        // 'SUM(IF(Assurance.status=\'PAID\' && Assurance.cancel, 1, 0)) canceled',
                        // 'SUM(IF(Assurance.status=\'PAID\' && Assurance.cancel, Assurance.montant, 0)) ca_canceled',
                    ),
                    'group' => 'reservationdate'
                ));
                    $arr = array();
                foreach ($results as $key => $result) {
                    $arr['count'][] = array(
                        'y'  => $result[0]['reservationdate'],
                        'isseud' => intval($result[0]['isseud']),
                        'paid' => intval($result[0]['paid']),
                        'pending' => intval($result[0]['pending']),
                        // 'canceled' => intval($result[0]['canceled']),
                    );
                    $arr['sales'][] = array(
                        'y'  => $result[0]['reservationdate'],
                        'ca_isseud' => intval($result[0]['ca_isseud']),
                        'ca_paid' => intval($result[0]['ca_paid']),
                        'ca_pending' => intval($result[0]['ca_pending']),
                        // 'ca_canceled' => intval($result[0]['ca_canceled']),
                    );
                }
                echo json_encode($arr);
                // exit();
                break;
            case '5':
                //PENDING
                $statis1 = $this->Assurance->find('all', array(
                    'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y')),
                    'fields' => array('SUBSTR(Assurance.created,1,10) reservationdate','SUM(IF(Assurance.status=\'PENDING\', 1, 0)) binga'),
                    'group' => 'reservationdate'
                ));
                $dates_array = array();
                foreach ($statis1 as $key => $value) {
                    $dates_array[$value[0]['reservationdate']] = 0;
                    
                }
                $paid_total_array = $dates_array;

                $totals = $this->Assurance->find('all', array(
                    'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y'),'Assurance.status !=' => 'DELETE',"not" => array ( "Assurance.paidDate" => null)),
                    'fields' => array('SUBSTR(Assurance.paidDate,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && !Assurance.valid, Assurance.montant, 0)) total'),
                    'group' => 'reservationdate'
                ));
                $totals1 = $this->Assurance->find('all', array(
                    'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y')),
                    'fields' => array('SUBSTR(Assurance.created,1,10) reservationdate','SUM(IF(Assurance.status=\'PENDING\', Assurance.montant, 0)) total'),
                    'group' => 'reservationdate'
                ));
                $totals2 = $this->Assurance->find('all', array(
                    'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y'),'Assurance.status !=' => 'DELETE',"not" => array ( "Assurance.confirmedDate" => null)),
                    'fields' => array('SUBSTR(Assurance.confirmedDate,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && Assurance.valid && !Assurance.cancel, Assurance.montant, 0)) total','COUNT(IF(Assurance.status=\'PAID\' && Assurance.valid && !Assurance.cancel, 1, 0)) count_total'),
                    'group' => 'reservationdate'
                ));
                $totals3 = $this->Assurance->find('all', array(
                    'conditions' => array( 'DATEDIFF(CURRENT_DATE(),SUBSTR(Assurance.created,1,10)) <' => 29,'YEAR(Assurance.created)' => date('Y')),
                    'fields' => array('SUBSTR(Assurance.created,1,10) reservationdate','SUM(IF(Assurance.status=\'PAID\' && Assurance.cancel, Assurance.montant, 0)) total'),
                    'group' => 'reservationdate'
                ));
                
                foreach ($totals as $key => $value) {
                    $paid_total_array[$value[0]['reservationdate']] = ceil($value[0]['total']);
                }
                
                
                $total = "[";
                
                foreach ($paid_total_array as $key => $value) {
                    $total.=$value.",";            
                }
                $total =rtrim($total, ",");
                $total.="]";
                $total1 = "[";
                
                foreach ($totals1 as $key => $value) {
                    if($key == count($totals1) - 1){
                        $total1.=ceil($value[0]['total']);
                    }else{
                        $total1.=ceil($value[0]['total']).",";
                    }            
                }
                $total1.="]";
                
                $isseud_total_array = $average_order_total_array = $dates_array;
                
                foreach ($totals2 as $key => $value) {
                    $isseud_total_array[$value[0]['reservationdate']] = ceil($value[0]['total']);
                    $average_order_total_array[$value[0]['reservationdate']] = ceil($value[0]['total']/$value[0]['count_total']);
                }
                
                $total2 = $average_order_total = "[";
                foreach ($isseud_total_array as $key => $value) {
                    $total2.=$value.",";            
                }
                $total2 =rtrim($total2, ",");
                foreach ($average_order_total_array as $key => $value) {
                    $average_order_total.=$value.",";            
                }
                $average_order_total =rtrim($average_order_total, ",");

                $total2.="]";
                $average_order_total.="]";
                $total3 = "[";
                
                foreach ($totals3 as $key => $value) {
                    if($key == count($totals3) - 1){
                        $total3.=ceil($value[0]['total']);
                    }else{
                        $total3.=ceil($value[0]['total']).",";
                    }            
                }
                $total3.="]";
                $totalDate = "[";
                
                foreach ($totals1 as $key => $value) {
                    if($key == count($totals1) - 1){
                        $totalDate.="'".substr($value[0]['reservationdate'],5,9)."'";
                    }else{
                        $totalDate.="'".substr($value[0]['reservationdate'],5,9)."',";
                    }            
                }
                $totalDate.="]";
                $arr = array(
                    "status4" => $total,
                    "status5" => $total1,
                    "status6" => $total2,
                    "status7" => $total3,
                    "datestatus4" => $totalDate,
                    "average_order_value_x" => $totalDate,
                    "average_order_value_y" => $average_order_total
                );
                echo json_encode($arr);
                // exit();
                break;
            case '6':
                $arrayDate = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' =>'Apr', '05' =>'May', '06' =>'Jun', '07' =>'Jul', '08' =>'Aug', '09' =>'Sep', '10' =>'Oct', '11' =>'Nov', '12' =>'Dec');
                for ($i = 11; $i >= 0; $i--) {
                    $months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
                }
                $arr = array();
                $monthly_sales_total = $monthly_sales_total_z = 0;
                foreach ($months as $key => $value) {
                    $v = explode("-", $value);

                    $monthly_sales_ca = $this->caByMonth2($v[1],$v[0]);
                    if(isset($monthly_sales_ca) && !empty($monthly_sales_ca)){
                        $monthly_sales_total=$monthly_sales_ca[0]['CA'];
                    }else{
                        $monthly_sales_total=0;
                    }

                    $monthly_sales_ca_z = $this->caByMonth2($v[1],$v[0]-1);
                    if(isset($monthly_sales_ca_z) && !empty($monthly_sales_ca_z)){
                        $monthly_sales_total_z=$monthly_sales_ca_z[0]['CA'];
                    }else{
                        $monthly_sales_total_z=0;
                    }

                    $arr[] = array('y'  => $v[0].'-'.$v[1], 'item1' => ceil($monthly_sales_total), 'item2' => ceil($monthly_sales_total_z) );
                    
                }
                echo json_encode($arr);
                // exit();
                break;
            
            default:
                # code...
                break;
        }
            
        } catch (Exception $e) {
            
        }

        //Fin du code PHP
        // $timeend=microtime(true);
        // $time=$timeend-$timestart;
         
        // // Afficher le temps d'éxecution
        // $page_load_time = number_format($time, 3);
        // echo "<br>Debut du script: ".date("H:i:s", $timestart);
        // echo "<br>Fin du script: ".date("H:i:s", $timeend);
        // echo "<br>Script execute en " . $page_load_time . " sec";

        exit();
    
        
        
        
        
        // debug($lastCa);exit();
        $archived = $this->Assurance->find('count', array(
            'conditions' => array('MONTH(Assurance.created)' => date("m"),'TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP(),TIMESTAMP(Assurance.created))) >=' => 57600, 'Assurance.status' => 'PENDING')
        ));
        
        $arrayDate = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' =>'Apr', '05' =>'May', '06' =>'Jun', '07' =>'Jul', '08' =>'Aug', '09' =>'Sep', '10' =>'Oct', '11' =>'Nov', '12' =>'Dec');
        for ($i = 11; $i >= 0; $i--) {
            $months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
        }
        $chiffre_affaires = "[";
        $chiffre_affaires_d = "[";
        $monthly_sales_x = "[";
        $monthly_sales_z = "[";
        $monthly_sales_y = "[";
        $total = $monthly_sales_total = $monthly_sales_total_z = 0;
        foreach ($months as $key => $value) {
            $v = explode("-", $value);
            // echo $arrayDate[$v[1]];
           // $key++;
            $ca = $this->caByMonth2($v[1],$v[0]);
            if(isset($ca) && !empty($ca)){
                $total+=$ca[0]['CA'];
            }
            if($key == 11){
                // $chiffre_affaires.="['".$value."', ".$total."]";
                $chiffre_affaires.=ceil($total);
                $chiffre_affaires_d.="'".$arrayDate[$v[1]]."'";
            }else{
                // $chiffre_affaires.="['".$value."', ".$total."],";
                $chiffre_affaires.=ceil($total).",";
                $chiffre_affaires_d.="'".$arrayDate[$v[1]]."',";
            }

            $monthly_sales_ca = $this->issuedByMonth($v[1],$v[0]);
            if(isset($monthly_sales_ca) && !empty($monthly_sales_ca)){
                $monthly_sales_total=$monthly_sales_ca[0]['CA'];
            }else{
                $monthly_sales_total=0;
            }
            $monthly_sales_ca_z = $this->issuedByMonth($v[1],$v[0]-1);
            if(isset($monthly_sales_ca_z) && !empty($monthly_sales_ca_z)){
                $monthly_sales_total_z=$monthly_sales_ca_z[0]['CA'];
            }else{
                $monthly_sales_total_z=0;
            }
            if($key == 11){
                $monthly_sales_x.=ceil($monthly_sales_total);
                $monthly_sales_z.=ceil($monthly_sales_total_z);
                $monthly_sales_y.="'".$arrayDate[$v[1]]."'";
            }else{
                $monthly_sales_x.=ceil($monthly_sales_total).",";
                $monthly_sales_z.=ceil($monthly_sales_total_z).",";
                $monthly_sales_y.="'".$arrayDate[$v[1]]."',";
            }
            
        }
        $chiffre_affaires.="]";
        $chiffre_affaires_d.="]";

        $monthly_sales_x.="]";
        $monthly_sales_z.="]";
        $monthly_sales_y.="]";
        
       
        
        
        $arr = array("lastCa" => $lastCa ,"status" => "[['PAID',".$paid."],['ISSUED',".$issued."],['PENDING',".$pending."]]", "status2" => $chiffre_affaires,"status2_d" => $chiffre_affaires_d, "status3" => $statistics,"status31" => $statistics1,"status32" => $statistics2,"status33" => $statistics3, "datestatus3" => $statisticsDate, "status4" => $total,"status5" => $total1,"status6" => $total2,"status7" => $total3, "datestatus4" => $totalDate, "monthly_sales_x" => $monthly_sales_x,"monthly_sales_z" => $monthly_sales_z, "monthly_sales_y" => $monthly_sales_y, "average_order_value_x" => $totalDate, "average_order_value_y" => $average_order_total);
        echo json_encode($arr);
        exit();
        
    }
	
    public function valid($id = null) {
	 	$user_id = $this->Auth->user('id');
		if ($this->Assurance->updateAll(array('Assurance.valid' => 1,'Assurance.user_id' => $user_id,'Assurance.confirmedDate' => "'".date('Y-m-d H:i:s')."'"),array('Assurance.id ' => $id))) {
			$this->Session->setFlash(__('The Assurance has been Confirmed'), 'flash_success');
			$this->redirect(array('action' => 'callcenter'));
		} else {
			$this->Session->setFlash(__('The Assurance could not be Confirmed. Please, try again.'), 'flash_fail');
		}
        
    }
	
    public function cancel($id = null) {
	 	$user_id = $this->Auth->user('id');
		if ($this->Assurance->updateAll(array('Assurance.cancel' => 1,'Assurance.cancel_user_id' => $user_id,'Assurance.cancelledDate' => "'".date('Y-m-d H:i:s')."'"),array('Assurance.id ' => $id))) {
			$this->Session->setFlash(__('The Assurance has been Cancelled'), 'flash_success');
			$this->redirect(array('action' => 'callcenter'));
		} else {
			$this->Session->setFlash(__('The Assurance could not be Cancelled. Please, try again.'), 'flash_fail');
		}
        
    }
	 public function view($id = null) {
		// $this->layout = 'ajax';
        $payment = $this->Assurance->find('first', array(
            'conditions' => array(
                    'Assurance.id' => $id,
            ),
            'joins' => array(
                array(
                    'table' => 'contrats',
                    'alias' => 'Contrat',
                    'type' => 'LEFT',
                    'conditions' => array(
                            'Contrat.id = Assurance.contrat_id' 
                    ) 
                )
            ),
            'fields' => '*'
        ));
        // echo "<pre>";
        // print_r($payment);exit();
        $this->set('payment', $payment);
        
    }
	public function test(){
    	$arrayDate = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' =>'Apr', '05' =>'May', '06' =>'Jun', '07' =>'Jul', '08' =>'Aug', '09' =>'Sep', '10' =>'Oct', '11' =>'Nov', '12' =>'Dec');
    	for ($i = 11; $i >= 0; $i--) {
    		$months[] = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
    	}
    	$monthly_sales_x = "[";
    	$monthly_sales_y = "[";
            $monthly_sales_total = 0;
            foreach ($months as $key => $value) {
    		$v = explode("-", $value);
    		// echo $arrayDate[$v[1]];
               // $key++;
                $monthly_sales_ca = $this->issuedByMonth($v[1],$v[0]);
                if(isset($monthly_sales_ca) && !empty($monthly_sales_ca)){
                    $monthly_sales_total=$monthly_sales_ca[0]['CA'];
                }
    			if($key == 11){
                    $monthly_sales_x.=ceil($monthly_sales_total);
                    $monthly_sales_y.=$arrayDate[$v[1]];
                }else{
                    $monthly_sales_x.=ceil($monthly_sales_total).",";
                    $monthly_sales_y.=$arrayDate[$v[1]].",";
                }
                
            }
            $monthly_sales_x.="]";
            $monthly_sales_y.="]";
    	// print_r($months);
    	exit();
	}
	
	public function generate_oldd() {
        $id = $this->Auth->user('id');
        $user = $this->User->find('first',array('conditions' => array('id' => $id),'fields' => array('*')));

        if (!$user['User']['login']) {
            $this->redirect(array('controller' => 'users','action' => 'info'));
        }
		if ($this->request->is('post')) {

            $this->request->data['Assurance']['montant'] = $this->request->data['Assurance']['montant']*1.12;
            
			$p=$this->Assurance->save($this->request->data);
			
            
			App::import('Vendor', 'Binga');
			
			BingaApi::BingaKey(true,'tlscontact.com', '$tls@nCtakt3');

			$Binga = new BingaApi();

			$pnr = $p['Assurance']['pnr'];
			$order_id = $p['Assurance']['id'];
			$amount = $p['Assurance']['montant'];
			$buyerFirstName = $p['Assurance']['buyerFirstName'];
			$buyerLastName = $p['Assurance']['buyerLastName'];
			$telephone = $p['Assurance']['buyerPhone'];
			$rdv = $p['Assurance']['rdv'];
			$StoreId = '401040';
			$status = 'PRE-PAY';
			$SLKSecretkey = '3af432d8cd05f693c88d7e54cf43d800';
			$email = $p['Assurance']['buyerEmail'];

			$dataMD5= $status . $amount . $StoreId . $order_id . $email . $SLKSecretkey;
			$checksum=MD5($dataMD5);

            if ($rdv) {
                $nextdays = strtotime("-2 days", strtotime($rdv));
            }else{
                $nextdays = time() + (8760 * 60 * 60);
            }

            $payUrl = Router::url (array('controller' => 'board','action' => 'pay' ), true );
			
			$params=array(
				'externalId' => $order_id,
				'expirationDate' => gmdate('Y-m-d\T23:59:59\G\M\T', $nextdays),
				'amount' => $amount,
				'buyerFirstName' => $buyerFirstName,
				'buyerLastName' => $buyerLastName,
				'buyerEmail' => $email,
				'buyerAddress' => $pnr,
				'buyerPhone' => $telephone,
				'storeId' => $StoreId,
				'successUrl' => 'successUrl',
				'failureUrl' => 'failureUrl',
				'bookUrl' => 'bookUrl',
				'payUrl' => $payUrl,
				'orderCheckSum' => $checksum,
				'apiVersion' => '1.1'
			);
            // debug($params);
			$result = $Binga->request('api/orders/pay',$params);
            // debug($result);
            // exit();
			$this->Assurance->updateAll(
				array('Assurance.id_transaction' => $result['orders']['order']['code'],'Assurance.status' => '"'.$result['orders']['order']['status'].'"','Assurance.expirationDate' => '"'.$result['orders']['order']['expirationDate'].'"'),
				array('Assurance.id' => $order_id)
			);

			$this->Session->setFlash(__('The reservation has been created'), 'flash_success');
            $this->redirect(array('action' => 'callcenter'));
		}
    }

    public function generate() {
        $id = $this->Auth->user('id');
        $user = $this->User->find('first',array('conditions' => array('id' => $id),'fields' => array('*')));

        if (!$user['User']['login']) {
            $this->redirect(array('controller' => 'users','action' => 'info'));
        }

        // if (!$user['User']['admin']) {
        //     $this->redirect(array('action' => 'callcenter'));
        // }
        
        if ($this->request->is('post')) {


            $data['Assurance'] = $this->request->data;
            // $user_id = $this->Auth->user('id');
            // $data['Assurance']['user_id'] = $user_id;

            $this->loadModel('Contrat');
            $contrat = $this->Contrat->findById($data['Assurance']['contrat_id']);

            if ($contrat) {

                $this->loadModel('Assurance');
                $p = $this->Assurance->save( $data );
                
                App::import('Vendor', 'Binga');
                
                BingaApi::BingaKey(true,'aig', '@yl1$In$010618');

                $Binga = new BingaApi();

                $order_id = $p['Assurance']['id'];
                $amount = $contrat['Contrat']['prime_ttc'];
                $buyerFirstName = $p['Assurance']['prenom'];
                $buyerLastName = $p['Assurance']['nom'];
                $telephone = $p['Assurance']['tel'];
                // $adress = $p['Assurance']['adress'];
                $StoreId = '401040';
                $status = 'PRE-PAY';
                $SLKSecretkey = '3af432d8cd05f693c88d7e54cf43d800';
                $email = $p['Assurance']['email'];

                $dataMD5= $status . $amount . $StoreId . $order_id . $email . $SLKSecretkey;
                $checksum=MD5($dataMD5);
                
                $nextdays = time() + (8760 * 60 * 60);

                $payUrl = Router::url (array('controller' => 'board','action' => 'pay' ), true );
                
                $params=array(
                    'externalId' => $order_id,
                    'expirationDate' => gmdate('Y-m-d\TH:i:s\G\M\T', $nextdays),
                    'amount' => $amount,
                    'buyerFirstName' => $buyerFirstName,
                    'buyerLastName' => $buyerLastName,
                    'buyerEmail' => $email,
                    'buyerAddress' => 'Maroc',
                    'buyerPhone' => $telephone,
                    'storeId' => $StoreId,
                    'successUrl' => 'successUrl',
                    'failureUrl' => 'failureUrl',
                    'bookUrl' => 'bookUrl',
                    'payUrl' => $payUrl,
                    'orderCheckSum' => $checksum,
                    'apiVersion' => '1.1'
                );
                // debug($params);
                $result = $Binga->request('api/orders/pay',$params);
                // debug($result);
                // exit();
                $this->Assurance->updateAll(
                    array(
                        'Assurance.id_transaction' => $result['orders']['order']['code'],
                        'Assurance.status' => '"'.$result['orders']['order']['status'].'"',
                        'Assurance.totalAmount' => '"'.$result['orders']['order']['totalAmount'].'"',
                        'Assurance.montant' => '"'.$amount.'"',
                        'Assurance.expirationDate' => '"'.$result['orders']['order']['expirationDate'].'"'
                    ),
                    array('Assurance.id' => $order_id)
                );

                $this->Session->setFlash(__('The reservation has been created'), 'flash_success');
             }else{
                $this->Session->setFlash(__('The reservation has not been created'), 'flash_fail');

             }
            $this->redirect(array('action' => 'callcenter'));
        }
    }


    public function pay()
    {
        if ($_POST) {
            $storeId = '401040';
            $status = 'PAY';
            $SLKSecretkey = '3af432d8cd05f693c88d7e54cf43d800';
            
            $externalId=$_POST["externalId"];
            $email=$_POST["buyerEmail"];

            $totalAmountTx=$_POST["amount"];

            $checksumBinga=$_POST["orderCheckSum"];

            $orderCode=$_POST["code"];

            $count = $this->Assurance->findById($externalId);

            if ($count) {
                $dataMD5= $status . $totalAmountTx . $storeId . $externalId . $email . $SLKSecretkey;
                $checksum=md5($dataMD5);
                if ($checksum == $checksumBinga && is_numeric($orderCode) == "True" && !empty($orderCode)) {
                    $this->Assurance->updateAll(
                        array('Assurance.status' => '"PAID"','Assurance.paidDate' => '"'.date("Y-m-d H:i:s").'"'),
                        array('Assurance.id' => $externalId)
                    );
                    die('100;'.gmdate('Y-m-d\TH:i:s\G\M\T'));
                    exit();
                }

            }
        }
        
        die('000;'.gmdate('Y-m-d\TH:i:s\G\M\T'));
        exit();
    }

    /***Contrat***/
    public function import()
    {
        if ($this->request->is('post')) {
            $id = $this->request->data['id'];

            // $dossier = WWW_ROOT.'assurances'.DS;
            $dossier = '/var/www/html/files/assurances/';
            $taille_maxi = 10000000;
            $extensions = array('.jpg', '.png','.gif', '.jpeg', '.doc', '.docx', '.pdf', '.xls', '.xlsx');

            $files = array();

            $files_data = $this->Assurance->findById($id);

            if($files_data){
                $files = $files_data['Assurance']['userfiles'];
                $files = explode("||", $files);
            }

            foreach ($this->request->data['file'] as $file) {
                $fichier = basename($file['name']);
                $taille = filesize($file['tmp_name']);
                $extension = strtolower(strrchr($file['name'], '.'));
                $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);


                if(in_array($extension, $extensions) && $taille<$taille_maxi){
                    $path = $dossier.$id.DS.$fichier;
                    $dirname = dirname($path);
                    
                    if(!file_exists( $dirname)){
                        mkdir($dirname, 0777, true);
                    }

                    try {

                        if(move_uploaded_file($file['tmp_name'], $path)){
                            $files[] = $fichier;
                        }

                    } catch (Exception $e) {}
                }

                $user_id = $this->Auth->user('id');
                $this->Assurance->updateAll(
                    array('Assurance.userfiles' => "'".implode("||", $files)."'",'Assurance.file_user_id' => $user_id,'Assurance.file_date' => "'".date('Y-m-d H:i:s')."'"),
                    array('Assurance.id' => $id)
                );

            }
            
            try {
                $http_build_query = array(
                    'User' => 'assurance_voyage',
                    'Password' => '@ssuRV-324',
                    'Text' => 'Votre contrat vous a été envoyé par e-mail. Il est disponible en ligne sur assurancevoyage.ma dans votre espace personnel',
                    'Phone' => $files_data['Assurance']['tel'],
                );

                if($files_data['Assurance']['tel']){
                    file_get_contents('http://download.dialy.net:8080/customerMessaging/SendSMS?'.http_build_query($http_build_query));
                }
        
            } catch (\Throwable $th) {
                //throw $th;
            } 

            $this->Session->setFlash(__('Les données ont été ajoutées avec succès !'), 'flash_success');
            // debug($this->request->data);exit();
        }
        // $this->redirect(array('action' => 'callcenter'));
        $this->redirect($this->referer());
    }

    /***Attestation***/
    public function import2()
    {
        if ($this->request->is('post')) {
            $id = $this->request->data['id'];

            // $dossier = WWW_ROOT.'assurances'.DS;
            $dossier = '/var/www/html/files/assurances/';
            $taille_maxi = 10000000;
            $extensions = array('.jpg', '.png','.gif', '.jpeg', '.doc', '.docx', '.pdf', '.xls', '.xlsx');

            $files = array();

            $files_data = $this->Assurance->findById($id);

            if($files_data){
                $files = $files_data['Assurance']['files'];
                $files = explode("||", $files);
            }

            foreach ($this->request->data['file'] as $file) {
                $fichier = basename($file['name']);
                $taille = filesize($file['tmp_name']);
                $extension = strtolower(strrchr($file['name'], '.'));
                $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);


                if(in_array($extension, $extensions) && $taille<$taille_maxi){
                    $path = $dossier.$id.DS.$fichier;
                    $dirname = dirname($path);
                    
                    if(!file_exists( $dirname)){
                        mkdir($dirname, 0777, true);
                    }

                    try {

                        if(move_uploaded_file($file['tmp_name'], $path)){
                            $files[] = $fichier;
                        }

                    } catch (Exception $e) {}
                }

                $user_id = $this->Auth->user('id');
                $this->Assurance->updateAll(
                    array('Assurance.files' => "'".implode("||", $files)."'",'Assurance.file_user_id' => $user_id,'Assurance.file_date' => "'".date('Y-m-d H:i:s')."'"),
                    array('Assurance.id' => $id)
                );

            }
            
            try {
                $http_build_query = array(
                    'User' => 'assurance_voyage',
                    'Password' => '@ssuRV-324',
                    'Text' => 'Votre attestation vous a été envoyé par e-mail. Il est disponible en ligne sur assurancevoyage.ma dans votre espace personnel',
                    'Phone' => $files_data['Assurance']['tel'],
                );

                if($files_data['Assurance']['tel']){
                    file_get_contents('http://download.dialy.net:8080/customerMessaging/SendSMS?'.http_build_query($http_build_query));
                }
        
            } catch (\Throwable $th) {
                //throw $th;
            } 

            $this->Session->setFlash(__('Les données ont été ajoutées avec succès !'), 'flash_success');
            // debug($this->request->data);exit();
        }
        $this->redirect(array('action' => 'callcenter'));
    }

    
    public function deletefile($id)
    {
        if ($this->request->is('post')) {

            $files = array();

            $files_data = $this->Assurance->findById($id);

            $files = $files_data['Assurance']['files'];


            $user_id = $this->Auth->user('id');

            $key = $this->request->data['key'];
            
            // echo "<pre>";
            // print_r($key);
            $files = explode("||", $files);
            // print_r($files);
            unset($files[$key]);
            // print_r($files);
            $this->Assurance->updateAll(
                array('Assurance.files' => "'".implode("||", $files)."'",'Assurance.file_user_id' => $user_id,'Assurance.file_date' => "'".date('Y-m-d H:i:s')."'"),
                array('Assurance.id' => $id)
            );
            echo json_encode(array('0' => "success")) ;
            exit();
        }
    }


    public function getCompanies()
    {
        $response = array('result' => false);
        if ($this->request->is('post')) {

            $this->loadModel('Contrat');
            $compagnies = $this->Contrat->find('list', array(
                'conditions' => array( 'Contrat.type' => $this->request->data['type'], 'Contrat.age' => $this->request->data['age'], 'Contrat.duree' => $this->request->data['duree']),
                'fields' => array('Contrat.company','Contrat.company'),
            ));

            // $compagnies = array(1 => 'AXA', 2 => 'WAFA');

            $response = array('result' => true,'compagnies' => $compagnies);
        }

        echo json_encode($response);
        exit();
    }

    public function getPrice()
    {
        $response = array('result' => false);
        if ($this->request->is('post')) {

            $date = new DateTime(date("Y-m-d", strtotime(str_replace('/', '-', $this->request->data['age'])) ));
            $now = new DateTime();
            $interval = $now->diff($date);

            $age_array = array();

            if ($interval->y >= 70) {
                $age_array[] = 'Plus de 70 ans';
            }elseif ($interval->y >= 21 && $interval->y < 70) {
                $age_array[] = 'Plus de 21 an et moins de 70 ans';
                $age_array[] = 'Moins de 70 ans';
            }elseif ($interval->y < 21) {
                $age_array[] = 'Moins de 21 ans';
                $age_array[] = 'Moins de 70 ans';
            }

            $conditions = array( 
                'TRIM(Contrat.type)' => $this->request->data['type'], 
                'TRIM(Contrat.age)' => $age_array, 
                'TRIM(Contrat.duree)' => $this->request->data['duree'],
                'TRIM(Contrat.company)' => $this->request->data['company'],
            );

            // echo "<pre>";
            // print_r($interval->y);
            // print_r($conditions);
            // exit();

            $this->loadModel('Contrat');
            $compagny = $this->Contrat->find('first', array(
                'conditions' => $conditions,
                'fields' => array('Contrat.id','Contrat.age','Contrat.prime_ttc'),
            ));

            $id = $prime_ttc = $age = 0;

            if ($compagny) {
                $id = $compagny['Contrat']['id'];
                $age = $compagny['Contrat']['age'];
                $prime_ttc = $compagny['Contrat']['prime_ttc'];
            }

            // $log = $this->Contrat->getDataSource()->getLog(false, false);
            // debug($log);

            $response = array( 'result' => true, 'id' => $id, 'age' => $age , 'prime_ttc' => $prime_ttc );
        }

        echo json_encode($response);
        exit();
    }
    

}
