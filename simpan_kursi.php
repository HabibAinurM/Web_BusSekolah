<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['jadwal_id']) && isset($_POST['plat_nomor'])) { // Check if jadwal_id and plat_nomor exist in $_POST
        $jadwal_id = $_POST['jadwal_id'];
        $nomor_kursi = $_POST['selected_seat'];
        $plat_nomor = $_POST['plat_nomor'];

        if (!empty($nomor_kursi) && !empty($plat_nomor) && !empty($jadwal_id)) {
            $check_query = "SELECT * FROM kursi WHERE nomor_kursi = ? AND plat_nomor = ?";
            $stmt_check = $koneksi->prepare($check_query);
            $stmt_check->bind_param("ss", $nomor_kursi, $plat_nomor);
            $stmt_check->execute();
            $check_result = $stmt_check->get_result();

            if ($check_result->num_rows == 0) {
                $insert_query = "INSERT INTO kursi (nomor_kursi, jadwal_id, plat_nomor) VALUES (?, ?, ?)";
                $stmt_insert = $koneksi->prepare($insert_query);

                if ($stmt_insert) {
                    $stmt_insert->bind_param("sis", $nomor_kursi, $jadwal_id, $plat_nomor);
                    if ($stmt_insert->execute()) {
                        // Additional processes after successfully saving the seat
                        $nama = $_SESSION['nama'];
                        $userQuery = "SELECT email FROM user WHERE nama = ?";
                        $stmt_email = $koneksi->prepare($userQuery);

                        if (!$stmt_email) {
                            die("Error preparing statement: " . $koneksi->error);
                        }

                        $stmt_email->bind_param("s", $nama);
                        $stmt_email->execute();
                        $stmt_email->bind_result($email);
                        $stmt_email->fetch();
                        $stmt_email->close();

                        $kode_unik = uniqid();
                        $waktu_reservasi = date("Y-m-d H:i:s");
                        $reservasi_id = rand(1000, 9999);

                        include 'phpqrcode/qrlib.php';
                        $qrCodeFile = 'qrcode/' . $kode_unik . '_' . $email . '.png';
                        QRcode::png("Kode: " . $kode_unik . "\nEmail: " . $email, $qrCodeFile);

                        echo "<!doctype html>
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
                                <p>ID Reservasi: $reservasi_id</p>
                                <p>Kode Unik: $kode_unik</p>
                                <p>Waktu Reservasi: $waktu_reservasi</p>
                                <p>Email: $email</p>
                                <p>Nomor Kursi: $nomor_kursi</p>
                                <div class='qr-code'>
                                    <img src='$qrCodeFile' alt='QR Code'>
                                </div>
                            </div>
                            <form method='post' action='cetak_pdf.php'>
                                <input type='hidden' name='reservasi_id' value='$reservasi_id'>
                                <button type='submit' class='btn'>Cetak Tiket (PDF)</button>
                            </form>
                        </body>
                        </html>";
                    } else {
                        echo "Error: " . $stmt_insert->error;
                    }
                    $stmt_insert->close();
                } else {
                    echo "Error: " . $koneksi->error;
                }
            } else {
                echo "Kursi sudah dipilih. Silakan pilih kursi lain.";
            }
            $stmt_check->close();
        } else {
            echo "Data tidak lengkap!";
        }
    } else {
        echo "Jadwal ID atau Plat Nomor tidak ditemukan dalam data POST.";
    }

    $koneksi->close();
}
?>
