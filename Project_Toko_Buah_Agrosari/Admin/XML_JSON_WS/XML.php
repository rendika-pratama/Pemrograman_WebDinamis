<?php  
	include '../../config.php';

	header('Content-Type:text/xml');
	$query = "SELECT * FROM pemesanan";
	$hasil = mysqli_query($koneksi, $query);
	$jumField = mysqli_num_fields($hasil);

	echo "<?xml version='1.0'?>";
	echo "<data>";
	while ($data = mysqli_fetch_array($hasil)) {
		echo "<Transaksi>";
		echo "<ID_Transaksi>",$data['ID_Transaksi'],"</ID_Transaksi>";
		echo "<Nama_Pembeli>",$data['Nama_Pembeli'],"</Nama_Pembeli>";
		echo "<NoTelp>",$data['NoTelp'],"</NoTelp>";
		echo "<Alamat>",$data['Alamat'],"</Alamat>";
		echo "<ID_Buah>",$data['ID_Buah'],"</ID_Buah>";
		echo "<Nama_Buah>",$data['Nama_Buah'],"</Nama_Buah>";
		echo "<QTY>",$data['QTY'],"</QTY>";
		echo "<Total_Harga>",$data['Total_Harga'],"</Total_Harga>";
		echo "<Tanggal>",$data['Tanggal'],"</Tanggal>";
		echo "</Transaksi>";
	}
	echo "</data>";
?>