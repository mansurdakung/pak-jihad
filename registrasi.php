<?php
include('koneksi.php');
// session_start(); // Mulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $pasword = md5($_POST['password']); // Menggunakan MD5 untuk hashing pasword
    $role = $_POST['role']; // Mendapatkan nilai role dari form

    $sql = "INSERT INTO user (nama, email, nim, prodi, password, role) VALUES ('$nama', '$email', '$nim', '$prodi', '$pasword', '$role')";

    if ($koneksi->query($sql) === TRUE) {
        // Setelah registrasi berhasil, langsung login
        $last_id = $koneksi->insert_id;
        $_SESSION['user_id'] = $last_id;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        
        header("Location: index.php"); // Ganti dengan halaman setelah login
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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

        .container form input[type="text"],
        .container form input[type="email"],
        .container form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .container form select {
            width: 100%;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Registrasi</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nama: <input type="text" name="nama" required><br>
            Email: <input type="email" name="email" required><br>
            NIM: <input type="text" name="nim" required><br>
            Prodi: 
            <select name="Prodi" required>
                <option value="prodi">Sistem Informasi</option>
                <option value="prodi">Teknik Informatika</option>
            </select><br>
             Role: 
            <select name="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" name="Register" value="Register">
        </form>
        <p>Sudah punya akun? <a href="index.php">Login disini</a></p>
    </div>
</body>
</html>
