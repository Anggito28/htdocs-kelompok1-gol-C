?php
include "header.php";
?>

<div class="container">
    <form action="aksi.php?p=tambah" method="POST">
        <div class="form-group">
            <label for="pwd">Nama Mahasiswa :</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama" name="xnama" id="xnama">
        </div>
        <div class="form-group">
            <label for="pwd">Email :</label>
            <input type="text" class="form-control" placeholder="Masukkan Email" name="xemail" id="xemail">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>


<?php
include "footer.php"
?>