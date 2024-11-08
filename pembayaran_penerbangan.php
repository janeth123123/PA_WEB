<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // You can store these values in variables if needed
    $nama_pemesan = $_POST['nama_pemesan'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $asal_penerbangan = $_POST['asal_penerbangan'];
    $tujuan_penerbangan = $_POST['tujuan_penerbangan'];
    $tanggal_berangkat = $_POST['tanggal_berangkat'];
    $jumlah_penumpang = $_POST['jumlah_penumpang'];
} else {
    // Default empty values if not submitted
    $nama_pemesan = '';
    $nomor_telepon = '';
    $asal_penerbangan = '';
    $tujuan_penerbangan = '';
    $tanggal_berangkat = '';
    $jumlah_penumpang = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran Penerbangan</title>
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
        input[type="number"], 
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
    <h2>Form Pembayaran Penerbangan</h2>

    <form action="proses_pembayaran_penerbangan.php" method="POST">
        <label for="nama_pemesan">Nama Pemesan:</label>
        <input type="text" id="nama_pemesan" name="nama_pemesan" value="<?php echo htmlspecialchars($nama_pemesan); ?>" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" value="<?php echo htmlspecialchars($nomor_telepon); ?>" required>

        <label for="asal_penerbangan">Asal Penerbangan:</label>
        <input type="text" id="asal_penerbangan" name="asal_penerbangan" value="<?php echo htmlspecialchars($asal_penerbangan); ?>" required>

        <label for="tujuan_penerbangan">Tujuan Penerbangan:</label>
        <input type="text" id="tujuan_penerbangan" name="tujuan_penerbangan" value="<?php echo htmlspecialchars($tujuan_penerbangan); ?>" required>

        <label for="tanggal_berangkat">Tanggal Berangkat:</label>
        <input type="date" id="tanggal_berangkat" name="tanggal_berangkat" value="<?php echo htmlspecialchars($tanggal_berangkat); ?>" required>

        <label for="jumlah_penumpang">Jumlah Penumpang:</label>
        <input type="number" id="jumlah_penumpang" name="jumlah_penumpang" value="<?php echo htmlspecialchars($jumlah_penumpang); ?>" min="1" required>

        <label for="total_bayar">Total Pembayaran:</label>
        <input type="number" id="total_bayar" name="total_bayar" min="1" required>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select id="metode_pembayaran" name="metode_pembayaran" required>
            <option value="">Pilih Metode Pembayaran</option>
            <option value="kartu_kredit">Kartu Kredit</option>
            <option value="transfer_banking">Transfer Bank</option>
            <option value="dompet_digital">Dompet Digital</option>
        </select>

        <input type="submit" value="Bayar Sekarang">
    </form>
</div>

</body>
</html>
