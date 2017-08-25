<?php
$title = "Asignaturas";
include "html_inc/cabecera.php";
?>

<form action="estudiante.php" method= "post">
<p>
<label for="asignatura">Selecciona la signatura:</label>
<select name="asignatura" id="asignatura">
<?php
/////////////////////////////////////////////////////
$prof_id = 1;

include "inc/bd.php";
$link = connect();
$result = query($link, "SELECT * FROM asig_prof, asignaturas WHERE ap_asig_id = asig_id AND ap_prof_id = $prof_id ORDER BY asig_nombre" );

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<option value=\"{$row["asig_id"]}\">{$row["asig_nombre"]}-{$row["asig_curso"]}-{$row["asig_id"]}</option>";
	}
	

close($link);
//////////////////////////////////////////////////
?>
</select>
</p>

<p>
<input type="submit" value="ver" />
</p>
</form>
<?php
include "html_inc/pie.php"
?>