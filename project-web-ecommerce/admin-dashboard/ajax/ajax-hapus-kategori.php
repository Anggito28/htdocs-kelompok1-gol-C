<?php
require_once "../config/function.php";

$id = $_GET['id'];
$hapus = "DELETE FROM tb_kategori WHERE kd_kategori = $id";

mysqli_query($conn, $hapus);
