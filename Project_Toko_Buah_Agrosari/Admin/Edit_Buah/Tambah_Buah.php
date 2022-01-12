<?php  
	require_once("../../config.php");

	if (isset($_POST['Submit'])) {
		$ID_Buah = $_POST['ID_Buah'];
		$Nama_Buah = $_POST['Nama_Buah'];
		$Harga = $_POST['Harga'];
		$Stok = $_POST['Stok'];

		$sql_insert = "INSERT INTO buah VALUES('$ID_Buah', '$Nama_Buah', '$Harga', '$Stok')";
		mysqli_query($koneksi, $sql_insert);

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
			<form action="Tambah_Buah.php" method="POST">
				<fieldset class="Form">
					<h3><center>Tambah Produk Buah</center></h3>
					<table>
						<tr>
							<td>ID Buah</td>
							<td>:</td>
							<td><input type="text" name="ID_Buah"></td>
						</tr>
						<tr>
							<td>Nama Buah</td>
							<td>:</td>
							<td><input type="text" name="Nama_Buah"></td>
						</tr>
						<tr>
							<td>Harga Buah/Kg</td>
							<td>:</td>
							<td><input type="number" name="Harga"></td>
						</tr>
						<tr>
							<td>Stok</td>
							<td>:</td>
							<td><input type="number" name="Stok"></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<button name="Submit" type="submit">Tambah Data</button>
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