<?php

class User extends AppModel {

    public $swipeToken = '';

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password']);
        }

        // Email addresses are case insensitive, save the user headaches when logging in by storing
        // them all as lowercase strings.  Just make sure to convert the email to lowercase characters
        // when validating login credentials
        if (isset($this->data[$this->alias]['email'])) {
            $this->data[$this->alias]['email'] = strtolower($this->data[$this->alias]['email']);
        }
        
        return true;
    }
    
    
    public $validate = array(
        'first_name' => array(
            'firstNameNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your first name'
            ),
            'firstNameContainsLettersOnly' => array(
                'rule' => '/^[a-zA-Z]+$/',
                'message' => 'First name must be letters only'
            ),
            'firstNameCharacterLimit' => array(
                'rule' => array('maxLength', 50),
                'message' => 'First name must be 50 letters or less'
            )
        ),
        'last_name' => array(
            'lastNameNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your last name'
            ),
            'lastNameContainsLettersOnly' => array(
                'rule' => '/^[a-zA-Z]+$/',
                'message' => 'Last name must be letters only'
            ),
            'lastNameCharacterLimit' => array(
                'rule' => array('maxLength', 50),
                'message' => 'Last name must be 50 letters or less'
            )
        ),
        'email' => array(
            'emailNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter an email address'
            ),
            'emailFormat' => array(
                'rule' => '/\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/i',
                'message' => 'The email address you have entered is invalid'
            ),
            'emailCharacterLimit' => array(
                'rule' => array('maxLength', 255),
                'message' => 'The email address you have entered is too long'
            )
        ),
        'password' => array(
            'passwordNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a password'
            ),
            // Cannot enforce min character length in DB, very important to enforce here
            'passwordCharacterLimit' => array(
                'rule' => array('between', 8, 50),
                'message' => 'The password must be between 8 and 50 characters'
            )
        ),
        'stripe_customer_id' => array(
            'rule' => 'notEmpty'
        )
    );
}

?>