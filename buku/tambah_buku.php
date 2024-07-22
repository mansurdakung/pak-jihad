<?php include 'config.php'; ?>

<form method="post" action="simpan_buku.php">
    Judul: <input type="text" name="judul"><br>
    Penulis: 
    <select name="id_penulis">
        <?php
        $result = $conn->query("SELECT * FROM penulis");
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['id_penulis']."'>".$row['nama_penulis']."</option>";
        }
        ?>
    </select><br>
    Penerbit: 
    <select name="id_penerbit">
        <?php
        $result = $conn->query("SELECT * FROM penerbit");
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['id_penerbit']."'>".$row['nama_penerbit']."</option>";
        }
        ?>
    </select><br>
    Tahun Terbit: <input type="text" name="tahun_terbit"><br>
    <input type="submit" value="Simpan">
</form>
