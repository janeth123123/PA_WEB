<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    
    // Proses upload gambar
    $target_dir = "uploads/";
    $file_extension = strtolower(pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION));
    $new_filename = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    // Check if image file is valid
    $valid_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($file_extension, $valid_extensions)) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
        exit();
    }
    
    // Upload file
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        // Insert data ke database (menggunakan tabel 'destinasi')
        $sql = "INSERT INTO destinasi (nama, lokasi, deskripsi, harga, gambar) 
                VALUES ('$nama', '$lokasi', '$deskripsi', '$harga', '$new_filename')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Destinasi wisata berhasil ditambahkan!');
                    window.location.href = 'lihat.php';
                  </script>";
        
            // Tampilkan gambar setelah berhasil diupload
            echo "<h3>Gambar Destinasi Wisata:</h3>";
            echo "<img src='uploads/" . $new_filename . "' alt='Destinasi Gambar' width='300' />";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }        
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file.";
    }
}

// Ambil data dari database
$sql = "SELECT * FROM destinasi";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>";
    echo "<h3>" . $row['nama'] . "</h3>";
    echo "<img src='uploads/" . $row['gambar'] . "' alt='" . $row['nama'] . "' width='300' />";
    echo "</div>";
}

mysqli_close($conn);
?>
