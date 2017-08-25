<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
if(isset($error)) {
	echo <<<hereDOC
<div class="alert alert-danger" role="alert">
<p><strong>$error</strong></p>
</div>
hereDOC;
}
?>

<p>
Introduce tu nombre de usuario y contraseña
</p>
<p lang="en">
<em>Enter your username and password</em>
</p>

<?php echo form_open('login'); ?>
<p>
<label for="usuario">Usuario: </label>
<input type="text" name="usuario" id="usuario" />
</p>

<p>
<label for="contrasena">Contraseña: </label>
<input type="password" name="contrasena" id="contrasena" />
</p>

<p>
<input type="submit" value="Acceder" class="btn btn-outline-primary" />
</p>
<?php echo form_close(); ?>









