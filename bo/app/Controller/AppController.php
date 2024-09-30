<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(/*'DebugKit.Toolbar',*/ 'Session', 'Auth');
    public $helpers = array('Form', 'Html', 'Session');

    function beforeFilter() {
        $this->layout = 'tickets';
        $this->Auth->user('*');
        $this->Auth->deny('*');
        $this->Auth->allow('login', 'logout');
        $this->Auth->authError = "Acces interdit à cette section !";
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'board', 'action' => 'callcenter');
        $this->Auth->loginError = "Login ou password incorrect !";

        $this->loadModel('User');
        $user_id = AuthComponent::user('id');
        $user = $this->User->find('first',array('conditions' => array('id' => $user_id),'fields' => array('*')));
        $this->set('current_user', $user);
       
    }

}
