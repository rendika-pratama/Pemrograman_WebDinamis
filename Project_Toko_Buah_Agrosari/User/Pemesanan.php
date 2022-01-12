<?php  
	require_once("../config.php");

	if (isset($_POST['Submit'])) {
		$ID_Transaksi = $_POST['ID_Transaksi'];
		$Nama_Pembeli = $_POST['Nama_Pembeli'];
		$Nama_Buah = $_POST['Nama_Buah'];
		$Harga_Buah = $_POST['Harga_Buah'];
		$Tunai = $_POST['Tunai'];

		$sql_insert = "INSERT INTO pemesanan VALUES('$ID_Transaksi', '$Nama_Pembeli', '$Nama_Buah', '$Harga_Buah', '$Tunai')";
		mysqli_query($koneksi, $sql_insert);

		header("Location:pemesanan.php");
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
				<h4><a href=""><img src="../CSS/Background/profile.jpg" id="Foto_Profile"></a></h4>
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
				<th><a href="Pemesanan.php" id="Link_Text">Pemesanan</a></th>
			</tr>
		</table>
	</div>
	<div class="Content_Pemesanan">
		<center>
		<form action="pemesanan.php" method="POST">
			<table border="2" align="center" width="50%" cellpadding="3">
				<tr>
					<td colspan="2" align="center"><h2>Pemesanan Buah</h2></td>
				</tr>
				<tr>
					<td>
						<label for="Input_Nama"><pre>Nama 		: <input type="text" name="input_nama"></pre></label>
						<label for="Input_Telp"><pre>No. Telp 	: <input type="number" name="input_telp"></pre></label>
						<label for="Input_Alamat"><pre>Alamat 		: <input type="text" name="input_alamat"></pre></label>
						<label for="Input_Produk"><pre>Produk Buah 	: <select name="input_produk">
							<?php  
								$buah = array(
									'Apel Fuji', 
									'Jeruk Sunkist', 
									'Melon Kuning', 
									'Melon Merah', 
									'Nanas', 
									'Pepaya California', 
									'Pir Pakam', 
									'Pisang Mas', 
									'Pir Sweet', 
									'Pir Xiang Lie', 
									'Pir Ya Lie', 
									'Semangka Kuning', 
									'Semangka Merah', 
									'Salak Pondok', 
									'Strawberry');
								//$option = "<option value=''>- Select -</option>";
								sort($buah);
								foreach ($buah as $value) {
									printf('<option value="">%s</option>', $value);
								}
							?>
						</select></pre></label>
						<label for="Input_Kg"><pre>Jumlah Buah/Kg 	: <input type="number" name="input_kg"></pre></label>
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					
				</tr>
			</table>
		</form>
		<br>
		<button name="Submit" type="submit">Pesan</button>
		<button name="Reset" type="reset">Reset</button>
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