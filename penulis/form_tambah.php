<?php
include '../koneksi.php';

// Function to escape input to prevent SQL injection
function escapeInput($value) {
    global $koneksi;
    return $koneksi->real_escape_string(trim($value)); // Trim to remove unwanted whitespace
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['kodepenulisan'], $_POST['namapenulis'], $_POST['alamatpenulis'], $_POST['telppenulis'])) {
        $kodepenulisan = escapeInput($_POST['kodepenulisan']);
        $namapenulis = escapeInput($_POST['namapenulis']);
        $alamatpenulis = escapeInput($_POST['alamatpenulis']);
        $telppenulis = escapeInput($_POST['telppenulis']);

        // Insert new record
        $sql = "INSERT INTO penulis (kodepenulisan, namapenulis, alamatpenulis, telppenulis) 
                VALUES ('$kodepenulisan', '$namapenulis', '$alamatpenulis', '$telppenulis')";

        if ($koneksi->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>New record created successfully</div>";
            header("Location: data_penulis.php"); // Redirect to the data penulis page after insertion
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error: " . $koneksi->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Required fields are missing.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penulis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px; /* Limit container width */
        }
        .form-group label {
            font-size: 0.9rem; /* Smaller label font */
        }
        .form-control {
            font-size: 0.9rem; /* Smaller input font */
        }
        .btn {
            font-size: 0.8rem; /* Smaller button font */
        }
        .alert {
            font-size: 0.9rem; /* Smaller alert font */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Tambah Penulis</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="kodepenulisan">Kode Penulisan</label>
                <input type="text" class="form-control" id="kodepenulisan" name="kodepenulisan" required>
            </div>
            <div class="form-group">
                <label for="namapenulis">Nama Penulis</label>
                <input type="text" class="form-control" id="namapenulis" name="namapenulis" required>
            </div>
            <div class="form-group">
                <label for="alamatpenulis">Alamat Penulis</label>
                <input type="text" class="form-control" id="alamatpenulis" name="alamatpenulis" required>
            </div>
            <div class="form-group">
                <label for="telppenulis">Telp. Penulis</label>
                <input type="text" class="form-control" id="telppenulis" name="telppenulis" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

<?php
$koneksi->close();
?>
