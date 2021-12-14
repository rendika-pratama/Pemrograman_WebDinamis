<?php  
	// Buat Database Menggunakan Config File
	include_once("koneksi.php");
	// Ambil Semua Data Dari Database
	$result = mysqli_query($con, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
</head>
<body>
	<a href="tambah.php">Tambah Data Baru</a><br><br>
	<a href="cetak.php">Cetak Data</a><br><br>
	<table width="80%" border="1">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Gender</th>
			<th>Alamat</th>
			<th>Tgl Lahir</th>
			<th>Prodi</th>
			<th>Update</th>
		</tr>

		<?php 
			while ($user_data = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$user_data['NIM']."</td>";
				echo "<td>".$user_data['Nama']."</td>";
				echo "<td>".$user_data['Jkel']."</td>";
				echo "<td>".$user_data['Alamat']."</td>";
				echo "<td>".$user_data['Tgllhr']."</td>";
				echo "<td>".$user_data['Prodi']."</td>";
				echo "<td><a href = 'edit.php?NIM=$user_data[NIM]'>Edit</a> | <a href = 'delete.php?NIM=$user_data[NIM]'>Delete</a></td></tr>";
			}
		?>
	</table>
</body>
</html>