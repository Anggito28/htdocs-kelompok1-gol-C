<?php
require "function.php";

$produk = mysqli_query($conn, "SELECT tb_produk.id_produk, tb_produk.nama_produk, tb_produk.stok, tb_produk.harga, tb_produk.image, tb_kategori.kategori FROM tb_produk INNER JOIN tb_kategori ON tb_produk.kd_kategori=tb_kategori.kd_kategori");

while ($data = mysqli_fetch_array($produk)) {
?>

    <tr class="text-capitalize">
        <td class="align-middle align-items-center">
            <div class="d-flex justify-content-center">
                <a class="border-0 mr-2 btn btn-warning btn-icon-split btn-sm" href="#">
                    <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">edit</span>
                </a>
                <a class="border-0 btn btn-danger btn-icon-split btn-sm" href="#">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">hapus</span>
                </a>
            </div>
        </td>
        <td>
            <div class="custom-img-size">
                <div class="embed-responsive embed-responsive-16by9">
                    <img alt="product-image" class="embed-responsive-item img-fit" src="img/produk/<?= $data['image']; ?>" />
                </div>
            </div>
        </td>
        <td><?= $data['nama_produk']; ?></td>
        <td><?= $data['stok']; ?></td>
        <td>
            <div class="custom-harga">
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    <input disabled type="text" class="form-control bg-white" value="<?= number_format($data['harga'], 0, '', "."); ?>">
                </div>
            </div>
        </td>
        <td><?= $data['kategori']; ?></td>
    </tr>
<?php } ?>