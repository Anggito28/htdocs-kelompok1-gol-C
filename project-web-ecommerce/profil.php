<?php
session_start();

require "config/connect.php";
require "config/function.php";

// if (!isset($_SESSION["login"])) {
//     header("Location: index.php");
//     exit;
// }

$idAkun = $_SESSION['id'];

$data = query("SELECT tb_pembeli.*, tb_akun.email, tb_akun.foto_profil, wilayah_provinsi.nama AS prov, wilayah_kabupaten.nama AS kab, wilayah_kecamatan.nama AS kec FROM tb_pembeli 
INNER JOIN tb_akun ON tb_pembeli.kd_akun = tb_akun.kd_akun
INNER JOIN wilayah_provinsi ON tb_pembeli.id_provinsi = wilayah_provinsi.id
INNER JOIN wilayah_kabupaten ON tb_pembeli.id_kabupaten = wilayah_kabupaten.id
INNER JOIN wilayah_kecamatan ON tb_pembeli.id_kecamatan = wilayah_kecamatan.id
AND tb_pembeli.kd_akun = $idAkun")[0];

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

                            <h5 class="mb-0 my-auto">Profil User</h5>
                            <div class="d-inline-flex">
                                <a href="edit-profil.php" class="btn btn-success btn-sm"><i class="fa fa-edit mr-2"></i>Edit Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <!-- Isi card konten -->

                            <div class="row no-gutters justify-content-center">
                                <div class="col-md-10 col-sm-12">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item active"><a>Profil</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                            <div class="row no-gutters justify-content-center mb-4">
                                <div class="col-md-10 col-sm-12">
                                    <div class="card">
                                        <div class="card-body shadow-sm">
                                            <div class="row justify-content-center">

                                                <div class="col-md-5 col-sm-8">
                                                    <div class="shadow-sm mb-4">
                                                        <div class=" embed-responsive embed-responsive-1by1 ">
                                                            <?php if ($data['foto_profil'] == "empty") : ?>
                                                                <img src="img/default/user-default.svg" alt="Foto profil" style="object-fit: cover;" class="bg-light p-2 img-thumbnail embed-responsive-item">
                                                            <?php else : ?>
                                                                <img src="img/profile-picture/<?= $data['foto_profil']; ?>" alt="Foto profil" style="object-fit: cover;" class=" p-2 img-thumbnail embed-responsive-item">
                                                            <?php endif; ?>
                                                            <!-- <img src="asset/img/picture.svg" alt="Foto profil" style="object-fit: cover;" class="p-4 img-thumbnail embed-responsive-item"> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-7 pt-2">
                                                    <h6 class="mb-3">Data Diri</h6>
                                                    <div class="row no-gutters">
                                                        <div class="col-4">
                                                            Nama
                                                        </div>
                                                        <div class="col-8">
                                                            : <?= $data['nama']; ?>
                                                        </div>
                                                        <div class="col-4">
                                                            Jenis Kelamin
                                                        </div>
                                                        <div class="col-8">
                                                            : <?= ($data['jenis_kelamin'] == 'L' ? "Laki-laki" : "Perempuan"); ?>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-4">
                                                    <h6 class="mb-3">Kontak</h6>
                                                    <div class="row no-gutters">
                                                        <div class="col-4">
                                                            Email
                                                        </div>
                                                        <div class="col-8">
                                                            : <?= $data['email']; ?>
                                                        </div>
                                                        <div class="col-4">
                                                            Nomor HP
                                                        </div>
                                                        <div class="col-8">
                                                            : <?= $data['no_telepon']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <hr>
                                                    <h6 class="mb-3">Alamat</h6>
                                                    <div class="row no-gutters">
                                                        <div class="col">
                                                            <p>Provinsi <?= $data['prov']; ?>, <?= $data['kab']; ?>, <?= $data['kec']; ?>, Indonesia</p>
                                                            <small>
                                                                Detail alamat : <br> <?= $data['detail_alamat']; ?>
                                                            </small>
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
        </div>

        <!-- footer -->
        <?php include "includes/footer.php"; ?>
    </section>

    <?php include "includes/scripts.php"; ?>

</body>

</html>