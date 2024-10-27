<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Kursi</title>
    <style>
        .form-container {
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
        }
        .form-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-label-outside {
            font-weight: bold;
        }
        .seat-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 8px;
            margin-top: 8px;
            padding-left: 8px;
            padding-right: 8px;
        }
        .seat-option {
            background-color: #f2f2f2;
            color: #333;
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
        }
        .seat-option.selected {
            background-color: #007bff;
            color: #fff;
        }
        .seat-option.taken {
            background-color: #ff0000;
            color: #fff;
            cursor: not-allowed;
        }
        .seat-gap {
            visibility: hidden;
        }
        .message {
            margin-top: 16px;
            font-size: 16px;
            color: red;
            display: none;
        }
        button {
            margin-top: 16px;
            font-size: 16px;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<section class="form-center">
    <div class="form-container">
        <form action="simpan_kursi.php" method="POST">
            <div class="row">
                <div class="container">
                    <label class="form-label-outside">Pilih Kursi</label>
                    <input type="text" id="selected-seat" name="selected_seat" readonly>
                    <!-- <input type="hidden" name="plat_nomor" value="<?php echo htmlspecialchars($_GET['plat_nomor']);?>"> -->
                    <input type="hidden" name="jadwal_id" value="<?php echo htmlspecialchars($_GET['jadwal_id']); ?>"> <!-- Hidden input for jadwal_id -->
                    <div class="seat-container">
                        <?php
                        include 'koneksi.php';

                        // Ambil nomor kursi yang sudah dipilih dari database
                        $taken_seats = [];
                        $plat_nomor = $_GET['plat_nomor'] ?? '';

                        $result = $koneksi->query("SELECT nomor_kursi FROM kursi WHERE plat_nomor = '$plat_nomor'");

                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                $taken_seats[] = $row['nomor_kursi'];
                            }
                        } else {
                            echo "Error retrieving data: " . $koneksi->error;
                        }

                        for ($i = 1; $i <= 28; $i++) {
                            $seat = "Seat $i";
                            $class = in_array($seat, $taken_seats) ? 'seat-option taken' : 'seat-option';
                            echo "<div class='$class' data-seat='$seat'>$seat</div>";
                        }

                        $koneksi->close();
                        ?>
                    </div>
                </div>
            </div>
            <button type="submit">Simpan Kursi</button>
            <div class="message" id="seat-message">Kursi ini sudah dipilih, silakan pilih kursi lain.</div>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const seats = document.querySelectorAll('.seat-option');

        seats.forEach(seat => {
            seat.addEventListener('click', function () {
                if (this.classList.contains('taken') || this.classList.contains('selected')) {
                    document.getElementById('seat-message').style.display = 'block';
                    return;
                }

                seats.forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('selected-seat').value = this.dataset.seat;
            });
        });
    });
</script>

</body>
</html>
