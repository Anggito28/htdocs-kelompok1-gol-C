<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// dua variabel dibawah ini untuk indikator sidebar aktif
$sidebarActive = "sidebarPesanan";
$itemActive = "dropdownSemuaPesanan";

// selalu ikutkan 2 file ini untuk dapat menjalankan fungsi dan konek database
require "config/connect.php";
require "config/function.php";

if (isset($_POST['batal'])) {
    $batal = $_POST['batal'];

    mysqli_query($conn, "UPDATE tb_transaksi SET status_transaksi = 'batal' WHERE kd_transaksi = $batal;");
    echo "<script>";
    echo "alert('Pesanan telah dibatalkan!')";
    echo "</script>";
}

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $itemActive = $status;
    $data = query("SELECT a.*, b.nama, b.kd_pembeli, c.kd_akun FROM tb_transaksi a
    INNER JOIN tb_pembeli b ON a.kd_pembeli = b.kd_pembeli
    INNER JOIN tb_akun c ON b.kd_akun = c.kd_akun
    AND a.status_transaksi = '$status'
    ;");
} else {
    $data = query("SELECT a.*, b.nama, b.kd_pembeli, c.kd_akun FROM tb_transaksi a
    INNER JOIN tb_pembeli b ON a.kd_pembeli = b.kd_pembeli
    INNER JOIN tb_akun c ON b.kd_akun = c.kd_akun ORDER BY a.kd_transaksi DESC
    ;");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Pesanan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom-style.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
                    </div>

                    <!-- Tabel produk -->
                    <div class="custom-table card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-dark"><?= (isset($status) ? ucfirst($status) : "Semua"); ?></h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pembeli</th>
                                            <th>Opsi Pembayaran</th>
                                            <th>Opsi Pengiriman</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($data as $d) : ?>
                                            <tr>
                                                <td>
                                                    <a class="btn btn-block btn-success btn-sm" href="detail-pesanan.php?id=<?= $d['kd_transaksi']; ?>">
                                                        Detail
                                                    </a>
                                                </td>
                                                <?php
                                                $alert = '';
                                                switch ($d['status_transaksi']) {
                                                    case 'batal':
                                                        $alert = "secondary";
                                                        break;
                                                    case 'tertunda':
                                                        $alert = "danger";
                                                        break;
                                                    case 'dikonfirmasi':
                                                        $alert = "warning";
                                                        break;
                                                    case 'menunggu':
                                                        $alert = "warning";
                                                        break;
                                                    case 'diproses':
                                                        $alert = "info";
                                                        break;
                                                    case 'dikirim':
                                                        $alert = "primary";
                                                        break;
                                                    case 'selesai':
                                                        $alert = "success";
                                                        break;
                                                }
                                                ?>
                                                <td>
                                                    <div class="alert text-center alert-<?= $alert; ?>">
                                                        <?= ucwords($d['status_transaksi']); ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?= $d['tgl_transaksi'] ?>
                                                </td>
                                                <td>
                                                    <?= htmlspecialchars($d['nama']) ?>
                                                </td>
                                                <td>
                                                    <?= $d['opsi_pembayaran'] ?>
                                                </td>
                                                <td>
                                                    <?= $d['opsi_pengiriman'] ?>
                                                </td>
                                                <td><?= number_format($d['total_bayar'], 0, '', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include "includes/footer.php"; ?>

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

    <!-- Script tabel produk -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>