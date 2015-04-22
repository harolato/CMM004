<div class="text-center">
<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */

// Create form header
    echo $this->Form->create('User', ['controller' => 'Users', 'action' => 'login']);
// Create username, in this case user ID, input. Usualy primary key inputs are hidden, so we force that input to be visible
    echo $this->Form->input('id', [
        'type' => 'text'
    ]);
// Password input
    echo $this->Form->input('password');
// Submit button
    echo $this->Form->submit('Login',[
        'class' => 'btn btn-primary'
    ]);
    echo $this->Form->end();
?>
</div>