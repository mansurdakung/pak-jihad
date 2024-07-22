<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Sebaiknya gunakan password_hash dan password_verify untuk keamanan yang lebih baik

    // Mencegah SQL Injection dengan prepared statements
    $stmt = $connect->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        if ($password == $data['password']) {
            $_SESSION['email'] = $data['email'];
            $_SESSION['name'] = $data['nama'];

            if ($data['role'] == 'admin') {
                header('Location: perpustakaan');
                exit();
            } else {
                header('Location: data-request.php?email=' . $data['email']);
                exit();
            }
        } else {
            echo "<script>alert('Password Salah atau belum diisi');</script>";
            echo "<script>window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Username tidak terdaftar');</script>";
        echo "<script>window.history.back();</script>";
    }
    $stmt->close();
}
?>
