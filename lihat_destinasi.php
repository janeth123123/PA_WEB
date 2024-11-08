<?php
// Menghubungkan ke database
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

// Mengambil data destinasi wisata dari database
$sql = "SELECT * FROM destinasi";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .destinasi-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .destinasi-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
        }

        .destinasi-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .destinasi-card h2 {
            padding: 15px;
            font-size: 20px;
            color: #333;
        }

        .destinasi-card p {
            padding: 0 15px;
            color: #777;
        }

        .destinasi-card .harga {
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #47143a;
        }

        .destinasi-card button {
            background-color: #47143a;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin: 15px;
            cursor: pointer;
        }

        .destinasi-card button:hover {
            background-color: #fff;
            color: #47143a;
            border: 1px solid #47143a;
        }
    </style>

</head>

<body>
    <h1>Destinasi Wisata</h1>

    <div class="destinasi-container">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="destinasi-card">
                <img src="/project_PA/admin/uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>">
                <h2><?php echo $row['nama']; ?></h2>
                <p><?php echo substr($row['deskripsi'], 0, 100) . '...'; ?></p>
                <div class="harga">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></div>
                <button onclick="window.location.href='detail_destinasi.php?id_destinasi='">Lihat Detail</button>
            </div>
        <?php } ?>
    </div>

</body>

</html>

<?php
// Menutup koneksi ke database
mysqli_close($conn);
?>
