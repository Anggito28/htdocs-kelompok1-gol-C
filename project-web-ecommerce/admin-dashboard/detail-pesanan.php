<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// dua variabel dibawah ini untuk indikator sidebar aktif
$sidebarActive = "sidebarPesanan";
// $itemActive = "";

// selalu ikutkan 2 file ini untuk dapat menjalankan fungsi dan konek database
require "config/connect.php";
require "config/function.php";

$idTrans = $_GET['id'];

$trans = query("SELECT a.*, b.*, c.* FROM tb_transaksi a 
INNER JOIN tb_detail_transaksi b ON a.kd_transaksi = b.kd_transaksi
INNER JOIN tb_produk c On c.id_produk = b.id_produk
AND a.kd_transaksi = $idTrans");

if (isset($_POST['konfirmasi'])) {
    mysqli_query($conn, "UPDATE tb_transaksi SET status_transaksi ='diproses' WHERE kd_transaksi = $idTrans;");
    echo "<script>";
    echo "alert('Pesanan telah dikonfirmasi!');";
    echo "location = 'pesanan.php';";
    echo "</script>";
}

if (isset($_POST['ubah'])) {
    $ubah = $_POST['ubah'];

    mysqli_query($conn, "UPDATE tb_transaksi SET status_transaksi ='$ubah' WHERE kd_transaksi = $idTrans;");
    echo "<script>";
    echo "alert('Status pesanan telah diubah!');";
    echo "location = 'pesanan.php';";
    echo "</script>";
}

if (isset($_POST['batal'])) {
    mysqli_query($conn, "UPDATE tb_transaksi SET status_transaksi ='batal' WHERE kd_transaksi = $idTrans;");

    foreach ($trans as $t) {
        $stokBaru = $t['stok'] + $t['jumlah_barang'];
        $idProduk = $t['id_produk'];
        mysqli_query($conn, "UPDATE tb_produk SET stok = $stokBaru WHERE id_produk = $idProduk;");
    }

    echo "<script>";
    echo "alert('Pesanan telah dibatalkan!');";
    echo "location = 'pesanan.php';";
    echo "</script>";
}

if (isset($_POST['submitOngkir'])) {
    $ongkir = $_POST['ongkir'];

    mysqli_query($conn, "UPDATE tb_transaksi SET ongkir = $ongkir, status_transaksi = 'tertunda' WHERE kd_transaksi = $idTrans;");
    echo "<script>";
    echo "alert('Ongkir telah dikonfirmasi!');";
    echo "location = 'pesanan.php';";
    echo "</script>";
}

$kdPembeli = $trans[0]['kd_pembeli'];

$data = query("SELECT tb_pembeli.*, wilayah_provinsi.nama AS prov, wilayah_kabupaten.nama AS kab, wilayah_kecamatan.nama AS kec FROM tb_pembeli 
INNER JOIN wilayah_provinsi ON tb_pembeli.id_provinsi = wilayah_provinsi.id
INNER JOIN wilayah_kabupaten ON tb_pembeli.id_kabupaten = wilayah_kabupaten.id
INNER JOIN wilayah_kecamatan ON tb_pembeli.id_kecamatan = wilayah_kecamatan.id
AND tb_pembeli.kd_pembeli = $kdPembeli")[0];


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Detail pesanan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom-style.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "includes/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "includes/topbar.php" ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Detail Pesanan</h1>

                    <!-- Header konten -->
                    <div class="row no-gutters justify-content-center mb-4">
                        <div class="col">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white shadow">
                                    <li class="breadcrumb-item"><a href="pesanan.php">Pesanan</a></li>
                                    <li class="breadcrumb-item active">Detail Pesanan</li>
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

                                                            <div class="card mb-4">
                                                                <div class="card-header bg-light">
                                                                    <h6>Alamat</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <h6><?= htmlspecialchars($data['nama']); ?></h6>
                                                                    <p><?= $data['no_telepon']; ?></p>
                                                                    <p> <?= htmlspecialchars($data['detail_alamat']); ?><br>
                                                                        <?= $data['kec']; ?>, <?= $data['kab']; ?>, Provinsi <?= $data['prov']; ?>, Indonesia
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="accordion " id="accordionExample">
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

                                                                        <?php if ($trans[0]['ongkir'] != 0) : ?>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <h6>Ongkir :</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col text-right">
                                                                                    <div class="font-weight-bold"> Rp <?= number_format($trans[0]['ongkir'], 0, "", "."); ?></div>
                                                                                    <hr>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <h6>Total :</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col text-right">
                                                                                    <div class="font-weight-bold"> Rp <?= number_format($trans[0]['ongkir'] + $trans[0]['total_bayar'], 0, "", "."); ?></div>
                                                                                </div>

                                                                            </div>
                                                                        <?php endif; ?>

                                                                    </div>
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
                                                        $next = '';
                                                        switch ($trans[0]['status_transaksi']) {
                                                            case 'batal':
                                                                $alert = "secondary";
                                                                $msg = "Pesanan dibatalkan.";
                                                                break;
                                                            case 'tertunda':
                                                                $alert = "danger";
                                                                $msg = "Pembeli belum meng-upload bukti transfer.";
                                                                break;
                                                            case 'dikonfirmasi':
                                                                $alert = "warning";
                                                                $msg = "Menunggu ongkos kirim dikonfirmasi.";
                                                                break;
                                                            case 'menunggu':
                                                                $alert = "warning";
                                                                $msg = "Menunggu bukti transfer dikonfirmasi.";
                                                                break;
                                                            case 'diproses':
                                                                $alert = "info";
                                                                $msg = "Pesanan sedang diproses.";
                                                                $next = "dikirim";
                                                                break;
                                                            case 'dikirim':
                                                                $alert = "primary";
                                                                $msg = "Pesanan sudah dikirim.";
                                                                $next = "selesai";
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

                                                <?php if ($trans[0]['status_transaksi'] == "dikonfirmasi") : ?>
                                                    <div class="col-12 mb-4">
                                                        <div>
                                                            <form action="" method="POST">
                                                                <div class="form-group">
                                                                    <label for="ubah">
                                                                        <h6>Masukkan ongkos kirim</h6>
                                                                    </label>
                                                                    <input type="number" required name="ongkir" class="form-control">
                                                                </div>
                                                                <div class="form-group d-flex justify-content-between">
                                                                    <button onclick="return confirm('Konfirmasi, konfirmasi ongkos kirim?')" class="btn btn-success" type="submit" name="submitOngkir">Konfirmasi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($trans[0]['status_transaksi'] == "diproses" || $trans[0]['status_transaksi'] == "dikirim") : ?>
                                                    <div class="col-12 mb-4">
                                                        <div>
                                                            <form action="" method="POST">
                                                                <div class="form-group">
                                                                    <label for="ubah">
                                                                        <h6>Ubah status transaksi</h6>
                                                                    </label>
                                                                    <p class="form-control bg-light">
                                                                        <?= ucfirst($next); ?>
                                                                    </p>
                                                                </div>
                                                                <div class="form-group d-flex justify-content-between">
                                                                    <button onclick="return confirm('Konfirmasi, ubah status transaksi menjadi <?= ucwords($next); ?>?')" value="<?= $next; ?>" class="btn btn-success" type="submit" name="ubah">Proses</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-12 mb-4">
                                                    <div>
                                                        <h6>Tanggal transaksi</h6>
                                                        <div class="form-control bg-light"><?= $trans[0]['tgl_transaksi']; ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <h6>Bukti Transfer</h6>
                                                    <div class="embed-responsive embed-responsive-16by9 shadow-sm mb-2">
                                                        <?php if ($trans[0]['bukti_transfer'] == "empty") : ?>
                                                            <img src="../img/default/picture.svg" class="border p-1 product-image embed-responsive-item" alt="...">
                                                        <?php else : ?>
                                                            <img src="../img/bukti-transfer/<?= $trans[0]['bukti_transfer']; ?>" class="border p-1 product-image embed-responsive-item" alt="...">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if ($trans[0]['status_transaksi'] == "menunggu") : ?>
                                                    <div class="col-12 mb-3">
                                                        <div>
                                                            <h6>Konfirmasi bukti transfer</h6>
                                                            <form action="" method="POST">
                                                                <button id="konfirmasi" onclick="return confirm('Konfirmasi bukti transfer?')" name="konfirmasi" type="submit" class="btn btn-sm btn-success">Konfirmasi</button>
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
                                                                <textarea disabled class="form-control bg-light" rows="3"><?= htmlspecialchars($trans[0]['keterangan']); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if (!($trans[0]['status_transaksi'] == "batal" || $trans[0]['status_transaksi'] == "selesai")) : ?>
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
                                                                    <img src="img/produk/<?= $t['image']; ?>" class="border p-1 img-fit embed-responsive-item" alt="...">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <h4 class="card-title"><?= ucwords($t['nama_produk']); ?></h4>
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
                                                    <a href="pesanan.php" class="btn btn-outline-success mr-2">Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include "includes/footer.php" ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include "includes/logout-modal.php" ?>

    <?php include "includes/scripts.php" ?>

</body>

</html>