<?php

$conn = mysqli_connect("localhost", "root", "", "db_tanaman_hias");

if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
