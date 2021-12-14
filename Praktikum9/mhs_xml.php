<?php  
	include 'koneksi.php';

	header('Content-Type:text/xml');
	$query = "SELECT * FROM mahasiswa";
	$hasil = mysqli_query($con, $query);
	$jumField = mysqli_num_fields($hasil);

	echo "<?xml version='1.0'?>";
	echo "<data>";
	while ($data = mysqli_fetch_array($hasil)) {
		echo "<mahasiswa>";
		echo "<NIM>",$data['NIM'],"</NIM>";
		echo "<Nama>",$data['Nama'],"</Nama>";
		echo "<Jkel>",$data['Jkel'],"</Jkel>";
		echo "<Alamat>",$data['Alamat'],"</Alamat>";
		echo "<Tgllhr>",$data['Tgllhr'],"</Tgllhr>";
		echo "<Prodi>",$data['Prodi'],"</Prodi>";
		echo "</mahasiswa>";
	}
	echo "</data>";
?>