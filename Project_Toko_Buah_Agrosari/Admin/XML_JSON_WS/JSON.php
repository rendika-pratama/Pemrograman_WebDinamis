<?php  
	include '../../config.php';

	$sql = "SELECT * FROM pemesanan ORDER BY ID_Transaksi";
	$tampil = mysqli_query($koneksi, $sql);
	if (mysqli_num_rows($tampil) > 0) {
		$no = 1;
		$response = array();
		$response["data"] = array();
		while ($r = mysqli_fetch_array($tampil)) {
			$h['ID_Transaksi'] = $r['ID_Transaksi'];
			$h['Nama_Pembeli'] = $r['Nama_Pembeli'];
			$h['NoTelp'] = $r['NoTelp'];
			$h['Alamat'] = $r['Alamat'];
			$h['ID_Buah'] = $r['ID_Buah'];
			$h['Nama_Buah'] = $r['Nama_Buah'];
			$h['QTY'] = $r['QTY'];
			$h['Total_Harga'] = $r['Total_Harga'];
			$h['Tanggal'] = $r['Tanggal'];
			array_push($response["data"], $h);
		}
		echo json_encode($response);
	} else {
		$response["message"] = "Tidak Ada Data";
		echo json_encode($response);
	}
?>