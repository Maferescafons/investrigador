<?php
function connect() {
	$link = mysqli_connect("127.0.0.1:3307", "root", "", "calificaciones");

	if (!$link) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	/* change character set to utf8 */
	if (!mysqli_set_charset($link, "utf8")) {
		printf("Error loading character set utf8: %s\n", mysqli_error($link));
		exit();	
	} 
	
	return $link;
}
function num_rows($result){
	return mysqli_num_rows($result);
}

function query($link, $sql){
	
	if ($result = mysqli_query($link, $sql)) {
	   return $result;
	}
	else{
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_errno($link) . PHP_EOL;
		echo "Debugging error: " . mysqli_error($link) . PHP_EOL;
		exit;
	}
}

function fetch_array($result){
	return mysqli_fetch_array($result, MYSQLI_ASSOC);
}

function close($link){
	mysqli_close($link);
}
?>