<?php
include "connect.php";

$produk = mysqli_query($conn, "SELECT * FROM tb_produk");
$nomor = 1;

while ($data = mysqli_fetch_array($produk)) {
?>

    <tr>
        <td class="align-middle align-items-center">
            <div class="d-flex justify-content-center">
                <a class="custom-btn btn mr-2 btn-warning text-capitalize btn-sm" href="#">
                    <i class="fa fa-fw fa-edit"></i>
                    <span>edit</span>
                </a>
                <a class="custom-btn btn btn-danger text-capitalize btn-sm" href="#">
                    <i class="fa fa-fw fa-trash"></i>
                    <span>hapus</span>
                </a>
            </div>
        </td>
        <td>
            <div class="embed-responsive embed-responsive-16by9">
                <img alt="Card image cap" class="card-img-top embed-responsive-item img-fit" src="img/3243439.jpg" />
            </div>
        </td>
        <td><?= $data['nama_produk']; ?></td>
        <td><?= $data['stok']; ?></td>
        <td><?= $data['harga']; ?></td>
        <td><?= $data['kategori']; ?></td>
    </tr>

<?php } ?>