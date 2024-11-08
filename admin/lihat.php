<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php'; 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Destinasi Wisata</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/project_PA/asset/lihat.jpg'); 
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

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
            margin-bottom: 30px;
            font-size: 24px;
            letter-spacing: 2px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
            text-align: center;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #575757;
        }

        .content-area {
            margin-left: 20vw;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1); 
            min-height: 100vh;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: rgb(21, 74, 74);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: rgb(21, 74, 74);
            color: white;
        }

        table td {
            color: #333;
        }

        .btn-edit {
            background-color: #54a0ff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-delete {
            background-color: #ff6b6b;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>ADMIN</h1>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="tambah.php">Tambah Data</a></li>
        </ul>
    </div>

<?php
// Menjalankan query untuk mengambil data destinasi
$query = "SELECT * FROM destinasi"; 
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<div class="content-area">
    <h2>Daftar Destinasi Wisata</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Destinasi</th>
                <th>Lokasi</th>
                <th>Harga Tiket</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($destinasi = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $destinasi['nama'] . "</td>";
                    echo "<td>" . $destinasi['lokasi'] . "</td>";
                    echo "<td>Rp " . number_format($destinasi['harga'], 0, ',', '.') . "</td>";
                    echo "<td>";
                        // Menampilkan gambar jika ada
                        if (!empty($destinasi['gambar'])) {
                            echo "<img src='/project_PA/admin/uploads/" . $destinasi['gambar'] . "' alt='Gambar destinasi' width='100'>";
                        } else {
                            echo "Tidak ada gambar";
                        }
                    echo "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $destinasi['id_destinasi'] . "' class='btn-edit'>Edit</a>
                            <a href='hapus.php?id=" . $destinasi['id_destinasi'] . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus destinasi ini?\")'>Hapus</a>
                        </td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data destinasi.</td></tr>";
            }   
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
