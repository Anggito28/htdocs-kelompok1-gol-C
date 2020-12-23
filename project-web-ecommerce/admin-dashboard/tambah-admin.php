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

if (isset($_POST['register'])) {
    if ($_POST['password1'] == $_POST['password2']) {
        if (register($_POST) > 0) {
            echo "
                <script>
                    alert('Success to register!');
                    location = 'daftar-akun.php';
                </script>
                    ";
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo "
            <script>
            alert('password konfirmasi tidak sama!');
            </script>";
    }
}

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

    <title>Admin - Tambah admin</title>

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

                    <!-- Header konten -->
                    <div class="row no-gutters justify-content-center">
                        <div class="col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb border border-light bg-white shadow-sm">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="daftar-akun.php">Daftar Akun</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <!-- Isi card konten -->
                    <div class="row no-gutters justify-content-center mb-4">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-body">

                                    <form action="" method="POST">

                                        <!-- Nested Row within Card Body -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="px-4 pb-5 pt-2">
                                                    <div class="text-center">
                                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input oninvalid="this.setCustomValidity('format email tidak valid!')" oninput="setCustomValidity('')" maxlength="50" required type="email" class="form-control form-control-user" id="email" name="email">
                                                        <small>Contoh : email@rudibonsai.com</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password1">Password</label>
                                                        <input oninvalid="this.setCustomValidity('password terlalu pendek!')" oninput="setCustomValidity('')" minlength="8" required type="password" class="form-control form-control-user" id="password1" name="password1">
                                                        <small>Password minimal 8 karakter</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password2">Konfirmasi Password</label>
                                                        <input oninvalid="this.setCustomValidity('password terlalu pendek!')" oninput="setCustomValidity('')" minlength="8" required type="password" class="form-control form-control-user" id="password2" name="password2">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-4">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body shadow-sm text-right">
                                                        <a href="daftar-akun.php" class="btn btn-outline-secondary mr-2">Batal</a>
                                                        <button id="register" name="register" type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

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