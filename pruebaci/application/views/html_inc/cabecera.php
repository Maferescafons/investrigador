<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php 
if(isset($title)) {
	echo "$title - Gestión de calificaciones";
}
else {
	echo "Gestión de calificaciones";
}
?>
</title>
<?php
  echo link_tag('css/bootstrap.min.css');
  echo link_tag('css2/estilos.css');
?>
</head>
<body>
<div class="container">
<h1>Gestión de calificaciones</h1>














