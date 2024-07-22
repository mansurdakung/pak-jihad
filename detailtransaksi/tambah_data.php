<?php
include '../koneksi.php';

// Proses input form jika ada data POST yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form
    $kodetransaksi = $_POST['kodetransaksi'];
    $kodebuku = $_POST['kodebuku'];
    $tglpinjam = $_POST['tglpinjam'];
    $jumlahbuku = $_POST['jumlahbuku'];
    $status = $_POST['status'];
    $tglkembali = $_POST['tglkembali'];

    // Query SQL untuk menyimpan data ke dalam tabel detailtransaksi
    $sql = "INSERT INTO detailtransaksi (kodetransaksi, kodebuku, tglpinjam, jumlahbuku, status, tglkembali) 
            VALUES ('$kodetransaksi', '$kodebuku', '$tglpinjam', '$jumlahbuku', '$status', '$tglkembali')";

    // Eksekusi query dan periksa hasilnya
    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Record added successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }

    // Tutup koneksi database
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-size: 0.9rem; /* Mengurangi ukuran font */
        }
        .container {
            max-width: 500px; /* Mengatur lebar maksimum container */
            padding: 15px; /* Mengurangi padding di container */
        }
        .form-group label {
            font-size: 0.8rem; /* Mengurangi ukuran font label */
        }
        .form-control {
            font-size: 0.9rem; /* Mengurangi ukuran font input */
        }
        .btn {
            font-size: 0.8rem; /* Mengurangi ukuran font tombol */
            padding: 5px 10px; /* Mengurangi padding tombol */
        }
        .header-title {
            color: #007bff; /* Warna biru untuk tulisan */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4 header-title">Tambah Data Transaksi</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="kodetransaksi">Kode Transaksi</label>
                <input type="text" id="kodetransaksi" name="kodetransaksi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kodebuku">Kode Buku</label>
                <input type="text" id="kodebuku" name="kodebuku" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tglpinjam">Tanggal Pinjam</label>
                <input type="date" id="tglpinjam" name="tglpinjam" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlahbuku">Jumlah Buku</label>
                <input type="number" id="jumlahbuku" name="jumlahbuku" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" name="status" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tglkembali">Tanggal Kembali</label>
                <input type="date" id="tglkembali" name="tglkembali" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
