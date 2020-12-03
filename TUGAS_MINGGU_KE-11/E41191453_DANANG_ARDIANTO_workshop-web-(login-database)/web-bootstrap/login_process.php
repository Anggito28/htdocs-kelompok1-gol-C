<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "workshop_web_login");

//cek login
$email = $_POST["email"];
$password = $_POST["password"];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$row = mysqli_fetch_assoc($result);

if ((strcasecmp($row['email'], $email) == 0) && ($row['password'] == $password)) {
    $_SESSION["submit"] = true;
    header("location:index.php?pesan=berhasil");
} else {
    header("location:login.php?pesan=gagal");
}
