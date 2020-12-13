<?php
session_start();

$topbarActive = "topbarHome";

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

    <?php include "includes/topbar.php"; ?>

    <section class="content">
        <div class="container">

            <div class="row mb-4">
                <div class="col-lg-12">

                    <!--carousel item  -->
                    <div id="carouselExampleCaptions" class="carousel slide shadow-sm" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <img src="img/carousel/bonsai1.jpg" class="embed-responsive-item d-block w-100" alt="...">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <img src="img/carousel/bonsai2.png" class="embed-responsive-item d-block w-100" alt="...">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <img src="img/carousel/bonsai3.webp" class="embed-responsive-item d-block w-100" alt="...">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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

                    <div class="card shadow">
                        <div class="card-body d-flex justify-content-between">
                            <h5 class="mb-0 my-auto">Produk</h5>
                            <div class="d-inline-flex">
                                <div class="dropdown my-auto mr-3">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle my-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kategori
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Peralatan Tanaman</a>
                                        <a class="dropdown-item" href="#">Bonsai</a>
                                        <a class="dropdown-item" href="#">Pupuk dan Racun</a>
                                    </div>
                                </div>

                                <form class="search form-inline my-2 my-lg-0">
                                    <div class="input-group">
                                        <input class="form-control" type="search" placeholder="Cari produk..." aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-success my-2 my-sm-0" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- search dropdown (small screen) -->
                                <div class="dropdown my-auto search-sm">
                                    <button class="btn btn-success my-2 my-sm-0" type="submit" data-toggle="dropdown">
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
                            <div class="row konten-produk">

                                <!-- list produk -->
                                <div class="konten-item col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card shadow-sm">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <img src="img/default/5fccd0d6cb7db.jpeg" class="product-image embed-responsive-item" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                Card title Lorem ipsum dolor sit amet.
                                            </h6>
                                            <hr>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold">Rp</span>
                                                </div>
                                                <p class="form-control font-weight-bold">
                                                    100,000
                                                </p>
                                            </div>

                                            <div class="text-right d-block">
                                                <button class="btn btn-sm btn-success">
                                                    Detail Produk
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <!-- pagination -->
                                    <nav aria-label="Page navigation example">
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
            let item = $("div.konten-item");
            let konten = $("div.row.konten-produk");

            for (let i = 0; i < 7; i++) {
                item.clone().appendTo(konten);

            }

            console.log(item);

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