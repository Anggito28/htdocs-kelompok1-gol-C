<?php
require "config/connect.php";
require "config/function.php";

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password1'];

    // cek email
    $result = mysqli_query($conn, "SELECT email, is_active, kd_akun FROM tb_akun WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if (isset($row['email'])) {
        if ($row['email'] === $email) {
            if ($row['is_active'] == 1) {
                header("Location: register.php?email=exist");
            } else {
                $kdAkun = $row['kd_akun'];
                mysqli_query($conn, "DELETE FROM tb_pembeli WHERE kd_akun = $kdAkun");
                mysqli_query($conn, "DELETE FROM tb_akun WHERE kd_akun = $kdAkun");
            }
        }
    }
}

if (isset($_POST['submit'])) {
    if (register($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil registrasi! email aktivasi telah dikirim.');
                alert('Klik link aktivasi yang telah dikirim di email anda, periksa bagian SPAM jika email tidak muncul.');
                location = 'login.php';
            </script>
                ";
    } else {
        echo mysqli_error($conn);
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
                        <a href="register.php" class="text-success">
                            <i class="fa fa-2x fa-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col">
                        <div class="px-4 pt-2 pb-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Lengkapi Data Diri</h1>
                            </div>
                            <form method="POST" action="">
                                <input type="hidden" name="email" id="email" value="<?= $email; ?>">
                                <input type="hidden" name="password" id="password" value="<?= $password; ?>">

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input maxlength="50" required type="text" class="form-control form-control-user" id="name" name="nama">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="telp">No. Telepon</label>
                                        <input maxlength="12" onkeypress="return onlyNumberKey(event)" required type="tel" class="form-control form-control-user" id="telp" name="telp">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="jenkel">Jenis Kelamin</label>
                                        <select required name="jenkel" id="jenkel" class="custom-select">
                                            <option value="">-- Jenis Kelamin --</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group mb-4">
                                    <label for="">Alamat</label>
                                    <select id="provinsi" required name="prov" class="custom-select">
                                        <option value="">-- Provinsi --</option>
                                        <?php
                                        $provinsi = query("SELECT * FROM wilayah_provinsi ORDER BY nama ASC");
                                        foreach ($provinsi as $prov) :
                                        ?>
                                            <option value="<?= $prov['id']; ?>"><?= $prov['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <select disabled id="kabupaten" required name="kab" class="custom-select">
                                        <option value="">-- Kabupaten --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select disabled id="kecamatan" required name="kec" class="custom-select">
                                        <option value="">-- Kecamatan --</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="detail">Detail alamat</label>
                                    <input required type="text" class="form-control form-control-user" id="detail" name="detail" placeholder="RT, RW, Linkungan/Desa/Dusun/Gang">
                                </div>

                                <button name="submit" type="submit" class="mt-5 btn btn-success btn-user btn-block">
                                    Registrasi Akun
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <span class="small">Sudah punya akun? <a href="login.php" class="text-success">Masuk!</a></span>
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
            let kabupatenSelect = "<option value='' >-- Kabupaten --</option>";
            let kecamatanSelect = "<option value='' >-- Kecamatan --</option>";

            //event ketika memilih provinsi
            $('#provinsi').on('change', function(event) {
                $.get('ajax/data-alamat.php?daerah=prov&provinsi=' + $('#provinsi').val(), function(data) {
                    if ($('#provinsi').val() != "") {
                        $('#kabupaten').html(data);
                        $('#kabupaten').prepend(kabupatenSelect);
                        $('#kabupaten').val("").removeAttr("disabled");
                        console.log("berhasil");
                    }
                });
            });

            $('#kabupaten').on('change', function(event) {
                $.get('ajax/data-alamat.php?daerah=kab&kabupaten=' + $('#kabupaten').val(), function(data) {
                    if ($('#kabupaten').val() != "") {
                        $('#kecamatan').html(data);
                        $('#kecamatan').prepend(kecamatanSelect);
                        $('#kecamatan').val("").removeAttr("disabled");
                        console.log("berhasil");
                    }
                });
            });

        });

        function onlyNumberKey(evt) {

            // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

</body>

</html>