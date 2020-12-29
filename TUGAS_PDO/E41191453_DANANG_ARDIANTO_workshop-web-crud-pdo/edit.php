<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat CRUD dengan PHP dan MySQL - Menampilkan data dari Database</title>
    <link rel="stylesheet" href="style.css">
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
    $query_mysql = $koneksi->prepare("SELECT * FROM user WHERE id = '$id'");
    $query_mysql->execute();

    $nomor = 1;
    while ($data = $query_mysql->fetch()) {
    ?>

        <form action="update.php" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
                        <input type="text" name="nama" id="nama" value="<?= $data['nama']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" id="alamat" value="<?= $data['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="pekerjaan" id="pekerjaan" value="<?= $data['pekerjaan']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="simpan" id="simpan" value="simpan"></td>
                </tr>
            </table>

        </form>
    <?php } ?>

</body>

</html>