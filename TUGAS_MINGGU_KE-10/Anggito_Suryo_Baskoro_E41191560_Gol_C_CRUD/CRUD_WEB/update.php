<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

mysqli_query($koneksi, "update user set nama='$nama', alamat='$alamat', pekerjaan='$pekerjaan' where id='$id'");

header("location:index.php?pesan=update");
?>