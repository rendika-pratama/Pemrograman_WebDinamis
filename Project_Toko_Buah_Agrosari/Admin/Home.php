<?php  
	session_start();
	require_once("../config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toko Buah Agrosari</title>
	<link rel="stylesheet" type="text/css" href="../CSS/ProjectBuah.css">
	<script type="text/javascript">
		function logout() {
			alert('Anda Telah Logout');
		}
	</script>
</head>
<body class="Body_Utama" >
	<table width="100%">
		<tr>
			<td>
				<h2>Toko Buah Agrosari</h2>
			</td>
			<td align="right">
				<h4><a href="Logout.php"><img src="../CSS/Background/profile.jpg" id="Foto_Profile"></a></h4>
			</td>
			<td align="center" width="2%">
				<h4>
					<a href="Logout.php" id="Link_Profile" onclick="logout()">Logout</a>
				</h4>
			</td>
		</tr>
	</table>
	<div class="Navbar">
		<table cellpadding="3" rules="rows" width="20%">
			<tr class="Layout_Navbar">
				<th><a href="Home.php" id="Link_Text">Home</a></th>
				<th><a href="CekBuah.php" id="Link_Text">List Buah</a></th>
				<th><a href="Transaksi.php" id="Link_Text">Transaksi</a></th>
			</tr>
		</table>
	</div>
	<div class="Content">
		<center>
			<h1>
				Selamat Datang 
				<?php 
					echo $_SESSION['username']; 
				?> <br>
			</h1>
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