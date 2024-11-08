<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi Wisata</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('/project_PA/asset/tambah.jpg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            min-height: 100vh;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: rgb(21, 74, 74);
            color: #fff;
            padding-top: 30px;
            position: fixed;
            height: 100%;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
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
            font-size: 18px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            transition: ease 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #fff;
            color: rgb(21, 74, 74);
            border-radius: 5px;
        }

        /* Content Area */
        .content-area {
            margin-left: 260px;
            padding: 20px;
            flex-grow: 1;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Form Style */
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.6); 
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: rgb(21, 74, 74);
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 10px 20px;
            background-color: rgb(21, 74, 74);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: ease 0.3s;
        }

        button:hover {
            background-color: #fff;
            color: rgb(21, 74, 74);
            border: 1px solid rgb(21, 74, 74);
        }

        .form-group {
            margin-bottom: 15px;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content-area {
                margin-left: 0;
            }

            form {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>ADMIN</h1>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="lihat.php">Tampilkan Data</a></li>
        </ul>
    </div>

    <div class="content-area">
        <div class="form-container">
            <h2>Tambah Destinasi Wisata Baru</h2>
            <form action="proses_tambah_wisata.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Destinasi:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi:</label>
                    <input type="text" id="lokasi" name="lokasi" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="harga">Harga Tiket:</label>
                    <input type="number" id="harga" name="harga" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar Destinasi:</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*" required>
                </div>

                <div class="form-group">
                    <button type="submit">Tambah Destinasi</button>
                    <button type="button" onclick="window.location.href='destinasi.php'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
