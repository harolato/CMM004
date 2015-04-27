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
	<nav class="navbar-defaultv navbar-inverse navbar-fixed-top">
	 	<div class="container">
	 		<div class="navbar-header">
				<h1><?php echo $this->Html->link('Taskify', '/');?></h1>

	 		</div>


	 	</div>
	 </nav>

		<div id="content">
			<!-- Displays a message. error message etc. -->
			<?php echo $this->Session->flash(); ?>
				<!-- Displays content. for example login page Users/login.ctp -->
			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <?php
    // grabs javascript from webroot/script folder
        echo $this->Html->script('bootstrap.min');
    ?>
<!-- This line if for debugging sql -->
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
