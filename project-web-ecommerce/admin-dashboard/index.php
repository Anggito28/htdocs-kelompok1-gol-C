<?php
session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}

$sidebarActive = "sidebarDashboard";

require "config/connect.php";
require "config/function.php";

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
  <link rel="stylesheet" href="css/custom-style.css">

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
                  <div class="row justify-content-center">

                    <?php $pesanan = ''; ?>

                    <?php $pesanan = count(query("SELECT kd_transaksi FROM tb_transaksi WHERE status_transaksi = 'dikonfirmasi'")); ?>
                    <!-- Pesanan Tertunda -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-warning shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=dikonfirmasi">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Dikonfirmasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-bell fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    <?php $pesanan = count(query("SELECT kd_transaksi FROM tb_transaksi WHERE status_transaksi = 'tertunda'")); ?>
                    <!-- Pesanan Tertunda -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-danger shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=tertunda">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pesanan Tertunda</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-clock fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    <?php $pesanan = count(query("SELECT kd_transaksi FROM tb_transaksi WHERE status_transaksi = 'menunggu'")); ?>
                    <!-- Pesanan Menunggu -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-warning shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=menunggu">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Menunggu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-clipboard fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    <?php $pesanan = count(query("SELECT kd_transaksi FROM tb_transaksi WHERE status_transaksi = 'diproses'")); ?>
                    <!-- Pesanan Diproses -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-info shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=diproses">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pesanan Diproses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-cogs fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    <?php $pesanan = count(query("SELECT kd_transaksi FROM tb_transaksi WHERE status_transaksi = 'dikirim'")); ?>
                    <!-- Pesanan Dikirim -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-primary shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=dikirim">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Dikirim</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-truck fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    <?php $pesanan = count(query("SELECT kd_transaksi FROM tb_transaksi WHERE status_transaksi = 'selesai'")); ?>
                    <!-- Pesanan Dikirim -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-success shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=selesai">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-clipboard-check fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

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

          <?php
          $monthlyTrans = query("SELECT total_bayar FROM tb_transaksi WHERE MONTH(tgl_transaksi) = MONTH(CURRENT_TIMESTAMP) AND status_transaksi = 'selesai'");
          $monthlySum = 0;
          for ($i = 0; $i < count($monthlyTrans); $i++) {
            $monthlySum = $monthlySum + $monthlyTrans[$i]['total_bayar'];
          }
          ?>
          <div class="row justify-content-center">
            <!-- Total Pendapatan Bulan ini -->
            <div class="col-xl-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toal Pendapatan (Bulan ini)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($monthlySum, 0, "", ","); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-4x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php $pesanan = count(query("SELECT kd_transaksi FROM tb_transaksi WHERE MONTH(tgl_transaksi) = MONTH(CURRENT_TIMESTAMP) AND status_transaksi = 'selesai'")); ?>
            <!-- Total Transaksi Bulan ini -->
            <div class="col-xl-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi (Bulan ini)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan; ?></div>
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

  <?php include "includes/logout-modal.php" ?>

  <?php include "includes/scripts.php" ?>

  <!-- Page level plugins / plugin diagram -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>

  <script>
    // Area Chart / script diagram grafik
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Penjualan",
          lineTension: 0.3,
          backgroundColor: "rgba(40,167,69, 0.05)",
          borderColor: "rgba(40,167,69, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(40,167,69, 1)",
          pointBorderColor: "rgba(40,167,69, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(40,167,69, 1)",
          pointHoverBorderColor: "rgba(40,167,69, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [
            <?php
            for ($j = 1; $j <= 12; $j++) {
              $trans = query("SELECT kd_transaksi FROM tb_transaksi WHERE MONTH(tgl_transaksi) = $j AND status_transaksi = 'selesai'");

              echo ($j == 12 ? count($trans) :  count($trans) . ",");
            }
            ?>
          ],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 12
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 10,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return number_format(value) + " Transaksi";
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + " Transaksi";
            }
          }
        }
      }
    });

    // Bar Chart Example / diagram batang
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Pendapatan",
          backgroundColor: "#4e73df",
          hoverBackgroundColor: "#2e59d9",
          borderColor: "#4e73df",
          data: [
            <?php
            for ($j = 1; $j <= 12; $j++) {
              $trans = query("SELECT total_bayar FROM tb_transaksi WHERE MONTH(tgl_transaksi) = $j AND status_transaksi = 'selesai'");
              $sum = 0;
              for ($i = 0; $i < count($trans); $i++) {
                $sum = $sum + $trans[$i]['total_bayar'];
              }
              echo ($j == 12 ? $sum :  $sum . ",");
            }
            ?>
          ],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'month'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 12
            },
            maxBarThickness: 25,
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 10,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return 'Rp ' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
            }
          }
        },
      }
    });
  </script>

</body>

</html>