-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2024 pada 11.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `id_destinasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`id_destinasi`, `nama`, `lokasi`, `deskripsi`, `harga`, `gambar`) VALUES
(14, 'De Pier', 'Belanda', 'De Pier ini menawarkan pemandangan menakjubkan di sepanjang pantai Laut Utara, serta berbagai fasilitas seperti restoran, kafe, wahana, dan toko-toko yang menarik. Pengunjung dapat menikmati suasana santai sambil berjalan-jalan di atas dermaga, atau mencoba berbagai aktivitas seru, termasuk bungee jumping dan bersepeda di sepanjang tepi laut. De Pier juga memiliki pemandangan matahari terbenam yang indah, menjadikannya tempat yang sempurna untuk menikmati keindahan alam Belanda.', 10, '672de814e2120.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_hotel`
--

CREATE TABLE `pembayaran_hotel` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `nominal_pembayaran` decimal(10,2) NOT NULL,
  `metode_pembayaran` enum('kartu_kredit','transfer_banking','dompet_digital') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran_hotel`
--

INSERT INTO `pembayaran_hotel` (`id`, `nama_pemesan`, `nomor_telepon`, `nama_hotel`, `tanggal_checkin`, `jumlah_kamar`, `nominal_pembayaran`, `metode_pembayaran`) VALUES
(5, '', '', '', '0000-00-00', 0, 0.00, 'kartu_kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_penerbangan`
--

CREATE TABLE `pembayaran_penerbangan` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `asal_penerbangan` varchar(255) NOT NULL,
  `tujuan_penerbangan` varchar(255) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `metode_pembayaran` enum('kartu_kredit','transfer_banking','dompet_digital') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran_penerbangan`
--

INSERT INTO `pembayaran_penerbangan` (`id_pembayaran`, `nama_pemesan`, `nomor_telepon`, `asal_penerbangan`, `tujuan_penerbangan`, `tanggal_berangkat`, `jumlah_penumpang`, `total_bayar`, `metode_pembayaran`) VALUES
(3, 'Hyra', '081244849119', 'samarinda', 'Bali', '2025-08-11', 1, 2000000.00, 'kartu_kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'novi', '$2y$10$KXNFj4P/XSPvmUv2OZ9tE.mdq4XIMPxKVavHO5zlzIC3RJhIqjKg2', 'admin'),
(2, 'hyra', '$2y$10$M5cowC3xruiEHE6q5URkQeq7m80FpE9Oci7smCxB.sZ9wmDgwxqN6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id_destinasi`);

--
-- Indeks untuk tabel `pembayaran_hotel`
--
ALTER TABLE `pembayaran_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran_penerbangan`
--
ALTER TABLE `pembayaran_penerbangan`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_hotel`
--
ALTER TABLE `pembayaran_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_penerbangan`
--
ALTER TABLE `pembayaran_penerbangan`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
