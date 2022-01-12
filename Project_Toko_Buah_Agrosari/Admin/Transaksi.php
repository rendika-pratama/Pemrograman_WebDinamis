<?php  
	require_once("../config.php");

	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		$sql_get_transaksi_cari = "SELECT * FROM pemesanan WHERE Nama_Pembeli LIKE '%".$cari."%'";
		$query_transaksi = mysqli_query($koneksi, $sql_get_transaksi_cari);

		$result_transaksi = [];
		while($rows_transaksi = mysqli_fetch_assoc($query_transaksi)) {
			$result_transaksi[] = $rows_transaksi;
		}
	} else {
		$sql_get_transaksi = "SELECT * FROM pemesanan";
		$query_transaksi = mysqli_query($koneksi, $sql_get_transaksi);

		$result_transaksi = [];
		while($rows_transaksi = mysqli_fetch_assoc($query_transaksi)) {
			$result_transaksi[] = $rows_transaksi;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaksi Buah</title>
	<link rel="stylesheet" type="text/css" href="../CSS/ProjectBuah.css">
	<script type="text/javascript">
		function logout() {
			alert('Anda Telah Logout');
		}
	</script>
</head>
<body class="Body_Utama">
	<table width="100%">
		<tr>
			<td>
				<h2>Toko Buah Agrosari</h2>
			</td>
			<td align="right">
				<h4><a href="Logout.php"><img src="../CSS/Background/profile.jpg" id="Foto_Profile"></a></h4>
			</td>
			<td align="center" width="2%">
				<h4>
					<a href="Logout.php" id="Link_Profile" onclick="logout()">Logout</a>
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
		<form action="Transaksi.php" method="GET">
			<label>Cari : </label> <input type="text" name="cari">
			<input type="submit" value="Cari">
		</form>
	</div>
	<h2><center>List Transaksi</center></h2>
	<br>
	<center><button><a href="Cetak.php" id="Link_Text">Cetak Data</a></button></center> <br>
	<center>
		<button><a href="XML_JSON_WS/XML.php" id="Link_Text">Data XML</a></button> 
		<button><a href="XML_JSON_WS/JSON.php" id="Link_Text">Data JSON</a></button>
		<button><a href="XML_JSON_WS/Web_Service_Transaksi.php" id="Link_Text">Web Service</a></button>
	</center>
	<div class="Content_Buah">
		<center>
			<table border="1" class="Tabel">
				<tr bgcolor="#ffe680">
					<td><center>No.</center></td>
					<td><center>ID Transaksi</center></td>
					<td><center>Nama Pembeli</center></td>
					<td><center>No. Telp</center></td>
					<td><center>Alamat</center></td>
					<td><center>Kode Buah</center></td>
					<td><center>Nama Buah</center></td>
					<td><center>QTY</center></td>
					<td><center>Harga Total</center></td>
					<td><center>Tanggal & Waktu</center></td>
					<td><center>Aksi</center></td>
				</tr>

				<?php 
					$no_transaksi = 1;
					foreach ($result_transaksi as $result_transaksi) :
			 	?>

			 	<tr>
			 		<td><?= $no_transaksi; ?>.</td>
			 		<td><?= $result_transaksi["ID_Transaksi"] ?></td>
			 		<td><?= $result_transaksi["Nama_Pembeli"] ?></td>
			 		<td><?= $result_transaksi["NoTelp"] ?></td>
			 		<td><?= $result_transaksi["Alamat"] ?></td>
			 		<td><?= $result_transaksi["ID_Buah"] ?></td>
			 		<td><?= $result_transaksi["Nama_Buah"] ?></td>
			 		<td><?= $result_transaksi["QTY"] ?></td>
			 		<td><?= $result_transaksi["Total_Harga"] ?></td>
			 		<td><?= $result_transaksi["Tanggal"] ?></td>
			 		<td>
						<a href="Edit_Buah/Hapus_Transaksi.php?ID_Transaksi=<?= $result_transaksi['ID_Transaksi']; ?>" id="Link_Aksi">Hapus</a>
					</td>
			 	</tr>

			 	<?php  
			 		$no_transaksi++;
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