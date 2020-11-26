<!DOCTYPE html>
<html lang="en">
<head>
    <title>Membuat CRUD dengan PHP dan Mysql - Menampilkan data dari database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD dengan PHP dan Mysql</h1>
        <h2>Menampilkan data dari Database</h2>
    </div>
    <br>
    <?php
    if (isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if ($pesan == "input"){
            echo "data berhasil di input";
        } elseif ($pesan == "update"){
            echo "data berhasil di update";
        } elseif ($pesan == "hapus"){
            echo "data berhasil di hapus";
        }

    }
    ?>
    <br>

    <a href="input.php" class="tombol"> + Tambah Data Baru</a>

    <h3>Data User</h3>
    <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        <?php 
        include "koneksi.php";
        $query_mysql = mysqli_query($koneksi, "select * from user");
        $nomor = 1;
        while ($data = mysqli_fetch_array($query_mysql)){
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['pekerjaan']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="edit">Edit</a>
                    <a href="hapus.php?id=<?php echo $data['id']; ?>" class="hapus">Hapus</a>
                </td>
            </tr>
        <?php } ?> 
    </table>
</body>
</html>