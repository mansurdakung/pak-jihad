<?php
include '../koneksi.php'; // Pastikan koneksi database Anda sesuai dengan path ini

// Mendapatkan kode penerbit dari query string
if (isset($_GET['kodepenerbit'])) {
    $kodepenerbit = $_GET['kodepenerbit'];

    // Query untuk mendapatkan data penerbit
    $sql = "SELECT * FROM penerbit WHERE kodepenerbit = ?";
    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param("s", $kodepenerbit);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $namapenerbit = $row['namapenerbit'];
            $alamatpenerbit = $row['alamatpenerbit'];
            $tlppenerbit = $row['tlppenerbit'];
        } else {
            die("Data tidak ditemukan.");
        }

        $stmt->close();
    } else {
        die("Error preparing statement: " . $koneksi->error);
    }
} else {
    die("Kode penerbit tidak diset.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $namapenerbit = $_POST['namapenerbit'];
    $alamatpenerbit = $_POST['alamatpenerbit'];
    $tlppenerbit = $_POST['tlppenerbit'];

    // Query untuk memperbarui data
    $sql = "UPDATE penerbit SET namapenerbit = ?, alamatpenerbit = ?, tlppenerbit = ? WHERE kodepenerbit = ?";
    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param("ssss", $namapenerbit, $alamatpenerbit, $tlppenerbit, $kodepenerbit);

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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerbit</title>
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
            <h2 class="mb-4">Edit Penerbit</h2>
            <?php if (isset($error_message)) : ?>
                <div class="alert alert-danger error-message">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>
            <form action="form_edit.php?kodepenerbit=<?= htmlspecialchars($kodepenerbit) ?>" method="post">
                <div class="form-group">
                    <label for="namapenerbit">Nama Penerbit</label>
                    <input type="text" class="form-control form-control-sm" id="namapenerbit" name="namapenerbit" value="<?= htmlspecialchars($namapenerbit) ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamatpenerbit">Alamat Penerbit</label>
                    <textarea class="form-control form-control-sm" id="alamatpenerbit" name="alamatpenerbit" rows="2" required><?= htmlspecialchars($alamatpenerbit) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="tlppenerbit">Telp. Penerbit</label>
                    <input type="text" class="form-control form-control-sm" id="tlppenerbit" name="tlppenerbit" value="<?= htmlspecialchars($tlppenerbit) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="data_penerbit.php" class="btn btn-secondary btn-sm">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
