<?php
include 'config.php';

$id_buku = $_GET['id_buku'];

$sql = "DELETE FROM buku WHERE id_buku='$id_buku'";

if ($conn->query($sql) === TRUE) {
    echo "Data buku berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
