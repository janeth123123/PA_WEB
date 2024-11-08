<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Pesawat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/project_PA/asset/pemesanan_penerbangan.jpg'); 
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.6); 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], 
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.6);
        }

        input[type="submit"] {
            background-color: rgb(21, 74, 74);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: rgba(128, 128, 128, 0.6);
        }
    </style>
</head>
<body>

<div class="form-container">

    <form action="pembayaran_penerbangan.php" method="POST">
        <h2>Form Pemesanan Pesawat</h2>

        <label for="nama_pemesan">Nama Pemesan:</label>
        <input type="text" id="nama_pemesan" name="nama_pemesan" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" required>

        <label for="asal_penerbangan">Asal Penerbangan:</label>
        <input type="text" id="asal_penerbangan" name="asal_penerbangan" required>

        <label for="tujuan_penerbangan">Tujuan Penerbangan:</label>
        <input type="text" id="tujuan_penerbangan" name="tujuan_penerbangan" required>

        <label for="tanggal_berangkat">Tanggal Berangkat:</label>
        <input type="date" id="tanggal_berangkat" name="tanggal_berangkat" required>

        <label for="jumlah_penumpang">Jumlah Penumpang:</label>
        <input type="number" id="jumlah_penumpang" name="jumlah_penumpang" min="1" required>

        <input type="submit" value="Pesan Pesawat">
    </form>
</div>

</body>
</html>
