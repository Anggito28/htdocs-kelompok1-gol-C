<?php
session_start();

require "config/connect.php";
require "config/function.php";

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$idTrans = $_GET['id'];

if (isset($_POST['simpan'])) {
    if (uploadBuktiTransfer($_POST) > 0) {
        echo "
            <script>
                alert('Bukti transfer berhasil diupload!');
            </script>";
    } else {
        echo mysqli_error($conn);
        echo "
            <script>
                alert('Bukti transfer gagaldiupload!');
            </script>";
    }
}

if (isset($_POST['batal'])) {
    mysqli_query($conn, "UPDATE tb_transaksi SET status_transaksi ='batal' WHERE kd_transaksi = $idTrans;");
    echo "<script>";
    echo "alert('Pesanan telah dibatalkan!')";
    echo "</script>";
}

$trans = query("SELECT a.*, b.*, c.* FROM tb_transaksi a 
INNER JOIN tb_detail_transaksi b ON a.kd_transaksi = b.kd_transaksi
INNER JOIN tb_produk c On c.id_produk = b.id_produk
AND a.kd_transaksi = $idTrans");

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

    <title>Detail transaksi - Rudi Bonsai</title>
</head>

<body class="bg-light">

    <!-- topbar header -->
    <?php include "includes/topbar.php"; ?>

    <section class="content">
        <div class="container">

            <!-- Header konten -->
            <div class="row no-gutters justify-content-center mb-4">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white shadow">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="transaksi.php">Transaksi</a></li>
                            <li class="breadcrumb-item active">Detail transaksi</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-body shadow">

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body px-2">
                                            <div class="row justify-content-center no-gutters">
                                                <div class="col-md-10">

                                                    <div class="accordion mb-4" id="accordionExample">
                                                        <div class="card">
                                                            <div class="card-header bg-light d-flex justify-content-between" id="headingOne">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6>Rincian Pembayaran</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <button class=" btn btn-link text-success py-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                            <i class="fa fa-2x fa-caret-down"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <h6>Subtotal Belanja :</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col text-right">
                                                                            <?php foreach ($trans as $t) : ?>
                                                                                <div class="font-weight-bold">Rp <?= number_format($t['subtotal'], 0, "", "."); ?></div>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer border border-secondary bg-white">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6>Total Pembayaran :</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col text-right">
                                                                        <div class="font-weight-bold"> Rp <?= number_format($trans[0]['total_bayar'], 0, "", "."); ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-header bg-light">
                                                            <h6>Nomor Rekening</h6>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h4>0987654321</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Detail Pemesanan -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div>
                                                <h6>Status transaksi</h6>

                                                <?php
                                                $alert = '';
                                                $msg = '';
                                                switch ($trans[0]['status_transaksi']) {
                                                    case 'batal':
                                                        $alert = "danger";
                                                        $msg = "Pesanan dibatalkan.";
                                                        break;
                                                    case 'tertunda':
                                                        $alert = "danger";
                                                        $msg = "Upload bukti transfer untuk melengkapi proses transaksi.";
                                                        break;
                                                    case 'menunggu':
                                                        $alert = "warning";
                                                        $msg = "Menunggu bukti transfer dikonfirmasi.";
                                                        break;
                                                    case 'diproses':
                                                        $alert = "info";
                                                        $msg = "Pesanan sedang diproses.";
                                                        break;
                                                    case 'dikirim':
                                                        $alert = "primary";
                                                        $msg = "Pesanan sudah dikirim.";
                                                        break;
                                                    case 'selesai':
                                                        $alert = "success";
                                                        $msg = "Pesanan telah selesai.";
                                                        break;
                                                } ?>

                                                <div class="alert alert-<?= $alert; ?>">
                                                    <strong><?= ucwords($trans[0]['status_transaksi']); ?>!</strong> <?= $msg; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div>
                                                <h6>Tanggal transaksi</h6>
                                                <div class="form-control bg-light"><?= $trans[0]['tgl_transaksi']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <h6>Bukti Transfer</h6>
                                            <div class="embed-responsive embed-responsive-16by9 shadow-sm mb-2">
                                                <?php if ($trans[0]['bukti_transfer'] == "empty") : ?>
                                                    <img src="img/default/picture.svg" class="border p-1 product-image embed-responsive-item" alt="...">
                                                <?php else : ?>
                                                    <img src="img/bukti-transfer/<?= $trans[0]['bukti_transfer']; ?>" class="border p-1 product-image embed-responsive-item" alt="...">
                                                <?php endif; ?>
                                            </div>
                                            <small class="alert alert-secondary d-block">Pastikan foto bukti transfer terlihat jelas</small>
                                        </div>
                                        <?php if ($trans[0]['status_transaksi'] == "tertunda" || $trans[0]['status_transaksi'] == "menunggu") : ?>
                                            <div class="col-12 mb-4">
                                                <div>
                                                    <h6>Upload bukti transfer</h6>
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <input id="buktiTransfer" type="file" name="image" id="buktiTransfer" class="form-control-file mb-2">
                                                        <input type="hidden" name="bukti" value="<?= $trans[0]['bukti_transfer']; ?>">
                                                        <input type="hidden" name="kdTransaksi" value="<?= $trans[0]['kd_transaksi']; ?>">
                                                        <button id="simpan" name="simpan" type="submit" disabled class="btn btn-sm btn-success">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-12 mb-4">
                                            <div class="card">
                                                <div class="card-header bg-light">
                                                    <h6>Keterangan</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <h6>Opsi Pembayaran</h6>
                                                        <div class="form-control bg-light"><?= $trans[0]['opsi_pembayaran']; ?></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h6>Opsi Pengiriman</h6>
                                                        <div class="form-control bg-light"><?= $trans[0]['opsi_pengiriman']; ?></div>
                                                    </div>
                                                    <div>
                                                        <h6>Catatan untuk penjual</h6>
                                                        <textarea disabled class="form-control bg-light" rows="3"><?= $trans[0]['keterangan']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div>
                                                <h6>Hubungi Penjual</h6>
                                                <div class="btn btn-outline-success">0812-3333-4444</div>
                                            </div>
                                        </div>
                                        <?php if ($trans[0]['status_transaksi'] == "tertunda") : ?>
                                            <div class="col-12 mb-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6>Batalkan Pesanan</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="" method="POST">
                                                            <button onclick="return confirm('Konfirmasi, apakah anda ingin membatalkan pesanan ini?')" class="btn btn-danger btn-block" type="submit" name="batal">Batalkan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <?php foreach ($trans as $t) : ?>
                                        <div class="card mb-3 shadow-sm mb-4">
                                            <div class="card-body">
                                                <div class="row ">
                                                    <div class="col-lg-5">
                                                        <div class="embed-responsive embed-responsive-16by9 shadow-sm mb-4">
                                                            <img src="admin-dashboard/img/produk/<?= $t['image']; ?>" class="border p-1 product-image embed-responsive-item" alt="...">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <h4 class="card-title"><?= $t['nama_produk']; ?></h4>
                                                        <h5 class="card-text">Rp <?= number_format($t['harga'], 0, '', "."); ?></h5>
                                                        <span>Jumlah : <?= $t['jumlah_barang']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer justify-content-between d-flex px-2">
                                                <div>
                                                    Subtotal (<?= $t['jumlah_barang']; ?>)
                                                </div>
                                                <div>
                                                    <strong>Rp <?= number_format($t['subtotal'], 0, '', '.'); ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body text-right">
                                            <a href="transaksi.php" class="btn btn-outline-success mr-2">Kembali</a>
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

    <script>
        $(document).ready(function() {
            $('#buktiTransfer').change(function() {
                $('#simpan').removeAttr("disabled");
            });
        });
    </script>

</body>

</html>