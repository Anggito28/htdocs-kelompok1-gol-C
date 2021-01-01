<?php
include "header.php";
?>

<div class="container">
    <form action="aksi.php?p=edit&id=<?php echo $_GET['id'] ?>" method="POST">
        <?php
        $no = 1;
        $sql = "select * from mahasiswa";
        $data = $konek->prepare($sql);
        $data->execute();
        $d = $data->fetch(PDO::FETCH_ASSOC);
        ?>
        <!-- <input type="hidden" name="xid" value="<?= $d['id_mhs']; ?>"> -->
        <div class="form-group">
            <label for="pwd">Nama Mahasiswa :</label>
            <input type="text" class="form-control" value="<?= $d['nama_mhs']; ?>" name="xnama" id="xnama">
        </div>
        <div class="form-group">
            <label for="pwd">Email :</label>
            <input type="text" class="form-control" value="<?= $d['email_mhs']; ?>" name="xemail" id="xemail">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>

</div>


<?php
include "footer.php"
?>