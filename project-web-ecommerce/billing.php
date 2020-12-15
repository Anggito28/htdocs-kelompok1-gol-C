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

                            <h5 class="mb-0 my-auto">Billing Information</h5>
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
                            <!-- Detail Alamat -->
                            <div class="card">
                                <div class="card-header">
                                    Detail Alamat
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Email</h5>
                                    <p class="card-text">Alamat Lengkap</p>
                                    <a href="#" class="btn btn-primary">Ubah Alamat</a>
                                </div>
                            </div>
                            <br>
                            <!--Detail Pemesanan -->
                            <h5><i class="fas fa-store ml-3 mr-2"></i>Pemesanan</h5>
                            <div class="card mb-3" style="max-width: 1080px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="img/carousel/bonsai1.jpg" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Nama Bonsai</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text">
                                                <medium class="text-muted"><Strong>Rp.300.000</Strong></medium>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Opsi Pembayaran-->
                            <div>
                                <h6>Opsi Pembayaran</h6>
                                <select class="form-control">
                                    <option href="#">Transfer</option>
                                    <option href="#">COD</option>
                                </select>
                            </div>
                            <br>
                            <!--Detail Pembayaran-->
                            <h5><i class="fas fa-poll-h ml-3 mr-2"></i>Rincian Pembayaran</h5>
                            <div class="card border-gray mb-3" style="max-width: 100rem;">
                                <div class="card-body text-black">
                                    <p class="card-text">Total Belanja Rp. 300.000,00</p>
                                    <p class="card-text">Biaya Pengiriman Rp. 10.000,00</p>
                                </div>
                                <div class="card-footer bg-transparent border-gray"><Strong>Total Pembayaran Rp.310.000,00</Strong></div>
                                <button type="button" class="btn btn-success">Proses</button>
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
            let topbar = " <?= $topbarActive; ?>";
            $("#" + topbar).addClass("active");
            <?php if (isset($itemActive)) : ?>
                let collapseItem = "<?= $itemActive; ?>";
                $("#" + collapseItem).addClass("active text-success");
                $("#" + sidebar + " a:first").removeClass("collapsed");
                $("#" + sidebar + " div.collapse").addClass("show");
            <?php endif; ?>
        });
    </script>
</body>

</html>