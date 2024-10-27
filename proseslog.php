<?php
require 'koneksi.php';
session_start(); // Mulai session

if (isset($_POST['login'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass_user = $_POST['pass_user'];

    // Lakukan verifikasi login dengan menggunakan prepared statement
    $query = "SELECT * FROM user WHERE nama = ? AND email = ? AND pass_user = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pass_user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Jika login berhasil
        $_SESSION['nama'] = $nama; // Simpan nama ke dalam session
        $_SESSION['email'] = $email; // Simpan email ke dalam session

        echo "<script type='text/javascript'>
                alert('Anda Berhasil Login');
                window.location.href='home.php';
              </script>";
    } else {
        // Jika nama atau email atau password salah
        echo "<script type='text/javascript'>
                alert('Login Gagal. Silahkan coba lagi');
                window.location.href='login.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($koneksi);
?>
