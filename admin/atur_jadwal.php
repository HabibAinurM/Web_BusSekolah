<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Proses hapus jadwal
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM jadwal WHERE jadwal_id = $id";
    if ($conn->query($sql_delete) === TRUE) {
        echo '<script>alert("Jadwal berhasil dihapus."); window.location.href="atur_jadwal.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus jadwal: ' . $conn->error . '");</script>';
    }
}

$sql = "SELECT * FROM jadwal";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Jadwal</title>
    <link rel="stylesheet" href="css/atur_jadwal.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .action a {
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
        }

        .action a:hover {
            background-color: #0056b3;
        }

        .action form {
            margin: 0;
        }

        .action form button {
            margin: 0;
            padding: 5px 10px;
            background-color: #dc3545;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .action form button:hover {
            background-color: #bd2130;
        }
    </style>
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
        <h2>Atur Jadwal</h2>
        <p>Halaman untuk mengelola jadwal.</p>
        <a href="tambah_jadwal.php" class="btn btn-primary">Tambah Jadwal</a>
        <table>
            <thead>
                <tr>
                    <th>Jadwal ID</th>
                    <th>Waktu Berangkat</th>
                    <th>Waktu Jemput</th>
                    <th>Rute ID</th>
                    <th>No. Bus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['jadwal_id'] . "</td>";
                        echo "<td>" . $row['waktu_berangkat'] . "</td>";
                        echo "<td>" . $row['waktu_jemput'] . "</td>";
                        echo "<td>" . $row['rute_id'] . "</td>";
                        echo "<td>" . $row['no_bus'] . "</td>";
                        echo "<td class='action'>";
                        echo "<a href='edit_jadwal.php?id=" . $row['jadwal_id'] . "'>Edit</a>";
                        echo "<form method='post' action='atur_jadwal.php?action=delete&id=" . $row['jadwal_id'] . "' onsubmit='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\")'>";
                        echo "<button type='submit'>Hapus</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada jadwal tersedia.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
