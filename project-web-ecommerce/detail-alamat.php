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

    <title>Halaman - Rudi Bonsai</title>
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

                            <h5 class="mb-0 my-auto">Pengaturan Alamat</h5>
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
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Alamat Utama</label>
                            </div>
                            <br>
                            <form>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault01">Nama Depan</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="Contoh : Keren" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault02">Nama Belakang</label>
                                        <input type="text" class="form-control" id="validationDefault02" placeholder="Sidatora" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault04">Provinsi</label>
                                        <select class="custom-select" id="validationDefault04" required>
                                            <option selected disabled value="">Nanggroe Aceh Darussalam</option>
                                            <option>Sumatera Utara</option>
                                            <option>Sumatera Barat</option>
                                            <option>Riau</option>
                                            <option>Kepulauan Riau</option>
                                            <option>Jambi</option>
                                            <option>Bengkulu</option>
                                            <option>Sumatera Selatan</option>
                                            <option>Kepulauan Bangka Belitung</option>
                                            <option>Lampung</option>
                                            <option>Banten</option>
                                            <option>Dki Jakarta</option>
                                            <option>Jawa Barat</option>
                                            <option>Jawa Tengah</option>
                                            <option>Jawa Timur</option>
                                            <option>Di Yogyakarta</option>
                                            <option>Bali</option>
                                            <option>Nusa Tenggara Barat</option>
                                            <option>Nusa Tenggara Timur</option>
                                            <option>Kalimantan Barat</option>
                                            <option>Kalimantan Selatan</option>
                                            <option>Kalimantan Tengah</option>
                                            <option>Kalimantan Timur</option>
                                            <option>Kalimantan Utara</option>
                                            <option>Gorontalo</option>
                                            <option>Sulawesi Selatan</option>
                                            <option>Sulawesi Tenggara</option>
                                            <option>Sulawesi Tengah</option>
                                            <option>Sulawesi Barat</option>
                                            <option>Maluku</option>
                                            <option>Maluku Utara</option>
                                            <option>Papua</option>
                                            <option>Papua Barat</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault03">Kota</label>
                                        <input type="text" class="form-control" id="validationDefault03" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault05">Kode Pos</label>
                                        <input type="text" class="form-control" id="validationDefault05" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Example textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                        <label class="form-check-label" for="invalidCheck2">
                                            Menyetujui persyaratan bahwa anda mengisi dengan jujur
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Unggah</button>
                                <a href="billing.php" class="btn btn-outline-danger">Batal</a>
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

    <!-- indikator menu aktif -->
    <script>
        $(document).ready(function() {
            let topbar = "<?= $topbarActive; ?>";
            $("#" + topbar).addClass("active");

            <?php if (isset($itemActive)) : ?>
                let collapseItem = "<?= $itemActive; ?>";
                $("#" + collapseItem).addClass("active text-success");
                $("#" + sidebar + " a:first").removeClass("collapsed");
                $("#" + sidebar + " div.collapse").addClass("show");
            <?php endif; ?>
        });
    </script>

</body>

</html>