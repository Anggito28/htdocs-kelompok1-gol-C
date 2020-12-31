<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM perpustakaan WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id]))
{
    header("Location:data_siswa.php"); 
}
?>