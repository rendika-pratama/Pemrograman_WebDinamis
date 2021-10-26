<?php  
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "kegiatan4_pwd";

	$con = @mysqli_connect($host, $username, $password, $database);

	if (!$con) {
		echo "Error : ".mysqli.connect.error();
		exit();
	}
?>