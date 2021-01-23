<?php
session_start();

require "config/connect.php";
require "config/function.php";

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$idAkun = $_SESSION['id'];
$tab = $_GET['tab'];

if ($tab == '1') {
    $data = query("SELECT tb_pembeli.*, tb_akun.foto_profil, wilayah_provinsi.nama AS prov, wilayah_kabupaten.nama AS kab, wilayah_kecamatan.nama AS kec FROM tb_pembeli 
    INNER JOIN tb_akun ON tb_pembeli.kd_akun = tb_akun.kd_akun
    INNER JOIN wilayah_provinsi ON tb_pembeli.id_provinsi = wilayah_provinsi.id
    INNER JOIN wilayah_kabupaten ON tb_pembeli.id_kabupaten = wilayah_kabupaten.id
    INNER JOIN wilayah_kecamatan ON tb_pembeli.id_kecamatan = wilayah_kecamatan.id
    AND tb_pembeli.kd_akun = $idAkun")[0];
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">

    <!-- custom style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Profil - Rudi Bonsai</title>
</head>

<body class="bg-light">

    <!-- topbar header -->
    <?php include "includes/topbar.php"; ?>

    <section class="content">
        <div class="container">

            <!-- Header konten -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body d-flex justify-content-between">
                            <h5 class="mb-0 my-auto">Profil Pengguna</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Isi card konten -->

            <div class="row no-gutters justify-content-center mb-4">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link <?= ($tab == 1 ? "active" : ""); ?>" href="profil.php?tab=1">Data Diri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= ($tab == 2 ? "active" : ""); ?>" href="profil.php?tab=2">Data Akun</a>
                                </li>
                                <?php if ($tab == "1") : ?>
                                    <li class="nav-item ml-auto">
                                        <a id="editBtn" href="edit-profil.php?tab=1" class="btn btn-success btn-sm"><i class="fa fa-edit mr-2"></i><span>Edit</span></a>
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

                                                <?php if ($tab !== "1") : ?>
                                                    <div class="col-md-7 pt-2">
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label for="name">Email</label>
                                                                <a href="ubah-email.php" class="text-success small font-weight-bold">Ubah Email</a>
                                                            </div>
                                                            <textarea disabled style="resize: none; white-space: nowrap; overflow-y: hidden; height: 38px;" class="form-control bg-light"><?= htmlspecialchars($_SESSION['email']); ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="d-flex justify-content-between">
                                                                <label for="jenkel">Password</label>
                                                                <a href="ubah-password.php" class="text-success font-weight-bold small">Ubah Password</a>
                                                            </div>
                                                            <p class="form-control bg-light">*******</p>
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="shadow-sm mb-4">
                                                            <div class=" embed-responsive embed-responsive-1by1 ">
                                                                <?php if ($data['foto_profil'] == "empty") : ?>
                                                                    <img src="img/default/user-default.svg" alt="Foto profil" style="object-fit: cover;" class="bg-light p-2 img-thumbnail embed-responsive-item">
                                                                <?php else : ?>
                                                                    <img src="img/profile-picture/<?= $data['foto_profil']; ?>" alt="Foto profil" style="object-fit: cover;" class=" p-2 img-thumbnail embed-responsive-item">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-7 pt-2">
                                                        <h6 class="text-center mb-3">Identitas</h6>
                                                        <div class="form-group">
                                                            <label for="name">Nama</label>
                                                            <p class="form-control bg-light"><?= htmlspecialchars($data['nama']); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenkel">Jenis Kelamin</label>
                                                            <p class="form-control bg-light"><?= ($data['jenis_kelamin'] == "L" ? "Laki-Laki" : "Perempuan"); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="telp">No. Telepon</label>
                                                            <p class="form-control bg-light"><?= $data['no_telepon']; ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if ($tab == "1") : ?>
                                <div class="row justify-content-center mb-4">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body shadow-sm">
                                                <h6 class="mb-3">Alamat</h6>
                                                <div class="row no-gutters">
                                                    <div class="col">
                                                        <p>Provinsi <?= $data['prov']; ?>, <?= $data['kab']; ?>, <?= $data['kec']; ?>, Indonesia</p>
                                                        <label>
                                                            Detail alamat :
                                                        </label>
                                                        <textarea disabled class="form-control bg-light"><?= htmlspecialchars($data['detail_alamat']); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include "includes/footer.php"; ?>
    </section>

    <?php include "includes/scripts.php"; ?>

    <script>
        $(document).ready(function() {
            $(window).width()

            // hide edit button
            if ($(window).width() < 375) {
                $("#editBtn span").empty();
                $("#editBtn i").removeClass("mr-2");
            }

            $(window).resize(function() {
                if ($(window).width() < 375) {
                    $("#editBtn span").empty();
                    $("#editBtn i").removeClass("mr-2");
                } else {
                    $("#editBtn span").text("Edit");
                    $("#editBtn i").addClass("mr-2");
                }
            });
        });
    </script>

</body>

</html>