
<?php
$title="Estudiante";
include "html_inc/cabecera.php";
?>
<?php
include "html_inc/cabecera.php";
?>

<?php
//printf("Select returned %d rows.\n", mysqli_num_rows($result));
///query($link, "SELECT * FROM estudiantes WHERE est_asignatura = $asignatura ORDER BY est_apellidos, est_nombre")
$asignatura = $_POST["asignatura"];
include "inc/bd.php";
$link = connect();
$result = query($link, "SELECT * FROM estudiantes WHERE est_asignatura = $asignatura ORDER BY est_apellidos, est_nombre" );

   if (($nestudiantes = num_rows($result)) == 0){
	  echo "<p>No hay estudiantes en esta asignatura</p>";
   }else{
	    echo "<p><strong>Total:$nestudiantes</strong></p>" ;
		echo "<hr />";
	   
	  while ($row = fetch_array($result)) {
		echo "<p><a href=\"estudiantes.php?id={$row["est_id"]}\">{$row["est_nombre"]} {$row["est_apellidos"]}</a></p>";
	}
	echo "<hr />";
	 echo "<p><strong>Total:$nestudiantes</strong></p>" ;
        	
   }
	
close($link);
?>

</form>
<?php
include "html_inc/pie.php"
?>
