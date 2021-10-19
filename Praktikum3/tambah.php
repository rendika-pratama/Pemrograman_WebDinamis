<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<a href="index.php">Go To Home</a><br><br>
	<form action="tambah.php" method="POST" name="Form1">
		<table width="25%" border="0">
			<tr>
				<td>NIM</td>
				<td><input type="text" name="NIM"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="Nama"></td>
			</tr>
			<tr>
				<td>Gender (L/P)</td>
				<td><input type="text" name="Jkel"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="Alamat"></td>
			</tr>
			<tr>
				<td>Tgl Lahir</td>
				<td><input type="text" name="Tgllhr"></td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td><input type="text" name="Prodi"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Tambah"></td>
			</tr>
		</table>
	</form>

	<?php  
		// Mengecek Apakah Data telah Terinput Ke Tabel User
		if (isset($_POST['Submit'])) {
			$NIM = $_POST['NIM'];
			$Nama = $_POST['Nama'];
			$Jkel = $_POST['Jkel'];
			$Alamat = $_POST['Alamat'];
			$Tgllhr = $_POST['Tgllhr'];
			$Prodi = $_POST['Prodi'];

			// Termasuk Koneksi File Database
			include_once("koneksi.php");
			// Masukkan User Data ke Dalam Tabel
			$result = mysqli_query($con, "INSERT INTO mahasiswa(NIM, Nama, Jkel, Alamat, Tgllhr, Prodi) VALUES('$NIM', '$Nama', '$Jkel', '$Alamat', '$Tgllhr', '$Prodi')");
			// Tampilkan Pesan Ketika User Ditambah
			echo "Data Berhasil Disimpan.<a href = 'index.php'> View Users";
		}
	?>

</body>
</html>