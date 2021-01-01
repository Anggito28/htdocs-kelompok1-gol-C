<?php
session_start();
require "config/connect.php";
require "config/function.php";

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// cek login
if (isset($_POST['login'])) {
    if (login($_POST) == false) {
        $error = true;
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

    <title>Login - Rudi Bonsai</title>
</head>

<body class="bg-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="ml-5 pl-3 mt-4">
                                <a href="index.php" class="text-success">
                                    <i class="fa fa-2x fa-arrow-circle-left"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col mx-auto">
                                <div class="px-5 pb-5 pt-2">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form method="POST" action="">
                                        <?php if (isset($error)) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                email atau password salah!
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input oninvalid="this.setCustomValidity('format email tidak valid!')" oninput="setCustomValidity('')" required type="email" class="form-control form-control-user" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input required type="password" class="form-control form-control-user" id="password" name="password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div> -->
                                        <button name="login" type="submit" class="btn btn-success btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-success" href="lupa-password.php">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <span class="small">Belum punya akun? <a href="register.php" class="text-success">Daftar sekarang</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/scripts.php"; ?>

</body>

</html>