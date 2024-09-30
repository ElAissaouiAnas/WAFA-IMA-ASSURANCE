<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('AppModel', 'Model');

class Mailhtmlbody extends AppModel {

    public $name = 'Mailhtmlbody';
    public $useTable = 'mailhtmlbody';

    public function beforeSave() {

        return true;
    }
    
    
}

?>
