<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Perpustakaan Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #007bff; /* Warna biru */
            color: #fff;
            position: fixed;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 15px;
            text-decoration: none;
            font-weight: bold; /* Tulisan menjadi bold */
        }
        .sidebar a:hover {
            background-color: #0056b3; /* Warna biru lebih gelap saat hover */
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .navbar-custom {
            background-color: #007bff;
            color: #fff;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: #fff;
        }
        .navbar-custom .nav-link {
            color: #fff;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-icon {
            font-size: 3rem;
            text-align: center;
            margin-bottom: 10px;
        }
        .card-title {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            width: 100%;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            width: 100%;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            width: 100%;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            width: 100%;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 class="text-center mt-3">Menu</h2>
        <a href="../perpustakaan/anggota/form_anggota.php"><i class="fas fa-users"></i>Data Anggota</a>
        <a href="../perpustakaan/detailtransaksi/data_datatransaksi.php"><i class="fas fa-exchange-alt"></i>Detail Transaksi</a>
        <a href="../perpustakaan/penulis/data_penulis.php"><i class="fas fa-pen"></i>Data Penulis</a>
        <a href="../perpustakaan/penerbit/data_penerbit.php"><i class="fas fa-book"></i>Data Penerbit</a>
        <a href="../perpustakaan/mastertransaksi/form_master.php"><i class="fas fa-file-alt"></i>Master Transaksi</a>
        <a href="../perpustakaan/kategori/form_kategori.php"><i class="fas fa-layer-group"></i>Data Kategori</a>
        <a href="../perpustakaan/buku/form_buku.php"><i class="fas fa-book-open"></i>Data Buku</a>
        <a href="index.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <a class="navbar-brand" href="#">Dashboard Perpustakaan Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle" style="color: white;"></i> Profil
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Pengaturan Akun</a>
                            <a class="dropdown-item" href="index.php">Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <h2 class="text-center mb-4"></h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-users card-icon text-primary"></i>
                        <h5 class="card-title">Data Anggota</h5>
                        <p class="card-text">Kelola data anggota perpustakaan.</p>
                        <a href="../perpustakaan/anggota/form_anggota.php" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-exchange-alt card-icon text-success"></i>
                        <h5 class="card-title">Detail Transaksi</h5>
                        <p class="card-text">Kelola detail transaksi peminjaman.</p>
                        <a href="../perpustakaan/detailtransaksi/form_datatransaksi.php" class="btn btn-success">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-pen card-icon text-info"></i>
                        <h5 class="card-title">Data Penulis</h5>
                        <p class="card-text">Kelola data penulis buku.</p>
                        <a href="../perpustakaan/penulis/form_penulis.php" class="btn btn-info">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-book card-icon text-secondary"></i>
                        <h5 class="card-title">Data Penerbit</h5>
                        <p class="card-text">Kelola data penerbit buku.</p>
                        <a href="../perpustakaan/penerbit/form_penerbit.php" class="btn btn-secondary">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-file-alt card-icon text-primary"></i>
                        <h5 class="card-title">Master Transaksi</h5>
                        <p class="card-text">Kelola master data transaksi.</p>
                        <a href="../perpustakaan/mastertransaksi/form_master.php" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-layer-group card-icon text-success"></i>
                        <h5 class="card-title">Data Kategori</h5>
                        <p class="card-text">Kelola data kategori buku.</p>
                        <a href="../perpustakaan/kategori/form_kategori.php" class="btn btn-success">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-book-open card-icon text-info"></i>
                        <h5 class="card-title">Data Buku</h5>
                        <p class="card-text">Kelola data buku.</p>
                        <a href="../perpustakaan/buku/form_buku.php" class="btn btn-info">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-sign-out-alt card-icon text-danger"></i>
                        <h5 class="card-title">Logout</h5>
                        <p class="card-text">Keluar dari sistem.</p>
                        <a href="login/logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
