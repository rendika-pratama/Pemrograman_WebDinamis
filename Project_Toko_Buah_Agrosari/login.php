<?php 
	require_once("config.php");

    if (isset($_POST['login'])) {
    	session_start();
    	if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
    		$user = $_POST['username'];
	        $pass = $_POST['password'];
	        $sql_login = "SELECT * FROM akun WHERE Username = '$user' AND Password = '$pass'";
	        $cek = mysqli_query($koneksi, $sql_login);
	        $baca = mysqli_fetch_array($cek);

	        $id_akun = $baca['ID_Akun'] ?? null;
	        $username = $baca['Username'] ?? null;
	        $password = $baca['Password'] ?? null;
	        // $level = $baca['level'];
	        if ($user == $username && $pass == $password) {
	        	$_SESSION['id_akun'] = $id_akun;
	        	$_SESSION['username'] = $username;
	            // $_SESSION['level'] = $level;
	            header('Location:Admin/Home.php');
	            }else{
	            	?>
	            		<script type="text/javascript">
	                		alert('Username atau Password Salah');
	                	</script>
	            	<?php 
	            }		
    	} else {
    		?>
	            <script type="text/javascript">
	                alert('Captcha Salah');
	            </script>
	       	<?php 
    	}
    }
    mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Toko Buah Agrosari</title>
	<link rel="stylesheet" type="text/css" href="CSS/ProjectBuah.css">
</head>
<body class="Body_Utama">
	<div class="Atas">
		<h2><center>Toko Buah Agrosari</center></h2>
	</div>
	<div class="Login">
		<form action="login.php" method="POST">
			<fieldset class="Kotak">
				<center><h3>Login Admin</h3></center>
				<center>
					<table>
						<tr>
							<td>
								Username
							</td>
							<td>
								: <input type="text" name="username" id="Box" required="username" placeholder="Username...">
							</td>
						</tr>
						<tr>
							<td>
								Password
							</td>
							<td>
								: <input type="password" name="password" id="Box" required="password" placeholder="Password...">
							</td>
						</tr>
						<tr>
							<td>
								<img src="captcha.php">
							</td>
							<td>
								: <input type="text" name="captcha_code" required="captcha">
							</td>
						</tr>
					</table>
					<pre><center></center><input type="submit" name="login" value="Login">   <input type="reset" name="reset" value="Reset">   <button><a href="index.php" id="Link_Text">Kembali</a></button></pre></center>
				</center>
			</fieldset>
		</form>
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