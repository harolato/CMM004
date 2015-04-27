<?php

echo $this->Form->create('Task', ['class' => 'form-horizontal']); ?>

    <fieldset>
        <div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-4">
                <?php
                    echo $this->Form->input('name', ['placeholder' => 'task name', 'class' => 'form-control input-md']);
                ?>
            </div>
        </div>

         <div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-4">
                <?php
                    echo $this->Form->input('description', ['type'=>'textarea', 'placeholder' => 'description', 'class' => 'form-control input-md']);
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-4">
                <?php
                    echo $this->Form->input('points', ['type'=>'number', 'placeholder' => 'points', 'class' => 'form-control input-md']);
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-4">
                <?php
                    echo $this->Form->input('iteration #', ['type'=>'number', 'placeholder' => 'iteration #', 'class' => 'form-control input-md']);
                ?>
            </div>
        </div>

        <div class="form-group">
              <label class="col-md-4 control-label" for=""></label>
              <div class="col-md-4">
                <?php
                    echo $this->Form->submit('Submit',['class' => 'btn btn-primary']);
                 ?>
              </div>
            </div>
    </fieldset>


<?php



echo $this->Form->end();
?>