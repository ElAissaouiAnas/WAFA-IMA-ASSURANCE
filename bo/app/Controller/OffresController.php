<?php

class OffresController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Offres';
    public $uses = array('Offre');
    public $paginate = array(
        'limit' => 10
    );

    function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $this->paginate = array(
            'order' => 'Offre.created DESC'
        );
        $this->set('offres', $this->paginate('Offre'));
    }

    public function add() {
		$this->helpers = array('TinyMCE.TinyMCE');
        if ($this->request->is('post')) {
            if ($this->Offre->save($this->request->data)) {
                $this->Session->setFlash('Offre a été ajouté', 'alert', array(
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
        $this->Offre->id = $id;
		$this->helpers = array('TinyMCE.TinyMCE');
        if ($this->request->is('get')) {
            $this->request->data = $this->Offre->read();
        } else {
            if ($this->Offre->save($this->request->data)) {
                $this->Session->setFlash('Offre a été modifié', 'alert', array(
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
        $this->Offre->id = $id;

        if (!$this->Offre->exists()) {
            throw new NotFoundException(__('Invalid offre'));
        }

        if ($this->Offre->delete()) {
            $this->Session->setFlash(__('Offre deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }

        $this->Session->setFlash(__('Offre was not deleted'), 'flash_fail');

        $this->redirect(array('action' => 'index'));
    }

}
