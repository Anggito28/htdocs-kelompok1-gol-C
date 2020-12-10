<?php
require "../config/connect.php";

if (isset($_POST['inputTambahKategori'])) {
    $kategoriBaru = strtolower($_POST['inputTambahKategori']);
    $simpan = "INSERT INTO tb_kategori VALUES (0, '$kategoriBaru')";

    mysqli_query($conn, $simpan);
}
