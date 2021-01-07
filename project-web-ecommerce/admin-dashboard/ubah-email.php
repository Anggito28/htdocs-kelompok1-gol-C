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

$idAkun = $_SESSION['id-admin'];

if (isset($_POST['submitUbahEmail'])) {
    // cek password
    $result = mysqli_query($conn, "SELECT password FROM tb_akun WHERE kd_akun = '$idAkun'");
    $row = mysqli_fetch_assoc($result);

    if (isset($row['password'])) {
        if (password_verify($_POST['password'], $row['password'])) {
            if (ubahEmail($_POST) > 0) {
                echo "
                        <script>
                            alert('email berhasil ubah!');
                            location = 'akun.php';
                        </script>";
            } else {
                echo mysqli_error($conn);
                echo "
                    <script>
                    alert('email gagal diubah!');
                    </script>";
            }
        } else {
            $error = true;
        }
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

    <title>Admin - Ubah email</title>

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
                                <ol class="breadcrumb bg-white shadow">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="akun.php">Akun</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ubah Email</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <!-- Isi card konten -->
                    <div class="row no-gutters justify-content-center mb-4">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Email</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body shadow-sm">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="kdAkun" value="<?= $idAkun; ?>">

                                        <div class="row justify-content-center mb-4">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body shadow-sm">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-7 pt-2">
                                                                <?php if (isset($error)) : ?>
                                                                    <div class="alert alert-danger" role="alert">
                                                                        Password salah!
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="form-group">
                                                                    <label for="emailBaru">Email Baru</label>
                                                                    <input placeholder="masukkan email baru..." oninvalid="this.setCustomValidity('format email tidak valid!')" oninput="setCustomValidity('')" maxlength="50" required type="email" class="form-control " id="emailBaru" name="emailBaru">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input placeholder="masukkan password..." required type="password" class="form-control form-control-user" id="password" name="password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-4">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body shadow-sm text-right">
                                                        <a href="profil.php?tab=2" class="btn btn-outline-secondary mr-2">Batal</a>
                                                        <button id="submitUbahEmail" name="submitUbahEmail" type="submit" class="btn btn-success">Simpan</button>
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