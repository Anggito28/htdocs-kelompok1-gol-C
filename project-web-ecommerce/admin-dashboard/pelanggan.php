<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// dua variabel dibawah ini untuk indikator sidebar aktif
$sidebarActive = "sidebarPelanggan";
// $itemActive = "";

// selalu ikutkan 2 file ini untuk dapat menjalankan fungsi dan konek database
require "config/connect.php";
require "config/function.php";

$data = query("SELECT tb_akun.email, tb_akun.is_active, tb_pembeli.*, wilayah_provinsi.nama AS prov, wilayah_kabupaten.nama AS kab, wilayah_kecamatan.nama AS kec FROM tb_pembeli 
INNER JOIN wilayah_provinsi ON tb_pembeli.id_provinsi = wilayah_provinsi.id
INNER JOIN wilayah_kabupaten ON tb_pembeli.id_kabupaten = wilayah_kabupaten.id
INNER JOIN wilayah_kecamatan ON tb_pembeli.id_kecamatan = wilayah_kecamatan.id
INNER JOIN tb_akun ON tb_akun.kd_akun = tb_pembeli.kd_akun
AND tb_akun.is_active = 1
");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Pelanggan</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
                    </div>

                    <!-- Tabel produk -->
                    <div class="custom-table card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-dark">Daftar Pelanggan</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. Telepon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($data as $d) : ?>
                                            <tr>
                                                <td>
                                                    <?= htmlspecialchars($d['nama']); ?>
                                                </td>
                                                <td>
                                                    <?= htmlspecialchars($d['email']); ?>
                                                </td>
                                                <td>
                                                    <?= $d['no_telepon']; ?>
                                                </td>
                                                <td>
                                                    <p> <?= htmlspecialchars($d['detail_alamat']); ?><br>
                                                        <?= $d['kec']; ?>, <?= $d['kab']; ?>, Provinsi <?= $d['prov']; ?>, Indonesia
                                                    </p>
                                                </td>
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