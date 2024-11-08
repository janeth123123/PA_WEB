<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travels</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

<!-- Video Latar Belakang & Header -->

<div class="banner">
    <video src="/project_PA/asset/admin.mp4" type="video/mp4" autoplay muted loop></video>

    <!-- Header -->

    <div class="content" id="home"> 
        <nav>
            <img src="/project_PA/asset/logo-white.png" class="logo" alt="Logo" title="FirstFlight Travels">
            <ul class="navbar">
                <li>
                    <a href="#home">Beranda</a>
                    <a href="#locations">Lokasi</a>
                    <a href="/project_PA/user/lihat_destinasi.php">Destinasi Wisata</a>
                    <a href="/project_PA/user/pemesanan.php">Pemesanan</a>
                    <a href="contact.html">Kontak Kami</a>
                    <a href="/project_PA/publik/index.php">Log Out</a>
                </li>
            </ul>
        </nav>
 
        <div class="title">
            <h1>TRAVEL</h1>
            <p>Rencanakan perjalanan Anda bersama kami dan jelajahi dunia </p>
        </div>
    </div>
</div>

<!-- Layanan -->

<section class="container">
    <div class="text">
        <h2>Kami memiliki layanan terbaik untuk Anda!</h2>
    </div>
    <div class="rowitems">
        <div class="container-box">
            <div class="container-image">
                <img src="/project_PA/asset/1a.jpg" alt="Layanan Penerbangan">
            </div>
            <h4>Layanan Penerbangan</h4>
            <p>Kedatangan dan Keberangkatan</p>
        </div>

        <div class="container-box">
            <div class="container-image">
                <img src="/project_PA/asset/3a.jpg" alt="Layanan Perjalanan">
            </div>
            <h4>Layanan Perjalanan</h4>
            <p>Penjemputan/Antar</p>
        </div>

        <div class="container-box">
            <div class="container-image">
                <img src="/project_PA/asset/4a.jpg" alt="Layanan Hotel">
            </div>
            <h4>Layanan Hotel</h4>
            <p>Check-in/check-out</p>
        </div>
    </div>
</section>

<!-- Lokasi -->

<section class="locations" id="locations">
    <div class="package-title">
        <h2>Lokasi</h2>
    </div>

    <div class="location-content">
        <a href="./locations.html#kashmir" target="_blank"><div class="col-content">
            <img src="/project_PA/asset/l1.jpg" alt="">
            <h5>India</h5>
            <p>Kashmir</p>
        </div></a>

        <a href="./locations.html#istanbul" target="_blank"><div class="col-content">
            <img src="/project_PA/asset/l2.jpg" alt="">
            <h5>Turki</h5>
            <p>Istanbul</p>
        </div></a>

        <a href="./locations.html#paris" target="_blank"><div class="col-content">
            <img src="/project_PA/asset/swiss.jpg" alt="">
            <h5>Switzerland</h5>
            <p>Wasserauen</p>
        </div></a>

        <a href="./locations.html#bali" target="_blank"><div class="col-content">
            <img src="/project_PA/asset/l4.jpg" alt="">
            <h5>Indonesia</h5>
            <p>Bali</p>
        </div></a>
    </div>
</section>

<!-- Paket -->

<section class="package" id="package">
    <div class="package-title">
        <h2>Paket</h2>
    </div>

    <div class="package-content">
        <div class="box">
            <div class="image">
                <img src="/project_PA/asset/p1.jpg" alt="">
            </div>
            <div class="dest-content">
                <div class="location">
                    <h4>Bronze</h4>
                    <ul class="pac-details">
                        <li>Hotel Bintang 2</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="/project_PA/asset/p2.jpg" alt="">
            </div>
            <div class="dest-content">
                <div class="location">
                    <h4>Silver</h4>
                    <ul class="pac-details">
                        <li>Hotel Bintang 3</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="/project_PA/asset/p3.jpg" alt="">
            </div>
            <div class="dest-content">
                <div class="location">
                    <h4>Gold</h4>
                    <ul class="pac-details">
                        <li>Hotel Bintang 4</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->

<section class="footer">
    <div class="foot">
        <div class="footer-content">
            <div class="footlinks">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="./register.php">Daftar</a></li>
                    <li><a href="./about.html">Tentang Kami</a></li>
                    <li><a href="./contact.html">Kontak Kami</a></li>
                </ul>
            </div>
            <div class="footlinks">
                <h4>Hubungi Kami</h4>
                <div class="social">
                    <a href="" target="_blank"><i class='bx bxl-facebook'></i></a>
                    <a href="" target="_blank"><i class='bx bxl-instagram'></i></a>
                    <a href="" target="_blank"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
