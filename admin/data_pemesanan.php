<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

// Query untuk mendapatkan data pemesanan
$sql = "SELECT id, nama_pemesan, nomor_telepon, nama_layanan, tanggal FROM pemesanan";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
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
        .container {
            width: 80%;
            margin: 20px auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Pemesanan</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nama Pemesan</th><th>Nomor Telepon</th><th>Layanan</th><th>Tanggal</th></tr>";

        // Output data setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nama_pemesan"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nomor_telepon"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nama_layanan"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["tanggal"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Belum ada data pemesanan.</p>";
    }
    $conn->close();
    ?>

    <a href="/project_PA/admin/admin.php" class="btn-back">Kembali ke Dashboard</a>
</div>

</body>
</html>
