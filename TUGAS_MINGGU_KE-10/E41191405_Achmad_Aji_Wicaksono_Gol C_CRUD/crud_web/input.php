<link rel="stylesheet" type="text/css" href="style.css">
<div class ="judul">
    <h1>Membuat CRUD Dengan PHP Dan MYSQL</h1>
    <h2>Menampilkan data dari DataBase</h2>
</div>

<br/>
<a href="index.php">Lihat Semua Data</a>

<br/>
<h3>Input Data Baru</h3>
<form action="input-aksi.php" method="POST">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><input type="text" name="pekerjaan"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="simpan"></td>
        </tr>

    </table>
</form>
        
    
            