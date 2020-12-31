<?php
session_start();

require "config/connect.php";
require "config/function.php";

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$idAkun = $_SESSION['id'];
$kdPembeli = query("SELECT kd_pembeli FROM tb_pembeli WHERE kd_akun = $idAkun;")[0]['kd_pembeli'];

$produk = query("SELECT a.*, b.kategori, c.id AS idKeranjang, c.id_produk, c.kd_pembeli FROM tb_produk a 
INNER JOIN tb_kategori b ON a.kd_kategori=b.kd_kategori
INNER JOIN tb_keranjang c ON a.id_produk=c.id_produk 
AND c.kd_pembeli = $kdPembeli");

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">

    <!-- custom style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Keranjang - Rudi Bonsai</title>
</head>

<body class="bg-light">

    <!-- topbar header -->
    <?php include "includes/topbar.php"; ?>

    <section class="content">
        <div class="container">

            <!-- Header konten -->
            <div class="row no-gutters justify-content-center mb-4">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white shadow">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Keranjang</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-body shadow">

                            <form action="billing.php" method="POST">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php $i = 1;
                                        $j = 1; ?>
                                        <?php foreach ($produk as $p) : ?>
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-lg-4 my-auto ">
                                                            <div class="embed-responsive embed-responsive-16by9 shadow-sm mb-3">
                                                                <img src="admin-dashboard/img/produk/<?= $p['image']; ?>" class="border p-1 product-image embed-responsive-item" alt="...">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <h5 class="card-title mb-1"><?= $p['nama_produk']; ?></h5>
                                                            <h6 class="card-text mb-1">Rp <?= number_format($p['harga'], 0, '', "."); ?></h6>
                                                            <span class="text-muted small">(Stok : <?= $p['stok']; ?>)</span>
                                                            <div class="form-inline">
                                                                <label class="my-1 mr-2">Jumlah</label>
                                                                <input oninvalid="this.setCustomValidity('Jumlah minimal 1 dan tidak boleh melebihi stok')" oninput="setCustomValidity('')" value="1" min="1" max="<?= $p['stok']; ?>" class="form-control" style="width: 80px;" type="number" name="produk-<?= $i++; ?>[]">
                                                            </div>
                                                            <div class="mt-2">
                                                                <button type="button" value="<?= $p['idKeranjang']; ?>" class="hapusItem btn btn-danger btn-sm">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-check float-right">
                                                        <input checked class="cek-produk" name="produk-<?= $j++; ?>[]" class="form-check-input" type="checkbox" value="<?= $p['id_produk']; ?>">
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>
                                        <?php endforeach; ?>

                                    </div>
                                    <div class="col-md-4 min-vh-100">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-check mb-2">
                                                    <input checked class="form-check-input" type="checkbox" id="cek-semua">
                                                    <label class="form-check-label" for="cek-semua">
                                                        <h5>
                                                            Pilih Semua
                                                        </h5>
                                                    </label>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success">Chekout</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- footer -->
        <?php include "includes/footer.php"; ?>
    </section>

    <?php include "includes/scripts.php"; ?>

    <script>
        $(document).ready(function() {
            $("#cek-semua").click(function(event) {
                $(".cek-produk").click();
            });

            $('.hapusItem').click(function(event) {
                if (confirm("Hapus item keranjang?") == true) {
                    let target = $(event.target);
                    let id = target.val();

                    $.get("ajax/ajax-hapus-keranjang.php?id=" + id, function(data) {
                        location.reload();
                    });
                }
            });
        });
    </script>

</body>

</html>