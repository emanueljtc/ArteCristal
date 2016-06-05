<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$pluginDot = empty($plugin) ? null : $plugin . '.';
?>
<p class="alert alert-danger">
	<button class="close" data-dismiss="alert">×</button>
	<strong><?php echo __d('cake_dev', 'Noticia: Se ha Detectado un Error'); ?>. </strong>
	<!--<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_controller.ctp'); ?>-->
</p>
<p class="alert alert-error">
	<button class="close" data-dismiss="alert">×</button>
	<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
	<?php echo __d('cake_dev', '%s no pudo ser encontrado.', '<em>' . $pluginDot . $class . '</em>'); ?>
</p>
<p class="alert alert-error">
	<button class="close" data-dismiss="alert">×</button>
	<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
	<?php echo __d('cake_dev', 'Cree la Clase %s a continuacion en el archivo: %s', '<em>' . $class . '</em>', (empty($plugin) ? APP_DIR . DS : CakePlugin::path($plugin)) . 'Controller' . DS . $class . '.php'); ?>
</p>
<pre>
&lt;?php
class <?php echo $class . ' extends ' . $plugin; ?>AppController {

}
</pre>
<!-- <p class="alert alert-info">
	<button class="close" data-dismiss="alert">×</button>
	<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
	<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_controller.ctp'); ?>
</p> -->

<?php echo $this->element('exception_stack_trace'); ?>
