<?php
include "html_inc/cabecera.php";
?>
<p>Introduce tu nombre de usuario y contraseña</p>
<p lang="en">
<em>Enter your user and password</em>
</p>
<form action="asignaturas.php">
<p>
<label for="usuario">Usuario: </label>
<input type="text" name="usuario" id="usuario" />
</p>
<p>
<label for="contrasena">Contraseña: </label>
<input type="text" name="contrasena" id="contrasena" />
</p>

<p>
<input type="submit" value="Acceder" />
</p>
</form>
<?php
include "html_inc/pie.php"
?>
