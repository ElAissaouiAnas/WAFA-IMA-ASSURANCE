<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('AppModel', 'Model');

class User extends AppModel {

    public $useTable = 'a_users';
    public $name = 'User';
	
	// public $hasMany = array(
        // 'Payment' => array(
            // 'className' => 'Payment',
			// 'foreignKey' => 'user_id'
        // )
    // );

    public function beforeSave($options = array()) {

        // echo $this->data[$this->alias]['password'];exit();

  //       if (isset($this->data[$this->alias]['password'])) {
		// 	$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		// }
		return true;
    }

}

?>
