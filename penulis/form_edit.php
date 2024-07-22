<?php
include '../koneksi.php';

// Function to escape input to prevent SQL injection
function escapeInput($value) {
    global $koneksi;
    return $koneksi->real_escape_string(trim($value)); // Trim to remove unwanted whitespace
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    if (isset($_POST['kodepenulisan'], $_POST['namapenulis'], $_POST['alamatpenulis'], $_POST['telppenulis'])) {
        $kodepenulisan = escapeInput($_POST['kodepenulisan']);
        $namapenulis = escapeInput($_POST['namapenulis']);
        $alamatpenulis = escapeInput($_POST['alamatpenulis']);
        $telppenulis = escapeInput($_POST['telppenulis']);

        // Update record
        $sql = "UPDATE penulis SET namapenulis='$namapenulis', alamatpenulis='$alamatpenulis', telppenulis='$telppenulis' WHERE kodepenulisan='$kodepenulisan'";

        if ($koneksi->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Record updated successfully</div>";
            header("Location: data_penulis.php"); // Redirect to the data penulis page after update
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error updating record: " . $koneksi->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Required fields are missing.</div>";
    }

} else if (isset($_GET['kodepenulisan'])) {
    // Display the edit form
    $kodepenulisan = escapeInput($_GET['kodepenulisan']);

    // Fetch existing data
    $sql = "SELECT * FROM penulis WHERE kodepenulisan='$kodepenulisan'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Penulis</title>
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
                <h2 class="mb-4">Edit Penulis</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="kodepenulisan">Kode Penulisan</label>
                        <input type="text" class="form-control" id="kodepenulisan" name="kodepenulisan" value="<?php echo htmlspecialchars($row['kodepenulisan']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="namapenulis">Nama Penulis</label>
                        <input type="text" class="form-control" id="namapenulis" name="namapenulis" value="<?php echo htmlspecialchars($row['namapenulis']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamatpenulis">Alamat Penulis</label>
                        <input type="text" class="form-control" id="alamatpenulis" name="alamatpenulis" value="<?php echo htmlspecialchars($row['alamatpenulis']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telppenulis">Telp. Penulis</label>
                        <input type="text" class="form-control" id="telppenulis" name="telppenulis" value="<?php echo htmlspecialchars($row['telppenulis']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<div class='alert alert-warning'>Data penulis tidak ditemukan.</div>";
    }

} else {
    echo "<div class='alert alert-warning'>Kode penulisan tidak ditemukan.</div>";
}

$koneksi->close();
?>
