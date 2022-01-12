<?php  
	require_once("../config.php");

	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$sql_get_listbuah_cari = "SELECT * FROM buah WHERE Nama_Buah LIKE '%".$cari."%'";
		$query_listbuah = mysqli_query($koneksi, $sql_get_listbuah_cari);

		$result_listbuah = [];
		while($rows_listbuah = mysqli_fetch_assoc($query_listbuah)) {
			$result_listbuah[] = $rows_listbuah;
		}
	} else {
		$sql_get_listbuah = "SELECT * FROM buah";
		$query_listbuah = mysqli_query($koneksi, $sql_get_listbuah);

		$result_listbuah = [];
		while($rows_listbuah = mysqli_fetch_assoc($query_listbuah)) {
			$result_listbuah[] = $rows_listbuah;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cek Buah</title>
	<link rel="stylesheet" type="text/css" href="../CSS/ProjectBuah.css">
</head>
<body class="Body_Utama">
	<table width="100%">
		<tr>
			<td>
				<h2>Toko Buah Agrosari</h2>
			</td>
			<td align="right">
				<h4><a href=""><img src="../CSS/Background/profile.jpg" id="Foto_Profile"></a></h4>
			</td>
			<td align="center" width="2%">
				<h4>
					<a href="../index.php" id="Link_Profile">Logout</a>
				</h4>
			</td>
		</tr>
	</table>
	<div class="Navbar">
		<table cellpadding="3" rules="rows" width="20%">
			<tr class="Layout_Navbar">
				<th><a href="Home.php" id="Link_Text">Home</a></th>
				<th><a href="CekBuah.php" id="Link_Text">List Buah</a></th>
				<th><a href="Transaksi.php" id="Link_Text">Transaksi</a></th>
			</tr>
		</table>
	</div>
	<div align="right">
		<form action="CekBuah.php" method="GET">
			<label>Cari : </label> <input type="text" name="cari">
			<input type="submit" value="Cari">
		</form>
	</div>
	<h2><center>List Buah</center></h2>
	<br>
	<center><button><a href="Edit_Buah/Tambah_Buah.php" id="Link_Text">Tambah Data</a></button></center>
	<div class="Content_Buah">
		<center>
			<table border="1" class="Tabel">
				<tr bgcolor="#ffe680">
					<td><center>No.</center></td>
					<td><center>Kode Buah</center></td>
					<td><center>Nama Buah</center></td>
					<td><center>Harga Buah/Kg</center></td>
					<td><center>Stok</center></td>
					<td><center>Aksi</center></td>
				</tr>

				<?php 
					$no_buah = 1;
					foreach ($result_listbuah as $result_listbuah) :
			 	?>

			 	<tr>
			 		<td><?= $no_buah; ?>.</td>
			 		<td><?= $result_listbuah["ID_Buah"] ?></td>
			 		<td><?= $result_listbuah["Nama_Buah"] ?></td>
			 		<td><?= $result_listbuah["Harga_Buah"] ?></td>
			 		<td><?= $result_listbuah["Stok"] ?></td>
			 		<td>
						<a href="Edit_Buah/Edit_Buah.php?ID_Buah=<?= $result_listbuah['ID_Buah']; ?>" id="Link_Aksi">Edit</a>
						||
						<a href="Edit_Buah/Hapus_Buah.php?ID_Buah=<?= $result_listbuah['ID_Buah']; ?>" id="Link_Aksi">Hapus</a>
					</td>
			 	</tr>

			 	<?php  
			 		$no_buah++;
			 		endforeach;
				 ?>
			</table>	
		</center>
	</div>
	<div class="Footer">
		<center>
			Jl. Diponegoro No. 45 C, Gurabesi, Jayapura Utara, Jayapura, Papua <br>
			081245628539 - Dian Permana <br>
			tokobuahagrosari@gmail.com
		</center>
	</div>
</body>
</html>