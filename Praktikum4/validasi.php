<?php  
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "kegiatan4_pwd";

	$con = @mysqli_connect($host, $username, $password, $database);

	if (!$con) {
		echo "Error : ".mysqli.connect.error();
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Validasi</title>
	<style>
		.error{color: #FF0000;}
	</style>
</head>
<body>
	<?php  
		// Define Variables and Set to Empty Values
		$namaErr = $emailErr = $genderErr = $websiteErr = "";
		$nama = $email = $gender = $comment = $website = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["nama"])) {
				$namaErr = "Nama Harus Diisi";
			} else {
				$nama = test_input($_POST["nama"]);
			}

			if (empty($_POST["email"])) {
				$emailErr = "Email Harus Diisi";
			} else {
				$email = test_input($_POST["email"]);

				//Check if E - mail Address is Well - Formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Email Tidak Sesuai Format";
				}
			}

			if (empty($_POST["website"])) {
				$website = "";
			} else {
				$website = test_input($_POST["website"]);
			}

			if (empty($_POST["comment"])) {
				$comment = "";
			} else {
				$comment = test_input($_POST["comment"]);
			}

			if (empty($_POST["gender"])) {
				$genderErr = "Gender Harus Dipilih";
			} else {
				$gender = test_input($_POST["gender"]);
			}
		}

		if (isset($_POST['submit'])) {
			if ($emailErr != TRUE) {
				$upload = mysqli_query($con, "INSERT INTO validasi(nama, email, website, comment, gender) VALUES('$nama', '$email', '$website', '$comment', '$gender')");
			}
		}

		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	?>

	<h2>Posting Komentar</h2>
	<p><span class="error">*Harus Diisi.</span></p>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<table>
			<tr>
				<td>Nama : </td>
				<td><input type="text" name="nama"><span class="error">*<?php echo $namaErr; ?></span></td>
			</tr>
			<tr>
				<td>E-mail : </td>
				<td><input type="text" name="email"><span class="error">*<?php echo $emailErr; ?></span></td>
			</tr>
			<tr>
				<td>Website : </td>
				<td><input type="text" name="website"><span class="error">*<?php echo $websiteErr; ?></span></td>
			</tr>
			<tr>
				<td>Komentar : </td>
				<td><textarea name="comment" rows="5" cols="40"></textarea></td>
			</tr>
			<tr>
				<td>Gender : </td>
				<td>
					<input type="radio" name="gender" value="L">Laki - Laki
					<input type="radio" name="gender" value="P">Perempuan
					<span class="error">*<?php echo $genderErr; ?></span>
				</td>
			</tr>
			<td>
				<input type="submit" name="submit" value="Submit">
			</td>
		</table>
	</form>

	<table border="1">
		<tr>
			<th>Nama</th>
			<th>E - mail</th>
			<th>Website</th>
			<th>Komentar</th>
			<th>Gender</th>
		</tr>

		<?php 
			$result = mysqli_query($con, "SELECT * FROM validasi");
			while ($data = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$data['nama']."</td>";
				echo "<td>".$data['email']."</td>";
				echo "<td>".$data['website']."</td>";
				echo "<td>".$data['comment']."</td>";
				echo "<td>".$data['gender']."</td>";
			}
		?>
	</table>
</body>
</html>