<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

// Ambil data dari form
$nama_pemesan = isset($_POST['nama_pemesan']) ? $_POST['nama_pemesan'] : '';
$nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : '';
$nama_hotel = isset($_POST['nama_hotel']) ? $_POST['nama_hotel'] : '';
$tanggal_checkin = isset($_POST['tanggal_checkin']) ? $_POST['tanggal_checkin'] : '';
$jumlah_kamar = isset($_POST['jumlah_kamar']) ? $_POST['jumlah_kamar'] : '';
$nominal_pembayaran = isset($_POST['nominal_pembayaran']) ? $_POST['nominal_pembayaran'] : '';
$metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : '';

// Query dengan prepared statement
$stmt = $conn->prepare("INSERT INTO pembayaran_hotel (nama_pemesan, nomor_telepon, nama_hotel, tanggal_checkin, jumlah_kamar, nominal_pembayaran, metode_pembayaran) 
                          VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssss", $nama_pemesan, $nomor_telepon, $nama_hotel, $tanggal_checkin, $jumlah_kamar, $nominal_pembayaran, $metode_pembayaran);

// Eksekusi query
if ($stmt->execute()) {
    // Jika berhasil, arahkan ke halaman sukses_pembayaran.php
    header("Location: sukses_pembayaran.php");
    exit(); // Pastikan untuk berhenti setelah melakukan redirect
} else {
    // Jika terjadi error, tampilkan pesan error
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
