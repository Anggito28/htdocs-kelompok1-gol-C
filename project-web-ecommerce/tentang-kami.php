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

            <!-- Header konten -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body d-flex justify-content-between">

                            <h5 class="mb-0 my-auto">Tentang Kami</h5>
                            <div class="d-inline-flex">

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
                            <iframe width="100%" height="480px" src="https://www.youtube.com/embed/eeG-qibFw3I" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <br>
                            <hr>
                            <h4>
                                <center>Penjelasan Singkat Mengenai Rudi Bonsai</center>
                            </h4>
                            <hr>
                            <p class="text-justify">Rudi Bonsai merupakan perusahaan yang berdiri dalam bidang penjualan berbagai macam tanaman bonsai, bibit bonsai, dan berbagai macam perlengkapan tanam. Rudi Bonsai berdiri pada tahun 2018 dan bertepatan pada kabupaten Blitar, Jawa Timur, Indonesia. Tujuan Utama Usaha Rudi Bonsai yaitu berusaha dalam penjualan Berbagai macam bahan tanam, bibit bonsai maupun pohon bonsai yang sudah terawat. Jangkauan Kiriman Rudi Bonsai ini yaitu di seluruh wilayah Indonesia dan bekerja sama dengan jasa pengiriman barang yaitu PT. Indah Logistik di Indonesia.</p>
                            <p class="text-justify">Tidak hanya berkonsep e-commerce biasa, rudibonsai.com mengusung konsep marketplace atau pasar jual beli. Kedepannya rudibonsai ingin menjadi situs moderasi antara berbagai penjual dan pembeli khusus produk-produk yang berhubungan dengan tanaman atau tumbuhan serta perlengkapannya.</p>
                            <br>
                            <hr>
                            <h4>
                                <center>Visi dan Misi</center>
                            </h4>
                            <hr>
                            <p class="text-center">Menciptakan kenyamanan dalam berbelanja melaui sistem web sehingga customer dapat menghemat waktu dan lebih praktis dalam berbelanja</p>
                            <p class="text-center">Menjadi pusat jual beli terlengkap produk berkebun dan pertanian melalui media internet</p>
                            <p class="text-center">Menghidupkan lapangan peluang baru bagi individu yang berkecimpung dalam bidang usaha berkebun dan pertanian.</p>
                            <p class="text-center">Meningkatkan kesadaran masyarakat pada umumnya mengenai pentingnya hidup Go Green</p>
                            <p class="text-center">Mengakomodasi pergerakan serta geliat agribisnis di tanah agraris Indonesia tercinta.</p>
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