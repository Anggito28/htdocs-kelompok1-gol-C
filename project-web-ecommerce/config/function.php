<?php
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $conn;

    $email = stripslashes($data['email']);
    $pass = mysqli_real_escape_string($conn, $data['password']);
    $nama = $data['nama'];
    $telp = $data['telp'];
    $jenkel = $data['jenkel'];
    $prov = $data['prov'];
    $kab = $data['kab'];
    $kec = $data['kec'];
    $detail = $data['detail'];

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // tambah akun ke database
    $akun = "INSERT INTO tb_akun VALUES (0, '$email', '$pass', 'pembeli')";
    mysqli_query($conn, $akun);

    // ambil kode akun
    $result = mysqli_query($conn, "SELECT kd_akun FROM tb_akun WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    $kdAkun = $row['kd_akun'];

    $dataDiri = "INSERT INTO tb_pembeli VALUES (0, '$nama', '$jenkel', '$prov', '$kab', '$kec', '$detail', '$telp', $kdAkun)";
    mysqli_query($conn, $dataDiri);

    return mysqli_affected_rows($conn);
}
