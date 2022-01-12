<?php  
	require_once "../../config.php";

	$sql = "SELECT * FROM pemesanan";
	$query = mysqli_query($koneksi, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
		$data[] = $row;
	}

	header('content-type:application/json');
	echo json_encode($data);

	mysqli_close($koneksi);
?>