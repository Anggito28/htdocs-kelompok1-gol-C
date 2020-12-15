<?php
session_start();

require "config/connect.php";
require "config/function.php";

$idAkun = $_SESSION['id'];

$produk = query("SELECT a.*, b.kategori, c.id_produk, c.kd_pembeli FROM tb_produk a 
INNER JOIN tb_kategori b ON a.kd_kategori=b.kd_kategori
INNER JOIN tb_keranjang c ON a.id_produk=c.id_produk 
AND c.kd_pembeli = $idAkun");

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

    <title>Halaman - Rudi Bonsai</title>
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
                            <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
                            <li class="breadcrumb-item active">Keranjang</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-body shadow">

                            <div class="row">
                                <div class="col-md-8">
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
                                                        <h5 class="card-title"><?= $p['nama_produk']; ?></h5>
                                                        <p class="card-text">Rp <?= number_format($p['harga'], 0, '', "."); ?></p>
                                                        <div class="form-inline">
                                                            <label class="my-1 mr-2">Jumlah</label>
                                                            <input class="form-control" style="width: 60px;" type="number" name="" id="" value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-check float-right">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php endforeach; ?>

                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    <h5>
                                                        Pilih Semua
                                                    </h5>
                                                </label>
                                            </div>
                                            <button class="btn btn-success">Chekout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- footer -->
        <?php include "includes/footer.php"; ?>
    </section>

    <?php include "includes/scripts.php"; ?>

    <!-- indikator menu aktif -->
    <script>
        $(document).ready(function() {
            let topbar = " <?= $topbarActive; ?>";
            $("#" + topbar).addClass("active");
            <?php if (isset($itemActive)) : ?>
                let collapseItem = "<?= $itemActive; ?>";
                $("#" + collapseItem).addClass("active text-success");
                $("#" + sidebar + " a:first").removeClass("collapsed");
                $("#" + sidebar + " div.collapse").addClass("show");
            <?php endif; ?>
        });
    </script>
</body>

</html>