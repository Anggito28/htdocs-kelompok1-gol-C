<?php
$sidebarActive = "sidebarProduk";
$itemActive = "dropdownDaftarProduk"
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Produk</title>

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
            <h1 class="h3 mb-0 text-gray-800">Daftar Produk</h1>
          </div>

          <!-- Tabel produk -->
          <div class="custom-table card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-dark">Daftar Produk</h6>
              <div class="dropdown">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Menu Lain
                </button>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item text-dark" href="tambah-produk.php">Tambah Produk</a>
                  <a href="#" class="dropdown-item text-dark" data-toggle="modal" data-target="#staticBackdrop">Kategori</a>
                </div>
              </div>
            </div>

            <!-- modal kategori -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table text-capitalize">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kategori</th>
                          <th class="text-right">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "db_ecommerce_tanaman_hias");
                        $showKategori = mysqli_query($conn, "SELECT * FROM tb_kategori;");
                        $num = 1;
                        while ($dataKategori = mysqli_fetch_array($showKategori)) :
                        ?>
                          <tr>
                            <td><?= $num++; ?></td>
                            <td><?= $dataKategori['kategori']; ?></td>
                            <td class="align-middle text-right">
                              <div class="btn-group btn-group-sm" role="group" aria-label="aksi">
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                              </div>
                            </td>
                          </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Tambah Kategori</button>
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
                    <?php include "includes/table-product.php" ?>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>