<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php'; 

// Mengecek apakah ID destinasi diterima melalui parameter GET
if (isset($_GET['id'])) {
    $id_destinasi = $_GET['id'];

    // Query untuk mengambil data destinasi berdasarkan ID
    $sql = "SELECT * FROM destinasi WHERE id_destinasi = $id_destinasi";
    $result = mysqli_query($conn, $sql);

    // Mengecek apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        $destinasi = mysqli_fetch_assoc($result); // Mengambil data destinasi
    } else {
        echo "Destinasi tidak ditemukan!";
        exit;
    }
} else {
    echo "ID destinasi tidak ditemukan!";
    exit;
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Proses upload file jika ada gambar yang diupload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file yang diupload adalah gambar asli
    if (!empty($_FILES["foto"]["name"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Cek ukuran file (limit 500KB)
        if ($_FILES["foto"]["size"] > 500000) {
            echo "Ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        // Batasi jenis file yang diizinkan
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Hanya format JPG, JPEG, PNG yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Jika semua validasi lolos, upload file
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                // Update query dengan gambar baru
                $query = "UPDATE destinasi SET 
                          nama = '$nama', 
                          lokasi = '$lokasi', 
                          deskripsi = '$deskripsi', 
                          harga = '$harga', 
                          foto = '$target_file'
                          WHERE id_destinasi = $id_destinasi";
            } else {
                echo "Gagal mengupload file.";
            }
        }
    } else {
        // Jika tidak ada gambar baru, update hanya data tanpa file
        $query = "UPDATE destinasi SET 
                  nama = '$nama', 
                  lokasi = '$lokasi', 
                  deskripsi = '$deskripsi', 
                  harga = '$harga'
                  WHERE id_destinasi = $id_destinasi";
    }

    // Menjalankan query update
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diperbarui!";
        header('Location: lihat.php'); // Redirect ke halaman tampilkan data
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destinasi</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        /* Styling global */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('/project_PA/asset/lihat.jpg'); 
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: rgb(21, 74, 74);
            color: #fff;
            padding-top: 30px;
            position: fixed;
            height: 100%;
        }

        .sidebar h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            text-align: center;
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            display: block;
            font-size: 18px;
            padding: 12px;
            border-radius: 4px;
        }

        .sidebar ul li a:hover {
            background-color: #34495E;
        }

        /* Content Area */
        .content-area {
            margin-left: 250px;
            padding: 30px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.1); 
        }

        h2 {
            font-size: 32px;
            color: #2C3E50;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            background-color: rgba(255, 255, 255, 0.6); 
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: 0 auto;
            font-size: 16px;
        }

        form div {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            color: #34495E;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #BDC3C7;
            border-radius: 6px;
            font-size: 16px;
            margin-top: 8px;
            background-color: rgba(255, 255, 255, 0.6); 
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 12px 25px;
            background-color: #2C3E50;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #34495E;
        }

        .destinasi-img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 15px;
        }

        .destinasi-img:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 768px) {
            .content-area {
                padding: 20px;
            }

            .sidebar {
                width: 200px;
            }

            form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h1>ADMIN</h1>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="tambah.php">Tambah Destinasi</a></li>
            <li><a href="lihat.php">Tampilkan Data</a></li>
        </ul>
    </div>

    <!-- Form Edit Destinasi -->
    <div class="content-area">
        <h2>Edit Destinasi</h2>
        <form action="edit.php?id=<?php echo $id_destinasi; ?>" method="POST" enctype="multipart/form-data">
            <div>
                <label for="nama">Nama Destinasi</label>
                <input type="text" id="nama" name="nama" value="<?php echo $destinasi['nama']; ?>" required>
            </div>
            <div>
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" value="<?php echo $destinasi['lokasi']; ?>" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required><?php echo $destinasi['deskripsi']; ?></textarea>
            </div>
            <div>
                <label for="harga">Harga Tiket (Rp)</label>
                <input type="number" id="harga" name="harga" value="<?php echo $destinasi['harga']; ?>" required>
            </div>
            <div>
                <label for="foto">Upload Foto Destinasi (opsional)</label>
                <input type="file" id="foto" name="foto" accept="image/*">
                <?php if (!empty($destinasi['foto'])): ?>
                    <img class="destinasi-img" src="<?php echo $destinasi['foto']; ?>" alt="Foto Destinasi" width="200">
                <?php else: ?>
                    <img class="destinasi-img" src="path/to/default-image.jpg" alt="Foto Destinasi" width="200">
                <?php endif; ?>
            </div>
            <button type="submit">Update Destinasi</button>
        </form>
    </div>

</body>
</html>

<?php
mysqli_close($conn);
?>
