<?php
session_start();

$topbarActive = "topbarHome";

require "config/connect.php";
require "config/function.php";


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

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4>Tentang Kami</h4>
                        </div>

                        <div class="embed-responsive embed-responsive-21by9 bg-dark">
                            <img style="object-fit: cover; object-position: 0 0; opacity: 0.5; filter: blur(2px);" src="img/default/tentang_kami_img.jpg" class=" embed-responsive-item d-block w-100 card-img-top" alt="...">
                        </div>

                        <div class="card-body custom-card-position">
                            <div class="row justify-content-center">

                                <div class="col-md-10">
                                    <div class="card mb-5 shadow">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Rudi Bonsai
                                            </h5>
                                            <hr>
                                            <p>Rudi Bonsai melayani penjualan berbagai macam tanaman bonsai, tanaman hias, dan berbagai macam perlengkapan berkebun. Rudi Bonsai berdiri pada tahun 2018, berlokasi di kabupaten Blitar, Jawa Timur, Indonesia.
                                            </p>
                                            <p>
                                                Kami menerima pengiriman hampir ke seluruh indonesia, karena tidak banyak agen ekspedisi yang menerima pengiriman tanaman, untuk saat ini kami hanya mengirimkan produk kami melalui agen ekspedisi <span class="font-weight-bold">Indah logistik</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Visi dan Misi
                                            </h5>
                                            <hr>
                                            <ul>
                                                <li>Menciptakan kenyamanan dalam berbelanja melaui sistem web sehingga customer dapat menghemat waktu dan lebih praktis dalam berbelanja
                                                </li>
                                                <li>Menjadi pusat jual beli terlengkap produk berkebun dan pertanian melalui media internet
                                                </li>
                                                <li>Menghidupkan lapangan peluang baru bagi individu yang berkecimpung dalam bidang usaha berkebun dan pertanian.</li>
                                                <li>Meningkatkan kesadaran masyarakat pada umumnya mengenai pentingnya hidup Go Green</li>
                                                <li>Mengakomodasi pergerakan serta geliat agribisnis di tanah agraris Indonesia tercinta.</li>
                                            </ul>

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

</body>

</html>