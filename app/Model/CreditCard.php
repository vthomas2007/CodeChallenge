<?php

class CreditCard extends AppModel {
    public $useTable = false;
    
    public $validate = array(
        'card-number' => array(
            'cardNumberNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a valid credit card number'
            )
        ),
        'card-cvc' => array(
            'cardCVCNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your card\'s security code'
            )
        ),
        'card-expiration-month' => array(
            'cardExpirationMonthNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a valid expiration month'
            )
        ),
        'card-expiration-year' => array(
            'cardExpirationYearNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a valid expiration year'
            )
        ),
    );
}