<?php
// require_once "connect.php";

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

function tambahProduk($data)
{
    global $conn;

    strtolower(htmlspecialchars($namaProduk = $data['nama-produk']));
    htmlspecialchars($kategori = $data['kategori']);
    htmlspecialchars($stok = $data['stok']);
    htmlspecialchars($harga = $data['harga']);
    strtolower(htmlspecialchars($deskripsi = $data['deskripsi']));

    // upload foto
    $img = uploadGambar();

    if (!$img) {
        return false;
    }

    $add = "INSERT INTO tb_produk VALUES (0, '$namaProduk', '$kategori', '$stok', '$harga', '$deskripsi', '$img')";

    mysqli_query($conn, $add);

    return mysqli_affected_rows($conn);
}

function editProduk($query)
{
    global $conn;

    htmlspecialchars($namaProduk = $query['nama-produk']);
    htmlspecialchars($kategori = $query['kategori']);
    htmlspecialchars($stok = $query['stok']);
    htmlspecialchars($harga = $query['harga']);
    htmlspecialchars($deskripsi = $query['deskripsi']);
    htmlspecialchars($idProduk = $query['id-produk']);
    htmlspecialchars($imageOld = $query['image-old']);


    // apakah user upload foto baru
    if ($_FILES['image']['error'] === 4) {
        $img = $imageOld;
    } else {
        $img = uploadGambar();
        unlink("img/produk/$imageOld");
        if (!$img) {
            return false;
        }
    }

    $update = "UPDATE tb_produk SET nama_produk = '$namaProduk', kd_kategori = '$kategori', stok = '$stok', harga = '$harga', deskripsi = '$deskripsi', image = '$img' WHERE id_produk = $idProduk";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
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

    move_uploaded_file($tmpName, 'img/produk/' . $newFileName);

    return $newFileName;
}

// hapus produk
function delete($query)
{
    global $conn;

    $img = query("SELECT image FROM tb_produk WHERE id_produk = $query")[0]['image'];

    unlink("img/produk/$img");

    $del = "DELETE FROM tb_produk WHERE id_produk = $query";

    mysqli_query($conn, $del);

    return mysqli_affected_rows($conn);
}

function login($data)
{
    global $conn;

    $email = $data['email'];
    $password = $data['password'];

    $result = mysqli_query($conn, "SELECT * FROM tb_akun WHERE email = '$email' AND NOT jenis_akun = 'pembeli'");
    $row = mysqli_fetch_assoc($result);

    // cek email
    if (isset($row['email'])) {
        if ($email === $row['email']) {

            // cek password
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin'] = true;
                $_SESSION['email-admin'] = $email;
                $_SESSION['id-admin'] = $row['kd_akun'];
                $_SESSION['jenis-akun'] = $row['jenis_akun'];

                header("Location:index.php");
                return;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function ubahEmail($data)
{
    global $conn;

    $kdAkun = $data['kdAkun'];
    $emailBaru = $data['emailBaru'];

    $akunUpdate = "UPDATE tb_akun SET email = '$emailBaru' WHERE kd_akun = $kdAkun";
    mysqli_query($conn, $akunUpdate);

    $_SESSION['email-admin'] = $emailBaru;

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

function register($data)
{
    global $conn;

    $email = stripslashes($data['email']);
    $pass = mysqli_real_escape_string($conn, $data['password2']);

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // tambah akun ke database
    $akun = "INSERT INTO tb_akun VALUES (0, '$email', '$pass', 'admin', 'empty', 1)";
    mysqli_query($conn, $akun);

    return mysqli_affected_rows($conn);
}
