<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php'; 

// Pastikan ada parameter 'id' di URL
if (isset($_GET['id'])) {
    $id_destinasi = $_GET['id'];

    // Menghapus data dari tabel destinasi berdasarkan ID
    $query = "DELETE FROM destinasi WHERE id_destinasi = $id_destinasi";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil menghapus, arahkan ke halaman daftar destinasi
        header("Location: lihat.php");
        exit;  // Pastikan berhenti setelah redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID destinasi tidak ditemukan.";
}

mysqli_close($conn);
?>
