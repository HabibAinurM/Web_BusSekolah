<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Jika form disubmit untuk menyimpan perubahan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jadwal_id = $_POST['jadwal_id'];
    $waktu_berangkat = $_POST['waktu_berangkat'];
    $waktu_jemput = $_POST['waktu_jemput'];
    $rute_id = $_POST['rute_id'];
    $no_bus = $_POST['no_bus'];

    $sql_update = "UPDATE jadwal SET waktu_berangkat='$waktu_berangkat', waktu_jemput='$waktu_jemput', 
                   rute_id='$rute_id', no_bus='$no_bus' WHERE jadwal_id=$jadwal_id";

    if ($conn->query($sql_update) === TRUE) {
        echo '<script>alert("Data jadwal berhasil diperbarui."); window.location.href="atur_jadwal.php";</script>';
    } else {
        echo '<script>alert("Gagal memperbarui data jadwal: ' . $conn->error . '");</script>';
    }
}

// Ambil data jadwal yang akan di-edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_select = "SELECT * FROM jadwal WHERE jadwal_id=$id";
    $result = $conn->query($sql_select);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo '<script>alert("Data jadwal tidak ditemukan."); window.location.href="atur_jadwal.php";</script>';
    }
} else {
    echo '<script>alert("ID jadwal tidak diberikan."); window.location.href="atur_jadwal.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
    <link rel="stylesheet" href="css/edit_jadwal.css">
    <style>
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 15px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    display: flex;
    height: 100vh;
    background-color: #fff3e0;
}

.sidebar {
    width: 250px;
    background-color: #ff9800;
    color: white;
    display: flex;
    flex-direction: column;
    padding: 15px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 20px;
    
}

.sidebar a {
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    margin: 5px 0;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.sidebar a:hover {
    background-color: #e65100;
}

.content {
    flex: 1;
    padding: 20px;
}

h2 {
    margin-top: 0;
    text-align: center;
}
p {
    text-align: center;
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
        <h2>Edit Jadwal</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="jadwal_id" value="<?php echo $row['jadwal_id']; ?>">
            <label for="waktu_berangkat">Waktu Berangkat:</label>
            <input type="text" id="waktu_berangkat" name="waktu_berangkat" value="<?php echo $row['waktu_berangkat']; ?>" required>
            <label for="waktu_jemput">Waktu Jemput:</label>
            <input type="text" id="waktu_jemput" name="waktu_jemput" value="<?php echo $row['waktu_jemput']; ?>" required>
            <label for="rute_id">Rute ID:</label>
            <input type="text" id="rute_id" name="rute_id" value="<?php echo $row['rute_id']; ?>" required>
            <label for="no_bus">No. Bus:</label>
            <input type="text" id="no_bus" name="no_bus" value="<?php echo $row['no_bus']; ?>" required>
            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
