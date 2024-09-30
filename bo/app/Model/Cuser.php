<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('AppModel', 'Model');

class Cuser extends AppModel {

    public $name = 'Cuser';
	public $useTable = 'users';

    public function beforeSave() {

        return true;
    }

}

?>
