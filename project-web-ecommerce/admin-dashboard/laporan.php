<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// dua variabel dibawah ini untuk indikator sidebar aktif
$sidebarActive = "sidebarLaporan";
// $itemActive = "";

// selalu ikutkan 2 file ini untuk dapat menjalankan fungsi dan konek database
require "config/connect.php";
require "config/function.php";

$query = query("SELECT tb_transaksi.*, tb_pembeli.* FROM tb_transaksi
INNER JOIN tb_pembeli ON tb_transaksi.kd_pembeli = tb_pembeli.kd_pembeli 
AND tb_transaksi.status_transaksi = 'selesai'
");

if (isset($_POST['submit'])) {
    if ($_POST['bulan'] != 0) {
        $bulan = date($_POST['bulan']);

        $query = query("SELECT tb_transaksi.*, tb_pembeli.* FROM tb_transaksi
        INNER JOIN tb_pembeli ON tb_transaksi.kd_pembeli = tb_pembeli.kd_pembeli AND MONTH(tb_transaksi.tgl_transaksi) = '$bulan' 
        AND tb_transaksi.status_transaksi = 'selesai'
        ");
    }
}

// hitung jumlah baris data
$baris = count($query);

?>

<!-- 
  ini adalah file template untuk membuat halaman baru di admin dashboard
  copy isi file ini lalu paste kan ke file halaman baru yang ingin dibuat
-->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Laporan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom-style.css">

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

                    <!-- konten halaman isi dibawah ini -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
                    </div>

                    <div class="card shadow">
                        <div class="card-body">
                            <!-- form kategori -->
                            <div class="col-md-4 pt-2">
                                <span>Jumlah data: <b><?= $baris ?></b></span>
                            </div>
                            <div class="col-md-8">
                                <form method="POST" action="" class="form-inline">
                                    <label for="date1" class="mr-2">Tampilkan transaksi bulan </label>
                                    <select class="form-control mr-2" name="bulan">
                                        <option value="0">Semua</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
                                </form>
                            </div>

                            <!-- isi table -->
                            <div class="card mb-4 mt-4">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="dataTable" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No Telepon</th>
                                                    <th>Total Bayar</th>
                                                    <th>Tgl. Transaksi</th>
                                                </tr>
                                            </thead>
                                            <?php

                                            $no = 1;
                                            foreach ($query as $data) {
                                            ?>

                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= ucwords(htmlspecialchars($data['nama'])) ?></td>
                                                    <td><?= $data['no_telepon'] ?></td>
                                                    <td><?= $data['total_bayar'] ?></td>
                                                    <td><?= date('d-M-Y', strtotime($data['tgl_transaksi'])) ?></td>
                                                </tr>

                                            <?php
                                            }
                                            ?>

                                        </table>
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

    <!-- Script tabel produk -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>