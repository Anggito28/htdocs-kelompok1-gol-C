<?php
include "header.php";

?>
<div class="container">
    <a href="tambah.php" class="btn btn-outline-primary">+ Tambah Data</a> <br> <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "select * from mahasiswa";
            $data = $konek->prepare($sql);
            $data->execute();
            while ($d = $data->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['nama_mhs'] ?></td>
                    <td><?= $d['email_mhs']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $d['id_mhs'] ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="aksi.php?p=hapus&id=<?= $d['id_mhs'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include "footer.php"
?>