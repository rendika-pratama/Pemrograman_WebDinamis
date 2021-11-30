<?php  
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cari KHS</title>
</head>
<body>
	<h3>Form Pencarian Data KHS Dengan PHP</h3>
	<form action="" method="GET">
		<label>Cari :</label>
		<input type="text" name="cari">
		<input type="submit" value="Cari">
	</form>

	<?php  
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
			echo "<b>Hasil Pencarian : ".$cari."</b>";
		}
	?>

	<table border="1">
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Kode MK</th>
			<th>Nilai</th>
		</tr>
		<?php
			if (isset($_GET['cari'])) {
			 	$cari = $_GET['cari'];
			 	$sql = "SELECT * FROM khs WHERE NIM LIKE'%".$cari."%'";
			 	$tampil = mysqli_query($con, $sql);
			 } else {
			 	$sql = "SELECT * FROM khs";
			 	$tampil = mysqli_query($con, $sql);
			 }
			 $no = 1;
			 while ($r = mysqli_fetch_array($tampil)) {
			 	?>
			 	<tr>
			 		<td><?php echo $no++; ?></td>
			 		<td><?php echo $r['NIM']; ?></td>
			 		<td><?php echo $r['KodeMK']; ?></td>
			 		<td><?php echo $r['Nilai']; ?></td>
			 	</tr>
		<?php } ?>
	</table>
</body>
</html>