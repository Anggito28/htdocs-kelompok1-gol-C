<?php
include "koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

$tambah = "INSERT INTO user VALUES ('', '$nama', '$alamat', '$pekerjaan');";

mysqli_query($koneksi, $tambah);

header("Location: index.php?pesan=input");

?>
<?php  ?>