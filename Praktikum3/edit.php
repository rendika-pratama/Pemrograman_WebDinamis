<?php  
	// Menambahkan Koneksi ke File Database
	include_once("koneksi.php");
	// Mengecek Apakah Sudah Dikirim untuk User Update, Lalu Mengalihkan ke Homepage Setelah Update
	if (isset($_POST['Update'])) {
	 	$NIM = $_POST['NIM'];
	 	$Nama = $_POST['Nama'];
	 	$Jkel = $_POST['Jkel'];
	 	$Alamat = $_POST['Alamat'];
	 	$Tgllhr = $_POST['Tgllhr'];
	 	$Prodi = $_POST['Prodi'];

	 	// Update User Data
	 	$result = mysqli_query($con, "UPDATE mahasiswa SET Nama = '$Nama', Jkel = '$Jkel', Alamat = '$Alamat', Tgllhr = '$Tgllhr', Prodi = '$Prodi' WHERE NIM = '$NIM'");
	 	// Alihkan ke Homepage Untuk Melihat Update User di List
	 	header("Location:index.php");
	 } 
?>

<?php  
	// Menampilkan User Data yang Dipilih Berdasarkan ID
	$NIM = $_GET['NIM'];
	// Ambil User Data Berdasarkan ID
	$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE NIM = '$NIM'");
	while ($user_data = mysqli_fetch_array($result)) {
		$NIM = $user_data['NIM'];
		$Nama = $user_data['Nama'];
		$Jkel = $user_data['Jkel'];
		$Alamat = $user_data['Alamat'];
		$Tgllhr = $user_data['Tgllhr'];
		$Prodi = $user_data['Prodi'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Mahasiswa</title>
</head>
<body>
	<a href="index.php">Home</a><br><br>
	<form name="Update_Mahasiswa" method="POST" action="edit.php">
		<table border="0">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="Nama" value=<?php echo $Nama; ?>></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="text" name="Jkel" value=<?php echo $Jkel; ?>></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="Alamat" value=<?php echo $Alamat; ?>></td>
			</tr>
			<tr>
				<td>Tgl Lahir</td>
				<td><input type="text" name="Tgllhr" value=<?php echo $Tgllhr; ?>></td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td><input type="text" name="Prodi" value=<?php echo $Prodi; ?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="NIM" value=<?php echo $_GET['NIM']; ?>></td>
				<td><input type="submit" name="Update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>