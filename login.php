<?php
// Mulai session
session_start();

// Sertakan file koneksi database
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/project_PA/koneksi/db.php';

// Cek apakah form login sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query untuk mencari user berdasarkan username
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Jika password benar, simpan data user ke dalam session
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];  // Misalnya ada kolom role: admin/user

            // Redirect ke halaman sesuai role
            if ($user['role'] == 'admin') {
                header("Location: /project_PA/admin/admin.php"); // Halaman admin
            } else {
                header("Location: /project_PA/user/index.php"); // Halaman user
            }
            exit();
        } else {
            // Jika password salah
            echo "Password salah!";
        }
    } else {
        // Jika username tidak ditemukan
        echo "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('/project_PA/asset/login.jpg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.6); 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .login-container h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-container form {
            width: 100%;
        }

        .login-container input[type="text"], 
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container p {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>

    <div class="register.php">
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>

</body>
</html>
