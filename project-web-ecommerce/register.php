<?php
if (isset($_GET["email"])) {
    if ($_GET['email'] == "exist") {
        echo "
            <script>
                alert('email sudah terdaftar!');
            </script>
                ";
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

    <title>Register - Rudi Bonsai</title>
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
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                            </div>
                            <form method="POST" action="register-2.php">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input oninvalid="this.setCustomValidity('format email tidak valid!')" oninput="setCustomValidity('')" maxlength="50" required type="email" class="form-control form-control-user" id="email" name="email">
                                    <small>Contoh : email@rudibonsai.com</small>
                                </div>

                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input oninvalid="this.setCustomValidity('password terlalu pendek!')" oninput="setCustomValidity('')" minlength="8" required type="password" class="form-control form-control-user" id="password1" name="password1">
                                    <small>Password minimal 8 karakter</small>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input oninvalid="this.setCustomValidity('password terlalu pendek!')" oninput="setCustomValidity('')" minlength="8" required type="password" class="form-control form-control-user" id="password2" name="password2">
                                </div>
                                <button id="register" name="register" type="submit" class="btn btn-success btn-user btn-block">
                                    Selanjutnya
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <span class="small">Sudah punya akun? <a class="text-success" href="login.php">Masuk</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include "includes/scripts.php"; ?>

    <script>
        $(document).ready(function() {
            $('#register').click(function(event) {

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