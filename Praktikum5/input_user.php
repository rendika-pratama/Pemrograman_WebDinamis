<?php  
	include "koneksi.php";
	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$notelp = $_POST['notelp'];
	$pass = md5($_POST[password]);
	$sql = "INSERT INTO users(id_user, password, nama_lengkap, email, notelp) VALUES ('$id_user', '$pass', '$nama', '$email', '$notelp')";
	$query = mysqli_query($con, $sql);

	mysqli_close();
	header('location:tampil_user.php');
?>