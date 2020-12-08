<?php
require_once "../config/function.php";

if (isset($_POST['inputTambahKategori'])) {
    $kategoriBaru = $_POST['inputTambahKategori'];
    $simpan = "INSERT INTO tb_kategori VALUES (0, '$kategoriBaru')";

    mysqli_query($conn, $simpan);
}
