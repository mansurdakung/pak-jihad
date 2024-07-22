<?php
include '../koneksi.php'; // Pastikan koneksi database Anda sesuai dengan path ini

// Mendapatkan kode penerbit dari query string
if (isset($_GET['kodepenerbit'])) {
    $kodepenerbit = $_GET['kodepenerbit'];

    // Query untuk menghapus data
    $sql = "DELETE FROM penerbit WHERE kodepenerbit = ?";
    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param("s", $kodepenerbit);

        if ($stmt->execute()) {
            // Redirect ke halaman utama setelah sukses
            header("Location: data_penerbit.php");
            exit();
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error_message = "Error preparing statement: " . $koneksi->error;
    }

    $koneksi->close();
} else {
    die("Kode penerbit tidak diset.");
}
?>
