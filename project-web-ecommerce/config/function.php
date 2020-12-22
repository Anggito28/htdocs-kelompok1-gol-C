<?php
date_default_timezone_set('Asia/Jakarta');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $conn;

    $email = stripslashes($data['email']);
    $pass = mysqli_real_escape_string($conn, $data['password']);
    $nama = $data['nama'];
    $telp = $data['telp'];
    $jenkel = $data['jenkel'];
    $prov = $data['prov'];
    $kab = $data['kab'];
    $kec = $data['kec'];
    $detail = $data['detail'];

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // tambah akun ke database
    $akun = "INSERT INTO tb_akun VALUES (0, '$email', '$pass', 'pembeli', 'empty')";
    mysqli_query($conn, $akun);
    $response = mysqli_affected_rows($conn);

    // ambil kode akun
    $result = mysqli_query($conn, "SELECT kd_akun FROM tb_akun WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    $kdAkun = $row['kd_akun'];

    $dataDiri = "INSERT INTO tb_pembeli VALUES (0, '$nama', '$jenkel', '$prov', '$kab', '$kec', '$detail', '$telp', $kdAkun)";
    mysqli_query($conn, $dataDiri);

    $response = $response + mysqli_affected_rows($conn);

    return $response;
}

function editProfil($data)
{
    global $conn;

    $kdAkun = $data['kdAkun'];

    $nama = $data['nama'];
    $jenkel = $data['jenkel'];
    $telp = $data['telp'];
    $prov = $data['prov'];
    $kab = $data['kab'];
    $kec = $data['kec'];
    $detail = $data['detail'];
    $imageOld = $data['image-old'];

    // apakah user upload foto baru
    if ($_FILES['image']['error'] === 4) {
        $img = $imageOld;
    } else {
        $img = uploadGambar("profile-picture/");
        unlink("img/profile-picture/$imageOld");
        if (!$img) {
            return false;
        }
    }

    $update = "UPDATE tb_pembeli SET nama = '$nama', jenis_kelamin = '$jenkel', id_provinsi = '$prov', id_kabupaten = '$kab', id_kecamatan = '$kec', detail_alamat = '$detail', no_telepon = '$telp' WHERE kd_akun = $kdAkun";
    $profilePicUpdate = "UPDATE tb_akun SET foto_profil = '$img' WHERE kd_akun = $kdAkun";

    mysqli_query($conn, $update);
    $response = mysqli_affected_rows($conn);

    mysqli_query($conn, $profilePicUpdate);
    $response = $response + mysqli_affected_rows($conn);

    $_SESSION['profil-pic'] = $img;

    return $response;
}

function uploadBuktiTransfer($data)
{
    global $conn;

    $bukti = $data['bukti'];
    $kdTransaksi = $data['kdTransaksi'];

    // upload foto
    if ($bukti == "empty") {
        $img = uploadGambar("bukti-transfer/");
    } else {
        $img = uploadGambar("bukti-transfer/");
        if (!$img) {
            return false;
        }
        unlink("img/bukti-transfer/$bukti");
    }

    $add = "UPDATE tb_transaksi SET bukti_transfer = '$img', status_transaksi = 'menunggu' WHERE kd_transaksi = $kdTransaksi;";

    mysqli_query($conn, $add);

    return mysqli_affected_rows($conn);
}

function ubahEmail($data)
{
    global $conn;

    $kdAkun = $data['kdAkun'];
    $emailBaru = $data['emailBaru'];

    $akunUpdate = "UPDATE tb_akun SET email = '$emailBaru' WHERE kd_akun = $kdAkun";
    mysqli_query($conn, $akunUpdate);

    $_SESSION['email'] = $emailBaru;

    return mysqli_affected_rows($conn);
}

function ubahPassword($data)
{
    global $conn;

    $kdAkun = $data['kdAkun'];
    $passwordBaru = $data['passwordBaru1'];

    // enkripsi password
    $passwordBaru = password_hash($passwordBaru, PASSWORD_DEFAULT);

    // tambah ubah password ke database
    $pass = "UPDATE tb_akun SET password = '$passwordBaru' WHERE kd_akun = $kdAkun";
    mysqli_query($conn, $pass);

    return mysqli_affected_rows($conn);
}

function uploadGambar($path)
{
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek apakah ada gambar diupload
    if ($error === 4) {
        echo "
        <script>
            alert('No image file');
        </script>";
        return false;
    }

    // cek apakah yg diupload file gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensiGambar = explode('.', $fileName);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('upload image file!!!');
        </script>";
        return false;
    }

    //cek ukuran file
    if ($fileSize > 100000000 || $fileSize == 0) {
        echo "
        <script>
            alert('File too big!!!');
        </script>";
        return false;
    }

    //gambar siap diupload
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $path . $newFileName);

    return $newFileName;
}

function login($data)
{
    global $conn;

    $email = $data['email'];
    $password = $data['password'];

    $result = mysqli_query($conn, "SELECT * FROM tb_akun WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    // cek email
    if (isset($row['email'])) {
        if ($email === $row['email']) {

            // cek password
            if (password_verify($password, $row['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $row['kd_akun'];
                $_SESSION['profil-pic'] = $row['foto_profil'];

                header("Location:index.php");
                return;
            }
        } else {
            return false;
        }
    }
}

function tambahKeranjang($data)
{
    global $conn;

    $idProduk = $data['idProduk'];
    $kdPembeli = $data['kdPembeli'];

    $keranjang = "INSERT INTO tb_keranjang VALUES (0, $idProduk, $kdPembeli);";

    mysqli_query($conn, $keranjang);

    return mysqli_affected_rows($conn);
}

function prosesPesanan($data)
{
    global $conn;

    $produk = $data['produk'];
    $pembayaran = $data['pembayaran'];
    $pengiriman = $data['pengiriman'];
    $keterangan = $data['keterangan'];
    $kdPembeli = $data['kdPembeli'];
    $tanggal = $data['tanggal'];
    $status = $data['status'];
    $totalBayar = $data['totalBayar'];

    $transaksi = "INSERT INTO tb_transaksi VALUES (0, $kdPembeli, '$tanggal', '$pembayaran', '$pengiriman', '$keterangan', '$status', $totalBayar, 'empty');";

    mysqli_query($conn, $transaksi);
    $response = mysqli_affected_rows($conn);

    // ambil kode transaksi
    $kdTransaksi = query("SELECT MAX(kd_transaksi) AS kdTrans FROM tb_transaksi")[0]['kdTrans'];

    for ($i = 0; $i < count($produk['id']); $i++) {
        $idProduk = (int) $produk['id'][$i];
        $sub = (int) $produk['subTotal'][$i];
        $jumlah = (int) $produk['jumlah'][$i];

        $stok = (int) query("SELECT stok FROM tb_produk WHERE id_produk = $idProduk")[0]['stok'];
        $stok = $stok - $jumlah;

        mysqli_query($conn, "UPDATE tb_produk SET stok = $stok WHERE id_produk = $idProduk");
        $response = $response + mysqli_affected_rows($conn);

        $detailTrans = "INSERT INTO tb_detail_transaksi VALUES (0, $kdTransaksi, $idProduk, $sub, $jumlah);";

        mysqli_query($conn, $detailTrans);
        $response = $response + mysqli_affected_rows($conn);
    }

    return $response;
}
