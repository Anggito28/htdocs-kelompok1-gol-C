<?php
session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}

$sidebarActive = "sidebarProduk";
$itemActive = "dropdownDaftarProduk";

require "config/connect.php";
require "config/function.php";

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
              <h6 class="m-0 font-weight-bold text-dark">Semua</h6>
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

                        <form method="GET" id="formHapusKategori" action="ajax/ajax-hapus-kategori.php">
                          <?php include "ajax/data-popup-kategori.php"; ?>
                        </form>

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

                <table class="table" id="dataTable" style="width:100%">
                  <thead>
                    <tr>
                      <th style="width: 100px;">Aksi</th>
                      <th id="tbFoto">Foto</th>
                      <th>Nama</th>
                      <th id="tbStok">Stok</th>
                      <th id="tbHarga">Harga</th>
                      <th>Kategori</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $produk = mysqli_query($conn, "SELECT tb_produk.*, tb_kategori.kategori FROM tb_produk INNER JOIN tb_kategori ON tb_produk.kd_kategori=tb_kategori.kd_kategori");
                    while ($data = mysqli_fetch_array($produk)) {
                    ?>

                      <tr>

                        <td class="align-middle align-items-center">

                          <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Atur
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="edit-produk.php?id=<?= $data['id_produk']; ?>">
                                <span class="mr-1">
                                  <i class="fas fa-edit"></i>
                                </span>
                                <span>Edit</span>
                              </a>
                              <a onclick="return confirm('Konfirmasi hapus, apakah anda ingin menghapus produk ini?')" class="dropdown-item" href="hapus-produk.php?id=<?= $data['id_produk']; ?>">
                                <span class="mr-1">
                                  <i class="fas fa-trash"></i>
                                </span>
                                <span>Hapus</span>
                              </a>
                            </div>
                          </div>

                        </td>

                        <td class="align-middle">
                          <div class="custom-img-size">
                            <div class="embed-responsive embed-responsive-16by9">
                              <img alt="product-image" class="embed-responsive-item img-fit" src="img/produk/<?= htmlspecialchars($data['image']); ?>" />
                            </div>
                          </div>
                        </td>

                        <td>
                          <p>
                            <?= ucfirst(htmlspecialchars($data['nama_produk'])); ?>
                            <?php $desc = $data['deskripsi'] ?>
                          </p>
                          <small>
                            <a href="#" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<?= ucfirst(htmlspecialchars($desc)); ?>"> <span class="font-weight-bold">(Deskripsi)</span></a>
                          </small>
                        </td>
                        <td>
                          <div class="input-group-prepend">
                            <div class="input-group-text bg-light"><?= htmlspecialchars($data['stok']); ?></div>
                          </div>
                        </td>

                        <td>
                          <div class="custom-harga">
                            <div class="input-group ">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                              </div>
                              <input disabled type="text" class="form-control bg-white" value="<?= htmlspecialchars(number_format($data['harga'], 0, '', ".")); ?>">
                            </div>
                          </div>
                        </td>

                        <td><?= ucwords($data['kategori']); ?></td>
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

  <!-- Script tabel produk -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(function() {
      editKategori();
      tampilData()

      // ajax tambah kategori
      $("#formTambahKategori").submit(function(event) {
        event.preventDefault();

        // setup some local variables
        let $form = $(this);
        let $input = $form.find("input");
        let serializedData = $form.serialize();
        let tujuan = $form.attr("action");
        $input.val("");

        request = $.ajax({
          url: tujuan,
          type: "post",
          data: serializedData
        });

        request.done(function(response, textStatus, jqXHR) {
          // // Log a message to the console
          tampilData();
        });
      });

      // fungsi hapus kategori
      function hapusKategori() {
        $(".btnHapusKategori").click(function(event) {
          let target = $(event.target);
          let baris = target.parentsUntil("tbody");
          let idKategori = baris.find("input:eq(1)").val();

          $.get("ajax/ajax-hapus-kategori.php?id=" + idKategori, function(data) {
            tampilData();
          });
        });
      }

      // fungsi simpan edit
      function simpanEdit() {
        $(".btnSaveEdit").click(function(event) {
          let target = $(event.target);
          let baris = target.parentsUntil("tbody");
          let idKategori = baris.find("input:eq(1)").val();
          let kategoriBaru = baris.find("input:eq(0)").val();

          $.get("ajax/ajax-edit-kategori.php?id=" + idKategori + "&kategori=" + kategoriBaru, function(data) {
            tampilData();
          });
        });
      }

      // fungsi tampil data
      function tampilData() {
        $.get('ajax/data-popup-kategori.php', function(data) {
          $("#tbodyKategori").empty().append(data);
          hapusKategori();
          simpanEdit();
          editKategori();
        });
      }

      // fungsi toggle button aksi kategori
      function editKategori() {
        $(".btnEditKategori").click(function(event) {
          let target = $(event.target);
          let baris = target.parentsUntil("tbody");
          let listKategori = target.parentsUntil("table");
          let edit = $("button.btnEditKategori");
          let hapus = $("button.btnHapusKategori");
          let simpan = baris.find("button.btnSaveEdit");
          let batal = baris.find("button.btnCancelEdit");
          let formKategori = baris.parent().find("form");

          baris.find("input:first").prop("disabled", false);

          $("#formHapusKategori").removeAttr("action").attr("action", "ajax/ajax-edit-kategori.php");
          $("#formHapusKategori").removeAttr("id").attr("id", "formEditKategori");

          edit.hide();
          hapus.hide();

          baris.find("input:eq(0)").attr("name", "inputEditKategori");
          baris.find("input:eq(1)").attr("name", "idKategori");

          simpan.show();
          batal.show();

          batal.click(function() {
            batal.hide();
            simpan.hide();
            edit.show();
            hapus.show();
            baris.find("input:first").prop("disabled", true);
            baris.find("input:eq(0)").removeAttr("name");
            baris.find("input:eq(1)").removeAttr("name");

            $("#formEditKategori").removeAttr("action").attr("action", "ajax/ajax-hapus-kategori.php");
            $("#formEditKategori").removeAttr("id").attr("id", "formHapusKategori");

          });
        });
      }

      // popover deskripsi produk
      $('[data-toggle="popover"]').popover();

    });
  </script>

</body>

</html>