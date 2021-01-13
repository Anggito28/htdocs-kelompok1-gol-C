<?php
session_start();

$topbarActive = "topbarHome";

require "config/connect.php";
require "config/function.php";

$products = query("SELECT a.*, b.kategori FROM tb_produk a INNER JOIN tb_kategori b ON a.kd_kategori=b.kd_kategori ORDER BY a.id_produk DESC LIMIT 6");

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

    <title>Home - Rudi Bonsai</title>
</head>

<body class="bg-light">

    <?php include "includes/topbar.php"; ?>

    <section class="content">
        <div class="container">

            <div class="row mb-4">
                <div class="col-lg-12">
                    <!--carousel item  -->
                    <div class="p-1 shadow">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="embed-responsive embed-responsive-21by9">
                                        <img src="img/carousel/bonsai.jpg" class="embed-responsive-item d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Bonsai Hutan</h5>
                                        <p>Bonsai menyerupai hutan eropa yang paling diminati saat ini</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="embed-responsive embed-responsive-21by9">
                                        <img src="img/carousel/bonsai6.jpg" class="embed-responsive-item d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Contoh Penampilan Bonsai dirumah</h5>
                                        <p>Bonsai Kecil cocok menghiasi taman anda</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="embed-responsive embed-responsive-21by9">
                                        <img src="img/carousel/bonsai5.jpg" class="embed-responsive-item d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Bonsai Rumah Kelinci</h5>
                                        <p>Bonsai yang dihiasi sedemikian rupa untuk menghiasi taman anda</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5>
                                Produk Terbaru
                            </h5>
                        </div>
                        <div class="card-body shadow">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="row konten-produk">
                                        <!-- list produk -->
                                        <?php foreach ($products as $product) : ?>
                                            <!-- list produk -->
                                            <div class="konten-item col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
                                                <div class="card shadow-sm">
                                                    <div class="position-absolute" style="z-index: 1; right: 0;">
                                                        <span class="badge badge-secondary"><?= ucwords($product['kategori']); ?></span>
                                                    </div>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <img src="admin-dashboard/img/produk/<?= $product['image']; ?>" class="product-image embed-responsive-item" alt="...">
                                                    </div>
                                                    <div class="card-body px-2 pt-3">

                                                        <h6 class="card-title">
                                                            <?= ucfirst($product['nama_produk']); ?>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center mb-4 pt-4">
                                <div class="col-10">
                                    <div class="row">
                                        <div class="col-lg-6 px-0">
                                            <h4 class="mb-3">
                                                Apa itu Bonsai?
                                            </h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <p class="text-justify">
                                                    Bonsai merupakan tanaman atau pohon yang dikerdilkan di dalam pot dangkal dengan tujuan membuat miniatur dari bentuk asli pohon besar yang sudah tua di alam bebas. Pohon dibentuk dengan bantuan kawat pada ranting dan tunasnya. Keindahan bonsai bisa dilihat dari dahan, ranting, daun dan akar pohonnya, dan juga pot yang digunakan berukuran sangat kecil.
                                                </p>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="embed-responsive embed-responsive-21by9">
                                                    <img src="img/carousel/bonsai5.jpg" class="product-image embed-responsive-item d-block w-100" alt="...">
                                                </div>
                                            </div>
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

            $("div.search-sm").hide();

            if ($(window).width() < 768) {
                $("form.search").hide();
                $("div.search-sm").show();
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