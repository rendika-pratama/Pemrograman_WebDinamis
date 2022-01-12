<?php  
	// Memanggil library FPDF
	require('fpdf/fpdf.php');
	// Intance object dan memberikan pengaturan halaman PDF
	$pdf = new FPDF('l', 'mm', 'A5');
	// Membuat halaman baru
	$pdf->AddPage();
	// Setting jenis font yang akan digunakan
	$pdf->SetFont('Arial', 'B', 16);
	// Mencetak string
	$pdf->Cell(190, 7, 'TOKO BUAH AGROSARI', 0, 1, 'C');
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(190, 7, 'DAFTAR TRANSAKSI TOKO BUAH AGROSARI', 0, 1, 'C');
	// Memberikan space ke bawah agar tidak terlalu rapat
	$pdf->Cell(10, 7, '', 0, 1);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(6, 4, 'ID', 1, 0, 'C');
	$pdf->Cell(20, 4, 'PEMBELI', 1, 0, 'C');
	$pdf->Cell(25, 4, 'TELEPON', 1, 0, 'C');
	$pdf->Cell(35, 4, 'ALAMAT', 1, 0, 'C');
	$pdf->Cell(24, 4, 'KODE BUAH', 1, 0, 'C');
	$pdf->Cell(24, 4, 'NAMA BUAH', 1, 0, 'C');
	$pdf->Cell(9, 4, 'QTY', 1, 0, 'C');
	$pdf->Cell(20, 4, 'HARGA', 1, 0, 'C');
	$pdf->Cell(38, 4, 'TANGGAL & WAKTU', 1, 1, 'C');
	$pdf->SetFont('Arial', '', 10);
	include '../config.php';
	$transaksi = mysqli_query($koneksi, "SELECT * FROM pemesanan");
	while ($row = mysqli_fetch_array($transaksi)) {
		$pdf->Cell(6, 4, $row['ID_Transaksi'], 1, 0,);
		$pdf->Cell(20, 4, $row['Nama_Pembeli'], 1, 0);
		$pdf->Cell(25, 4, $row['NoTelp'], 1, 0);
		$pdf->Cell(35, 4, $row['Alamat'], 1, 0);
		$pdf->Cell(24, 4, $row['ID_Buah'], 1, 0);
		$pdf->Cell(24, 4, $row['Nama_Buah'], 1, 0);
		$pdf->Cell(9, 4, $row['QTY'], 1, 0);
		$pdf->Cell(20, 4, $row['Total_Harga'], 1, 0);
		$pdf->Cell(38, 4, $row['Tanggal'], 1, 1);
	}
	$pdf->Output();
?>