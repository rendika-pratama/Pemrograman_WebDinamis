<?php  
	require_once("../config.php");
	$ID_Buah = $_GET['ID_Buah'];

	$sql_cari = "SELECT * FROM buah WHERE ID_Buah = '$ID_Buah'";
	$query = mysqli_query($koneksi, $sql_cari);
	$result = mysqli_fetch_assoc($query);

	if (isset($_POST['Submit'])) {
		$Nama_Pembeli = $_POST['Nama_Pembeli'];
		$NoTelp = $_POST['NoTelp'];
		$Alamat = $_POST['Alamat'];
		$QTY = $_POST['QTY'];

		$ID_Buah = $_POST['ID_Buah'];
		$Nama_Buah = $_POST['Nama_Buah'];
		$Harga_Buah = $_POST['Harga_Buah'];
		$Tanggal = $_POST['Tanggal'];

		$Total_Harga = $Harga_Buah * $QTY;

		$sql_insert = "INSERT INTO pemesanan VALUES('$ID_Transaksi', '$Nama_Pembeli', '$NoTelp', '$Alamat', '$ID_Buah', '$Nama_Buah', '$QTY', '$Total_Harga', '$Tanggal')";

		// $sql_insert1 = "INSERT INTO penjualan VALUES(NULL, '$ID_Buah', '$Nama_Buah', '$QTY', $Tanggal)";

		mysqli_query($koneksi, $sql_insert);
		// mysqli_query($koneksi, $sql_insert1);

		header("Location:Buah.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Buah</title>
	<link rel="stylesheet" type="text/css" href="../CSS/ProjectBuah.css">
</head>
<body class="Body_Utama">
	<div class="Atas">
		<h2><center>Toko Buah Agrosari</center></h2> <br>	
	</div>
	<div class="Edit">
		<center>
			<form action="Pesan.php" method="POST">
				<fieldset class="Form">
					<h3><center>Pemesanan Produk Buah</center></h3>
					<table>
						<tr>
							<td>ID Buah</td>
							<td>:</td>
							<td><input type="text" name="ID_Buah" readonly="readonly_ID_Buah" id="Kotak_Output" value="<?= $result['ID_Buah']; ?>"></td>
						</tr>
						<tr>
							<td>Nama Buah</td>
							<td>:</td>
							<td><input type="text" name="Nama_Buah" readonly="readonly_Nama_Buah" id="Kotak_Output" value="<?= $result['Nama_Buah']; ?>"></td>
						</tr>
						<tr>
							<td>Harga Buah/Kg</td>
							<td>:</td>
							<td><input type="number" name="Harga_Buah" readonly="readonly_Total" id="Kotak_Output" value="<?= $result['Harga_Buah']; ?>"></td>
						</tr>
						<tr>
							<td>Tanggal & Waktu</td>
							<td>:</td>
							<td><?php  
								date_default_timezone_set('Asia/Jakarta');
								$tanggal = date("d-m-Y H:i:s");
							?><input type="text" name="Tanggal" readonly="readonly_Tanggal" id="Kotak_Output" value="<?= $tanggal; ?>"></td>
						</tr>
					</table>
					<br>
					<table>
						<tr>
							<td>Nama Pembeli</td>
							<td>:</td>
							<td><input type="text" name="Nama_Pembeli" required="Nama_Pembeli"></td>
						</tr>
						<tr>
							<td>No.Telp</td>
							<td>:</td>
							<td><input type="text" name="NoTelp" required="NoTelp"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><input type="text" name="Alamat" required="Alamat"></td>
						</tr>
						<tr>
							<td>Banyak Buah/Kg</td>
							<td>:</td>
							<td><input type="number" name="QTY" required="QTY"></td>
						</tr>
						<!-- <tr>
							<td>Stok</td>
							<td>:</td>
							<td><input type="number" name="Stok" value="<?= $result['Stok']; ?>"></td>
						</tr> -->
					</table>
				</fieldset>
				<br>
				<button name="Submit" type="submit">Pesan</button>
				<button name="Reset" type="reset">Reset</button>
				<button><a href="Buah.php" id="Link_Text">Kembali</a></button>
			</form>
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