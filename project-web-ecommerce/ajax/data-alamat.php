<?php
require "../config/connect.php";
require "../config/function.php";

$tabelKabupaten = "wilayah_kabupaten";
$tabelKecamatan = "wilayah_kecamatan";
$kolomKabupaten = "provinsi_id";
$kolomKecamatan = "kabupaten_id";

function panggilData($dataId, $tabelWilayah, $kolomId)
{
    $tabelData = "SELECT * FROM $tabelWilayah WHERE $kolomId = '$dataId'";

    return query($tabelData);
}

if ($_GET["daerah"] == "prov") {
    // pemanggilan data kabupaten
    $data = $_GET["provinsi"];
    $options = panggilData($data, $tabelKabupaten, $kolomKabupaten);
} else {
    // pemanggilan data kecamatan
    $data = $_GET["kabupaten"];
    $options = panggilData($data, $tabelKecamatan, $kolomKecamatan);
}

?>

<?php foreach ($options as $option) : ?>

    <option value="<?= $option["id"]; ?>"><?= $option["nama"]; ?></option>

<?php endforeach; ?>