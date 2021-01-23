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

if (isset($_POST['hapus'])) {
    $kdAkun = $_POST['hapus'];

    mysqli_query($conn, "DELETE FROM tb_akun WHERE kd_akun = $kdAkun");
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>";
        echo "alert('berhasil dihapus!')";
        echo "</script>";
    }
}

$data = query("SELECT email, kd_akun, jenis_akun FROM tb_akun WHERE NOT jenis_akun = 'pembeli'");

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

    <title>Admin - Daftar akun</title>

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

                    <h1 class="h3 mb-4 text-gray-800">Akun</h1>

                    <div class="row no-gutters mb-4">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a href="akun.php" class="nav-link">Data Akun</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active">Daftar Akun</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body shadow-sm">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <a href="tambah-admin.php" class="text-white btn btn-success btn-sm">Tambah Admin</a>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <table class="table table-responsive-sm" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            No.
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Jenis Akun
                                                        </th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($data as $d) : ?>
                                                        <tr>
                                                            <td>
                                                                <?= $i++; ?>
                                                            </td>
                                                            <td>
                                                                <?= htmlspecialchars($d['email']); ?>
                                                            </td>
                                                            <td>
                                                                <?= $d['jenis_akun']; ?>
                                                            </td>
                                                            <td>
                                                                <form action="" method="POST">
                                                                    <button <?= ($d['jenis_akun'] == "superuser" ? "disabled" : ""); ?> onclick="return confirm('Konfirmasi, apakah anda ingin menghapus akun ini?')" type="submit" name="hapus" value="<?= $d['kd_akun']; ?>" class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
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

    <!-- Script tabel produk -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>