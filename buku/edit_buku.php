<?php
include 'config.php';

$id_buku = $_GET['id_buku'];
$result = $conn->query("SELECT * FROM buku WHERE id_buku='$id_buku'");
$row = $result->fetch_assoc();
?>

<form method="post" action="update_buku.php">
    <input type="hidden" name="id_buku" value="<?php echo $row['id_buku']; ?>">
    Judul: <input type="text" name="judul" value="<?php echo $row['judul']; ?>"><br>
    Penulis: 
    <select name="id_penulis">
        <?php
        $result_penulis = $conn->query("SELECT * FROM penulis");
        while($row_penulis = $result_penulis->fetch_assoc()) {
            $selected = ($row_penulis['id_penulis'] == $row['id_penulis']) ? 'selected' : '';
            echo "<option value='".$row_penulis['id_penulis']."' $selected>".$row_penulis['nama_penulis']."</option>";
        }
        ?>
    </select><br>
    Penerbit: 
    <select name="id_penerbit">
        <?php
        $result_penerbit = $conn->query("SELECT * FROM penerbit");
        while($row_penerbit = $result_penerbit->fetch_assoc()) {
            $selected = ($row_penerbit['id_penerbit'] == $row['id_penerbit']) ? 'selected' : '';
            echo "<option value='".$row_penerbit['id_penerbit']."' $selected>".$row_penerbit['nama_penerbit']."</option>";
        }
        ?>
    </select><br>
    Tahun Terbit: <input type="text" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>"><br>
    <input type="submit" value="Update">
</form>
