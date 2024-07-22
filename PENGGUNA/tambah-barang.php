<?php
session_start();
include 'config.php';

if(isset($_POST['tambah-barang'])){
    $nama_barang = $_POST['nama_barang'];
    $stok_barang = $_POST['stok_barang'];

    $file_name = str_replace(" ", "_", $_FILES['gambar_barang']['name']);
    $file_size = $_FILES['gambar_barang']['size'];
    $file_type = $_FILES['gambar_barang']['type'];
    $tmp_name = $_FILES['gambar_barang']['tmp_name'];
    $max_size = 2000000;
    $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if(!empty($file_name)){
        if(in_array($extension, ['jpg', 'jpeg', 'gif', 'png']) && 
           in_array($file_type, ['image/jpeg', 'image/png', 'image/gif']) && 
           $file_size <= $max_size){
            $location = "../assets/img/uploads/";
            if (move_uploaded_file($tmp_name, $location . $file_name)) {
                $query = "INSERT INTO tbl_barang (nama_barang, gambar_barang, stok_barang) VALUES ('$nama_barang', '$file_name', '$stok_barang')";
                if(mysqli_query($conn, $query)){
                    echo "<script>alert('Berhasil Ditambahkan');</script>";
                    echo "<script>window.location='index.php';</script>";
                } else {
                    echo "<script>alert('Gagal Ditambahkan ke Database');</script>";
                }
            } else {
                echo "<script>alert('Gagal Upload ke direktori');</script>";
            }
        } else {
            echo "<script>alert('Bukan file gambar dan/atau melebihi batas ukuran');</script>";
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Tambah Buku</title>
    <meta name="description" content="Admin - Tambah Barang">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        #right-panel {
            padding: 50px;
        }

        .content {
            background: #fff;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        .card {
            border: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #007bff;
            color: #fff;
            padding: 20px;
            border-bottom: 1px solid #007bff;
            border-radius: 4px 4px 0 0;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-control {
            border: 2px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }

        .btn {
            border: none;
            border-radius: 4px;
            padding: 8px 15px;
            cursor: pointer;
        }

        .btn-success {
            background: #28a745;
            color: #fff;
        }

        .btn i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div id="right-panel" class="right-panel">
        <div class="content mt-3">
            <div class="card">
                <div class="card-header"><strong>Tambah Data Buku</strong></div>
                <form class="card-body card-block" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama" class="form-control-label">Nama Buku</label>
                        <input type="text" id="nama" name="nama_barang" placeholder="contoh: Buku Sejarah Islam" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="gambar" class="form-control-label">Upload Foto Buku</label>
                        <input type="file" id="gambar" name="gambar_barang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stok" class="form-control-label">Jumlah Buku</label>
                        <input type="number" id="stok" name="stok_barang" placeholder="contoh: 40" class="form-control"> 
                    </div>
                    <button type="submit" class="btn btn-success" name="tambah-barang">
                        <i class="fa fa-check"></i> Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
