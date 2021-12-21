<?php  
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "akademik";

	$con = @mysqli_connect($host, $username, $password, $database);

	if (!$con) {
		echo "Error : ".mysqli.connect.error();
		exit();
	}
?>