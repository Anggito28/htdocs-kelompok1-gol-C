<!-- data popup kategori -->
<?php
if (!(isset($sidebarActive))) {
    require "../config/connect.php";
}
// $conn = mysqli_connect("localhost", "root", "", "db_ecommerce_tanaman_hias");

$showKategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kd_kategori DESC;");
$num = 1;
while ($dataKategori = mysqli_fetch_array($showKategori)) :
?>

    <tr>
        <td>
            <input disabled class="form-control text-capitalize" type="text" value="<?= $dataKategori['kategori']; ?>">
            <input type="hidden" value="<?= $dataKategori['kd_kategori']; ?>">
        </td>
        <td class="align-middle text-right">
            <div class="btn-group btn-group-sm" role="group" aria-label="aksi">
                <button type="button" class="btnEditKategori btn btn-warning"><i class="fas fa-edit"></i></button>
                <button type="button" class="btnHapusKategori btn btn-danger"><i class="fas fa-trash"></i></button>
            </div>
            <div class="btn-group btn-group-sm" role="group" aria-label="aksi-edit">
                <button style="display: none;" type="button" class="btnSaveEdit btn btn-primary"><i class="fas fa-check"></i></button>
                <button style="display: none;" type="button" class="btnCancelEdit btn btn-secondary"><i class="fas fa-times"></i></button>
            </div>
        </td>
    </tr>

<?php endwhile; ?>