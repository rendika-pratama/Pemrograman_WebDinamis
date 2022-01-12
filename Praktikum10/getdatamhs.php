<?php  
	require_once "koneksi.php";

	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
	 	$sql = "SELECT * FROM mahasiswa WHERE NIM LIKE'%".$cari."%'";
		$query = mysqli_query($con, $sql);
	} else {
		$sql = "SELECT * FROM mahasiswa";
		$query = mysqli_query($con, $sql);
	}

	// $sql = "SELECT * FROM mahasiswa";
	// $query = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
		$data[] = $row;
	}

	header('content-type:application/json');
	echo json_encode($data);

	mysqli_close($con);
?>