<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Paket - Firstflight Travels</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <section class="booking">
        <div class="booking-form">
            <h1>Formulir Pemesanan</h1>
            <form action="process_booking.php" method="POST">
                <input type="text" name="name" placeholder="Nama Anda" required>
                <input type="email" name="email" placeholder="Email Anda" required>
                <input type="text" name="phone" placeholder="Nomor Telepon" required>
                <select name="package" required>
                    <option value="">Pilih Paket</option>
                    <option value="bronze">Paket Bronze</option>
                    <option value="silver">Paket Silver</option>
                    <option value="gold">Paket Gold</option>
                    <option value="platinum">Paket Platinum</option>
                </select>
                <input type="date" name="date" placeholder="Tanggal Keberangkatan" required>
                <textarea name="message" cols="30" rows="5" placeholder="Catatan Tambahan"></textarea>
                <input type="submit" value="Pesan Sekarang">
            </form>
        </div>
    </section>

</body>
</html>
