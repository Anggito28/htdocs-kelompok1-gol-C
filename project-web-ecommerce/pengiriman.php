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

                            <h5 class="mb-0 my-auto">Pengiriman </h5>
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
                            <h5>
                                <center>METODE PENGIRIMAN BARANG E-COMMERCE TERHADAP PEMBELI</center>
                            </h5>
                            <hr>
                            <hr>
                            <p class="text-justify">Terapat 2 Proses Pengiriman, yaitu :</p>
                            <p class="text-justify">1.&nbsp;Pengiriman Barang dengan COD atau Langsung dalam wilayah Kabupaten Blitar, Jawa Timur</p>
                            <p class="text-justify">&nbsp;&nbsp;Pengiriman COD dilakukan secara langsung oleh petugas toko atau pemilik toko bonsai dengan bertemu langsung dengan &nbsp;&nbsp;&nbsp;pembeli.</p>
                            <p class="text-justify">2.&nbsp;Pengiriman Barang di luar Kabupaten Blitar, Jawa Timur</p>
                            <p class="text-justify">&nbsp;&nbsp;Pengiriman Barang diluar kota akan dilakukan apabila pembeli telah melakukan pembayaran terhadap barang pesanan, &nbsp;&nbsp;&nbsp;pengiriman barang akan dikirim melalui jasa pengiriman PT. Indah Logistik yang dapat mencangkup seluruh wilayah di Indonesia.</p>
                            <br>
                            <p><strong>&nbsp;&nbsp;&nbsp;#Note:&nbsp;Pastikan Alamat Rumah dan Nomor Telepon Anda Sudah Tepat dan Benar!!</strong></p>
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