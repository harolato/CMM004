<?php
    echo $this->Form->create('User');
    echo $this->Form->input('username', array('type' => 'text'));
    echo $this->Form->input('password');
    echo $this->Form->submit('submit');
    echo $this->Form->end();
?>