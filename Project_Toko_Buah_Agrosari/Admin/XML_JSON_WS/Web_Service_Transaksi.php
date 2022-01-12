<?php  
	$url = "http://localhost/Project_Toko_Buah_Agrosari/Admin/XML_JSON_WS/getdatatransaksi.php";
	$client = curl_init($url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($client);
	$result = json_decode($response);
	foreach ($result as $r) {
		echo "<p>";
		echo "ID Transaksi : ".$r->ID_Transaksi."<br/>";
		echo "Nama Pembeli : ".$r->Nama_Pembeli."<br/>";
		echo "No. Telepon : ".$r->NoTelp."<br/>";
		echo "Alamat : ".$r->Alamat."<br/>";
		echo "ID Buah : ".$r->ID_Buah."<br/>";
		echo "Nama Buah : ".$r->Nama_Buah."<brr/>";
		echo "QTY : ".$r->QTY."<brr/>";
		echo "Total_Harga : ".$r->Total_Harga."<brr/>";
		echo "Tanggal : ".$r->Tanggal."<brr/>";
		echo "</p>";
	}
?>