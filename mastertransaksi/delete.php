<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodetransaksi'])) {
    $kodetransaksi = $_GET['kodetransaksi'];

    $sql = "DELETE FROM mastertransaksi WHERE kodetransaksi='$kodetransaksi'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<div id='deleteMessage' class='alert alert-success'>Data berhasil dihapus</div>";
    } else {
        echo "<div id='deleteMessage' class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Animasi fade */
        .fade-out {
            animation: fadeOut ease 2s;
            -webkit-animation: fadeOut ease 2s;
            -moz-animation: fadeOut ease 2s;
            -o-animation: fadeOut ease 2s;
            -ms-animation: fadeOut ease 2s;
        }

        @keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
        }

        @-moz-keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
        }

        @-webkit-keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
        }

        @-o-keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
        }

        @-ms-keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
        }
    </style>
    <script>
        $(document).ready(function() {
            // Menghilangkan pesan setelah beberapa detik
            setTimeout(function() {
                $("#deleteMessage").addClass('fade-out');
            }, 3000); // 3000 milidetik = 3 detik
        });
    </script>
</head>
<body>
    <div class="container">
        <!-- Konten Utama -->
    </div>
</body>
</html>

