<?php
require "config/connect.php";
require "config/function.php";

if (isset($_POST['submit'])) {
    if (ubahPassword($_POST) > 0) {
        $kdAkun = $_POST['kdAkun'];
        mysqli_query($conn, "DELETE FROM auth WHERE kd_akun = $kdAkun");

        echo "
        <script>
        alert('password berhasil diubah!');
        location = 'index.php';
        </script>";

        exit;
    } else {
        echo mysqli_error($conn);
        echo "
        <script>
        alert('password gagal diubah!');
        location = 'index.php';
        </script>";
    }
}

// cek kode autentikasi
if (!(isset($_GET["code"]) && isset($_GET['kdAkun']))) {
    header("Location: index.php");
}

$code = $_GET['code'];
$kdAkun = $_GET['kdAkun'];

$auth = query("SELECT auth_code FROM auth WHERE kd_akun = $kdAkun")[0];

if (!(isset($auth['auth_code']))) {
    header("Location: index.php");
}

if (!(password_verify($code, $auth['auth_code']))) {
    header("Location: index.php");
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


    <div class="container">

        <div class="card col-xl-7 col-lg-9 mx-auto o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="ml-3 pl-3 mt-4">
                        <a href="index.php" class="text-success">
                            <i class="fa fa-2x fa-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col">
                        <div class="px-4 pb-5 pt-2">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ubah password</h1>
                            </div>
                            <form method="POST" action="">
                                <input type="hidden" name="kdAkun" value="<?= $kdAkun; ?>">
                                <div class="form-group">
                                    <label for="password1">Password Baru</label>
                                    <input oninvalid="this.setCustomValidity('password terlalu pendek!')" oninput="setCustomValidity('')" minlength="8" required type="password" class="form-control form-control-user" id="password1" name="passwordBaru1">
                                    <small>Password minimal 8 karakter</small>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password Baru</label>
                                    <input oninvalid="this.setCustomValidity('password terlalu pendek!')" oninput="setCustomValidity('')" minlength="8" required type="password" class="form-control form-control-user" id="password2" name="passwordBaru2">
                                </div>
                                <button id="submit" name="submit" type="submit" class="btn btn-success btn-user btn-block">
                                    Submit
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include "includes/scripts.php"; ?>

    <script>
        $(document).ready(function() {
            $('#submit').click(function(event) {

                data = $('#password1').val();
                let len = data.length;

                if ($('#password1').val() != $('#password2').val()) {
                    alert("Password dan Konfirmasi Password tidak sama!");
                    // Prevent form submission
                    event.preventDefault();
                }

            });
        });
    </script>

</body>

</html>