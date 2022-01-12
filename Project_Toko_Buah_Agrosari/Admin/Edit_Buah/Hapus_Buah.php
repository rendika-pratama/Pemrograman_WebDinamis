<?php  
	require_once("../../config.php");
	$ID_Buah = $_GET['ID_Buah'];

	$sql_delete = "DELETE FROM buah WHERE ID_Buah = '$ID_Buah'";
	mysqli_query($koneksi, $sql_delete);

	header("Location:../CekBuah.php");
?>