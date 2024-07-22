<?php
include '../koneksi.php';

if (isset($_GET['kodepenulisan'])) {
    $kodepenulisan = $_GET['kodepenulisan'];

    // Tambahkan debugging
    echo "<div class='alert alert-info'>DEBUG: kodepenulisan = $kodepenulisan</div>";

    // Step 1: Delete dependent rows in the detailtransaksi table
    $deleteDetailTransaksiSql = "
        DELETE detailtransaksi 
        FROM detailtransaksi 
        JOIN buku ON detailtransaksi.kodebuku = buku.kodebuku 
        WHERE buku.kodepenulis = '$kodepenulisan'
    ";
    if ($koneksi->query($deleteDetailTransaksiSql) === TRUE) {
        echo "<div class='alert alert-info'>Dependent rows in detailtransaksi table deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting dependent rows in detailtransaksi: " . $koneksi->error . "</div>";
        $koneksi->close();
        exit();
    }

    // Step 2: Delete dependent rows in the buku table
    $deleteBukuSql = "DELETE FROM buku WHERE kodepenulis='$kodepenulisan'";
    if ($koneksi->query($deleteBukuSql) === TRUE) {
        echo "<div class='alert alert-info'>Dependent rows in buku table deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting dependent rows in buku: " . $koneksi->error . "</div>";
        $koneksi->close();
        exit();
    }

    // Step 3: Delete the record from the penulis table
    $deletePenulisSql = "DELETE FROM penulis WHERE kodepenulisan='$kodepenulisan'";
    if ($koneksi->query($deletePenulisSql) === TRUE) {
        echo "<div class='alert alert-success'>Record deleted successfully</div>";
        header("Location: data_penulis.php"); // Redirect ke halaman data penulis setelah penghapusan
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $deletePenulisSql . "<br>" . $koneksi->error . "</div>";
    }

    $koneksi->close();
} else {
    echo "<div class='alert alert-warning'>Kode penulisan tidak ditemukan.</div>";
}
?>
