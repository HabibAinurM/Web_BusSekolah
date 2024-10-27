<?php
require('./fpdf.php');
require('phpqrcode/qrlib.php');

// Mulai sesi
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['nama'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.'); window.location.href='login.php';</script>";
    exit;
}

// Ambil data dari sesi
$nama = $_SESSION['nama'];

// Koneksi ke database
include 'koneksi.php';

// Ambil data dari form
$reservasi_id = isset($_POST['reservasi_id']) ? $_POST['reservasi_id'] : '';

// Ambil data dari database berdasarkan ID reservasi
$query = "
    SELECT k.nomor_kursi, r.email, r.kode_unik, r.waktu_reservasi 
    FROM kursi k
    JOIN reservasi r ON k.id_reservasi = r.id_reservasi
    WHERE k.id_reservasi = ?
";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $reservasi_id);
$stmt->execute();
$stmt->bind_result($nomor_kursi, $email, $kode_unik, $waktu_reservasi);
$stmt->fetch();
$stmt->close();

// Memastikan data ditemukan
if (!$nomor_kursi) {
    echo "Reservasi tidak ditemukan.";
    exit;
}

// Membuat instance FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Menentukan font
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Tiket Reservasi', 0, 1, 'C');

// Menambahkan informasi reservasi
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);
$pdf->Cell(0, 10, 'ID Reservasi: ' . $reservasi_id, 0, 1);
$pdf->Cell(0, 10, 'Kode Unik: ' . $kode_unik, 0, 1);
$pdf->Cell(0, 10, 'Waktu Reservasi: ' . $waktu_reservasi, 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
$pdf->Cell(0, 10, 'Nomor Kursi: ' . $nomor_kursi, 0, 1);

// Menambahkan QR Code
$pdf->Ln(10);
$qrCodeFile = 'qrcode/' . $kode_unik . '_' . $email . '.png';
$pdf->Image($qrCodeFile, 10, 100, 40, 40);

// Menyimpan file PDF dan memaksa download
$pdf->Output('I', 'tiket_reservasi.pdf');
?>
