<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

// Ambil data dari form
$nama_pemesan = isset($_POST['nama_pemesan']) ? $_POST['nama_pemesan'] : '';
$nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : '';
$asal_penerbangan = isset($_POST['asal_penerbangan']) ? $_POST['asal_penerbangan'] : '';
$tujuan_penerbangan = isset($_POST['tujuan_penerbangan']) ? $_POST['tujuan_penerbangan'] : '';
$tanggal_berangkat = isset($_POST['tanggal_berangkat']) ? $_POST['tanggal_berangkat'] : '';
$jumlah_penumpang = isset($_POST['jumlah_penumpang']) ? $_POST['jumlah_penumpang'] : '';
$total_bayar = isset($_POST['total_bayar']) ? $_POST['total_bayar'] : '';
$metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : '';

// Query dengan prepared statement
$stmt = $conn->prepare("INSERT INTO pembayaran_penerbangan (nama_pemesan, nomor_telepon, asal_penerbangan, tujuan_penerbangan, tanggal_berangkat, jumlah_penumpang, total_bayar, metode_pembayaran) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssss", $nama_pemesan, $nomor_telepon, $asal_penerbangan, $tujuan_penerbangan, $tanggal_berangkat, $jumlah_penumpang, $total_bayar, $metode_pembayaran);

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
