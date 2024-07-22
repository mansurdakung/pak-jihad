<?php
include 'config.php';

$judul = $_POST['judul'];
$id_penulis = $_POST['id_penulis'];
$id_penerbit = $_POST['id_penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];

$sql = "INSERT INTO buku (judul, id_penulis, id_penerbit, tahun_terbit) VALUES ('$judul', '$id_penulis', '$id_penerbit', '$tahun_terbit')";

if ($conn->query($sql) === TRUE) {
    echo "Data buku berhasil ditambahkan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
