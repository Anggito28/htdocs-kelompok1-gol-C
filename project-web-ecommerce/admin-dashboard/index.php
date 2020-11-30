<?php
$page = "dashboard";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "includes/sidebar.php" ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "includes/topbar.php" ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- card row 1 -->
          <div class="row">
            <div class="col-xl-12 mb-2">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-dark">Status Pesanan</h6>
                </div>
                <div class="card-body">
                  <div class="row">

                    <!-- Pesanan Tertunda -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-warning shadow-sm h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Tertunda</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-clock fa-4x text-gray-300"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Pesanan Diproses -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-info shadow-sm h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pesanan Diproses</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-cogs fa-4x text-gray-300"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Pesanan Dikirim -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Dikirim</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-truck fa-4x text-gray-300"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Pesanan Selesai -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-success shadow-sm h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pesanan Selesai</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-clipboard-check fa-4x text-gray-300"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- content row 2 -->
          <!-- <div class="row"> -->
          <!-- Basic Card Example -->
          <!-- <div class="col-xl-9">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                </div>
                <div class="card-body">
                  The styling for this basic card example is created by using default Bootstrap utility classes. By using utility classes, the style of the card component can be easily modified with no need for any custom CSS!
                </div>
              </div>
            </div> -->
          <!-- </div> -->

          <div class="row">
            <div class="col-xl-6">
              <!-- Bar Chart -->
              <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-dark">Pendapatan / Bulan</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6">
              <!-- Area Chart -->
              <div class="card shadow mb-4 border-left-success">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-dark">Transaksi / Bulan</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row justify-content-center">
            <!-- Total Pendapatan Bulan ini -->
            <div class="col-xl-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toal Pendapatan (Bulan ini)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 100,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-4x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Transaksi Bulan ini -->
            <div class="col-xl-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi (Bulan ini)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-handshake fa-4x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include "includes/footer.php"; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php include "includes/scripts.php" ?>
  <?php include "includes/chart.php" ?>

</body>

</html>