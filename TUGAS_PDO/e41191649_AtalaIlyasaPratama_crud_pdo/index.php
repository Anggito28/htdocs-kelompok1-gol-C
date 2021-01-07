<?php
    include 'koneksi.php';
    $query = $db->prepare("SELECT * FROM tbl_mahasiswa");
    $query->execute();
    $data = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD PDO</title>
</head>
<body bgcolor=" #e6ecff">
<h2><strong><p align="center"> Input Data Mahasiswa PDO (PHP Data Objects)</p></strong></h2>
<table width="807" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="115" height="30" align="center" valign="middle" bgcolor="#99b3ff">Nim</td>
    <td width="175" align="center" valign="middle" bgcolor="#99b3ff">Nama</td>
    <td width="250" align="center" valign="middle" bgcolor="#99b3ff">Alamat</td>
    <td width="100" align="center" valign="middle" bgcolor="#99b3ff">Kelas</td>
    <td width="135" align="center" valign="middle" bgcolor="#7EC670"><a href="create.php">TAMBAH DATA</a></td></tr>
            <?php foreach ($data as $value): ?>
                <tr>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $value['nim'] ?></td>
                    <td p align="left" bgcolor="#FFFFFF"><?php echo $value['nama'] ?></td>
                    <td p align="left" bgcolor="#FFFFFF"><?php echo $value['alamat'] ?></td>
                    <td p align="center" bgcolor="#FFFFFF"><?php echo $value['kelas'] ?></td>
                    <td p align="center" bgcolor="#FFFFFF">
                        <a href="edit.php?nim=<?php echo $value['nim']?>">Edit</a>
                        <a href="delete.php?nim=<?php echo $value['nim']?>">Delete</a>
                    </td>
                </tr>
 </td>
  </tr>
<?php endforeach; ?>
</table>
<p align="center"> </p>
</body>
</html>