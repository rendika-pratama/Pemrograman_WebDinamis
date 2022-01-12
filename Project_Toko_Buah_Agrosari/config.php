<?php  
	$koneksi = @mysqli_connect("localhost", "root", "", "toko_buah");

	if (!$koneksi) {
		echo "Error : ".mysqli.connect.error();
		exit();
	}
?>