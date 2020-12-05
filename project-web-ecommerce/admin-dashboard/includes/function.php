<?php
require "connect.php";

function tambahProduk($data)
{
    global $conn;

    htmlspecialchars($namaProduk = $data['nama-produk']);
    htmlspecialchars($kategori = $data['kategori']);
    htmlspecialchars($stok = $data['stok']);
    htmlspecialchars($harga = $data['harga']);
    htmlspecialchars($deskripsi = $data['deskripsi']);

    // upload foto
    $img = uploadGambar();

    if (!$img) {
        return false;
    }

    $add = "INSERT INTO tb_produk VALUES (0, '$namaProduk', '$kategori', '$stok', '$harga', '$deskripsi', '$img')";

    mysqli_query($conn, $add);

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
    if ($fileSize > 1000000 || $fileSize == 0) {
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
