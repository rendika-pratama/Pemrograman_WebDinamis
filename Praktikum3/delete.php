<?php  
	// Menambahkan Koneksi File Database
	include_once("koneksi.php");
	// Mendapatkan ID dari URL Untuk Hapus User
	$NIM = $_GET['NIM'];
	// Hapus Baris User dari Tabel Berdasarkan ID
	$result = mysqli_query($con, "DELETE FROM mahasiswa WHERE NIM = '$NIM'");
	// Setelah Hapus Diarahkan ke Home Untuk Melihat Data User Di Home
	header("Location:index.php"); 
?>