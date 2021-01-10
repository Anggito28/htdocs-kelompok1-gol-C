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

            <div class="row mb-4">

                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4>Pengiriman</h4>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center">

                                <div class="col-md-10">
                                    <div class="card mb-5 shadow">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Metode Pengiriman
                                            </h5>
                                            <hr>
                                            <p>Terapat 2 Proses Pengiriman, yaitu :</p>
                                            <ol>
                                                <li>Pengiriman Barang dengan COD atau Langsung dalam wilayah Kabupaten Blitar, Jawa Timur</li>
                                                <p class="mt-2">Pengiriman COD dilakukan secara langsung oleh petugas toko atau pemilik toko bonsai dengan bertemu langsung dengan pembeli.</p>
                                                <li>Pengiriman Barang di luar Kabupaten Blitar, Jawa Timur</li>
                                                <p class="mt-2">Pengiriman Barang diluar kota akan dilakukan apabila pembeli telah melakukan pembayaran terhadap barang pesanan, pengiriman barang akan dikirim melalui jasa pengiriman PT. Indah Logistik yang dapat mencangkup seluruh wilayah di Indonesia.</p>
                                                <br>
                                            </ol>
                                            <p><strong>#Note: Pastikan Alamat Rumah dan Nomor Telepon Anda Sudah Tepat dan Benar!!</strong></p>

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