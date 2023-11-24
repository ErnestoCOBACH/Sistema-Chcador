<?php 
	
	$mysqli = new mysqli("10.40.2.64", "root", "N3CR02M4!", "ReportesRelojChecador", 3306);
	if ($mysqli->connect_errno) {
	    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$servername = "10.40.2.64";
	$database = "ReportesRelojChecador";
	$username = "root";
	$password = "N3CR02M4!";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database, 3306);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	if(!$mysqli->set_charset("utf8")){
	   printf("Error cargando el conjunto de caracteres utf8: %\n", $mysqli->error);
	   exit();
	 }
	if(!$conn->set_charset("utf8")){
	   printf("Error cargando el conjunto de caracteres utf8: %\n", $conn->error);
	   exit();
	 }
	/*mysqli_close($conn);*/
 ?>