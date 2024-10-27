<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin.php">Dashboard</a>
        <a href="atur_jadwal.php">Atur Jadwal</a>
        <a href="user.php">User</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <h2>Selamat datang di halaman admin</h2>
        <p>Bus Sekolah Madiun</p>
    </div>
</body>
</html>
