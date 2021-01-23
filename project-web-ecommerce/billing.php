<?php
session_start();

require "config/connect.php";
require "config/function.php";

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$idAkun = $_SESSION['id'];

if (isset($_POST['proses'])) {
    if (prosesPesanan($_POST) > 0) {
        $kdTransaksi = query("SELECT MAX(kd_transaksi) AS kdTrans FROM tb_transaksi")[0]['kdTrans'];
        echo "<script>
                alert('Berhasil diproses! Menunggu konfirmasi...');
                location = 'detail-transaksi.php?id=" . $kdTransaksi . "';
            </script>
                ";
    } else {
        echo mysqli_error($conn);
        echo "
        <script>
            alert('gagal!');
        </script>";
    }
}

$items = [];
$sub = [];
$total = 0;

for ($i = 1; $i <= count($_POST); $i++) {
    $p = "produk-" . $i;
    if (isset($_POST[$p][1])) {
        $items[] = $_POST[$p];
    }
}

$kdPembeli = query("SELECT kd_pembeli FROM tb_pembeli WHERE kd_akun = $idAkun;")[0]['kd_pembeli'];

$data = query("SELECT tb_pembeli.*, wilayah_provinsi.nama AS prov, wilayah_kabupaten.nama AS kab, wilayah_kecamatan.nama AS kec FROM tb_pembeli 
INNER JOIN wilayah_provinsi ON tb_pembeli.id_provinsi = wilayah_provinsi.id
INNER JOIN wilayah_kabupaten ON tb_pembeli.id_kabupaten = wilayah_kabupaten.id
INNER JOIN wilayah_kecamatan ON tb_pembeli.id_kecamatan = wilayah_kecamatan.id
AND tb_pembeli.kd_pembeli = $kdPembeli")[0];

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

    <title>Billing - Rudi Bonsai</title>
</head>

<body class="bg-light">

    <!-- topbar header -->
    <?php include "includes/topbar.php"; ?>

    <section class="content">
        <div class="container">

            <!-- Header konten -->
            <div class="row no-gutters justify-content-center mb-4">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white shadow">
                            <li class="breadcrumb-item"><a href="produk.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="keranjang.php">Keranjang</a></li>
                            <li class="breadcrumb-item active">Billing</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-body shadow">
                            <div class="row mb-4">
                                <div class="col">
                                    <!-- Detail Alamat -->
                                    <div class="card">
                                        <div class="card-header bg-light border-0">
                                            <h6>Alamat</h6>
                                        </div>
                                        <div class="card-body">
                                            <h6><?= htmlspecialchars($data['nama']); ?></h6>
                                            <p><?= $data['no_telepon']; ?></p>
                                            <p> <?= htmlspecialchars($data['detail_alamat']); ?><br>
                                                <?= $data['kec']; ?>, <?= $data['kab']; ?>, Provinsi <?= $data['prov']; ?>, Indonesia
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- form submit data -->
                            <form action="" method="POST">

                                <!--Detail Pemesanan -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <?php foreach ($items as $item) : ?>
                                            <?php $produk = query("SELECT * FROM tb_produk WHERE id_produk = $item[1]")[0]; ?>
                                            <div class="card mb-4 shadow-sm">
                                                <div class="card-body">
                                                    <div class="row ">
                                                        <div class="col-lg-5">
                                                            <div class="embed-responsive embed-responsive-16by9 shadow-sm mb-4">
                                                                <img src="admin-dashboard/img/produk/<?= $produk['image']; ?>" class="border p-1 product-image embed-responsive-item" alt="...">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <h4 class="card-title"><?= ucfirst($produk['nama_produk']); ?></h4>
                                                            <h5 class="card-text">Rp <?= number_format($produk['harga'], 0, '', "."); ?></h5>
                                                            <span>Jumlah : <?= $item[0]; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer justify-content-between d-flex px-2">
                                                    <div>
                                                        Subtotal (<?= $item[0]; ?>)
                                                    </div>
                                                    <div>
                                                        <strong>Rp <?= number_format($sub[] = $item[0] * $produk['harga'], 0, "", "."); ?></strong>
                                                        <input type="hidden" name="produk[subTotal][]" value="<?= $item[0] * $produk['harga']; ?>">
                                                        <input type="hidden" name="produk[jumlah][]" value="<?= $item[0]; ?>">
                                                        <input type="hidden" name="produk[id][]" value="<?= $item[1]; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div>
                                                    <label for="pembayaran">
                                                        <h6>Opsi Pembayaran</h6>
                                                    </label>
                                                    <?php if ($data['id_kabupaten'] == "3505" || $data['id_kabupaten'] == "3572") : ?>
                                                        <div class="form-control bg-light mb-1">COD</div>
                                                        <input type="hidden" name="pembayaran" value="cod">
                                                    <?php else : ?>
                                                        <div class="form-control bg-light mb-1">Transfer via Rekening ATM</div>
                                                        <input type="hidden" name="pembayaran" value="transfer">
                                                    <?php endif; ?>
                                                    <small><strong>Transfer :</strong> Barang dikirim melalui agen ekspedisi Indah Kargo</small><br>
                                                    <small><strong> COD :</strong> Khusus wilayah Blitar dan sekitarnya, barang dikirim langsung</small>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="form-group">
                                                    <label for="pengiriman">
                                                        <h6>Opsi Pengiriman</h6>
                                                    </label>
                                                    <?php if ($data['id_kabupaten'] == "3505" || $data['id_kabupaten'] == "3572") : ?>
                                                        <div class="form-control bg-light mb-1">Langsung</div>
                                                        <input type="hidden" value="langsung" name="pengiriman">
                                                    <?php else : ?>
                                                        <div class="form-control bg-light mb-1">Indah Kargo</div>
                                                        <input type="hidden" value="indah kargo" name="pengiriman">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <h6>
                                                    Ongkos Kirim
                                                </h6>
                                                <div class="alert alert-info mt-2">
                                                    Nominal ongkos kirim akan muncul setelah pesanan dikonfirmasi penjual
                                                </div>
                                                <div class="alert alert-success">
                                                    Klik tombol "Proses" untuk melanjutkan transaksi
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="keterangan">
                                                        <h6>Catatan untuk penjual (Opsional)</h6>
                                                    </label>
                                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body px-2">
                                                <div class="row justify-content-center no-gutters">
                                                    <div class="col-md-10">
                                                        <div class="card-header border-0 text-center bg-light">
                                                            <h6>Rincian Pembayaran</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <h6>Subtotal Belanja :</h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col text-right">
                                                                    <?php for ($i = 0; $i < count($sub); $i++) : ?>
                                                                        <div class="font-weight-bold">Rp <?= number_format($sub[$i], 0, "", "."); ?></div>
                                                                    <?php
                                                                        $total = $total + $sub[$i];
                                                                    endfor; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer border-0 bg-light">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <h6>Total Pembayaran :</h6>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col text-right">
                                                                    <div class="font-weight-bold"> Rp <?= number_format($total, 0, "", "."); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- data form -->
                                <input type="hidden" name="kdPembeli" value="<?= $kdPembeli; ?>">
                                <input type="hidden" name="tanggal" value="<?= date("Y-m-d"); ?>">
                                <input type="hidden" name="totalBayar" value="<?= $total; ?>">
                                <?php if ($data['id_kabupaten'] == "3505" || $data['id_kabupaten'] == "3572") : ?>
                                    <input type="hidden" name="status" value="diproses">
                                <?php else : ?>
                                    <input type="hidden" name="status" value="dikonfirmasi">
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body text-right">
                                                <a href="keranjang.php" class="btn btn-outline-secondary mr-2">Batal</a>
                                                <button type="submit" name="proses" class="btn btn-success">Proses</button>
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