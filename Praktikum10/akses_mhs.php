<?php  
	$url = "http://localhost/Praktikum_WebDinamis/Praktikum10/getdatamhs.php";
	$client = curl_init($url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($client);
	$result = json_decode($response);
	foreach ($result as $r) {
		echo "<p>";
		echo "NIM : ".$r->NIM."<br/>";
		echo "Nama : ".$r->Nama."<br/>";
		echo "Jenis Kelamin : ".$r->Jkel."<br/>";
		echo "Alamat : ".$r->Alamat."<br/>";
		echo "Tgl Lahir : ".$r->Tgllhr."<br/>";
		echo "Prodi : ".$r->Prodi."<brr/>";
		echo "</p>";
	}
?>