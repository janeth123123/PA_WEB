<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Hotel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/project_PA/asset/pemesanan.jpg'); 
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
    <h2>Form Pemesanan Hotel</h2>

    <form action="pembayaran_hotel.php" method="POST">
        <label for="nama_pemesan">Nama Pemesan:</label>
        <input type="text" id="nama_pemesan" name="nama_pemesan" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" required>

        <label for="nama_hotel">Nama Hotel:</label>
        <input type="text" id="nama_hotel" name="nama_hotel" required>

        <label for="tanggal_checkin">Tanggal Check-in:</label>
        <input type="date" id="tanggal_checkin" name="tanggal_checkin" required>

        <label for="jumlah_kamar">Jumlah Kamar:</label>
        <input type="number" id="jumlah_kamar" name="jumlah_kamar" min="1" required>

        <input type="submit" value="Pesan Hotel">
    </form>
</div>

</body>
</html>
