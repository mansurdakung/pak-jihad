<?php
// session_start();

// Include koneksi ke database
include('../koneksi.php');

// Fungsi untuk memvalidasi form login
function validateLogin($email, $password) {
    // Lakukan validasi data di sini sesuai kebutuhan aplikasi Anda
    // Misalnya, validasi panjang, format email, dll.
    // Return true jika valid, atau false jika tidak valid
    return true; // Contoh sederhana, tidak ada validasi khusus
}

// Proses login jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Menggunakan MD5 untuk hashing password

    // Query untuk mencari pengguna berdasarkan email dan password
    $sql = "SELECT id_user, nama, email, nim, prodi, role FROM user WHERE email = '$email' AND password = '$password'";
    $result = $koneksi->query($sql);

    if ($result === false) {
        echo "Error: " . $koneksi->error;
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            // Redirect ke halaman sesuai dengan role pengguna
            if ($_SESSION['role'] == 'admin') {
                header("Location: ../index.php");
            } else {
                header("Location: ../PENGGUNA/index.php");
            }
            exit();
        } else {
            echo "Email atau password salah!";
        }
    }
}

// $koneksi->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Warna latar belakang */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 300px;
            background-color: #fff;
            padding: 60px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .container form input[type="email"],
        .container form input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .container form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .container form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .container p {
            text-align: center;
            margin-top: 15px;
        }

        .container p a {
            text-decoration: none;
            color: #007bff;
        }

        .container p a:hover {
            text-decoration: underline;
        }

        .container .register-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            display: block;
            width: 88%;
            margin-top: 10px;
        }

        .container .register-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Email: <input type="email" name="email" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
        <a href="../register.php" class="register-btn">Daftar</a>
    </div>
</body>
</html>
