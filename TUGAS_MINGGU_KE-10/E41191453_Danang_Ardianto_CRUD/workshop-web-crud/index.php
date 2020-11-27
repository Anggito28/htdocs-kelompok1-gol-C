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

    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "input") {
            echo "Data berhasil di-input";
        } elseif ($pesan == "update") {
            echo "Data berhasil di-update";
        } elseif ($pesan == "hapus") {
            echo "Data berhasil di-hapus";
        }
    }

    ?>

    <br>

    <a href="input.php" class="tombol">+ Tambah Data Baru</a>

    <h1>Data User</h1>

    <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Opsi</th>
        </tr>
        <?php
        include "koneksi.php";

        $query_mysql = mysqli_query($koneksi, "SELECT * FROM user");
        $nomor = 1;

        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>

            <tr>
                <td>
                    <?= $nomor++; ?>
                </td>
                <td><?= $data['nama']; ?>
                </td>
                <td><?= $data['alamat']; ?></td>
                <td><?= $data['pekerjaan']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $data['id']; ?>" class="edit">Edit</a>
                    <a href="hapus.php?id=<?= $data['id']; ?>" class="hapus">Hapus</a>
                </td>
            </tr>

        <?php } ?>
    </table>


</body>

</html>