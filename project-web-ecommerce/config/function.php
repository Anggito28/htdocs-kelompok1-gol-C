<?php
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
    $akun = "INSERT INTO tb_akun VALUES (0, '$email', '$pass', 'pembeli')";
    mysqli_query($conn, $akun);

    // ambil kode akun
    $result = mysqli_query($conn, "SELECT kd_akun FROM tb_akun WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    $kdAkun = $row['kd_akun'];

    $dataDiri = "INSERT INTO tb_pembeli VALUES (0, '$nama', '$jenkel', '$prov', '$kab', '$kec', '$detail', '$telp', $kdAkun)";
    mysqli_query($conn, $dataDiri);

    return mysqli_affected_rows($conn);
}

function editProfil($data)
{
    global $conn;

    $kdAkun = $data['kdAkun'];
    $nama = $data['nama'];
    $jenkel = $data['jenkel'];
    $email = stripslashes($data['email']);
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
        $img = uploadGambar();
        unlink("img/profile-picture/$imageOld");
        if (!$img) {
            return false;
        }
    }


    // periksa email ganti
    $result = mysqli_query($conn, "SELECT email FROM tb_akun WHERE kd_akun = '$kdAkun'");
    $row = mysqli_fetch_assoc($result);

    $akunUpdate = "UPDATE tb_akun SET email = '$email', foto_profil = '$img' WHERE kd_akun = $kdAkun";
    mysqli_query($conn, $akunUpdate);

    $response = mysqli_affected_rows($conn);

    $_SESSION['email'] = $row['email'];
    $_SESSION['profil-pic'] = $img;

    $update = "UPDATE tb_pembeli SET nama = '$nama', jenis_kelamin = '$jenkel', id_provinsi = '$prov', id_kabupaten = '$kab', id_kecamatan = '$kec', detail_alamat = '$detail', no_telepon = '$telp' WHERE kd_akun = $kdAkun";
    mysqli_query($conn, $update);

    $response = $response + mysqli_affected_rows($conn);

    return $response;
}

function uploadGambar()
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

    move_uploaded_file($tmpName, 'img/profile-picture/' . $newFileName);

    return $newFileName;
}
