<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// dua variabel dibawah ini untuk indikator sidebar aktif
// $sidebarActive = "";
// $itemActive = "";

// selalu ikutkan 2 file ini untuk dapat menjalankan fungsi dan konek database
require "config/connect.php";
require "config/function.php";

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

    <title>Admin - Edit pesanan</title>

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
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="pesanan-semua.php">Pesanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Konfirmasi</li>
                        </ol>
                    </nav>
                    <?php
                    include "config/connect.php";
                    $id = $_GET['kd_transaksi'];
                    $query_mysql = mysqli_query($conn, "select * from tb_transaksi where kd_transaksi = '$id'");
                    $nomor = 1;
                    while ($data = mysqli_fetch_array($query_mysql)) {
                    ?>
                        <form action="update-pesanan.php" method="POST">

                        </form>
                    <?php } ?>
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