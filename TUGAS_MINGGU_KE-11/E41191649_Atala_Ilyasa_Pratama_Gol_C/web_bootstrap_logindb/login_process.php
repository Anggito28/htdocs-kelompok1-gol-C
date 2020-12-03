<?php 
include "koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    header("location:index.php?pesan=berhasil");
} else {
    header("location:login.php?pesan=gagal");
}