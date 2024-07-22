<?php
include '../koneksi.php'; // Pastikan path ini sesuai dengan file koneksi database Anda

// Proses penyimpanan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $kodepenerbit = $_POST['kodepenerbit'];
    $namapenerbit = $_POST['namapenerbit'];
    $alamatpenerbit = $_POST['alamatpenerbit'];
    $tlppenerbit = $_POST['tlppenerbit'];

    // Validasi data (opsional, bisa ditambahkan sesuai kebutuhan)

    // Query untuk menambahkan data
    $sql = "INSERT INTO penerbit (kodepenerbit, namapenerbit, alamatpenerbit, tlppenerbit) VALUES (?, ?, ?, ?)";

    // Menyiapkan dan menjalankan query
    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param("ssss", $kodepenerbit, $namapenerbit, $alamatpenerbit, $tlppenerbit);

        if ($stmt->execute()) {
            // Redirect ke halaman utama setelah sukses
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error_message = "Error preparing statement: " . $koneksi->error;
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background: #ffffff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        .form-container h2 {
            font-size: 1.5rem;
        }
        .form-group label {
            font-size: 0.875rem;
        }
        .form-group input,
        .form-group textarea {
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }
        .btn {
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }
        .error-message {
            color: red;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <h2 class="mb-4">Tambah Penerbit</h2>
            <?php if (isset($error_message)) : ?>
                <div class="alert alert-danger error-message">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>
            <form action="data_penerbit.php" method="post">
                <div class="form-group">
                    <label for="kodepenerbit">Kode Penerbit</label>
                    <input type="text" class="form-control form-control-sm" id="kodepenerbit" name="kodepenerbit" required>
                </div>
                <div class="form-group">
                    <label for="namapenerbit">Nama Penerbit</label>
                    <input type="text" class="form-control form-control-sm" id="namapenerbit" name="namapenerbit" required>
                </div>
                <div class="form-group">
                    <label for="alamatpenerbit">Alamat Penerbit</label>
                    <textarea class="form-control form-control-sm" id="alamatpenerbit" name="alamatpenerbit" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tlppenerbit">Telp. Penerbit</label>
                    <input type="text" class="form-control form-control-sm" id="tlppenerbit" name="tlppenerbit" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="index.php" class="btn btn-secondary btn-sm">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
