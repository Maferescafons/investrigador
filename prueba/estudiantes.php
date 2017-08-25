<?php
$title="Estudiantes";
include "html_inc/cabecera.php";
?>
<?php
include "html_inc/cabecera.php";
?>

<?php
$est_id = $_GET["id"];
include "inc/bd.php";
$link = connect();
$result = query($link, "SELECT * FROM estudiantes WHERE est_id = $est_id" );

   if (($nestudiantes = num_rows($result)) == 0){
	  echo "<p>No existe el estudiante</p>";
   }
   else{ 
	 $row = fetch_array($result);
	 echo <<<hereDOC
<p>Nombre: {$row["est_nombre"]}</p>
<P>Apellidos:{$row["est_apellidos"]} </p>
<p> Fecha de nacimiento:{$row["est_fechanac"]}</p>
<p>Sexo:{$row["est_sexo"]}</p>
<p> Direccion:{$row["est_direccion"]} </p>
	 
hereDOC;

        	
   }
	
close($link);
?>

</form>
<?php
include "html_inc/pie.php"
?>