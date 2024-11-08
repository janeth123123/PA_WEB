<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

// Query untuk mengambil data pembayaran hotel
$query_hotel = "SELECT * FROM pembayaran_hotel";
$result_hotel = $conn->query($query_hotel);

// Query untuk mengambil data pembayaran penerbangan
$query_penerbangan = "SELECT * FROM pembayaran_penerbangan";
$result_penerbangan = $conn->query($query_penerbangan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/project_PA/asset/login.jpg'); 
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.6); 
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .table-container {
            margin-bottom: 40px;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Data Pembayaran</h1>

    <!-- Tabel Pembayaran Hotel -->
    <div class="table-container">
        <h2>Pembayaran Hotel</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Pemesan</th>
                    <th>Nomor Telepon</th>
                    <th>Nama Hotel</th>
                    <th>Tanggal Check-in</th>
                    <th>Jumlah Kamar</th>
                    <th>Nominal Pembayaran</th>
                    <th>Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_hotel->num_rows > 0) {
                    while ($row = $result_hotel->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nama_pemesan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nomor_telepon']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_hotel']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tanggal_checkin']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['jumlah_kamar']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nominal_pembayaran']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['metode_pembayaran']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data pembayaran hotel</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Tabel Pembayaran Penerbangan -->
    <div class="table-container">
        <h2>Pembayaran Penerbangan</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Pemesan</th>
                    <th>Nomor Telepon</th>
                    <th>Asal Penerbangan</th>
                    <th>Tujuan Penerbangan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Jumlah Penumpang</th>
                    <th>Total Pembayaran</th>
                    <th>Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_penerbangan->num_rows > 0) {
                    while ($row = $result_penerbangan->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nama_pemesan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nomor_telepon']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['asal_penerbangan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tujuan_penerbangan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tanggal_berangkat']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['jumlah_penumpang']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['total_bayar']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['metode_pembayaran']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data pembayaran penerbangan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Tombol Kembali ke Dashboard -->
    <a href="admin.php" class="btn-back">Kembali ke Dashboard</a>

</div>

</body>
</html>

<?php
$conn->close();
?>
