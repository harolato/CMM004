<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>

		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
// Grabs css from webroot/css folder
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('style');


		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
    			<div class="navbar-header">
    				<a class="navbar-brand" href="
    					<?php  if (AuthComponent::user('id')):
    						echo Router::url('/');
    						echo 'Users';
    					else:
    						echo Router::url('/');
						endif;
    					?>
    					">Taskbook/Taskify
    				</a>
    			</div>

    			<div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#">
                        	<?php if (AuthComponent::user('id')): ?>
                               <?= AuthComponent::user('name') ?>
                               ,
                               <?= AuthComponent::user('role') ?>
                            <?php endif; ?>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><?php
                      		if (AuthComponent::user('id')):
                      		echo $this->Html->link('Log out',array(
                                                                     'controller' => 'Users',
                                                                     'action' => 'logout'
                                                                 ));
                            endif;
                      		?>
                      </li>
                    </ul>
                  </div>
    		</nav>
    		<div id="content-wrapper">
    			<?php echo $this->fetch('content'); ?>
    		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	
    <?php
    // grabs javascript from webroot/script folder
        echo $this->Html->script('bootstrap.min');
    ?>

</body>
</html>
