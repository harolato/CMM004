<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */
    echo $this->form->create('User');
    echo $this->form->input('name');
    echo $this->form->input('password');
    echo $this->form->select('role', [
        'sysadmin' => 'System Administrator',
        'developer' => 'Developer',
        'manager' => 'Project Manager'
    ]);
    echo $this->form->submit('submit');
?>