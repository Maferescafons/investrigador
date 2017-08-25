<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(isset($mensaje)) {
	echo <<<hereDOC
<div class="alert alert-success">
<p><strong>$mensaje</strong></p>
</div>
hereDOC;
}


if(count($estudiantes) == 0) {
		echo <<<hereDOC
<div class="alert alert-info">
<p>No hay estudiantes en esta asignatura</p>
</div>
hereDOC;
}
else {
	echo "<p><strong>Total estudiantes: <span class='badge badge-pill badge-primary'>" . count($estudiantes) . "</span></strong></p>";
	echo "<hr />";
	foreach($estudiantes as $est) {
		echo "<p>" . anchor('estudiante/' . $est["est_id"], $est["est_nombre"] . ' ' . $est["est_apellidos"]) . "</p>";
	}
	echo "<hr />";
	echo "<p><strong>Total estudiantes: <span class='badge badge-pill badge-primary'>" . count($estudiantes) . "</span></strong></p>";
}
