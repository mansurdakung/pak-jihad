<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penulis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            display: flex;
            margin: 0;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #007bff; /* Blue color */
            padding-top: 20px;
            position: fixed;
            color: #fff; /* White text color */
        }
        .sidebar h2 {
            color: #fff; /* White color for the sidebar header */
        }
        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
            font-weight: bold; /* Bold text */
            transition: background-color 0.3s ease; /* Smooth hover effect */
        }
        .sidebar a:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .sidebar .nav-icon {
            margin-right: 10px; /* Space between icon and text */
        }
        .content {
            margin-left: 250px; /* Space for the sidebar */
            padding: 20px;
            width: calc(100% - 250px);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 class="text-center mt-3">Menu</h2>
        <a href="../perpustakaan/anggota/form_anggota.php">
            <i class="fas fa-users nav-icon"></i> Data Anggota
        </a>
        <a href="../perpustakaan/detailtransaksi/form_datatransaksi.php">
            <i class="fas fa-exchange-alt nav-icon"></i> Detail Transaksi
        </a>
        <a href="../perpustakaan/penulis/data_penulis.php">
            <i class="fas fa-pen nav-icon"></i> Data Penulis
        </a>
        <a href="../perpustakaan/penerbit/form_penerbit.php">
            <i class="fas fa-book nav-icon"></i> Data Penerbit
        </a>
        <a href="../perpustakaan/mastertransaksi/form_master.php">
            <i class="fas fa-file-alt nav-icon"></i> Master Transaksi
        </a>
        <a href="../perpustakaan/kategori/form_kategori.php">
            <i class="fas fa-layer-group nav-icon"></i> Data Kategori
        </a>
        <a href="../perpustakaan/buku/form_buku.php">
            <i class="fas fa-book-open nav-icon"></i> Data Buku
        </a>
        <a href="index.php">
            <i class="fas fa-sign-out-alt nav-icon"></i> Logout
        </a>
    </div>
    <div class="content">
        <h2>Data Penulis</h2>
        <a href="form_tambah.php" class="btn btn-primary mb-3">Tambah Penulis</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Penulis</th>
                    <th>Nama Penulis</th>
                    <th>Alamat Penulis</th>
                    <th>Telp. Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $sql = "SELECT * FROM penulis";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['kodepenulisan'] . "</td>";
                        echo "<td>" . $row['namapenulis'] . "</td>";
                        echo "<td>" . $row['alamatpenulis'] . "</td>";
                        echo "<td>" . $row['telppenulis'] . "</td>";
                        echo "<td>
                                <a href='form_edit.php?kodepenulisan=" . $row['kodepenulisan'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='proses_hapus.php?kodepenulisan=" . $row['kodepenulisan'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data penulis.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
