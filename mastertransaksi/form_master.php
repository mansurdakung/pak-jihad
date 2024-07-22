<?php
include '../koneksi.php';

$sql = "SELECT * FROM mastertransaksi";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Daftar Transaksi</h2>
        <a href="create.php" class="btn btn-success mb-3">Tambah Transaksi Baru</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Kode Anggota</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["kodetransaksi"]. "</td>";
                        echo "<td>" . $row["tgltransaksi"]. "</td>";
                        echo "<td>" . $row["kodeanggota"]. "</td>";
                        echo "<td><a href='update.php?kodetransaksi=".$row["kodetransaksi"]."' class='btn btn-warning'>Edit</a> <a href='delete.php?kodetransaksi=".$row["kodetransaksi"]."' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data transaksi</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
