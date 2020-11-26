<!DOCTYPE html>
<html>
<head>
        <title>Membuat CRUD dengan PHP dan MYSQL - Menampilkan data dari Database</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">
            <h1>Membuat CRUD dengan PHP dan MYSQL</h1>
            <h2>Menampilkan data dari Database</h2>
    </div>
    <br>
    <a href ="index.php">Lihat Semua Data<a/>
    </br>

<?php
include "koneksi.php";
$id = $_GET['id'];
$query_mysql = mysqli_query($koneksi,"select * from user where id = '$id'");
$nomor =1;
while($data = mysqli_fetch_array($query_mysql)) {
?>
<form action ="update.php" method="POST">
    <table>
        <tr>
            <td>Nama</td>
            <td>
                <input type="hidden" name="id" value="<?php echo $data['id']?>">
                <input type="text" name="nama" value="<?php echo $data['nama']?>">
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value="<?php echo $data['alamat']?>"></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan']?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value= "Simpan"></td>
        </tr>   
    </table>
</form>
<?php } ?>    
    
</body>
</html>


