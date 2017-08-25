<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<p>Selecciona una asignatura:</p>
<hr />

<?php
foreach($asignaturas as $asig)
{
	echo "<p>" . anchor('estudiantes/' . $asig["asig_id"], $asig["asig_nombre"] . ' - ' . $asig["asig_curso"]) . "</p>";
}

echo "<hr />";
echo "<p>". anchor('salir/', 'Salir', 'class="btn btn-outline-primary btn-lg"') . "</p>";