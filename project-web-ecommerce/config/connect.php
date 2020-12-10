<?php
$conn = mysqli_connect("localhost", "root", "", "db_ecommerce_tanaman_hias");

if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit;
}
