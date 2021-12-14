<?php  
	include 'koneksi.php';

	$sql = "SELECT * FROM mahasiswa ORDER BY NIM";
	$tampil = mysqli_query($con, $sql);
	if (mysqli_num_rows($tampil) > 0) {
		$no = 1;
		$response = array();
		$response["data"] = array();
		while ($r = mysqli_fetch_array($tampil)) {
			$h['NIM'] = $r['NIM'];
			$h['Nama'] = $r['Nama'];
			$h['Jkel'] = $r['Jkel'];
			$h['Alamat'] = $r['Alamat'];
			$h['Tgllhr'] = $r['Tgllhr'];
			$h['Prodi'] = $r['Prodi'];
			array_push($response["data"], $h);
		}
		echo json_encode($response);
	} else {
		$response["message"] = "Tidak Ada Data";
		echo json_encode($response);
	}
?>