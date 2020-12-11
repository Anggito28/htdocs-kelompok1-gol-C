<?php
session_start();
require "config/connect.php";
require "config/function.php";

$products = query("SELECT tb_produk.*, tb_kategori.kategori FROM tb_produk INNER JOIN tb_kategori ON tb_produk.kd_kategori=tb_kategori.kd_kategori");

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
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card shadow">

                        <div class="card-body d-flex justify-content-between">
                            <h5 class="mb-0 my-auto">Produk</h5>
                            <div class="d-inline-flex">
                                <div class="dropdown my-auto mr-3">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle my-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kategori
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <?php foreach ($products as $product) : ?>
                                            <a class="dropdown-item" href="produk.php?c=<?= $product['kd_kategori']; ?>"><?= $product['kategori']; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <form method="GET" action="" class="search form-inline my-2 my-lg-0">
                                    <div class="input-group">
                                        <input name="s" class="form-control" type="search" placeholder="Cari produk..." aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-success my-2 my-sm-0" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- search dropdown (small screen) -->
                                <div class="dropdown my-auto search-sm">
                                    <button class="btn btn-sm btn-success my-2 my-sm-0" type="submit" data-toggle="dropdown">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-search px-2">
                                        <form class="form-inline">
                                            <input class="form-control" type="search" placeholder="Cari produk" aria-label="Search">
                                            <button class="btn btn-success my-2 my-sm-0 d-none" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">

                            <!-- Isi card konten -->
                            <div class="row konten-produk">

                                <?php foreach ($products as $product) : ?>
                                    <!-- list produk -->
                                    <div class="konten-item col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-4">
                                        <div class="card shadow-sm">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <img src="admin-dashboard/img/produk/<?= $product['image']; ?>" class="product-image embed-responsive-item" alt="...">
                                            </div>
                                            <div class="card-body px-2 pt-2">

                                                <h5 class="card-title">
                                                    <?= ucfirst($product['nama_produk']); ?>
                                                </h5>

                                                <div class="d-flex justify-content-between px-1">
                                                    <small>
                                                        Ready : <?= $product['stok']; ?>
                                                    </small>
                                                    <span class="badge badge-secondary"><?= ucwords($product['kategori']); ?></span>
                                                </div>
                                                <hr>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text px-2 py-1 font-weight-bold">Rp</span>
                                                    </div>
                                                    <p class="font-weight-bold form-control pr-1">
                                                        <?= htmlspecialchars(number_format($product['harga'], 0, '', ".")); ?>
                                                    </p>
                                                </div>

                                                <div class="text-right d-block">
                                                    <a href="detail-produk.php?id=<?= $product['id_produk']; ?>" class="btn btn-sm btn-success">
                                                        Detail Produk
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                            <!-- pagination row -->
                            <div class="row">
                                <div class="col">
                                    <!-- pagination -->
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
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

    <script src="vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {

            // responsive search bar
            if ($(window).width() < 768) {
                $("form.search").hide();
                $("div.search-sm").show();
            } else {
                $("div.search-sm").hide();
            }

            $(window).resize(function() {
                if ($(window).width() < 768) {
                    $("form.search").hide();
                    $("div.search-sm").show();
                } else {
                    $("form.search").show();
                    $("div.search-sm").hide();
                }
            });
        });
    </script>

</body>

</html>