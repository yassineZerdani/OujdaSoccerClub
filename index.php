<?php session_start();
if (!isset($_SESSION['admin'])) {
header("Location:login.php");
die();
} 
?>
<?php

include("db.php");

/*
$result111 = mysqli_query($con, "select val,date from counter") or die("query 2 incorrect.......");
$row111 = mysqli_fetch_assoc($result111);
$counter = intval($row111['val']);
$dateee = DATE($row111['date']);

if ($counter == 0) {
  $time = DATE("Y-m-d");
}
if ($dateee == DATE("Y-m-d")) {
  mysqli_query($con, "update counter set val='0'") or die("Query 2 is inncorrect..........");
  $time = DATE("Y-m-d");
} else {
  $time_res = mysqli_query($con, "select date from counter") or die("query 2 incorrect.......");
  $timee = mysqli_fetch_assoc($time_res);
  $time = DATE($timee['date']);
}

*/
if (isset($_POST['btn_save'])) {
  $sortie = $_POST['sortie'];
  $_POST['sortie'] = 0;
  $result = mysqli_query($con, "SELECT COUNT(*) FROM sortie WHERE DATE(date)=DATE(NOW())");
  $row = mysqli_fetch_array($result);
  if($row[0]<1)
		mysqli_query($con, "INSERT INTO sortie(val,date) VALUES('$sortie',DATE(NOW()))") or die("Query 2 is inncorrect..........");
	else
		mysqli_query($con, "UPDATE sortie set val=val + '$sortie' where DATE(date)=DATE(NOW())") or die("Query 2 is inncorrect..........");
	/*
	$result = mysqli_query($con, "SELECT COUNT(*) FROM day WHERE DATE(date)=DATE(NOW())");
	$row = mysqli_fetch_array($result);
	
	if($row[0]<1)
		mysqli_query($con, "INSERT INTO day(value,date) VALUES('0-$sortie',DATE(NOW()))") or die("Query 2 is inncorrect..........");
	else
		mysqli_query($con, "update day set value=value - '$sortie' where DATE(date)=DATE(NOW())") or die("Query 2 is inncorrect..........");*/
}
  /*
  $result = mysqli_query($con, "SELECT COUNT(*) FROM day WHERE DATE(date)=DATE(NOW())");
  $row = mysqli_fetch_array($result);
  
  if($row[0]<1)
		mysqli_query($con, "INSERT INTO day(value,date) VALUES('$sum4',DATE(NOW()))") or die("Query 2 is inncorrect..........");
	else
		mysqli_query($con, "update day set value='$sum' where DATE(date)=DATE(NOW())") or die("Query 2 is inncorrect..........");*/

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
<?php
                                    $es1 = mysqli_query($con, "select sum(price) as total_stadium_reservations1 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=1") or die("query 3 incorrect.......");
                                    $es2 = mysqli_query($con, "select sum(price) as total_stadium_reservations2 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=2") or die("query 3 incorrect.......");
                                    $es3 = mysqli_query($con, "select sum(price) as total_stadium_reservations3 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=3") or die("query 3 incorrect.......");
                                    $es4 = mysqli_query($con, "select sum(price) as total_stadium_reservations4 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=4") or die("query 3 incorrect.......");
                                    $es5 = mysqli_query($con, "select sum(price) as total_stadium_reservations5 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=5") or die("query 3 incorrect.......");
                                    $es6 = mysqli_query($con, "select sum(price) as total_stadium_reservations6 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=6") or die("query 3 incorrect.......");
                                    $es7 = mysqli_query($con, "select sum(price) as total_stadium_reservations7 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=7") or die("query 3 incorrect.......");
                                    $es8 = mysqli_query($con, "select sum(price) as total_stadium_reservations8 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=8") or die("query 3 incorrect.......");
                                    $es9 = mysqli_query($con, "select sum(price) as total_stadium_reservations9 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=9") or die("query 3 incorrect.......");
                                    $es10 = mysqli_query($con, "select sum(price) as total_stadium_reservations10 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=10") or die("query 3 incorrect.......");
                                    $es11 = mysqli_query($con, "select sum(price) as total_stadium_reservations11 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=11") or die("query 3 incorrect.......");
                                    $es12 = mysqli_query($con, "select sum(price) as total_stadium_reservations12 from stadium_reservations where status = 'Paid' AND MONTH(reservation_date)=12") or die("query 3 incorrect.......");
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
                                    $suk1 = $o1['total_stadium_reservations1'];
                                    $suk2 = $o2['total_stadium_reservations2'];
                                    $suk3 = $o3['total_stadium_reservations3'];
                                    $suk4 = $o4['total_stadium_reservations4'];
                                    $suk5 = $o5['total_stadium_reservations5'];
                                    $suk6 = $o6['total_stadium_reservations6'];
                                    $suk7 = $o7['total_stadium_reservations7'];
                                    $suk8 = $o8['total_stadium_reservations8'];
                                    $suk9 = $o9['total_stadium_reservations9'];
                                    $suk10 = $o10['total_stadium_reservations10'];
                                    $suk11 = $o11['total_stadium_reservations11'];
                                    $suk12 = $o12['total_stadium_reservations12'];
                                    $kl1 = mysqli_query($con, "select sum(paiement_avance) as total_users1 from users where MONTH(date_creation)=1") or die("query 3 incorrect.......");
                                    $kl2 = mysqli_query($con, "select sum(paiement_avance) as total_users2 from users where MONTH(date_creation)=2") or die("query 3 incorrect.......");
                                    $kl3 = mysqli_query($con, "select sum(paiement_avance) as total_users3 from users where MONTH(date_creation)=3") or die("query 3 incorrect.......");
                                    $kl4 = mysqli_query($con, "select sum(paiement_avance) as total_users4 from users where MONTH(date_creation)=4") or die("query 3 incorrect.......");
                                    $kl5 = mysqli_query($con, "select sum(paiement_avance) as total_users5 from users where MONTH(date_creation)=5") or die("query 3 incorrect.......");
                                    $kl6 = mysqli_query($con, "select sum(paiement_avance) as total_users6 from users where MONTH(date_creation)=6") or die("query 3 incorrect.......");
                                    $kl7 = mysqli_query($con, "select sum(paiement_avance) as total_users7 from users where MONTH(date_creation)=7") or die("query 3 incorrect.......");
                                    $kl8 = mysqli_query($con, "select sum(paiement_avance) as total_users8 from users where MONTH(date_creation)=8") or die("query 3 incorrect.......");
                                    $kl9 = mysqli_query($con, "select sum(paiement_avance) as total_users9 from users where MONTH(date_creation)=9") or die("query 3 incorrect.......");
                                    $kl10 = mysqli_query($con, "select sum(paiement_avance) as total_users10 from users where MONTH(date_creation)=10") or die("query 3 incorrect.......");
                                    $kl11 = mysqli_query($con, "select sum(paiement_avance) as total_users11 from users where MONTH(date_creation)=11") or die("query 3 incorrect.......");
                                    $kl12 = mysqli_query($con, "select sum(paiement_avance) as total_users12 from users where MONTH(date_creation)=12") or die("query 3 incorrect.......");
                                    $or1 = mysqli_fetch_assoc($kl1);
                                    $or2 = mysqli_fetch_assoc($kl2);
                                    $or3 = mysqli_fetch_assoc($kl3);
                                    $or4 = mysqli_fetch_assoc($kl4);
                                    $or5 = mysqli_fetch_assoc($kl5);
                                    $or6 = mysqli_fetch_assoc($kl6);
                                    $or7 = mysqli_fetch_assoc($kl7);
                                    $or8 = mysqli_fetch_assoc($kl8);
                                    $or9 = mysqli_fetch_assoc($kl9);
                                    $or10 = mysqli_fetch_assoc($kl10);
                                    $or11 = mysqli_fetch_assoc($kl11);
                                    $or12 = mysqli_fetch_assoc($kl12);
                                    $suuk1 = $or1['total_users1'];
                                    $suuk2 = $or2['total_users2'];
                                    $suuk3 = $or3['total_users3'];
                                    $suuk4 = $or4['total_users4'];
                                    $suuk5 = $or5['total_users5'];
                                    $suuk6 = $or6['total_users6'];
                                    $suuk7 = $or7['total_users7'];
                                    $suuk8 = $or8['total_users8'];
                                    $suuk9 = $or9['total_users9'];
                                    $suuk10 = $or10['total_users10'];
                                    $suuk11 = $or11['total_users11'];
                                    $suuk12 = $or12['total_users12'];
                                    $suukk1 = $suk1 + $suuk1;
                                    $suukk2 = $suk2 + $suuk2;
                                    $suukk3 = $suk3 + $suuk3;
                                    $suukk4 = $suk4 + $suuk4;
                                    $suukk5 = $suk5 + $suuk5;
                                    $suukk6 = $suk6 + $suuk6;
                                    $suukk7 = $suk7 + $suuk7;
                                    $suukk8 = $suk8 + $suuk8;
                                    $suukk9 = $suk9 + $suuk9;
                                    $suukk10 = $suk10 + $suuk10;
                                    $suukk11 = $suk11 + $suuk11;
                                    $suukk12 = $suk12 + $suuk12;
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
  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
                    <a class="sidenav-item-link" href="stadium_reservation.php">
                      <i class="mdi mdi-soccer-field"></i>
                      <span class="nav-text">Reserver Terrain</span>
                    </a>
                  </li>
                  <li class="has-sub">
                    <a class="sidenav-item-link" href="reservations.php">
                      <i class="mdi mdi-clock"></i>
                      <span class="nav-text">Les Reservations</span>
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
                    <a class="sidenav-item-link" href="users.php">
                      <i class="mdi mdi-account"></i>
                      <span class="nav-text">les abonnés</span>
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
                </ul>
              </div>
            </div>
          </aside>
          <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
              <nav class="navbar navbar-static-top navbar-expand-lg">
      
                <!-- Sidebar toggle button -->
                <button id="sidebar-toggler" class="sidebar-toggle">
                  <span class="sr-only">Toggle navigation</span>
                </button>
                <!-- search form -->
                <div class="search-form d-none d-lg-inline-block">
                  <div class="input-group">
                  </div>
                  <div id="search-results-container">
                    <ul id="search-results"></ul>
                  </div>
                </div>
      
                <div class="navbar-right ">
                  <ul class="nav navbar-nav">
                    
                    <li><a href="logout.php" type="button" class="btn btn-outline-secondary" id="deconn">Deconnexion</a></li>
                  </ul>
                </div>
              </nav>
            </header>
      <div class="content-wrapper">
        <div class="content" style="height: 50px;">
          <form action="index.php" name="form" method="post">
            <input type="hidden" name="sortie" id="setReasonForLeaving">
            <button type="submit" name="btn_save" id="btn_save" class="badge badge-success">entrer la sortie</button>
          </form>
        </div>
        <div class="content">
          <!-- Top Statistics -->
		  <?php
                                    $res = mysqli_query($con, "select COUNT(*) as total_users from users") or die("query 3 incorrect.......");
                                    $res1 = mysqli_query($con, "select COUNT(*) as total_users1 from users where MONTH(date_creation)=1") or die("query 3 incorrect.......");
                                    $res2 = mysqli_query($con, "select COUNT(*) as total_users2 from users where MONTH(date_creation)=2") or die("query 3 incorrect.......");
                                    $res3 = mysqli_query($con, "select COUNT(*) as total_users3 from users where MONTH(date_creation)=3") or die("query 3 incorrect.......");
                                    $res4 = mysqli_query($con, "select COUNT(*) as total_users4 from users where MONTH(date_creation)=4") or die("query 3 incorrect.......");
                                    $res5 = mysqli_query($con, "select COUNT(*) as total_users5 from users where MONTH(date_creation)=5") or die("query 3 incorrect.......");
                                    $res6 = mysqli_query($con, "select COUNT(*) as total_users6 from users where MONTH(date_creation)=6") or die("query 3 incorrect.......");
                                    $res7 = mysqli_query($con, "select COUNT(*) as total_users7 from users where MONTH(date_creation)=7") or die("query 3 incorrect.......");
                                    $res8 = mysqli_query($con, "select COUNT(*) as total_users8 from users where MONTH(date_creation)=8") or die("query 3 incorrect.......");
                                    $res9 = mysqli_query($con, "select COUNT(*) as total_users9 from users where MONTH(date_creation)=9") or die("query 3 incorrect.......");
                                    $res10 = mysqli_query($con, "select COUNT(*) as total_users10 from users where MONTH(date_creation)=10") or die("query 3 incorrect.......");
                                    $res11 = mysqli_query($con, "select COUNT(*) as total_users11 from users where MONTH(date_creation)=11") or die("query 3 incorrect.......");
                                    $res12 = mysqli_query($con, "select COUNT(*) as total_users12 from users where MONTH(date_creation)=12") or die("query 3 incorrect.......");
                                    $ro = mysqli_fetch_assoc($res);
                                    $ro1 = mysqli_fetch_assoc($res1);
                                    $ro2 = mysqli_fetch_assoc($res2);
                                    $ro3 = mysqli_fetch_assoc($res3);
                                    $ro4 = mysqli_fetch_assoc($res4);
                                    $ro5 = mysqli_fetch_assoc($res5);
                                    $ro6 = mysqli_fetch_assoc($res6);
                                    $ro7 = mysqli_fetch_assoc($res7);
                                    $ro8 = mysqli_fetch_assoc($res8);
                                    $ro9 = mysqli_fetch_assoc($res9);
                                    $ro10 = mysqli_fetch_assoc($res10);
                                    $ro11 = mysqli_fetch_assoc($res11);
                                    $ro12 = mysqli_fetch_assoc($res12);
                                    $count = $ro['total_users'];
                                    $count1 = $ro1['total_users1'];
                                    $count2 = $ro2['total_users2'];
                                    $count3 = $ro3['total_users3'];
                                    $count4 = $ro4['total_users4'];
                                    $count5 = $ro5['total_users5'];
                                    $count6 = $ro6['total_users6'];
                                    $count7 = $ro7['total_users7'];
                                    $count8 = $ro8['total_users8'];
                                    $count9 = $ro9['total_users9'];
                                    $count10 = $ro10['total_users10'];
                                    $count11 = $ro11['total_users11'];
                                    $count12 = $ro12['total_users12'];
                                    ?>
          <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4">
                <div class="card-body">
                  <h2 class="mb-1"><?php echo " $count "; ?></h2>
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
					  if($row4 == null)
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
									  if($row4 == null)
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
									  if($row4 == null)
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
                          $result66 = mysqli_query($con, "select sum(price) as total_price from stadium_reservations WHERE YEAR(reservation_date)=YEAR(NOW()) AND status LIKE 'Paid'") or die("query 2 incorrect.......");
                          $row = mysqli_fetch_assoc($result);
                          $row66 = mysqli_fetch_assoc($result66);
                          $sum = intval($row['total_amts']);
                          $sum66 = intval($row66['total_price']);
                          $sum987 = $sum + $sum66;
							echo " $sum987 ";
                          ?> DH</h4>
                      <p class="mt-2">Les Terrains</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-md-12">
              <!-- Sales Graph -->
              <div class="card card-default" data-scroll-height="675">
                <div class="card-header">
                  <h2>Les Abonnés</h2>
                </div>
                <div class="card-body">
                  <canvas id="currentUsers" class="chartjs"></canvas>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12">
            </div>
          </div>

          <div class="row">
            <div class="col-xl-5">
              <!-- New Customers -->
              <div class="card card-table-border-none" data-scroll-height="580">
                <div class="card-header justify-content-between ">
                  <h2>Nouveaux Abonnés</h2>
                  <div>
                    <button class="text-black-50 mr-2 font-size-20">
                      <i class="mdi mdi-cached"></i>
                    </button>
                    <div class="dropdown show d-inline-block widget-dropdown">
                      <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                      </a>
                      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
                        <li class="dropdown-item"><a href="#">Action</a></li>
                        <li class="dropdown-item"><a href="#">Another action</a></li>
                        <li class="dropdown-item"><a href="#">Something else here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <table class="table ">
                    <tbody>
                      <?php
                      $resol = mysqli_query($con, "select users_id, full_name, avatar, paiement_avance, DATE(date_creation) from users ORDER BY users_id DESC LIMIT 5") or die("query 2 incorrect.......");

                      while (list($users_id, $full_name, $avatar, $paiement_avance, $date_creation) =
                        mysqli_fetch_array($resol)
                      ) {
                        echo "
                      <tr>
                        <td>
                          <div class='media'>
                            <div class='media-image mr-3 rounded-circle'>
                              <a href='user_profile.php?users_id=$users_id'><img class='rounded-circle w-45' src='https://res.cloudinary.com/dnhuupkqa/image/upload/$avatar' alt='customer image'></a>
                            </div>
                            <div class='media-body align-self-center'>
                              <a href='user_profile.php?users_id=$users_id'>
                                <h6 class='mt-0 text-dark font-weight-medium'>$full_name</h6>
                              </a>
                              <small style='color:grey'>$date_creation</small>
                            </div>
                          </div>
                        </td>
                        <td class='text-dark d-none d-md-block'>$paiement_avance<med style='color:grey'>DH</med></td>
                      </tr>
                      ";
                      }
                      mysqli_close($con);
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-xl-7">
              <!-- Top Products -->
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
    var cUser = document.getElementById("currentUsers");
    if (cUser !== null) {
      var myUChart = new Chart(cUser, {
        type: "bar",
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
            label: "Abonnés",
            data: [<?php echo $count1; ?>, <?php echo $count2; ?>, <?php echo $count3; ?>, <?php echo $count4; ?>, <?php echo $count5; ?>, <?php echo $count6; ?>, <?php echo $count7; ?>, <?php echo $count8; ?>, <?php echo $count9; ?>, <?php echo $count10; ?>, <?php echo $count11; ?>, <?php echo $count12; ?>],
            // data: [7, 3.2, 1.8, 2.1, 1.5, 3.5, 4, 2.3, 2.9, 4.5, 1.8, 3.4, 2.8],
            backgroundColor: "#4c84ff"
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              gridLines: {
                drawBorder: true,
                display: true,
              },
              ticks: {
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: true, // hide main x-axis line
                beginAtZero: true,
              },
              barPercentage: 1.8,
              categoryPercentage: 0.2
            }],
            yAxes: [{
              gridLines: {
                drawBorder: true,
                display: true,
                color: "#eee",
                zeroLineColor: "#eee"
              },
              ticks: {
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: true,
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
          first: [<?php echo $suukk1; ?>, <?php echo $suukk2; ?>, <?php echo $suukk3; ?>, <?php echo $suukk4; ?>, <?php echo $suukk5; ?>, <?php echo $suukk6; ?>, <?php echo $suukk7; ?>, <?php echo $suukk8; ?>, <?php echo $suukk9; ?>, <?php echo $suukk10; ?>, <?php echo $suukk11; ?>, <?php echo $suukk12; ?>],
          second: [<?php echo $su1; ?>, <?php echo $su2; ?>, <?php echo $su3; ?>, <?php echo $su4; ?>, <?php echo $su5; ?>, <?php echo $su6; ?>, <?php echo $su7; ?>, <?php echo $su8; ?>, <?php echo $su9; ?>, <?php echo $su10; ?>, <?php echo $su11; ?>, <?php echo $su12; ?>]
        },
        {
          first: [0, 65, 77, 33, 49, 100, 100],
          second: [88, 33, 20, 44, 111, 140, 77]
        },
        {
          first: [0, 40, 77, 55, 33, 116, 50],
          second: [55, 32, 20, 55, 111, 134, 66]
        },
        {
          first: [0, 44, 22, 77, 33, 151, 99],
          second: [60, 32, 120, 55, 19, 134, 88]
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
            },
            {
              label: "La Cafétéria",
              backgroundColor: "transparent",
              borderColor: "rgb(255, 199, 15)",
              data: activityData[0].second,
              lineTension: 0,
              borderDash: [10, 5],
              borderWidth: 1,
              pointRadius: 5,
              pointBackgroundColor: "rgba(255,255,255,1)",
              pointHoverBackgroundColor: "rgba(255,255,255,1)",
              pointBorderWidth: 2,
              pointHoverRadius: 7,
              pointHoverBorderWidth: 1
            }
          ]
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