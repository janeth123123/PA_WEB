<?php
// Cek apakah form pemesanan hotel telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitasi input
    $nama_pemesan = filter_input(INPUT_POST, 'nama_pemesan', FILTER_SANITIZE_STRING);
    $nomor_telepon = filter_input(INPUT_POST, 'nomor_telepon', FILTER_SANITIZE_STRING);
    $nama_hotel = filter_input(INPUT_POST, 'nama_hotel', FILTER_SANITIZE_STRING);
    $tanggal_checkin = filter_input(INPUT_POST, 'tanggal_checkin', FILTER_SANITIZE_STRING);
    $jumlah_kamar = filter_input(INPUT_POST, 'jumlah_kamar', FILTER_SANITIZE_NUMBER_INT);
} else {
    // Nilai default kosong jika belum disubmit
    $nama_pemesan = '';
    $nomor_telepon = '';
    $nama_hotel = '';
    $tanggal_checkin = '';
    $jumlah_kamar = '';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran Hotel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('/project_PA/asset/pembayaran_hotel.jpg'); 
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            color: #333;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.6);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin: 20px auto;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .booking-details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .booking-details h3 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
        }

        input[type="text"], 
        input[type="number"], 
        input[type="tel"], 
        input[type="date"], 
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            background-color: #fff;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, 
        input[type="number"]:focus, 
        input[type="tel"]:focus, 
        input[type="date"]:focus, 
        select:focus {
            background-color: rgba(255, 255, 255, 0.6);
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.6);
        }

        .submit-btn {
            background-color: #2ecc71;
            background-color: rgb(21, 74, 74);
            padding: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: rgba(128, 128, 128, 0.6);
        }

        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .form-container {
                padding: 20px;
                margin: 10px;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Form Pembayaran Hotel</h2>

    <div class="booking-details">
        <h3>Detail Pemesanan</h3>
        <p><strong>Nama Pemesan:</strong> <?php echo htmlspecialchars($nama_pemesan); ?></p>
        <p><strong>Nomor Telepon:</strong> <?php echo htmlspecialchars($nomor_telepon); ?></p>
        <p><strong>Nama Hotel:</strong> <?php echo htmlspecialchars($nama_hotel); ?></p>
        <p><strong>Tanggal Check-in:</strong> <?php echo htmlspecialchars($tanggal_checkin); ?></p>
        <p><strong>Jumlah Kamar:</strong> <?php echo htmlspecialchars($jumlah_kamar); ?></p>
    </div>

    <form action="proses_pembayaran_hotel.php" method="POST" id="paymentForm" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="nomor_kartu">Nomor Kartu Kredit/Debit:</label>
            <input type="text" id="nomor_kartu" name="nomor_kartu" required 
                   pattern="[0-9]{16}" maxlength="16" 
                   placeholder="Masukkan 16 digit nomor kartu">
            <span class="error" id="nomor_kartu_error"></span>
        </div>

        <div class="form-group">
            <label for="nama_pemegang_kartu">Nama Pemegang Kartu:</label>
            <input type="text" id="nama_pemegang_kartu" name="nama_pemegang_kartu" required
                   pattern="[A-Za-z\s]+" placeholder="Masukkan nama sesuai kartu">
            <span class="error" id="nama_pemegang_kartu_error"></span>
        </div>

        <div class="form-group">
            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa (MM/YY):</label>
            <input type="text" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" required
                   pattern="(0[1-9]|1[0-2])\/([0-9]{2})" maxlength="5" 
                   placeholder="MM/YY">
            <span class="error" id="tanggal_kadaluarsa_error"></span>
        </div>

        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="number" id="cvv" name="cvv" required
                   min="100" max="999" placeholder="3 digit CVV">
            <span class="error" id="cvv_error"></span>
        </div>

        <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="">Pilih Metode Pembayaran</option>
                <option value="kartu_kredit">Kartu Kredit</option>
                <option value="kartu_debit">Kartu Debit</option>
                <option value="transfer_bank">Transfer Bank</option>
                <option value="dompet_digital">Dompet Digital</option>
            </select>
            <span class="error" id="metode_pembayaran_error"></span>
        </div>

        <button type="submit" class="submit-btn">Bayar Sekarang</button>
    </form>
</div>

<script>
function validateForm() {
    let isValid = true;
    const errors = {
        nomor_kartu: '',
        nama_pemegang_kartu: '',
        tanggal_kadaluarsa: '',
        cvv: '',
        metode_pembayaran: ''
    };

    // Validasi nomor kartu
    const nomorKartu = document.getElementById('nomor_kartu').value;
    if (!/^[0-9]{16}$/.test(nomorKartu)) {
        errors.nomor_kartu = 'Nomor kartu harus 16 digit angka';
        isValid = false;
    }

    // Validasi nama pemegang kartu
    const namaPemegangKartu = document.getElementById('nama_pemegang_kartu').value;
    if (!/^[A-Za-z\s]+$/.test(namaPemegangKartu)) {
        errors.nama_pemegang_kartu = 'Nama hanya boleh berisi huruf dan spasi';
        isValid = false;
    }

    // Validasi tanggal kadaluarsa
    const tanggalKadaluarsa = document.getElementById('tanggal_kadaluarsa').value;
    if (!/^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(tanggalKadaluarsa)) {
        errors.tanggal_kadaluarsa = 'Format tanggal harus MM/YY';
        isValid = false;
    }

    // Validasi CVV
    const cvv = document.getElementById('cvv').value;
    if (!/^[0-9]{3}$/.test(cvv)) {
        errors.cvv = 'CVV harus 3 digit angka';
        isValid = false;
    }

    // Tampilkan pesan error
    for (const field in errors) {
        document.getElementById(`${field}_error`).textContent = errors[field];
    }

    return isValid;
}

// Format input tanggal kadaluarsa otomatis
document.getElementById('tanggal_kadaluarsa').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length >= 2) {
        value = value.slice(0,2) + '/' + value.slice(2);
    }
    e.target.value = value.slice(0,5);
});
</script>

</body>
</html>