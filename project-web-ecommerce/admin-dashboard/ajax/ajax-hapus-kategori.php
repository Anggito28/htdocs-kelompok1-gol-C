<?php
require "../config/connect.php";

$id = $_GET['id'];
$hapus = "DELETE FROM tb_kategori WHERE kd_kategori = $id";

mysqli_query($conn, $hapus);
