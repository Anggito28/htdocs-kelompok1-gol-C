<?php
require "../config/connect.php";

$id = $_GET['id'];
$hapus = "DELETE FROM tb_keranjang WHERE id = $id";

mysqli_query($conn, $hapus);
