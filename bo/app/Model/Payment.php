<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('AppModel', 'Model');

class Payment extends AppModel {

    public $name = 'Payment';
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
		'Cuser' => array(
            'className' => 'Cuser',
            'foreignKey' => 'cancel_user_id'
        )
    );
	public $virtualFields = array(
		'id' => 'Payment.idpayments',
		'nom' => 'CONCAT(Payment.buyerFirstName, " ", Payment.buyerLastName)'
	);
    public function beforeSave() {

        return true;
    }

}

?>
