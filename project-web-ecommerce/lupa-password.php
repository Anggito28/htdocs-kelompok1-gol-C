<?php
session_start();
require "config/connect.php";
require "config/function.php";

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// cek login
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // cek email
    $result = mysqli_query($conn, "SELECT email, kd_akun, is_active FROM tb_akun WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if (isset($row['email'])) {
        if ($row['is_active'] != 0) {
            $kdAkun = $row['kd_akun'];

            // cek apakah sudah ada kode auth
            $dbAuth = query("SELECT auth_code FROM auth WHERE kd_akun = $kdAkun");

            // hapus kode auth lama
            if (isset($dbAuth)) {
                mysqli_query($conn, "DELETE FROM auth WHERE kd_akun = $kdAkun");
            }

            // generate auth code
            $authCode = hash('md5', uniqid());

            require "config/auth-url.php";
            $mailBody = 'Klik link berikut untuk memperbarui password, ' . "$url" . "password-baru.php?code=" . "$authCode" . "&kdAkun=$kdAkun";

            kirimEmail($email, "Lupa password - Rudi Bonsai", $mailBody);

            // hash auth code
            $authCode = password_hash($authCode, PASSWORD_DEFAULT);

            // simpan auth ke database
            mysqli_query($conn, "INSERT INTO auth VALUES (0, $kdAkun, '$authCode')");

            echo "<script>";
            echo "alert('email telah dikirim');";
            // echo "location = 'login.php';";
            echo "</script>";
        } else {
            $error = true;
        }
    } else {
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

    <title>Lupa password - Rudi Bonsai</title>
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
                                <a href="login.php" class="text-success">
                                    <i class="fa fa-2x fa-arrow-circle-left"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col mx-auto">
                                <div class="px-5 pb-5 pt-2">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Lupa Password!</h1>
                                    </div>
                                    <form method="POST" action="">
                                        <?php if (isset($error)) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                email tidak terdaftar!
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input oninvalid="this.setCustomValidity('format email tidak valid!')" oninput="setCustomValidity('')" required type="email" class="form-control form-control-user" id="email" name="email">
                                        </div>
                                        <button name="submit" type="submit" class="btn btn-success btn-user btn-block">
                                            Submit
                                        </button>
                                    </form>

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