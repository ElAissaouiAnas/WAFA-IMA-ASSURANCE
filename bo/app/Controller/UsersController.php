<?php

class UsersController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Users';

    function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->allow('add');
    }

    public function login() {
        $this->layout = 'ajax';
        if ($this->Auth->loggedIn()) {
            $this->redirect($this->Auth->redirect());
        }
        if ($this->request->is('post')) {
            $u = $this->User->find('first', array(
                    'conditions' => array(
                        'username' => $this->request->data['User']['username'] ,
                        'password' => $this->request->data['User']['password'] ,
                        'status' => 1,
                    ) 
            ) );
            if (!empty($u)) {
                $this->Auth->login($u['User']);
            }
            if ($this->Auth->login()) {
                $this->User->updateAll(array('User.last_login' => "'".date('Y-m-d H:i:s')."'"),array('User.id' => $this->Auth->user('id')));
                $this->redirect($this->Auth->redirect());
                // $arr = array("login" => true, "redirect" => Router::url('/', true) . substr($this->Auth->redirect(), 1));
                // echo json_encode($arr);
                // exit();
            // } else {
            //     $arr = array("login" => false, "error" => "Invalid Login");
            //     echo json_encode($arr);
            //     exit();
            }
        }
    }

    public function logout() {
        $this->redirect($this->referer($this->Auth->logout()));
    }

    public function info() {
        $id = $this->Auth->user('id');
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        $this->set('user', $user);

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['User']['login'] = 1;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('action' => 'info'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_fail');
            }
        }
    }
	
	public function add($id = null) {
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        $this->set('user', $user);

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_fail');
            }
        }
    }

}
