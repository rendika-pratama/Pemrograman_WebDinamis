<?php  
	require_once("../../config.php");
	$ID_Buah = $_GET['ID_Buah'];

	$sql_cari = "SELECT * FROM buah WHERE ID_Buah = '$ID_Buah'";
	$query = mysqli_query($koneksi, $sql_cari);
	$result = mysqli_fetch_assoc($query);

	if (isset($_POST['Submit'])) {
		$ID_Buah = $_POST['ID_Buah'];
		$Nama_Buah = $_POST['Nama_Buah'];
		$Harga_Buah = $_POST['Harga'];
		$Stok = $_POST['Stok'];

		$sql_edit = "UPDATE buah SET Nama_Buah = '$Nama_Buah', Harga_Buah = '$Harga_Buah', Stok = '$Stok' WHERE ID_Buah = '$ID_Buah'";
		mysqli_query($koneksi, $sql_edit);

		header("Location:../CekBuah.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Buah</title>
	<link rel="stylesheet" type="text/css" href="../../CSS/ProjectBuah.css">
</head>
<body class="Body_Utama">
	<div class="Atas">
		<h2><center>Toko Buah Agrosari</center></h2> <br>	
	</div>
	<div class="Edit">
		<center>
			<form action="Edit_Buah.php" method="POST">
				<fieldset class="Form">
					<h3><center>Edit Produk Buah</center></h3>
					<table>
						<tr>
							<td>ID Buah</td>
							<td>:</td>
							<td><input type="text" name="ID_Buah" value="<?= $result['ID_Buah']; ?>"></td>
						</tr>
						<tr>
							<td>Nama Buah</td>
							<td>:</td>
							<td><input type="text" name="Nama_Buah" value="<?= $result['Nama_Buah']; ?>"></td>
						</tr>
						<tr>
							<td>Harga Buah/Kg</td>
							<td>:</td>
							<td><input type="number" name="Harga" value="<?= $result['Harga_Buah']; ?>"></td>
						</tr>
						<tr>
							<td>Stok</td>
							<td>:</td>
							<td><input type="number" name="Stok" value="<?= $result['Stok']; ?>"></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<button name="Submit" type="submit">Edit Produk</button>
				<button name="Reset" type="reset">Reset</button>
				<button><a href="../CekBuah.php" id="Link_Text">Kembali</a></button>
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