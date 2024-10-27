<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Bus</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }
        .table thead th {
            border-top: none;
            background-color: #ffc107;
            color: #333;
        }
        .table tbody td {
            vertical-align: middle;
        }
        .table tbody tr {
            border-bottom: 1px solid #dee2e6;
        }
        .table tbody tr:hover {
            background-color: #fff3cd;
        }
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #333;
        }
        .btn-primary:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Jadwal Bus</h1>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Jadwal ID</th>
                    <th scope="col">Waktu Berangkat</th>
                    <th scope="col">Waktu Jemput</th>
                    <th scope="col">Rute</th>
                    <th scope="col">Shelter Jemput</th>
                    <th scope="col">Shelter Antar</th>
                    <th scope="col">Plat Nomor</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            include 'koneksi.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['shelter_asal']) && isset($_POST['shelter_tujuan']) && isset($_POST['tanggal_keberangkatan']) && isset($_POST['waktu_berangkat'])) {
                    $shelter_asal = $_POST['shelter_asal'];
                    $shelter_tujuan = $_POST['shelter_tujuan'];
                    $tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
                    $waktu_berangkat = $_POST['waktu_berangkat'];

                    $sql = "SELECT j.*, r.nama_rute, r.lokasi_jemput, r.lokasi_antar, b.plat_nomor
                            FROM jadwal j
                            INNER JOIN rute r ON j.rute_id = r.rute_id
                            INNER JOIN bus b ON j.no_bus = b.no_bus
                            WHERE r.lokasi_jemput = '$shelter_asal' 
                            AND r.lokasi_antar = '$shelter_tujuan' 
                            AND DATE(j.waktu_berangkat) = '$tanggal_keberangkatan' 
                            AND TIME(j.waktu_berangkat) = '$waktu_berangkat'";

                    $result = mysqli_query($koneksi, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $row["jadwal_id"] . "</td>
                                    <td>" . $row["waktu_berangkat"] . "</td>
                                    <td>" . $row["waktu_jemput"] . "</td>
                                    <td>" . $row["nama_rute"] . "</td>
                                    <td>" . $row["lokasi_jemput"] . "</td>
                                    <td>" . $row["lokasi_antar"] . "</td>
                                    <td>" . $row["plat_nomor"] . "</td>
                                    <td><a href='tiket.php?jadwal_id=" . $row["jadwal_id"] . "' class='btn btn-primary'>Pesan</a></td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Tidak ada jadwal bus yang tersedia untuk rute ini pada tanggal dan waktu yang dipilih.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Mohon lengkapi semua field dalam formulir pencarian.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Mohon gunakan formulir pencarian untuk menemukan jadwal bus.</td></tr>";
            }

            mysqli_close($koneksi);
            ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Bundle dengan Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
