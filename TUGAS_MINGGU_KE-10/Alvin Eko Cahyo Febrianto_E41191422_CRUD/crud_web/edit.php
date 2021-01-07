<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat CRUD dengan PHP dan Mysql - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD dengan PHP dan MySQL</h1>
        <h2>Menampilkan data dari Database</h2>
    </div>
    <br>
    
    <a href="index.php">Lihat Semua Data</a>
    <br>

    <h3>Edit Data</h3>
    <?php
    include "koneksi.php";
    $id = $_GET['id'];
    $query_mysql = mysqli_query($koneksi,"select * from user where id = '$id'");
    $nomor = 1;
    while ($data = mysqli_fetch_array($query_mysql)) {
    ?>
        <form action="update.php" method="post">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <input type="text" name="nama" value="<?php echo $data['nama']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>"></td>
                </tr>
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>
            </table>
        </form>
    <?php
    }
    ?>
</body>
</html>