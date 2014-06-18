<?php

class User extends AppModel {

    public $swipeToken = '';

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password']);
        }
        
        return true;
    }
    
    
    public $validate = array(
        'first_name' => array(
            'rule' => 'notEmpty'
        ),
        'last_name' => array(
            'rule' => 'notEmpty'
        ),
        'email' => array(
            'rule' => 'notEmpty'
        ),
        'password' => array(
            'rule' => 'notEmpty'
        ),
    );
}

?>