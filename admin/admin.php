<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

// Ambil jumlah akun user
$query_user = "SELECT COUNT(*) as total_user FROM users";
$result_user = $conn->query($query_user);
$row_user = $result_user->fetch_assoc();
$total_user = $row_user['total_user'];

// Ambil jumlah akun admin
$query_admin = "SELECT COUNT(*) as total_admin FROM users WHERE role = 'admin'";
$result_admin = $conn->query($query_admin);
$row_admin = $result_admin->fetch_assoc();
$total_admin = $row_admin['total_admin'];

// Ambil total akun (user + admin)
$total_akun = $total_user + $total_admin;

// Ambil jumlah pemesanan
$query_pemesanan = "SELECT COUNT(*) as total_pemesanan FROM pemesanan";
$result_pemesanan = $conn->query($query_pemesanan);
$row_pemesanan = $result_pemesanan->fetch_assoc();
$total_pemesanan = $row_pemesanan['total_pemesanan'];

// Ambil jumlah destinasi wisata
$query_destinasi = "SELECT COUNT(*) as total_destinasi FROM destinasi";
$result_destinasi = $conn->query($query_destinasi);
$row_destinasi = $result_destinasi->fetch_assoc();
$total_destinasi = $row_destinasi['total_destinasi'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            list-style: none;
            scroll-behavior: smooth;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: rgb(21, 74, 74);
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .sidebar .nama-logo h1 {
            color: white;
            padding: 20px;
            text-align: center;
        }

        .sidebar ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidebar ul li {
            padding: 20px;
            text-align: center;
        }

        .sidebar ul li a {
            color: white;
            font-size: 18px;
            transition: ease 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: white;
            color: rgb(21, 74, 74);
            border-radius: 5px;
        }

        /* Search Bar Area */
        .search-area {
            margin-left: 260px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .search-area input {
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 20px;
            width: 300px;
        }

        .search-area .btn {
            padding: 10px 20px;
            background-color: rgb(21, 74, 74);
            color: white;
            border-radius: 20px;
            transition: ease 0.3s;
        }

        .search-area .btn:hover {
            background-color: white;
            color: rgb(21, 74, 74);
            border: 1px solid rgb(21, 74, 74);
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 20px;
            background-color: #f5f5f5;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 5px 10px 30px rgba(0, 0, 0, 0.1);
            transition: ease 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 5px 10px 30px rgba(0, 0, 0, 0.2);
        }

        .card h1 {
            color: rgb(21, 74, 74);
            font-size: 48px;
        }

        .card h3 {
            color: #555;
            font-size: 18px;
        }
        /* Card Colors */
        .card:nth-child(1) { background: #ff7675; }  
        .card:nth-child(2) { background: #1dd1a1; }  
        .card:nth-child(3) { background: #54a0ff; }  
        .card:nth-child(4) { background: #ff9f43; }  
        .card:nth-child(5) { background: #00d2d3; }  

        /* Footer */
        footer {
            margin-left: 260px;
            padding: 20px;
            background-color: rgb(21, 74, 74);
            color: white;
            text-align: center;
        }

        /* Navbar (Similar to User's Page) */
        nav {
            margin-left: 260px;
            padding: 10px 20px;
            background-color: rgb(21, 74, 74);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            transition: ease 0.3s;
        }

        nav ul li a:hover {
            background-color: white;
            color: rgb(21, 74, 74);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="nama-logo">
            <h1>ADMIN</h1>
        </div>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="tambah.php">Destinasi</a></li>
            <li><a href="data_pemesanan.php">Pemesanan</a></li>
            <li><a href="data_pembayaran.php">Pembayaran</a></li>
        </ul>
    </div>

    <!-- Search Bar Area -->
    <div class="search-area">
        <input type="text" placeholder="Search...">
        <a href="/project_PA/publik/index.php" class="btn">Log Out</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="cards">
        <div class="card">
            <h1><?php echo $total_pemesanan; ?></h1>
            <h3>Pemesanan</h3>
        </div>
        <div class="card">
            <h1><?php echo $total_destinasi; ?></h1>
            <h3>Destinasi Wisata</h3>
        </div>
        <div class="card">
            <h1><?php echo $total_admin; ?></h1>
            <h3>Akun Admin</h3>
        </div>
        <div class="card">
            <h1><?php echo $total_user; ?></h1>
            <h3>Akun User</h3>
        </div>
        <div class="card">
            <h1><?php echo $total_akun; ?></h1>
            <h3>Total Akun</h3>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>