<?php

App::uses('PaymentUtility', 'PaymentManager.Lib');

class UsersController extends AppController {
    public $helpers = array('Html', 'Form');
    public $utilities = array('Security');
    
    public function add() {
        $this->set('swipePublishableKey', Configure::read('Stripe.keys.public'));
    
        if ($this->request->is('post')) {
            
            $stripeCustomer = PaymentUtility::createCustomer(
                '', 
                $this->request->data['User']['swipeToken'], 
                $this->request->data['User']['email']
            );
            
            $this->User->create();
            $this->User->set('stripe_customer_id', $stripeCustomer["id"]);
            $fieldsToSave = array('first_name', 'last_name', 'email', 'password', 'stripe_customer_id');
            if ($this->User->save($this->request->data, true, $fieldsToSave))
            {
                $this->Session->setFlash(__('Thank you for signing up!'));
                return $this->redirect(array('action' => 'view', $this->User->field('id')));
            }
              

            $this->Session->setFlash(__('There were errors signing up.'));
            /*
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Welcome!'));
                return $this->redirect(array('action', 'add'));
            }
            $this->Session->setFlash(__('There were errors signing up.'));
            */
            
        }
    }
    
    public function view($id) {
        if (!$id) {
            throw notFoundException(__('Invalid User'));
        }
        
        $user = $this->User->findById($id);
        if (!$user) {
            throw notFoundException(__('Invalid User'));
        }
        $this->set('user', $user);
    }
}

?>