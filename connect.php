<?php 
	$user = "phpuser";
	$dbase = "dbdavid";
	$pass = "P@ssw0rd!";
	$conn = new mysqli("127.0.0.1", $user, $pass, $dbase);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "<span>Conectado a la base de datos: <strong>$dbase</strong> </span>";
 

?>



