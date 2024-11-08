<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/project_PA/asset/dashboardAdmin.jpg'); 
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
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
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
    <h2>Form Pemesanan Layanan</h2>

    <form id="formPemesanan" action="proses_pemesanan.php" method="POST">
        <label for="nama_pemesan">Nama Pemesan:</label>
        <input type="text" id="nama_pemesan" name="nama_pemesan" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" required>

        <label for="nama_layanan">Nama Layanan:</label>
        <select id="nama_layanan" name="nama_layanan" required>
            <option value="">Pilih Layanan</option>
            <option value="hotel">Hotel</option>
            <option value="penerbangan">Penerbangan</option>
        </select>

        <label for="tanggal">Tanggal Pemesanan:</label>
        <input type="date" id="tanggal" name="tanggal" required>

        <input type="submit" value="Pesan Sekarang">
    </form>
</div>

<script>
    // Event listener untuk mengarahkan user ke form yang sesuai
    document.getElementById('formPemesanan').addEventListener('submit', function(event) {
        var layanan = document.getElementById('nama_layanan').value;

        if (layanan === 'hotel') {
            event.preventDefault();
            window.location.href = 'pemesanan_hotel.php'; // Arahkan ke form pemesanan hotel
        } else if (layanan === 'penerbangan') {
            event.preventDefault();
            window.location.href = 'pemesanan_penerbangan.php'; // Arahkan ke form pemesanan penerbangan
        }
    });
</script>

</body>
</html>
