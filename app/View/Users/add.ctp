<h1>Sign Up</h1>

<!-- TODO: Move this out of the content div and into the bottom of the layout for just this page -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<?php 
    //echo $javascript->link("jquery-1.11.1");
    echo $this->Html->script('signup'); 
?>
<script type="text/javascript">
    configureSwipe(<?php $swipePublishableKey ?>);
</script>

<div class="payment-errors"></div>

<?php
    echo $swipePublishableKey;

    echo $this->Form->create('User');
    echo $this->Form->input('first_name', array(
        'default' => 'Test First'
    ));
    echo $this->Form->input('last_name', array(
        'default' => 'Test Last'
    ));
    echo $this->Form->input('email', array(
        'default' => 'Test@Email.com'
    ));
    echo $this->Form->input('password', array(
        'default' => 'testpwd'
    ));
    
    echo $this->Form->input('card-number', array(
        'label' => 'Credit Card Number',
        'default' => '4242424242424242'
    ));
    echo $this->Form->input('card-cvc', array(
        'label' => 'CVC',
        'default' => '111'
    ));
    echo $this->Form->input('card-expiry-month', array(
        'label' => 'Exp Month',
        'default' => '01'
    ));
    echo $this->Form->input('card-year', array(
        'label' => 'Exp Year',
        'default' => '2016'
    ));
    
    echo $this->Form->button('Sign up!', array(
        'id' => 'signup-submit-button',
        'type' => 'button'
    ));
    
    echo $this->Form->hidden('
    //echo $this->Form->end('Sign up!');
?>

