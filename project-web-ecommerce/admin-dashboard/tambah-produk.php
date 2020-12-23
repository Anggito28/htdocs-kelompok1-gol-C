<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$sidebarActive = "sidebarProduk";
$itemActive = "dropdownTambahProduk";

require "config/connect.php";
require "config/function.php";

if (isset($_POST['simpan-produk'])) {
    if (tambahProduk($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            location = 'produk.php';
        </script>";
    } else {
        echo mysqli_error($conn);
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            location = 'produk.php';
        </script>";
    }
}

if (isset($_POST['simpan-kategori'])) {
    $kategoriBaru = $_POST['kategori'];
    $simpan = "INSERT INTO tb_kategori VALUES (0, '$kategoriBaru')";

    mysqli_query($conn, $simpan);
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

    <title>Admin - Tambah produk</title>

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

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white shadow-sm mb-4">
                                    <li class="breadcrumb-item"><a href="produk.php">Daftar Produk</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <!-- Card tambah produk -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark text-capitalize">Form tambah produk</h6>
                                </div>
                                <div class="card-body">

                                    <form class="custom-form" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row mb-4">
                                            <label class="col-md-4 col-form-label font-weight-bold" for="nama">Nama Produk</label>
                                            <div class="col-md-8">
                                                <input maxlength="50" required type="text" name="nama-produk" id="nama-produk" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-4 font-weight-bold" for="kategori">Kategori</label>
                                            <div class="col-md-4 select-kategori">
                                                <select required name="kategori" class="form-control custom-select" id="kategori">
                                                    <option class="text-center" value="">--- Pilih Kategori ---</option>
                                                    <?php
                                                    $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
                                                    while ($dataKategori = mysqli_fetch_array($kategori)) {
                                                    ?>
                                                        <option value="<?= $dataKategori['kd_kategori']; ?>"><?= ucwords($dataKategori['kategori']); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <!--Tombol Tambah kategori -->
                                            <div class="col-md-4">
                                                <!-- Button tambah kategori -->
                                                <button type="button" class="btn btn-outline-primary custom-btn" data-toggle="modal" data-target="#tambahKategori">
                                                    <i class="fa fa-fw fa-plus-square"></i>
                                                    <span>Kategori Baru</span>
                                                </button>
                                            </div>

                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-4 font-weight-bold" for="stok">Stok</label>
                                            <div class="col-md-4 col-sm-6">
                                                <input maxlength="5" required type="number" min="1" name="stok" id="stok" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-4 font-weight-bold" for="harga">Harga</label>
                                            <div class="input-group col-md-4 col-sm-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Rp</div>
                                                </div>
                                                <input maxlength="13" required type="number" min="1" name="harga" id="harga" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-4 font-weight-bold" for="harga">Deskripsi</label>
                                            <div class="col">
                                                <textarea required name="deskripsi" id="deskripsi" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-4 font-weight-bold" for="foto-produk">Upload foto produk</label>
                                            <div class="col">
                                                <input required name="image" type="file" class="form-control-file" id="foto-produk">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row-reverse mb-5">
                                            <button id="simpan-produk" name="simpan-produk" type="submit" class="btn btn-primary ml-3">Simpan</button>
                                            <button type="reset" class="btn btn-secondary ml-3">Reset</button>
                                            <a id="batal-produk" class="btn btn-outline-secondary" href="produk.php">Batal</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Pop-up tambah kategori -->
                <div class="modal fade" id="tambahKategori" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                                <button id="close-kategori" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="kategori" id="inputKategori" class="form-control" placeholder="Masukkan kategori baru...">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button name="simpan-kategori" type="submit" id="simpan-kategori" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Tambah kategori -->

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