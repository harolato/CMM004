

<?php
/**
 * Created by PhpStorm.
 * User: Haroldas Latonas
 * Date: 02/04/15
 * Time: 14:25
 */

// Create form header
    echo $this->Form->create('User', ['controller' => 'Users', 'action' => 'login', 'class' => 'form-horizontal']);

?>
<fieldset>
    <div class="form-group">
    <label class="col-md-4 control-label" for="passwordinput"></label>
      <div class="col-md-4">
      <?php
        echo $this->Form->input('id', ['placeholder' => 'id', 'class' => 'form-control input-md', 'type' => 'text']);
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
      <label class="col-md-4 control-label" for="loginbutton"></label>
      <div class="col-md-4">
        <?php
            echo $this->Form->submit('Login',['class' => 'btn btn-primary']);
         ?>
      </div>
    </div>
</fieldset>
<?php
    echo $this->Form->end();
?>