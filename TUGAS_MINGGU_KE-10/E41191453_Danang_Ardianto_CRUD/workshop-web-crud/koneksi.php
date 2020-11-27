<?php 

$koneksi = mysqli_connect("localhost", "root", "", "db_crud_web");

if (mysqli_connect_error()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>

<?php  ?>