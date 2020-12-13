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

if (isset($_POST['submitEditProfil'])) {
    // var_dump($_POST);
    // exit;
    if (editProfil($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diedit!');
            location = 'profil.php';
        </script>";
    } else {
        echo mysqli_error($conn);
        echo "
        <script>
            alert('Data gagal diedit!');
            location = 'profil.php';
        </script>";
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

    <title>Profil - Rudi Bonsai</title>
</head>

<body class="bg-light">

    <!-- topbar header -->
    <?php //include "includes/topbar.php"; 
    ?>

    <section class="content">
        <div class="container">

            <!-- Header konten -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body d-flex justify-content-between">

                            <h5 class="mb-0 my-auto">Edit Profil</h5>
                            <div class="d-inline-flex">
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
                                            <li class="breadcrumb-item"><a href="profil.php">Profil</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="kdAkun" value="<?= $idAkun; ?>">
                                <div class="row justify-content-center mb-4">
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
                                                        <h6 class="text-center">Data Diri</h6>
                                                        <div class="form-group">
                                                            <label for="name">Nama</label>
                                                            <input value="<?= $data['nama']; ?>" maxlength="50" required type="text" class="form-control" id="name" name="nama">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenkel">Jenis Kelamin</label>
                                                            <select required name="jenkel" id="jenkel" class="form-control custom-select">
                                                                <option value="">-- Jenis Kelamin --</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="foto-profil">Upload foto profil</label>
                                                            <input name="image" type="file" class="form-control-file" id="foto-profil">
                                                            <input type="hidden" value="<?= $data['foto_profil']; ?>" name="image-old">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=" row justify-content-center mb-4">
                                    <div class="col-md-10 col-sm-12">
                                        <div class="card">
                                            <div class="card-body shadow-sm">
                                                <h6 class="text-center">Kontak</h6>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input value="<?= $data['email']; ?>" oninvalid="this.setCustomValidity('format email tidak valid!')" oninput="setCustomValidity('')" maxlength="50" required type="email" class="form-control " id="email" name="email">
                                                    <small>Contoh : email@rudibonsai.com</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telp">No. Telepon</label>
                                                    <input value="<?= $data['no_telepon']; ?>" maxlength="12" onkeypress="return onlyNumberKey(event)" required type="tel" class="form-control " id="telp" name="telp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-10 col-sm-12">
                                        <div class="card">
                                            <div class="card-body shadow-sm">
                                                <div class="form-group mb-4">
                                                    <h6>Alamat</h6>
                                                    <select id="provinsi" required name="prov" class="custom-select">
                                                        <option value="<?= $data['id_provinsi']; ?>"><?= $data['prov']; ?></option>
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
                                                        <option selected value="<?= $data['id_kabupaten']; ?>"><?= $data['kab']; ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select disabled id="kecamatan" required name="kec" class="custom-select">
                                                        <option selected value="<?= $data['id_kecamatan']; ?>"><?= $data['kec']; ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail">Detail alamat</label>
                                                    <input value="<?= $data['detail_alamat']; ?>" required type="text" class="form-control " id="detail" name="detail" placeholder="RT, RW, Linkungan/Desa/Dusun/Gang">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-10 col-sm-12">
                                        <div class="card">
                                            <div class="card-body shadow-sm text-right">
                                                <a href="profil.php" class="btn btn-outline-secondary mr-2">Batal</a>
                                                <button id="submitProfil" name="submitEditProfil" type="submit" class="btn btn-success">Simpan</button>
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

    <?php $jenkel = $data['jenis_kelamin'] ?>

    <script>
        $(document).ready(function() {
            $("select#jenkel option[value='<?= $jenkel; ?>']").attr("selected", "selected");
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#submitProfil").click(function(event) {
                $("#kabupaten").removeAttr("disabled");
                $("#kecamatan").removeAttr("disabled");
            });
        });
    </script>

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