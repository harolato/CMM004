<?php
echo $this->Form->create('TasksUser',['type' => 'post']);
echo $this->Form->input('notes', [
    'type' => 'textarea'
]);
echo $this->Form->submit('Save', [
    'class' => 'btn btn-primary'
]);
echo $this->Form->end();
?>