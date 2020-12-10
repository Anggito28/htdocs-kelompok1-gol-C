<?php
require "../config/connect.php";

$kategoriBaru = $_GET['kategori'];
$id = $_GET['id'];
$simpan = "UPDATE tb_kategori SET kategori = '$kategoriBaru' WHERE kd_kategori = $id";

mysqli_query($conn, $simpan);
