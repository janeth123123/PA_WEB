<?php
// Menghubungkan ke database
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

// Memeriksa apakah 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Mengambil data destinasi berdasarkan 'id'
    $sql = "SELECT * FROM destinasi WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // Mengambil data destinasi
        $destinasi = mysqli_fetch_assoc($result);
    } else {
        echo "Destinasi tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Destinasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .detail-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            padding: 20px;
            text-align: center;
        }

        .detail-container img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .detail-container h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .detail-container p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .harga {
            font-size: 20px;
            font-weight: bold;
            color: #47143a;
            margin-bottom: 20px;
        }

        .back-button {
            background-color: #47143a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #fff;
            color: #47143a;
            border: 1px solid #47143a;
        }
    </style>
</head>

<body>
    <div class="detail-container">
        <img src="/project_PA/admin/uploads/<?php echo $destinasi['gambar']; ?>" alt="<?php echo $destinasi['nama']; ?>">
        <h2><?php echo $destinasi['nama']; ?></h2>
        <p><?php echo $destinasi['deskripsi']; ?></p>
        <div class="harga">Rp <?php echo number_format($destinasi['harga'], 0, ',', '.'); ?></div>
        <a href="index.php" class="back-button">Kembali</a>
    </div>
</body>

</html>

<?php
// Menutup koneksi ke database
mysqli_close($conn);
?>
