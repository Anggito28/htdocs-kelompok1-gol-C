<?php
$sidebarActive = "sidebarProduk";
$itemActive = "dropdownDaftarProduk";

?>

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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Produk</h1>
                    </div>

                    <!-- Tabel produk -->
                    <div class="custom-table card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-dark">Daftar Produk</h6>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Menu Lain
                                </button>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-dark" href="tambah-produk.php">Tambah Produk</a>
                                    <a href="#" class="dropdown-item text-dark" data-toggle="modal" data-target="#popupKategori">Kategori</a>
                                </div>
                            </div>
                        </div>

                        <!-- popup kategori -->
                        <!-- modal kategori -->
                        <div class="modal fade" id="popupKategori" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="popupKategoriLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <!-- form tambah kategori -->
                                        <form id="formTambahKategori" action="../admin-dashboard/ajax/ajax-kategori.php" method="POST">
                                            <div class="d-flex justify-content-between mb-3">
                                                <input required style="width:82%;" type="text" name="inputTambahKategori" id="inputKategori" class="form-control" placeholder="Masukkan kategori baru...">
                                                <button name="tambahKategori" type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                            </div>
                                        </form>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Kategori</th>
                                                    <th class="text-right">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyKategori">

                                                <!-- data popup kategori -->
                                                <?php
                                                require_once "config/function.php";

                                                $showKategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kd_kategori DESC;");
                                                $num = 1;
                                                while ($dataKategori = mysqli_fetch_array($showKategori)) :

                                                    // while ($num < 5) :

                                                ?>
                                                    <tr>
                                                        <td>
                                                            <input disabled class="form-control text-capitalize" type="text" value="<?= $num++; ?>">
                                                        </td>
                                                        <td class="align-middle text-right">
                                                            <div class="btn-group btn-group-sm" role="group" aria-label="aksi">
                                                                <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>

                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th id="tbAksi">Aksi</th>
                                            <th id="tbFoto">Foto</th>
                                            <th>Nama</th>
                                            <th id="tbStok">Stok</th>
                                            <th id="tbHarga">Harga</th>
                                            <th>Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        require_once "config/function.php";
                                        $produk = mysqli_query($conn, "SELECT tb_produk.id_produk, tb_produk.nama_produk, tb_produk.stok, tb_produk.harga, tb_produk.image, tb_kategori.kategori FROM tb_produk INNER JOIN tb_kategori ON tb_produk.kd_kategori=tb_kategori.kd_kategori");
                                        while ($data = mysqli_fetch_array($produk)) {
                                        ?>

                                            <tr class="text-capitalize">
                                                <td class="align-middle align-items-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a class="border-0 mr-2 btn btn-warning btn-icon-split btn-sm" href="#">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            <span class="text">edit</span>
                                                        </a>
                                                        <a class="border-0 btn btn-danger btn-icon-split btn-sm" href="#">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text">hapus</span>
                                                        </a>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="custom-img-size">
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <img alt="product-image" class="embed-responsive-item img-fit" src="img/produk/<?= $data['image']; ?>" />
                                                        </div>
                                                    </div>
                                                </td>

                                                <td><?= $data['nama_produk']; ?></td>

                                                <td><?= $data['stok']; ?></td>

                                                <td>
                                                    <div class="custom-harga">
                                                        <div class="input-group ">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Rp</div>
                                                            </div>
                                                            <input disabled type="text" class="form-control bg-white" value="<?= number_format($data['harga'], 0, '', "."); ?>">
                                                        </div>
                                                    </div>
                                                </td>

                                                <td><?= $data['kategori']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

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