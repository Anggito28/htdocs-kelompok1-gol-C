<?php
include "connect.php";

$produk = mysqli_query($conn, "SELECT * FROM tb_produk");

while ($data = mysqli_fetch_array($produk)) {
?>

    <tr>
        <td><?= $data['id_produk']; ?></td>
        <td>
            <img width="80px" class="mx-auto d-block rounded" src="img/insert-picture-icon.png" alt="">
        </td>
        <td><?= $data['nama_produk']; ?></td>
        <td><?= $data['stok']; ?></td>
        <td><?= $data['harga']; ?></td>
        <td><?= $data['kategori']; ?></td>
        <td class="align-middle align-items-center">
            <div class="d-flex justify-content-center">
                <a class="btn mr-2 btn-warning text-capitalize btn-sm" href="#">
                    <i class="fa fa-fw fa-edit"></i>
                    <span>edit</span>
                </a>
                <a class="btn btn-danger text-capitalize btn-sm" href="#">
                    <i class="fa fa-fw fa-trash"></i>
                    <span>hapus</span>
                </a>
            </div>
        </td>
    </tr>

<?php } ?>