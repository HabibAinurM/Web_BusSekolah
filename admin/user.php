<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="css/user.css">
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
        <h2>User</h2>
        <p>Halaman untuk mengelola user.</p>
        <table>
            <thead>
                <tr>
                    <th>Nisn</th>
                    <th>email</th>
                    <th>no_hp</th>
                    <th>nama</th>
                    <th>tgl_lahir</th>
                    <th>jk</th>
                    <th>Sekolah</th>
                    <th>pass_user</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nisn'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['no_hp'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['tgl_lahir'] . "</td>";
                        echo "<td>" . $row['jk'] . "</td>";
                        echo "<td>" . $row['sekolah'] . "</td>";
                        echo "<td>" . $row['pass_user'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
