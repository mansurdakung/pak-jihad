<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Buku</h2>
        <a href="../PENGGUNA/tambah-barang.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Buku</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>ISBN</th>
                    <th>Kode Penulis</th>
                    <th>Kode Penerbit</th>
                    <th>Kode Kategori</th>
                    <th>Tanggal Terbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Kode Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $sql = "SELECT * FROM buku";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['judulbuku'] . "</td>";
                        echo "<td>" . $row['isbn'] . "</td>";
                        echo "<td>" . $row['kodepenulis'] . "</td>";
                        echo "<td>" . $row['kodepenerbit'] . "</td>";
                        echo "<td>" . $row['kodekategori'] . "</td>";
                        echo "<td>" . $row['tglterbit'] . "</td>";
                        echo "<td>" . $row['jmlhhalaman'] . "</td>";
                        echo "<td>" . $row['kodebuku'] . "</td>";
                        echo "<td>
                                <a href='form_edit.php?kodebuku=" . $row['kodebuku'] . "' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Edit</a>
                                <a href='proses_hapus.php?kodebuku=" . $row['kodebuku'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'></i> Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data buku.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
