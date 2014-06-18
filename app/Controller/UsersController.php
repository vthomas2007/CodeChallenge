<?php

App::uses('PaymentUtility', 'PaymentManager.Lib');

class UsersController extends AppController {
    public $helpers = array('Html', 'Form');
    
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Welcome!'));
                return $this->redirect(array('action', 'add'));
            }
            $this->Session->setFlash(__('There were errors signing up.'));
        }
    }
}

?>