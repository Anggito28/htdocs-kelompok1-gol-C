<?php
$email = $_POST['email'];
$password = $_POST['password'];
$email_saya = "alvinekocahyo@gmail.com";
$password_saya = 12345678;
if((strcasecmp($email_saya,$email)== 0 )&&($password_saya==$password))
{
    session_start();
    $_SESSION['email'] = $email;
    header("location:index.php?pesan=berhasil");}
else
{header("location:login.php?pesan=gagal");}
?>