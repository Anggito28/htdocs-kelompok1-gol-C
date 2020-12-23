<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

require "config/connect.php";
require "config/function.php";

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        location = 'produk.php';
    </script>";
} else {
    echo mysqli_error($conn);
    echo "
    <script>
        alert('Data gagal dihapus!');
        location = 'produk.php';
    </script>";
}
