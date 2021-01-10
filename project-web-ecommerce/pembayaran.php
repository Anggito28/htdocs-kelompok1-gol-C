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
                            <h4>Pembayaran</h4>
                        </div>

                        <div class="card-body">
                            <img src="img/default/siklus1.png" width="100%">

                            <p><strong>#NB: Jika Kurang Jelas, Dapat menghubungi kami melalui halaman <a class="text-success" href="kontak.php">Kontak</a></strong></p>

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