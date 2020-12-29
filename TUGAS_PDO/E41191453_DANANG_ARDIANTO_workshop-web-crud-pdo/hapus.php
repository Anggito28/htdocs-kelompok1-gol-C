<?php
include "koneksi.php";

$id = $_GET['id'];

$pdo_statement = $koneksi->prepare("DELETE FROM user WHERE id = '$id'");
$pdo_statement->execute();

header("Location: index.php?pesan=hapus");

?>
<?php  ?>