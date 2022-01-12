<?php  
	require_once("../config.php");

	// $sql_get_buah = "SELECT * FROM buah";
	// $query_buah = mysqli_query($koneksi, $sql_get_buah);

	// $result_buah = [];
	// while($rows_buah = mysqli_fetch_assoc($query_buah)) {
	// 	$result_buah[] = $rows_buah;
	// }

	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$sql_get_buah_cari = "SELECT * FROM buah WHERE Nama_Buah LIKE '%".$cari."%'";
		$query_buah = mysqli_query($koneksi, $sql_get_buah_cari);

		$result_buah = [];
		while($rows_buah = mysqli_fetch_assoc($query_buah)) {
			$result_buah[] = $rows_buah;
		}
	} else {
		$sql_get_buah = "SELECT * FROM buah";
		$query_buah = mysqli_query($koneksi, $sql_get_buah);

		$result_buah = [];
		while($rows_buah = mysqli_fetch_assoc($query_buah)) {
			$result_buah[] = $rows_buah;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toko Buah Agrosari</title>
	<link rel="stylesheet" type="text/css" href="../CSS/ProjectBuah.css">
</head>
<body class="Body_Utama" >
	<table width="100%">
		<tr>
			<td>
				<h2>Toko Buah Agrosari</h2>
			</td>
			<td align="right">
				<h4><a href="../login.php"><img src="../CSS/Background/profile.jpg" id="Foto_Profile"></a></h4>
			</td>
			<td align="center" width="2%">
				<h4><a href="../login.php" id="Link_Profile">Admin<a/></h4>
			</td>
		</tr>
	</table>
	<div class="Navbar">
		<table cellpadding="3" rules="rows" width="20%">
			<tr class="Layout_Navbar">
				<th><a href="../index.php" id="Link_Text">Home</a></th>
				<th><a href="Buah.php" id="Link_Text">Buah</a></th>
			</tr>
		</table>
	</div>
	<div align="right">
		<form action="Buah.php" method="GET">
			<label>Cari : </label> <input type="text" name="cari">
			<input type="submit" value="Cari">
		</form>
	</div>
	<div class="Content_Buah">
		<center>
			<table border="1" class="Tabel">
				<tr bgcolor="#ffe680">
					<td><center>No.</center></td>
					<td><center>Kode Buah</center></td>
					<td><center>Nama Buah</center></td>
					<td><center>Harga Buah/Kg</center></td>
					<td><center>Stok/Kg</center></td>
					<td><center>Aksi</center></td>
				</tr>

				<?php 
					$no_buah = 1;
					foreach ($result_buah as $result_buah) :
			 	?>

			 	<tr>
			 		<td><?= $no_buah; ?>.</td>
			 		<td><?= $result_buah["ID_Buah"] ?></td>
			 		<td><?= $result_buah["Nama_Buah"] ?></td>
			 		<td><?= $result_buah["Harga_Buah"] ?></td>
			 		<td><?= $result_buah["Stok"] ?></td>
			 		<td><a href="Pesan.php?ID_Buah=<?= $result_buah['ID_Buah']; ?>" id="Link_Aksi">Pesan</a></td>
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