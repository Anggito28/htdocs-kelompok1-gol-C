<?php
require 'db.php';
$sql = 'SELECT * FROM perpustakaan';
$statement = $connection->prepare($sql);
$statement->execute();
$perpustakaan = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h2 class="text-center">Data Siswa</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive">                   
                        <tr>
                            <th>ID</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Judul Buku</th>
                            <th>Batas Waktu Peminjaman Buku</th>
                            <th>AKSI</th>
                        </tr>
                        <?php $urut=1;foreach($perpustakaan as $key): ?>
                        <tr>
                            <td><?php echo $urut; ?></td>
                            <td><?php echo $key->nis; ?></td>
                            <td><?php echo $key->nama; ?></td>
                            <td><?php echo $key->kelas; ?></td>
                            <td><?php echo $key->buku; ?></td>
                            <td><?php echo $key->batas; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $key->id ?>" class="btn btn-info">Edit</a> 
                                <a onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" href="delete.php?id=<?php echo $key->id ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>   
                        <?php $urut++;endforeach; ?> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
