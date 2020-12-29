<?php
include "koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

$tambah = "INSERT INTO user VALUES ('', '$nama', '$alamat', '$pekerjaan');";

$pdo_statement = $koneksi->prepare($tambah);
$pdo_statement->execute();

header("Location: index.php?pesan=input");

?>
<?php  ?>