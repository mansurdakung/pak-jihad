<?php
include 'config.php';

$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$id_penulis = $_POST['id_penulis'];
$id_penerbit = $_POST['id_penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];

$sql = "UPDATE buku SET judul='$judul', id_penulis='$id_penulis', id_penerbit='$id_penerbit', tahun_terbit='$tahun_terbit' WHERE id_buku='$id_buku'";

if ($conn->query($sql) === TRUE) {
    echo "Data buku berhasil diupdate!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
