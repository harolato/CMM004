<?php
    echo $this->Form->create('User', ['controller' => 'Users', 'action' => 'create', 'class' => 'form-horizontal']);
    ?>
    <fieldset>
        <div class="form-group">
        <label class="col-md-4 control-label" for="nameinput"></label>
          <div class="col-md-4">
          <?php
            echo $this->Form->input('name', ['placeholder' => 'name', 'class' => 'form-control input-md']);
          ?>
          </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label" for="passwordinput"></label>
            <div class="col-md-4">
              <?php
                echo $this->Form->input('password', ['placeholder' => 'password', 'class' => 'form-control input-md']);
              ?>
              </div>
        </div>
        <div class="form-group">
                <label class="col-md-4 control-label" for="roleselect"></label>
                 <div class="col-md-4">
                      <?php
                        echo $this->form->select('role', [
                                'sysadmin' => 'System Administrator',
                                'developer' => 'Developer',
                                'manager' => 'Project Manager'
                            ]);
                      ?>
                 </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="createbutton"></label>
          <div class="col-md-4">
            <?php
                echo $this->Form->submit('Create',['class' => 'btn btn-primary']);
             ?>
          </div>
        </div>
    </fieldset>
    <?php
        echo $this->Form->end();
    ?>
