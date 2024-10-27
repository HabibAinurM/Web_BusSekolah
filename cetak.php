<?php
// Include koneksi.php untuk menghubungkan ke database
include 'koneksi.php';

// Ambil data dari form atau database sesuai kebutuhan
$reservasi_id = isset($_POST['reservasi_id']) ? $_POST['reservasi_id'] : '';
$nomor_duduk = isset($_POST['nomor_duduk']) ? $_POST['nomor_duduk'] : '';
$nisn = isset($_POST['nisn']) ? $_POST['nisn'] : '';



// Periksa apakah NISN ada di tabel user
$checkNISNQuery = "SELECT nisn FROM user WHERE nisn = '$nisn'";
$checkNISNResult = mysqli_query($koneksi, $checkNISNQuery);


if (mysqli_num_rows($checkNISNResult) > 0) {
    // Generate kode unik
    $kode_unik = uniqid();

    // Waktu reservasi
    $waktu_reservasi = date("Y-m-d H:i:s");

    // Query untuk menyimpan data reservasi ke database
    $query = "INSERT INTO reservasi (reservasi_id, nomor_duduk, kode_unik, waktu_reservasi, nisn) VALUES ('$reservasi_id', '$nomor_duduk', '$kode_unik', '$waktu_reservasi', '$nisn')";
    $result = mysqli_query($koneksi, $query);

    // Jika query berhasil
    if ($result) {
        // Include library QR Code
        include 'phpqrcode/qrlib.php';

        // Set nama file QR Code
        $qrCodeFile = 'qrcodes/' . $kode_unik . '.png';

        // Generate QR Code
        QRcode::png($kode_unik, $qrCodeFile);

        // HTML untuk menampilkan tiket dan QR Code
        $html = "
        <!doctype html>
        <html lang='en'>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <title>Tiket Reservasi</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                .ticket {
                    width: 300px;
                    padding: 20px;
                    border: 2px solid #000;
                    border-radius: 10px;
                    margin: auto;
                    text-align: center;
                }
                .qr-code {
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='ticket'>
                <h2>Tiket Reservasi</h2>
                <p>Reservasi ID: $reservasi_id</p>
                <p>Nomor Duduk: $nomor_duduk</p>
                <p>Kode Unik: $kode_unik</p>
                <p>Waktu Reservasi: $waktu_reservasi</p>
                <p>NISN: $nisn</p>
                <div class='qr-code'>
                    <img src='$qrCodeFile' alt='QR Code'>
                </div>
            </div>
        </body>
        </html>
        ";

        // Tampilkan tiket
        echo $html;
    } else {
        // Jika query gagal
        echo "Gagal membuat reservasi. Silakan coba lagi.";
    }
} else {
    echo "NISN tidak ditemukan. Silakan masukkan NISN yang valid.";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
