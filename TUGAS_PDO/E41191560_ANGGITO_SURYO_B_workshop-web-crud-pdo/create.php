<?php
require 'db.php';
if (isNotEmpty()) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $buku = $_POST['buku'];
    $batas = $_POST['batas'];
    $sql = 'INSERT INTO perpustakaan(nis, nama, kelas, buku, batas) VALUES(:nis, :nama, :kelas, :buku, :batas)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':nis' => $nis, ':nama' => $nama, ':kelas' => $kelas, ':buku' => $buku, ':batas' => $batas])) {
        header('Location:data_siswa.php');
    }
}

function isNotEmpty()
{

    return isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['kelas']) && isset($_POST['buku']) && isset($_POST['batas']);
}

?>

<?php require 'header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Input Data Siswa</h2>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label>NIS</label>
                            <input maxlength="20" type="number" name="nis" id="nis" class="form-control" placeholder="Input Nis Anda Disini" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Input Nama Anda Disini" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" id="kelas" name="kelas" required>
                                <option></option>
                                <option value="XII IPA 1">XII IPA 1 </option>
                                <option value="XII IPA 2">XII IPA 2</option>
                                <option value="XII IPA 3">XII IPA 3</option>
                                <option value="XII IPA 4">XII IPA 4</option>
                                <option value="XII IPA 5">XII IPA 5</option>
                                <option value="XII IPA 6">XII IPA 6</option>
                                <option value="XII IPA 7">XII IPA 7</option>
                                <option value="XII IPA 1">XII IPS 1</option>
                                <option value="XII IPA 2">XII IPS 2</option>
                                <option value="XII IPA 3">XII IPS 3</option>
                                <option value="XII IPA 4">XII IPS 4</option>
                                <option value="XI IPA 1">XI IPA 1 </option>
                                <option value="XI IPA 2">XI IPA 2</option>
                                <option value="XI IPA 3">XI IPA 3</option>
                                <option value="XI IPA 4">XI IPA 4</option>
                                <option value="XI IPA 5">XI IPA 5</option>
                                <option value="XI IPA 6">XI IPA 6</option>
                                <option value="XI IPA 7">XI IPA 7</option>
                                <option value="XI IPS 1">XI IPS 1</option>
                                <option value="XI IPS 2">XI IPS 2</option>
                                <option value="XI IPS 3">XI IPS 3</option>
                                <option value="XI IPS 4">XI IPS 4</option>
                                <option value="X IPA 1">X IPA 1</option>
                                <option value="X IPA 2">X IPA 2</option>
                                <option value="X IPA 3">X IPA 3</option>
                                <option value="X IPA 4">X IPA 4</option>
                                <option value="X IPA 5">X IPA 5</option>
                                <option value="X IPA 6">X IPA 6</option>
                                <option value="X IPA 7">X IPA 7</option>
                                <option value="X IPA 8">X IPA 8</option>
                                <option value="X IPS 1">X IPS 1</option>
                                <option value="X IPS 2">X IPS 2</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Judul Buku Yang Dipinjam</label>
                            <input type="text" name="buku" id="buku" class="form-control" placeholder="Input Disini" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Batas Waktu Peminjaman Buku</label>
                            <input type="date" name="batas" id="batas" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>