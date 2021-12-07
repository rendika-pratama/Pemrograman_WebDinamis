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
	$pdf->Cell(190, 7, 'PROGRAM STUDI TEKNIK INFORMATIKA', 0, 1, 'C');
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(190, 7, 'DAFTAR MAHASISWA MATKUL PEMROGRAMAN WEB DINAMIS', 0, 1, 'C');
	// Memberikan space ke bawah agar tidak terlalu rapat
	$pdf->Cell(10, 7, '', 0, 1);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(15, 6, 'NIM', 1, 0);
	$pdf->Cell(40, 6, 'NAMA MAHASISWA', 1, 0);
	$pdf->Cell(20, 6, 'J KEL', 1, 0);
	$pdf->Cell(30, 6, 'ALAMAT', 1, 0);
	$pdf->Cell(35, 6, 'TANGGAL LAHIR', 1, 0);
	$pdf->Cell(30, 6, 'PRODI', 1, 1);
	$pdf->SetFont('Arial', '', 10);
	include 'koneksi.php';
	$mahasiswa = mysqli_query($con, "SELECT * FROM mahasiswa");
	while ($row = mysqli_fetch_array($mahasiswa)) {
		$pdf->Cell(15, 6, $row['NIM'], 1, 0);
		$pdf->Cell(40, 6, $row['Nama'], 1, 0);
		$pdf->Cell(20, 6, $row['Jkel'], 1, 0);
		$pdf->Cell(30, 6, $row['Alamat'], 1, 0);
		$pdf->Cell(35, 6, $row['Tgllhr'], 1, 0);
		$pdf->Cell(30, 6, $row['Prodi'], 1, 1);
	}
	$pdf->Output();
?>