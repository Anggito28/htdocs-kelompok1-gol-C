<?php
// Koneksi Database
$server = "localhost";
$user = "root";
$pass = "";
$db = "assessement_project";

try {
    
$connection = new PDO("mysql:host=$server;dbname=$db",$user, $pass);

} catch (PDOException $error) {
    echo $error->getMessage();
}