<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

mysqli_query($koneksi,"insert into user values ('','$nama','$alamat','$pekerjaan')");

header("location:index.php?pesan=input");
?>