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
                            <h4>Kontak</h4>
                        </div>

                        <div class="embed-responsive embed-responsive-21by9 bg-dark">
                            <iframe class=" embed-responsive-item d-block w-100 card-img-top" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1975.0046339371477!2d112.290506!3d-8.100536!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x922690c6a3f1ca0b!2sBelanja%20keperluan%20bonsai!5e0!3m2!1sid!2sid!4v1609388429121!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

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

                                            <div class="form-group">
                                                <label>Nama Pemilik</label>
                                                <p class="form-control bg-light">Rudi Setiawan</p>

                                            </div>
                                            <div class="form-group">
                                                <label>No Telepon / Whatsapp</label>
                                                <p class="form-control bg-light">0812-1234-1234</p>

                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Toko</label>
                                                <textarea style="resize: none;" disabled class="form-control bg-light">Desa Wonorejo, Dusun kembangarum, RT 3/ RW 3, Kecamatan Talun, Kabupaten Blitar, Jatim </textarea>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScGFpRvlJwaaFG9ncOZeHJ36obBYyOqgKrQuGv-jGcAYw9Z_A/viewform?embedded=true" width="100%" height="900px" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
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