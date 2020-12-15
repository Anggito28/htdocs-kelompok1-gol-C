<?php
session_start();

$topbarActive = "topbarProduk";

require "config/connect.php";
require "config/function.php";

if (isset($_POST['tambahKeranjang'])) {
    if (tambahKeranjang($_POST) > 0) {
        echo "
            <script>
                alert('Produk berhasil ditambahkan!');
            </script>
                ";
    } else {
        echo "
            <script>
                alert('Produk gagal ditambahkan!');
            </script>
                ";
    }
}

$idProduk = $_GET['id'];

$detailProduk = query("SELECT a.*, b.kategori FROM tb_produk a INNER JOIN tb_kategori b ON a.kd_kategori=b.kd_kategori AND a.id_produk = $idProduk")[0];


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
            <div class="row no-gutters justify-content-center mb-4">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white shadow">
                            <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
                            <li class="breadcrumb-item active">Detail Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <!-- Isi card konten -->

                            <div class="row justify-content-center">
                                <div class="col-sm-10">
                                    <div class="card mb-3">
                                        <div class="card-body shadow-sm">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="embed-responsive embed-responsive-16by9 shadow-sm mb-4">
                                                        <img src="admin-dashboard/img/produk/<?= $detailProduk['image']; ?>" class="border p-1 product-image embed-responsive-item" alt="...">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <h4 class="card-title"><?= ucfirst($detailProduk['nama_produk']); ?></h4>
                                                    <h5 class="card-text">Harga<span> Rp <?= number_format($detailProduk['harga'], 0, '', "."); ?></span></h5>
                                                    <p class="card-text"><small class="text-muted">Stok : <?= $detailProduk['stok']; ?></small></p>
                                                    <a href="keranjang.php" class="btn btn-sm btn-outline-success mr-2 mb-2">Beli Sekarang</a>
                                                    <form class="d-inline" action="" method="POST">
                                                        <input type="hidden" name="idProduk" value="<?= $idProduk; ?>">
                                                        <input type="hidden" name="kdPembeli" value="<?= $_SESSION['id']; ?>">
                                                        <button name="tambahKeranjang" type="submit" class="btn btn-success btn-sm mb-2">+ Keranjang</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row pt-2">
                                                <div class="col">
                                                    <h6 class="card-text">Deskripsi</h6>
                                                    <p class="card-text">
                                                        <?= ucfirst($detailProduk['deskripsi']); ?>
                                                    </p>
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

</body>

</html>