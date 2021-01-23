<?php
session_start();

$topbarActive = "topbarProduk";

require "config/connect.php";
require "config/function.php";

$kategori = query("SELECT * FROM tb_kategori");

if (isset($_GET['c'])) {
    $filterKategori = $_GET['c'];
    $products = query("SELECT tb_produk.*, tb_kategori.kategori FROM tb_produk INNER JOIN tb_kategori ON tb_produk.kd_kategori=tb_kategori.kd_kategori AND tb_produk.kd_kategori = $filterKategori ORDER BY tb_produk.nama_produk ASC");
    if (empty($products)) {
        $notFound = true;
    }
} elseif (isset($_GET['s'])) {
    $key = $_GET['s'];
    $products = query("SELECT a.*, b.kategori FROM tb_produk a INNER JOIN tb_kategori b ON a.kd_kategori=b.kd_kategori AND a.nama_produk LIKE '%$key%' ORDER BY a.nama_produk ASC");
    if (empty($products)) {
        $notFound = true;
    }
} else {
    // pagination
    $jumlahDataPerHalaman = 10;
    $jumlahData = count(query("SELECT id_produk FROM tb_produk"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    $products = query("SELECT a.*, b.kategori FROM tb_produk a INNER JOIN tb_kategori b ON a.kd_kategori=b.kd_kategori ORDER BY a.nama_produk ASC LIMIT $awalData,$jumlahDataPerHalaman");
}

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

    <title>Produk - Rudi Bonsai</title>
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
                                <?php if (isset($_GET['c']) || isset($_GET['s'])) : ?>
                                    <a href="produk.php" class="btn my-auto mr-3 btn-sm btn-outline-secondary">Reset</a>
                                <?php else : ?>
                                    <div class="dropdown my-auto mr-3 btn-group">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle my-0" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                            Kategori
                                        </button>
                                        <ul class="dropdown-menu scrollable-menu dropdown-menu-right" role="menu">
                                            <?php foreach ($kategori as $kat) : ?>
                                                <li>
                                                    <a class="dropdown-item" href="produk.php?c=<?= $kat['kd_kategori']; ?>"><?= ucwords($kat['kategori']); ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
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
                                    <button class="btn btn-sm btn-success my-2 my-sm-0" data-toggle="dropdown">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-search px-2">
                                        <form method="GET" action="" class="form-inline">
                                            <input name="s" class="form-control" type="search" placeholder="Cari produk" aria-label="Search">
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

                            <?php if (isset($notFound)) : ?>
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <h4 class="text-center my-3">Data tidak ditemukan</h4>
                                    </div>
                                    <img class="col-8" src="img/bg/product-not-found.svg" alt="">
                                </div>
                            <?php endif; ?>

                            <!-- Isi card konten -->
                            <div class="row konten-produk">

                                <?php foreach ($products as $product) : ?>
                                    <!-- list produk -->
                                    <div class="konten-item col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-4">
                                        <div class="card shadow-sm">
                                            <div class="position-absolute" style="z-index: 1; right: 0;">
                                                <span class="badge badge-secondary"><?= ucwords($product['kategori']); ?></span>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <img src="admin-dashboard/img/produk/<?= $product['image']; ?>" class="product-image embed-responsive-item" alt="...">
                                            </div>
                                            <div class="card-body px-2 pt-3">

                                                <h6 class="card-title">
                                                    <?= ucwords($product['nama_produk']); ?>
                                                </h6>

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
                                                    <a href="detail-produk.php?id=<?= $product['id_produk']; ?>" class="btn btn-sm btn-success <?= ($product['stok'] == '0' ? 'disabled' : ''); ?>">
                                                        <?= ($product['stok'] == '0' ? 'Stok Habis' : 'Detail Produk'); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                            <?php if (!(isset($_GET['c']) || isset($_GET['s']))) : ?>
                                <!-- pagination row -->
                                <div class="row">
                                    <div class="col">
                                        <!-- pagination -->
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end">
                                                <li class="page-item <?= ($halamanAktif == 1 ? 'disabled' : ''); ?>">
                                                    <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                                </li>
                                                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                                    <?php if ($i == $halamanAktif) : ?>
                                                        <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                                                    <?php else : ?>
                                                        <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                <li class="page-item <?= ($halamanAktif == $jumlahHalaman ? 'disabled' : ''); ?>">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            <?php endif; ?>

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
            let topbar = "<?= $topbarActive; ?>";
            $("#" + topbar).addClass("active");

            <?php if (isset($itemActive)) : ?>
                let collapseItem = "<?= $itemActive; ?>";
                $("#" + collapseItem).addClass("active text-success");
                $("#" + sidebar + " a:first").removeClass("collapsed");
                $("#" + sidebar + " div.collapse").addClass("show");
            <?php endif; ?>
        });
    </script>

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