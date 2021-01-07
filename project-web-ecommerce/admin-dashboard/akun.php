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

    <title>Admin - Akun</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Akun</h1>

                    <div class="row no-gutters justify-content-center mb-4">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active">Data Akun</a>
                                        </li>
                                        <?php if ($_SESSION['jenis-akun'] == "superuser") : ?>
                                            <li class="nav-item">
                                                <a href="daftar-akun.php" class="nav-link">Daftar Akun</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="card-body shadow-sm">

                                    <div class="row justify-content-center mb-4">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body shadow-sm">
                                                    <div class="row justify-content-center">

                                                        <div class="col-md-7 pt-2">
                                                            <div class="form-group">
                                                                <div class="d-flex justify-content-between">
                                                                    <label for="name">Email</label>
                                                                    <a href="ubah-email.php" class="text-success small font-weight-bold">Ubah Email</a>
                                                                </div>
                                                                <p class="form-control bg-light"><?= $_SESSION['email-admin']; ?></p>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="d-flex justify-content-between">
                                                                    <label for="jenkel">Password</label>
                                                                    <a href="ubah-password.php" class="text-success font-weight-bold small">Ubah Password</a>
                                                                </div>
                                                                <p class="form-control bg-light">*******</p>
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