<?php
// Create form header
    echo $this->Form->create('User');
// Create username, in this case user ID, input. Usualy primary key inputs are hidden, so we force that input to be visible
    echo $this->Form->input('username', array('type' => 'text'));
// Password input
    echo $this->Form->input('password');
// Submit button
    echo $this->Form->submit('submit');
// Close form tag
    echo $this->Form->end();
?>