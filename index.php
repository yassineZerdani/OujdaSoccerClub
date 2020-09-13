<?php session_start();
if (!isset($_SESSION['admin'])) {
  header("Location:login.php");
  die();
}
include("db.php");
?>

<?php
$es1 = mysqli_query($con, "select sum(total_amt) as total_orders_info1 from orders_info where MONTH(date)=1") or die("query 3 incorrect.......");
$es2 = mysqli_query($con, "select sum(total_amt) as total_orders_info2 from orders_info where MONTH(date)=2") or die("query 3 incorrect.......");
$es3 = mysqli_query($con, "select sum(total_amt) as total_orders_info3 from orders_info where MONTH(date)=3") or die("query 3 incorrect.......");
$es4 = mysqli_query($con, "select sum(total_amt) as total_orders_info4 from orders_info where MONTH(date)=4") or die("query 3 incorrect.......");
$es5 = mysqli_query($con, "select sum(total_amt) as total_orders_info5 from orders_info where MONTH(date)=5") or die("query 3 incorrect.......");
$es6 = mysqli_query($con, "select sum(total_amt) as total_orders_info6 from orders_info where MONTH(date)=6") or die("query 3 incorrect.......");
$es7 = mysqli_query($con, "select sum(total_amt) as total_orders_info7 from orders_info where MONTH(date)=7") or die("query 3 incorrect.......");
$es8 = mysqli_query($con, "select sum(total_amt) as total_orders_info8 from orders_info where MONTH(date)=8") or die("query 3 incorrect.......");
$es9 = mysqli_query($con, "select sum(total_amt) as total_orders_info9 from orders_info where MONTH(date)=9") or die("query 3 incorrect.......");
$es10 = mysqli_query($con, "select sum(total_amt) as total_orders_info10 from orders_info where MONTH(date)=10") or die("query 3 incorrect.......");
$es11 = mysqli_query($con, "select sum(total_amt) as total_orders_info11 from orders_info where MONTH(date)=11") or die("query 3 incorrect.......");
$es12 = mysqli_query($con, "select sum(total_amt) as total_orders_info12 from orders_info where MONTH(date)=12") or die("query 3 incorrect.......");
$o1 = mysqli_fetch_assoc($es1);
$o2 = mysqli_fetch_assoc($es2);
$o3 = mysqli_fetch_assoc($es3);
$o4 = mysqli_fetch_assoc($es4);
$o5 = mysqli_fetch_assoc($es5);
$o6 = mysqli_fetch_assoc($es6);
$o7 = mysqli_fetch_assoc($es7);
$o8 = mysqli_fetch_assoc($es8);
$o9 = mysqli_fetch_assoc($es9);
$o10 = mysqli_fetch_assoc($es10);
$o11 = mysqli_fetch_assoc($es11);
$o12 = mysqli_fetch_assoc($es12);
$su1 = $o1['total_orders_info1'];
$su2 = $o2['total_orders_info2'];
$su3 = $o3['total_orders_info3'];
$su4 = $o4['total_orders_info4'];
$su5 = $o5['total_orders_info5'];
$su6 = $o6['total_orders_info6'];
$su7 = $o7['total_orders_info7'];
$su8 = $o8['total_orders_info8'];
$su9 = $o9['total_orders_info9'];
$su10 = $o10['total_orders_info10'];
$su11 = $o11['total_orders_info11'];
$su12 = $o12['total_orders_info12'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
  <!-- PLUGINS CSS STYLE -->
  <link href="assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
  <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="assets/plugins/passwordrangepicker/passwordrangepicker.css" rel="stylesheet" />


  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />


  <!-- FAVICON -->
  <link href="wah.png" rel="shortcut icon" />


  <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
  <script>
    NProgress.configure({
      showSpinner: false
    });
    NProgress.start();
  </script>
  <div class="mobile-sticky-body-overlay"></div>
  <div class="wrapper">
    <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
    -->
    <aside class="left-sidebar bg-sidebar">
      <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
          <a href="index.php">
            <img src="wah.png" style="position:relative; right: 20px;">
            <g fill="none" fill-rule="evenodd">
              <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
            </svg>
            <span class="brand-name" style="position:relative; right: 30px;">Dashboard</span>
          </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

          <!-- sidebar menu -->
          <ul class="nav sidebar-inner" id="sidebar-menu">
            <li class="has-sub active expand">
              <a class="sidenav-item-link" href="index.php">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">Dashboard</span>
              </a>
            </li>
            <li class="has-sub">
              <a class="sidenav-item-link" href="order_dashboard.php">
                <i class="mdi mdi-food"></i>
                <span class="nav-text">Commander</span>
              </a>
            </li>
            <li class="has-sub">
              <a class="sidenav-item-link" href="ordersFinal.php">
                <i class="mdi mdi-note-multiple"></i>
                <span class="nav-text">Ordres</span>
              </a>
            </li>
            <li class="has-sub">
              <a class="sidenav-item-link" href="analytics.php">
                <i class="mdi mdi-chart-line"></i>
                <span class="nav-text">Analytique</span>
              </a>
            </li>
            <li class="has-sub">
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts" aria-expanded="false" aria-controls="charts">
                <i class="mdi mdi-coffee-outline"></i>
                <span class="nav-text">La Cafétéria</span> <b class="caret"></b>
              </a>
              <ul class="collapse" id="charts" data-parent="#sidebar-menu">
                <div class="sub-menu">
                  <li>
                    <a class="sidenav-item-link" href="products.php?category=0">
                      <span class="nav-text">Boissons</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="products.php?category=1">
                      <span class="nav-text">Boissons Chaudes</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="products.php?category=2">
                      <span class="nav-text">Biscuits</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="products.php?category=3">
                      <span class="nav-text">Snacks</span>
                    </a>
                  </li>
                  <li>
                    <a class="sidenav-item-link" href="products.php">
                      <span class="nav-text">Tous Les Produits</span>
                    </a>
                  </li>
                </div>
              </ul>
            </li>
            <li class="has-sub">
              <a href="logout.php" class="sidenav-item-link" id="deconn">
                <i class="mdi mdi-logout"></i>
                <span class="nav-text">Log out</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
    <div class="page-wrapper">
      <!--Header-->
      <?php include 'navbar.php'; ?>
      <!---->
      <div class="content-wrapper">
        <div class="content">
          <!-- Top Statistics -->
          <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4">
                <div class="card-body">
                  <h2 class="mb-1"><?php echo " 0 "; ?></h2>
                  <p>Les Abonnés</p>
                  <div class="chartjs-wrapper">
                    <canvas id="barChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini  mb-4">
                <div class="card-body">
                  <h2 class="mb-1">
                    <?php
                    $result1 = mysqli_query($con, "select sum(total_amt) as total_amts from orders_info where DATE(date)=DATE(NOW())") or die("query 2 incorrect.......");
                    $result2 = mysqli_query($con, "select sum(paiement_avance) as total_users from users where DATE(date_creation)=DATE(NOW())") or die("query 2 incorrect.......");
                    $result3 = mysqli_query($con, "select sum(price) as total_reservations from stadium_reservations where DATE(reservation_date)=DATE(NOW()) and status='Paid'") or die("query 3 incorrect.......");
                    $result4 = mysqli_query($con, "select val as val_sortie from sortie where DATE(date)=DATE(NOW())") or die("query 3 incorrect.......");
                    $row1 = mysqli_fetch_assoc($result1);
                    $row2 = mysqli_fetch_assoc($result2);
                    $row3 = mysqli_fetch_assoc($result3);
                    $row4 = mysqli_fetch_assoc($result4);
                    $sum1 = intval($row1['total_amts']);
                    $sum2 = intval($row2['total_users']);
                    $sum3 = intval($row3['total_reservations']);
                    if ($row4 == null)
                      $sum4 = 0;
                    else
                      $sum4 = intval($row4['val_sortie']);
                    $sum = $sum3 + $sum2 + $sum1 - $sum4;
                    $daily_sum = $sum;
                    echo " $daily_sum "; ?> DH
                  </h2>
                  <p>Revenu total quotidien</p>
                  <div class="chartjs-wrapper">
                    <canvas id="line"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4">
                <div class="card-body">
                  <h2 class="mb-1"><?php
                                    $result1 = mysqli_query($con, "select sum(total_amt) as total_amts from orders_info where MONTH(date)=MONTH(NOW()) AND YEAR(date)=YEAR(NOW())") or die("query 2 incorrect.......");
                                    $result2 = mysqli_query($con, "select sum(paiement_avance) as total_users from users where MONTH(date_creation)=MONTH(NOW()) AND YEAR(date_creation)=YEAR(NOW())") or die("query 2 incorrect.......");
                                    $result3 = mysqli_query($con, "select sum(price) as total_reservations from stadium_reservations where MONTH(reservation_date)=MONTH(NOW()) AND YEAR(reservation_date)=YEAR(NOW()) and status='Paid'") or die("query 3 incorrect.......");
                                    $result4 = mysqli_query($con, "select sum(val) as val_sortie from sortie where MONTH(date)=MONTH(NOW()) AND YEAR(date)=YEAR(NOW())") or die("query 3 incorrect.......");
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $row4 = mysqli_fetch_assoc($result4);
                                    $sum1 = intval($row1['total_amts']);
                                    $sum2 = intval($row2['total_users']);
                                    $sum3 = intval($row3['total_reservations']);
                                    if ($row4 == null)
                                      $sum4 = 0;
                                    else
                                      $sum4 = intval($row4['val_sortie']);
                                    $sum = $sum3 + $sum2 + $sum1 - $sum4;
                                    echo " $sum ";
                                    ?> DH</h2>
                  <p>Revenu Total Mensuel</p>
                  <div class="chartjs-wrapper">
                    <canvas id="linee"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4">
                <div class="card-body">
                  <h2 class="mb-1"><?php
                                    $result1 = mysqli_query($con, "select sum(total_amt) as total_amts from orders_info where YEAR(date)=YEAR(NOW())") or die("query 2 incorrect.......");
                                    $result2 = mysqli_query($con, "select sum(paiement_avance) as total_users from users where YEAR(date_creation)=YEAR(NOW())") or die("query 2 incorrect.......");
                                    $result3 = mysqli_query($con, "select sum(price) as total_reservations from stadium_reservations where YEAR(reservation_date)=YEAR(NOW()) and status='Paid'") or die("query 3 incorrect.......");
                                    $result4 = mysqli_query($con, "select sum(val) as val_sortie from sortie where YEAR(date)=YEAR(NOW())") or die("query 3 incorrect.......");
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $row4 = mysqli_fetch_assoc($result4);
                                    $sum1 = intval($row1['total_amts']);
                                    $sum2 = intval($row2['total_users']);
                                    $sum3 = intval($row3['total_reservations']);
                                    if ($row4 == null)
                                      $sum4 = 0;
                                    else
                                      $sum4 = intval($row4['val_sortie']);
                                    $sum = $sum3 + $sum2 + $sum1 - $sum4;
                                    echo " $sum ";
                                    ?> DH</h2>
                  <p>Revenu total cette année</p>
                  <div class="chartjs-wrapper">
                    <canvas id="lineee"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-md-12">
              <!-- Sales Graph -->
              <div class="card card-default" data-scroll-height="675">
                <div class="card-header">
                  <h2>Revenu Annuel</h2>
                </div>
                <div class="card-body">
                  <canvas id="aactivity" class="chartjs"></canvas>
                </div>
                <div class="card-footer d-flex flex-wrap bg-white p-0">
                  <div class="col-6 px-0">
                    <div class="text-center p-4">
                      <h4><?php
                          $result = mysqli_query($con, "select sum(total_amt) as total_amts from orders_info WHERE YEAR(date)=YEAR(NOW())") or die("query 2 incorrect.......");
                          $row = mysqli_fetch_assoc($result);
                          $sum = intval($row['total_amts']);
                          echo " $sum ";
                          ?> DH</h4>
                      <p class="mt-2">La Cafétéria</p>
                    </div>
                  </div>
                  <div class="col-6 px-0">
                    <div class="text-center p-4 border-left">
                      <h4><?php
                          $result = mysqli_query($con, "select sum(paiement_avance) as total_amts from users WHERE YEAR(date_creation)=YEAR(NOW())") or die("query 2 incorrect.......");
                          $row = mysqli_fetch_assoc($result);
                          $sum = intval($row['total_amts']);
                          echo " $sum ";
                          ?> DH</h4>
                      <p class="mt-2">Les Terrains</p>
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
  </div>
  </div>


  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
        <input type="text" name="sortie" class="form-control validate" style="width: 30%;" />
        <button name="btnn_save" id="btnn_save" class="btn btn-primary btn-block text-uppercase" style="width: 10%; border-radius:20px">OK</button>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/toaster/toastr.min.js"></script>
  <script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
  <script src="assets/plugins/charts/Chart.min.js"></script>
  <script src="assets/plugins/ladda/spin.min.js"></script>
  <script src="assets/plugins/ladda/ladda.min.js"></script>
  <script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
  <script src="assets/plugins/select2/js/select2.min.js"></script>
  <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="assets/plugins/daterangepicker/moment.min.js"></script>
  <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="assets/plugins/jekyll-search.min.js"></script>
  <script src="assets/js/sleek.js"></script>
  <script src="assets/js/chart.js"></script>
  <script src="assets/js/date-range.js"></script>
  <script src="assets/js/map.js"></script>
  <script src="assets/js/custom.js"></script>
  <script type="text/javascript">
    var line = document.getElementById("linee");
    if (line !== null) {
      line = line.getContext("2d");
      var gradientFill = line.createLinearGradient(0, 120, 0, 0);
      gradientFill.addColorStop(0, "rgba(240, 52, 52, 0.5)");
      gradientFill.addColorStop(1, "rgba(240, 52, 52, 0.5)");

      var lChart = new Chart(line, {
        type: "line",
        data: {
          labels: ["Fri", "Sat", "Sun", "Mon", "Tue", "Wed", "Thu"],
          datasets: [{
            label: "Rev",
            lineTension: 0,
            pointRadius: 4,
            pointBackgroundColor: "rgba(255,255,255,1)",
            pointBorderWidth: 2,
            fill: true,
            backgroundColor: gradientFill,
            borderColor: "red",
            borderWidth: 2,
            data: [0, 4, 3, 5.5, 3, 4.7, 1]
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          layout: {
            padding: {
              right: 10
            }
          },
          scales: {
            xAxes: [{
              gridLines: {
                drawBorder: false,
                display: false
              },
              ticks: {
                display: false, // hide main x-axis line
                beginAtZero: true
              },
              barPercentage: 1.8,
              categoryPercentage: 0.2
            }],
            yAxes: [{
              gridLines: {
                drawBorder: false, // hide main y-axis line
                display: false
              },
              ticks: {
                display: false,
                beginAtZero: true
              }
            }]
          },
          tooltips: {
            mode: "index",
            titleFontColor: "#888",
            bodyFontColor: "#555",
            titleFontSize: 12,
            bodyFontSize: 15,
            backgroundColor: "rgba(256,256,256,0.95)",
            displayColors: true,
            xPadding: 10,
            yPadding: 7,
            borderColor: "rgba(220, 220, 220, 0.9)",
            borderWidth: 2,
            caretSize: 6,
            caretPadding: 5
          }
        }
      });
    }
  </script>
  <script type="text/javascript">
    var line = document.getElementById("lineee");
    if (line !== null) {
      line = line.getContext("2d");
      var gradientFill = line.createLinearGradient(0, 120, 0, 0);
      gradientFill.addColorStop(0, "rgba(44, 130, 201, 0.5)");
      gradientFill.addColorStop(1, "rgba(44, 130, 201, 0.5)");

      var lChart = new Chart(line, {
        type: "line",
        data: {
          labels: ["Fri", "Sat", "Sun", "Mon", "Tue", "Wed", "Thu"],
          datasets: [{
            label: "Rev",
            lineTension: 0,
            pointRadius: 4,
            pointBackgroundColor: "rgba(255,255,255,1)",
            pointBorderWidth: 2,
            fill: true,
            backgroundColor: gradientFill,
            borderColor: "blue",
            borderWidth: 2,
            data: [0, 4, 3, 5.5, 3, 4.7, 1]
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          layout: {
            padding: {
              right: 10
            }
          },
          scales: {
            xAxes: [{
              gridLines: {
                drawBorder: false,
                display: false
              },
              ticks: {
                display: false, // hide main x-axis line
                beginAtZero: true
              },
              barPercentage: 1.8,
              categoryPercentage: 0.2
            }],
            yAxes: [{
              gridLines: {
                drawBorder: false, // hide main y-axis line
                display: false
              },
              ticks: {
                display: false,
                beginAtZero: true
              }
            }]
          },
          tooltips: {
            mode: "index",
            titleFontColor: "#888",
            bodyFontColor: "#555",
            titleFontSize: 12,
            bodyFontSize: 15,
            backgroundColor: "rgba(256,256,256,0.95)",
            displayColors: true,
            xPadding: 10,
            yPadding: 7,
            borderColor: "rgba(220, 220, 220, 0.9)",
            borderWidth: 2,
            caretSize: 6,
            caretPadding: 5
          }
        }
      });
    }
  </script>
  <script>
    /*======== 16. ANALYTICS - ACTIVITY CHART ========*/
    var activity = document.getElementById("aactivity");
    if (activity !== null) {
      var activityData = [{
          first: [<?php echo $su1; ?>, <?php echo $su2; ?>, <?php echo $su3; ?>, <?php echo $su4; ?>, <?php echo $su5; ?>, <?php echo $su6; ?>, <?php echo $su7; ?>, <?php echo $su8; ?>, <?php echo $su9; ?>, <?php echo $su10; ?>, <?php echo $su11; ?>, <?php echo $su12; ?>]
        },
        {
          first: [0, 65, 77, 33, 49, 100, 100],
        },
        {
          first: [0, 40, 77, 55, 33, 116, 50],
        },
        {
          first: [0, 44, 22, 77, 33, 151, 99],
        }
      ];

      var config = {
        // The type of chart we want to create
        type: "line",
        // The data for our dataset
        data: {
          labels: [
            "janvier",
            "février",
            "mars",
            "avril",
            "mai",
            "juin",
            "juillet",
            "août",
            "septembre",
            "octobre",
            "novembre ",
            "décembre"
          ],
          datasets: [{
            label: "Les Terrains",
            backgroundColor: "transparent",
            borderColor: "rgb(82, 136, 255)",
            data: activityData[0].first,
            lineTension: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255,255,255,1)",
            pointHoverBackgroundColor: "rgba(255,255,255,1)",
            pointBorderWidth: 2,
            pointHoverRadius: 7,
            pointHoverBorderWidth: 1
          }]
        },
        // Configuration options go here
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              gridLines: {
                display: false,
              },
              ticks: {
                fontColor: "#8a909d", // this here
              },
            }],
            yAxes: [{
              gridLines: {
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: true,
                color: "#eee",
                zeroLineColor: "#eee"
              },
              ticks: {
                // callback: function(tick, index, array) {
                //   return (index % 2) ? "" : tick;
                // }
                stepSize: 50,
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif"
              }
            }]
          },
          tooltips: {
            mode: "index",
            intersect: false,
            titleFontColor: "#888",
            bodyFontColor: "#555",
            titleFontSize: 12,
            bodyFontSize: 15,
            backgroundColor: "rgba(256,256,256,0.95)",
            displayColors: true,
            xPadding: 10,
            yPadding: 7,
            borderColor: "rgba(220, 220, 220, 0.9)",
            borderWidth: 2,
            caretSize: 6,
            caretPadding: 5
          }
        }
      };

      var ctx = document.getElementById("aactivity").getContext("2d");
      var myLine = new Chart(ctx, config);

      var items = document.querySelectorAll("#user-activity .nav-tabs .nav-item");
      items.forEach(function(item, index) {
        item.addEventListener("click", function() {
          config.data.datasets[0].data = activityData[index].first;
          config.data.datasets[1].data = activityData[index].second;
          myLine.update();
        });
      });
    }
  </script>
  <script>
    document.getElementById("btn_save").addEventListener("click", function reasonForLeaving() {
      var reasonForLeaving = prompt("Entrer la sortie");
      if (reasonForLeaving === null || reasonForLeaving == "") {
        return false;
      } else if (reasonForLeaving != null) {
        document.getElementById("setReasonForLeaving").value = reasonForLeaving;
        return true;
      }
    });
  </script>

</body>

</html>