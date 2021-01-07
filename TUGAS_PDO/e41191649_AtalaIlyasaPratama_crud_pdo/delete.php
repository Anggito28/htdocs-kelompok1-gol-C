<?php
    include 'koneksi.php';

    if(isset($_GET["nim"])){
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `tbl_mahasiswa` WHERE nim=:nim");
        $query->bindParam(":nim", $_GET["nim"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: index.php");
    }
?>