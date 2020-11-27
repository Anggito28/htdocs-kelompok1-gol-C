<?php
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

$ubah = "UPDATE user SET nama = '$nama', alamat = '$alamat', pekerjaan = '$pekerjaan' WHERE id = '$id';";

mysqli_query($koneksi, $ubah);

header("Location: index.php?pesan=update");

?>
<?php  ?>