<?php
session_start();

require "config/connect.php";
require "config/function.php";

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$idAkun = $_SESSION['id'];

if (isset($_POST['submitUbahPassword'])) {
    // cek password
    $result = mysqli_query($conn, "SELECT password FROM tb_akun WHERE kd_akun = '$idAkun'");
    $row = mysqli_fetch_assoc($result);

    if (isset($row['password'])) {
        if (password_verify($_POST['password'], $row['password'])) {
            if ($_POST['passwordBaru1'] == $_POST['passwordBaru2']) {
                if (ubahPassword($_POST) > 0) {
                    echo "
                    <script>
                    alert('password berhasil diubah!');
                    location = 'profil.php?tab=2';
                    </script>";
                } else {
                    echo mysqli_error($conn);
                    echo "
                    <script>
                    alert('password gagal diubah!');
                    </script>";
                }
            } else {
                echo "
                    <script>
                    alert('password konfirmasi tidak sama!');
                    </script>";
            }
        } else {
            $error = true;
        }
    }
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

    <title>Ubah password - Rudi Bonsai</title>
</head>

<body class="bg-light">

    <!-- topbar header -->
    <?php include "includes/topbar.php"; ?>

    <section class="content">
        <div class="container">

            <!-- Header konten -->
            <div class="row no-gutters justify-content-center">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white shadow">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="profil.php?tab=2">Profil Pengguna</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
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
                                    <a class="nav-link active" href="#">Password</a>
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
                                                            <label for="password">Password Lama</label>
                                                            <input placeholder="masukkan password..." required type="password" class="form-control form-control-user" id="password" name="password">
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="password">Password Baru</label>
                                                            <input placeholder="masukkan password baru..." required type="password" class="form-control form-control-user" id="passwordBaru1" name="passwordBaru1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Konfirmasi Password</label>
                                                            <input placeholder="tulis ulang password baru..." required type="password" class="form-control form-control-user" id="passwordBaru2" name="passwordBaru2">
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
                                                <button id="submitUbahPassword" name="submitUbahPassword" type="submit" class="btn btn-success">Simpan</button>
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

        <!-- footer -->
        <?php include "includes/footer.php"; ?>
    </section>

    <?php include "includes/scripts.php"; ?>

</body>

</html>