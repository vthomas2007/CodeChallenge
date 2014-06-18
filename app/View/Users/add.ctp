<h1>Sign Up</h1>

<?php
    echo $this->Form->create('User');
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    echo $this->Form->end('Save User');
?>