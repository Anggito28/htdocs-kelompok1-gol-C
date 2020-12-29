<?php

try {
    $database_username = 'root';
    $database_password = '';
    $koneksi = new PDO('mysql:host=localhost;dbname=db_crud_web', $database_username, $database_password);
} catch (PDOException $e) {

    echo "Koneksi Gagal " . $e->getMessage();
}
