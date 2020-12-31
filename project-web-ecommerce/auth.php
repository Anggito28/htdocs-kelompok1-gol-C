<?php
require "config/connect.php";
require "config/function.php";

if (isset($_GET['otp'])) {
    $otp = $_GET['otp'];
    $kdAkun = $_GET['kdAkun'];

    $auth = query("SELECT otp FROM auth WHERE kd_akun = $kdAkun")[0];

    if (isset($auth['otp'])) {
        if (password_verify($otp, $auth['otp'])) {
            mysqli_query($conn, "UPDATE tb_akun SET is_active = 1 WHERE kd_akun = $kdAkun");
            mysqli_query($conn, "DELETE FROM auth WHERE kd_akun = $kdAkun");

            echo "<script>";
            echo "alert('akun berhasil diaktivasi.');";
            echo "location = 'login.php';";
            echo "</script>";
        }
    }
} else {
    header("Location: index.php");
}
