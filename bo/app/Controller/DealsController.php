<?php

class DealsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Deals';
    public $uses = array('Deal');
    public $paginate = array(
        'limit' => 10
    );

    function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $this->paginate = array(
            'order' => 'Deal.created DESC'
        );
        $this->set('deals', $this->paginate('Deal'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal ajouté avec success', 'alert', array(
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
        $this->Deal->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Deal->read();
        } else {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal modifié avec success', 'alert', array(
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

    public function delete($id = null) {
        $this->Deal->id = $id;

        if (!$this->Deal->exists()) {
            throw new NotFoundException(__('Invalid deal'));
        }

        if ($this->Deal->delete()) {
            $this->Session->setFlash(__('Deal deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(__('Deal was not deleted'), 'flash_fail');

        $this->redirect(array('action' => 'index'));
    }

}
