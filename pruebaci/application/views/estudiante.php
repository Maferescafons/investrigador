<?php
defined('BASEPATH') OR exit('No direct script access allowed');



if(empty($estudiante))
{
	echo "<p>No existe el estudiante</p>";
}
else
{
	if($estudiante["est_sexo"] == 'H')
	{
		$checked_h = "checked";
		$checked_m = "";
	}
	else
	{
		$checked_h = "";
		$checked_m = "checked";
	}
	
	echo form_open('');
	
	echo validation_errors();
	
	echo <<<hereDOC
<input type="hidden" name="asignatura" value="{$estudiante["est_asignatura"]}" />
<p><label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" value="{$estudiante["est_nombre"]}" /></p>
<p><label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" value="{$estudiante["est_apellidos"]}" /></p>
<p><label for="fechanac">Fecha de nacimiento: </label><input type="date" name="fechanac" id="fechanac" value="{$estudiante["est_fechanac"]}" /></p>
<p><label for="sexo_h">Sexo: </label><input type="radio" name="sexo" id="sexo_h" value="H" $checked_h  /><label for="sexo_h"> Hombre</label>
         <input type="radio" name="sexo" id="sexo_m" value="M" $checked_m /><label for="sexo_m"> Mujer</label>
		 
		 
 </p>
<p><label for="email">Correo electrónico: </label><input type="text" name="email" id="email" value="{$estudiante["est_email"]}" /></p>
<p><label for="direccion">Dirección: </label><textarea name="direccion" id="direccion" rows="5" cols="50">{$estudiante["est_direccion"]}</textarea></p>
hereDOC;

	foreach($notas as $n)
	{
		echo <<<hereDOC
		
<p><label for="e{$n["ejer_numero"]}" title="{$n["ejer_descripcion"]}">{$n["ejer_numero"]} :</label><input type="text" name="e{$n["ejer_numero"]}" id="e{$n["ejer_numero"]}" value="{$n["nota_valor"]}" /></p>

hereDOC;
	}

	echo '<p><input type="submit" name="actualizar" value="Actualizar" class="btn btn-outline-primary" />';
	
	echo form_close();
}











