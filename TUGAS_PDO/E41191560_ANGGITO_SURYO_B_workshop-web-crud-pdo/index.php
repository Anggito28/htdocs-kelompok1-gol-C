<?php
include "db.php";
$sql = 'SELECT * FROM perpustakaan';
$statement = $connection->prepare($sql);
$statement->execute();
$perpustakaan = $statement->fetchAll(PDO::FETCH_OBJ);

$row = $statement->rowCount();
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/logo.png">

  <title>Dashboard</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 p-0">
        <nav class="navbar navbar-expand-lg" style="background-color: rgb(30 144 255 );">
          <div class="container-fluid">
            <a class="navbar-brand text-light font-weight-bold">&ensp;PERPUSTAKAAN .Id</a>
            <p class="float-right text-light"><?php echo date('d F Y'); ?></p>
          </div>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-2" style="background-color: rgb(30 144 255 );">
        <div class="d-flex justify-content-center mt-3">
          <img src="images/logo.png" class="rounded-circle bg-light" width="70px" height="70px" alt="">
        </div>
        <ul class="nav flex-column ml-3 mb-5 mt-4">
          <li class="nav-item">
            <p class="font-weight-bold text-light"><i class="fas fa-home mr-2 ml-3 text-light" style="font-size: 1.5em;"></i>Home</p>
            <hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="create.php"><i class="fas fa-sign-in-alt mr-2"></i>Daftar</a>
            <hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="tentang.php"><i class="fas fa-book-open mr-2"></i>Tentang</a>
            <hr class="bg-light">
          </li>
        </ul>
        <br>
        <br>
        <br>
        <br>
        <div class="text-light text-center">
        </div>
      </div>

      <div class="col-sm-12 col-md-10 col-lg-10 p-0" style="background-color: rgb(255 	255 	255 );">
        <div class="container-fluid mt-3">
          <div class="shadow mt-2" style="background-color: rgb(30 144 255);">
            <i class="fas fa-tv ml-2 text-light" style="font-size: 20px;"></i><a class="navbar-brand text-light py-2">&ensp;Dashboard</a>
          </div>

          <div class="mt-3">
            <div class="row text-center d-flex justify-content-around">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card border-primary mb-3 shadow mt-7" style="max-width: 18rem;">
                  <div class="card-header text-light" style="background-color: rgb(30 144 255);">Jumlah Pendaftar</div>
                  <div class="card-body text-black" style="background-color: rgb(224 255 255 );">
                    <h5 class="card-title p-6"><i class="fas fa-user-check">&ensp;<?= $row; ?>&nbsp;Terdaftar</i></h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card border-primary mb-3 shadow mt-7" style="max-width: 18rem;">
                  <div class="card-header text-light" style="background-color: rgb(30 144 255);">Jumlah Buku Yang Dipinjam</div>
                  <div class="card-body text-black" style="background-color: rgb(224 255 255   );">
                    <h5 class="card-title p-6"><i class="fas fa-book ">&ensp;<?= $row; ?>&nbsp;Dipinjam</i></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card mt-1">
            <div class="card-header p-1" style="background-color: rgb(30 144 255);">
              <h2 class="text-center text-light">Data Siswa</h2>
            </div>
            <div class="card-body" style="background-color: rgb(224 255 255);  overflow-y: scroll; height: 230px;">
              <table class="table table-bordered text-black table-responsive-sm" style="background-color: rgb(224 255 255);">
                <tr>
                  <th>NO</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Judul Buku</th>
                  <th>Batas Waktu Peminjaman Buku</th>
                </tr>
                <?php $urut = 1;
                foreach ($perpustakaan as $key) : ?>
                  <tr>
                    <td><?php echo $urut; ?></td>
                    <td><?php echo $key->nis; ?></td>
                    <td><?php echo $key->nama; ?></td>
                    <td><?php echo $key->kelas; ?></td>
                    <td><?php echo $key->buku; ?></td>
                    <td><?php echo $key->batas; ?></td>
                  </tr>
                <?php $urut++;
                endforeach; ?>
              </table>
            </div>
          </div>
        </div>
        <?php require 'footer.php'; ?>
      </div>
    </div>

  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
</body>

</html>