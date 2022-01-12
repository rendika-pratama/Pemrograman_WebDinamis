<?php  
	require_once("../../config.php");
	$ID_Transaksi = $_GET['ID_Transaksi'];

	$sql_delete = "DELETE FROM pemesanan WHERE ID_Transaksi = '$ID_Transaksi'";
	mysqli_query($koneksi, $sql_delete);

	header("Location:../Transaksi.php");
?>