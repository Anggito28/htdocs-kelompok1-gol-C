<?php
session_start();

require "config/connect.php";
require "config/function.php";

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$idAkun = $_SESSION['id'];
$kdPembeli = query("SELECT kd_pembeli FROM tb_pembeli WHERE kd_akun = $idAkun;")[0]['kd_pembeli'];

$transaksi = query("SELECT * FROM tb_transaksi WHERE kd_pembeli = $kdPembeli ORDER BY kd_transaksi DESC");

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

    <!-- Custom styles for this page -->
    <link href="admin-dashboard/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>Transaksi - Rudi Bonsai</title>
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
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card min-vh-100">
                        <div class="card-header bg-light">
                            <h6>
                                Daftar Transaksi
                            </h6>
                        </div>
                        <div class="card-body shadow">
                            <!-- Isi card konten -->
                            <table id="dataTable" class="table table-striped table-responsive-sm text-center" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Status Transaksi</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $trans) : ?>
                                        <tr>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="detail-transaksi.php?id=<?= $trans['kd_transaksi']; ?>">Detail</a>
                                            </td>
                                            <td><?= $trans['tgl_transaksi']; ?></td>
                                            <?php
                                            $alert = '';
                                            switch ($trans['status_transaksi']) {
                                                case 'batal':
                                                    $alert = "secondary";
                                                    break;
                                                case 'tertunda':
                                                    $alert = "danger";
                                                    break;
                                                case 'menunggu':
                                                    $alert = "warning";
                                                    break;
                                                case 'dikonfirmasi':
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
                                                    <?= ucwords($trans['status_transaksi']); ?>
                                                </div>
                                            </td>
                                            <td><?= number_format($trans['total_bayar'], 0, '', '.'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- footer -->
        <?php include "includes/footer.php"; ?>
    </section>

    <?php include "includes/scripts.php"; ?>

    <!-- Script tabel produk -->
    <script src="admin-dashboard/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin-dashboard/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin-dashboard/js/demo/datatables-demo.js"></script>

</body>

</html>