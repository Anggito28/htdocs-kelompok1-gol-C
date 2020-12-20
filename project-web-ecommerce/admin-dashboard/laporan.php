<?php
// dua variabel dibawah ini untuk indikator sidebar aktif
// $sidebarActive = "";
// $itemActive = "";

// selalu ikutkan 2 file ini untuk dapat menjalankan fungsi dan konek database
require "config/connect.php";
require "config/function.php";
include "config/connect.php";
if (isset($_POST['submit'])) {
    $bulan = date($_POST['bulan']);

    if (!empty($bulan)) {
        // perintah tampil data berdasarkan periode bulan
        $query = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE MONTH(tgl_transaksi) = '$bulan'");
    } else {
        // perintah tampil semua data
        $query = mysqli_query($conn, "SELECT * FROM tb_transaksi p");
    }
} else {
    // perintah tampil semua data
    $query = mysqli_query($conn, "SELECT * FROM tb_transaksi");
}

// hitung jumlah baris data
$baris = $query->num_rows;

?>

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

    <title>SB Admin 2 - Blank</title>

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

                    <!-- konten halaman isi dibawah ini -->

                    <!-- Page Heading -->
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        </ol>
                    </nav>
                    <!-- form kategori -->
                    <div class="col-md-4 pt-2">
                        <span>Jumlah data: <b><?= $baris ?></b></span>
                    </div>
                    <div class="col-md-8">
                        <form method="POST" action="" class="form-inline">
                            <label for="date1" class="mr-2">Tampilkan transaksi bulan </label>
                            <select class="form-control mr-2" name="bulan">
                                <option value="">Semua</option>
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
                </div>
                <!-- isi table -->
                <div class="mt-3" style="max-height: 340px; overflow-y: auto;">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Total Bayar</th>
                                <th>Bukti Transfer</th>
                                <th>Tgl. Transaksi</th>
                            </tr>
                        </thead>
                        <?php

                        $no = 1;
                        while ($data = $query->fetch_assoc()) {
                        ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= ucwords($data['kd_transaksi']) ?></td>
                                <td><?= $data['status_transaksi'] ?></td>
                                <td><?= $data['total_bayar'] ?></td>
                                <td><?= $data['bukti_transfer'] ?></td>
                                <td><?= date('d-M-Y', strtotime($data['tgl_transaksi'])) ?></td>
                            </tr>

                        <?php
                        }
                        ?>

                    </table>


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