<?php
require "config/connect.php";
require "config/function.php";

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $kdAkun = $_GET['kdAkun'];

    $auth = query("SELECT auth_code FROM auth WHERE kd_akun = $kdAkun")[0];

    if (isset($auth['auth_code'])) {
        if (password_verify($code, $auth['auth_code'])) {
            mysqli_query($conn, "UPDATE tb_akun SET is_active = 1 WHERE kd_akun = $kdAkun");
            mysqli_query($conn, "DELETE FROM auth WHERE kd_akun = $kdAkun");

            echo "<script>";
            echo "alert('akun berhasil diaktivasi.');";
            echo "location = 'login.php';";
            echo "</script>";

            exit;
        }
    }
}

header("Location: index.php");
