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

    <section class="header shadow-sm position-fixed">
        <div class="container-lg">
            <nav class="navbar py-3 navbar-expand-lg navbar-light bg-white justify-content-between">
                <a href="#" class="navbar-brand d-inline-flex">
                    <img src="asset/logo/bonsai_1.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                    <h5 class="ml-2 mt-2 font-weight-bold">Rudi Bonsai</h5>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.html">Produk</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Info
                            </a>
                            <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Tentang Kami</a>
                                <a class="dropdown-item" href="#">Blog</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Pengiriman</a>
                                <a class="dropdown-item" href="#">Pembayaran</a>
                            </div>
                        </li>

                    </ul>
                    <div class="d-inline-flex my-2 my-lg-0">
                        <button class="btn mx-1 btn-sm btn btn-outline-success my-2 my-sm-0" type="submit">
                            <i class="fa fa-shopping-cart icon"></i>
                            <span class="text">Keranjang</span>
                        </button>
                        <button class="btn mx-1 btn-sm btn-success my-2 my-sm-0" type="submit">Login</button>
                    </div>

                </div>
            </nav>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="asset/img/bonsai1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="asset/img/bonsai3.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="asset/img/bonsai4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">

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
                                            <img src="asset/img/5fccd0d6cb7db.jpeg" class="product-image embed-responsive-item" alt="...">
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
        <div class="footer p-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5">
                        <h6>Tentang Kami</h6>
                        <small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita ullam optio quidem
                            architecto esse ipsum odit hic voluptas consequuntur, voluptatum aut reiciendis atque quas
                            illum, veniam dignissimos magnam sint, sapiente quis culpa nemo labore. Sunt nulla quo ea
                            qui quibusdam.</small>
                    </div>

                    <div class="col-lg-3 mb-5">
                        <h6>Kontak</h6>
                        <ul>
                            <li>
                                <i class="fab fa-facebook-square"></i>
                                <span>Facebook</span>
                            </li>
                            <li>
                                <i class="fab fa-whatsapp"></i>
                                <span>Whatsapp</span>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>0812-1234-1234</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 mb-3">
                        <h6>Link</h6>
                        <ul>
                            <li>Pengiriman</li>
                            <li>Pembayaran</li>
                            <li>Kategori</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <script src="vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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