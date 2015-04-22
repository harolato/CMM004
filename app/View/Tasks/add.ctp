<?php
echo $this->Form->create('Task');
echo $this->Form->input('name');
echo $this->Form->input('description', ['type'=>'textarea']);
echo $this->Form->input('points');
echo $this->Form->input('state',['value' => 'incomplete', 'disabled' => true]);
echo $this->Form->input('iteration_id', [
    'type' => 'text',
    'size' => '2'
]);
echo $this->Form->submit('save', [
    'class' => 'btn btn-primary'
]);
echo $this->Form->end();
?>