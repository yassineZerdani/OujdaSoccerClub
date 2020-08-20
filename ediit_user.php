<?php session_start(); if(!isset($_SESSION['admin'])){header("Location:login.php");die();} ?>
<?php

include("db.php");

$users_id = $_REQUEST['users_id'];

$result = mysqli_query($con, "select users_id,full_name,num_teleph,type_abonnement,date_creation,paiement,paiement_avance,paiement_status,match_played,unpayed_amount from users where users_id='$users_id'") or die("query 1 incorrect.......");

list($users_id, $full_name, $num_teleph, $type_abonnement, $date_creation, $paiement, $paiement_avance, $paiement_status, $match_played, $unpayed_amount) = mysqli_fetch_array($result);


if (isset($_POST['btn_save'])) {
  $full_name = $_POST['full_name'];
  $num_teleph = $_POST['num_teleph'];
  $date_creation = $_POST['date_creation'];
  $paiement = $_POST['paiement'];
  $paiement_avance = $_POST['paiement_avance'];
  $paiement_status = $_POST['paiement_status'];
  $match_played = $_POST['match_played'];
  $unpayed_amount = $_POST['unpayed_amount'];
  $type_abonnement = $_POST['x'];
  $type_abonnement .= ' /semaine  pour  ';
  $type_abonnement .= $_POST['y'];
  $type_abonnement .= '  mois';

  mysqli_query($con, "update users set full_name='$full_name', num_teleph='$num_teleph', type_abonnement='$type_abonnement', date_creation='$date_creation', paiement='$paiement', paiement_avance='$paiement_avance', paiement_status='$paiement_status', match_played='$match_played', unpayed_amount='$unpayed_amount' where users_id='$users_id'") or die("Query 2 is inncorrect..........");
  header("location: users.php");
  mysqli_close($con);
}
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
            <li class="has-sub">
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
                <i class="mdi mdi-note-multiple"></i>
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
            <li class="has-sub active expand">
              <a class="sidenav-item-link" href="users.php">
                <i class="mdi mdi-account"></i>
                <span class="nav-text">les abonnés</span>
              </a>
            </li>
            
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts" aria-expanded="false" aria-controls="charts">
                <i class="mdi mdi-coffee-outline"></i>
                <span class="nav-text">La Cafétéria</span> <b class="caret"></b>
              </a>
              <ul  class="collapse"  id="charts" data-parent="#sidebar-menu">
                <div class="sub-menu">
                  <li >
                    <a class="sidenav-item-link" href="products.php?category=0">
                      <span class="nav-text">Boissons</span>
                    </a>
                  </li>
                  <li >
                    <a class="sidenav-item-link" href="products.php?category=1">
                      <span class="nav-text">Boissons Chaudes</span>
                    </a>
                  </li>
                  <li >
                    <a class="sidenav-item-link" href="products.php?category=2">
                      <span class="nav-text">Biscuits</span>
                    </a>
                  </li>
                  <li >
                    <a class="sidenav-item-link" href="products.php?category=3">
                      <span class="nav-text">Snacks</span>
                    </a>
                  </li>
                  <li >
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
<!--
              <li class="dropdown notifications-menu">
                <button class="dropdown-toggle" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">You have 5 notifications</li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-plus"></i> New user registered
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10
                        AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-remove"></i> User deleted
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07
                        AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12
                        PM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-supervisor"></i> New client
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10
                        AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-server-network-off"></i> Server overloaded
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05
                        AM</span>
                    </a>
                  </li>
                  <li class="dropdown-footer">
                    <a class="text-center" href="#"> View All </a>
                  </li>
                </ul>
              </li>
            -->
              <li><a href="logout.php" type="button" class="btn btn-outline-secondary" id="deconn">Deconnexion</a></li>
            </ul>
          </div>
        </nav>
      </header>
      <div class="content-wrapper">
        <div class="content">
          <div class="breadcrumb-wrapper">
          </div>
          <div class="card card-default">
            <div class="card-body">
              <div class="container tm-mt-big tm-mb-big">
                <div class="row">
                  <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                      <div class="row">
                        <div class="col-12">
                          <h3 class="tm-block-title d-inline-block">Modifier L'utilisateur</h3>
                        </div>
                      </div>
                      <div class="row tm-edit-product-row">
                        <div class="col-12">
                          <br />
                          <br />
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                          <form action="ediit_user.php" name="form" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                            <input type="hidden" name="users_id" id="users_id" value="<?php echo $users_id; ?>" />
                            <div class="form-group mb-3">
                              <label for="name">Nom D'utilisateur</label>
                              <input class="form-control validate" type="text" name="full_name" id="full_name" autofocus style="width:100%" value="<?php echo $full_name; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="description">Numero De Téléphone</label>
                              <input type="text" class="form-control validate" name="num_teleph" id="num_teleph" value="<?php echo $num_teleph; ?>" required>
                            </div>
                            <div class="form-group">
									<label for="terrain" class="form-label">Terrain</label>
                 <select id="category" name="category" type="text"
                      class="form-control validate" onchange=handler()>
                      <option value="5v5">Terrain 5 v 5</option>
                      <option value="7v7">Terrain 7 v 7</option>
                      <option value="Padel">Padel</option>
                      
                      </select>
                      <span class="select-arrow"></span>
                </div>
                <br>
                            
                            <label style="font-weight: 400;line-height: 1.5; color: #1b223c; font-size: 0.98rem; text-align: left;" for="description">Type D'abonnement</label>
                            <br>
                            <div class="row">
                              <div class="form-group mb-3 col-xs-12 col-sm-3">
                                <input type="text" name="x" id="x" class="form-control validate">
                              </div>
                              <p style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">/semaine pour</p>
                              <div class="form-group mb-3 col-xs-12 col-sm-3">
                                <input type="text" name="y" id="y" class="form-control validate">
                              </div>
                              <p style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">mois</p>
                            </div>
                            <br>
                            <div class="form-check" >
  <label  style="margin-right: 40px; font-weight: 400;line-height: 1.5; color: #1b223c; font-size: 0.98rem; text-align: left;">
    <input type="checkbox" class="form-check-input" value="lundi" id="lundi" >1. Lundi
  </label>
  <label  style="margin-right: 40px; font-weight: 400;line-height: 1.5; color: #1b223c; font-size: 0.98rem; text-align: left;">
    <input type="checkbox" class="form-check-input" value="mardi" id="mardi">2. Mardi
  </label>
  <label  style="margin-right: 40px; font-weight: 400;line-height: 1.5; color: #1b223c; font-size: 0.98rem; text-align: left;">
    <input type="checkbox" class="form-check-input" value="mercredi" id="mercredi">3. Mercredi
  </label>
  <label  style="margin-right: 40px; font-weight: 400;line-height: 1.5; color: #1b223c; font-size: 0.98rem; text-align: left;">
    <input type="checkbox" class="form-check-input" value="jeudi" id="jeudi" >4. Jeudi
  </label>
  <label  style="margin-right: 40px; font-weight: 400;line-height: 1.5; color: #1b223c; font-size: 0.98rem; text-align: left;">
    <input type="checkbox" class="form-check-input" value="vendredi" id="vendredi" >5. Vendredi
  </label>
  <label  style="margin-right: 40px; font-weight: 400;line-height: 1.5; color: #1b223c; font-size: 0.98rem; text-align: left;">
    <input type="checkbox" class="form-check-input" value="samedi" id="samedi">6. Samedi
  </label>
</div>
<div class="form-check" >
  
  <label  style="margin-right: 40px; font-weight: 400;line-height: 1.5; color: #1b223c; font-size: 0.98rem; text-align: left;">
    <input type="checkbox" class="form-check-input" value="dimanche" id="dimanche">7. Dimanche
  </label>
  
</div>
<br>
                            <div class="form-group mb-3">
                              <label for="description">Paiement</label>
                              <input type="text" class="form-control validate" name="paiement" id="paiement" value="<?php echo $paiement; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="description">Avance De Paiement</label>
                              <input type="text" class="form-control validate" name="paiement_avance" id="paiement_avance" value="<?php echo $paiement_avance; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="description">Matches Joués</label>
                              <input type="text" class="form-control validate" name="match_played" id="match_played" value="<?php echo $match_played; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="description">montant impayé</label>
                              <input type="text" class="form-control validate" name="unpayed_amount" id="unpayed_amount" value="<?php echo $unpayed_amount; ?>" required>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                          <div class="tm-product-img-edit mx-auto">
                            <img id="productImage" src="assets/img/products/default.png" alt="Product image" class="img-fluid d-block mx-auto">
                            <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                          </div>
                          <div class="custom-file mt-3 mb-3">
                            <input id="fileInput" name="avatar" type="file" style="display:none;" accept="image/*" onchange="displayImage(event)" />
                            <input type="button" class="btn btn-primary btn-block mx-auto" value="CHANGER L'IMAGE" onclick="document.getElementById('fileInput').click();" />
                          </div>
                          <br>
                          <br>
                          <br><br>
                          <div class="form-group mb-3">
                            <label for="description">Statut De Paiement</label>
                            <br>
                            <div>
                              <input type="radio" value="termin&eacute" name="paiement_status" checked>
                              <label for="termin&eacute">terminé</label>
                            </div>

                            <div>
                              <input type="radio" value="en attente" name="paiement_status">
                              <label for="en attente">en attente</label>
                            </div>
                          </div>
                          <div class="form-group mb-3">
                              <label for="description">Heure de Reservation</label>
                              <input type="time" class="form-control validate" name="date_creation" id="date_creation" value="<?php echo $date_creation; ?>" required>
                            </div>
                        </div>
                        <div class="col-12">
                          <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary btn-block text-uppercase">Modifier</button>
                        </div>
                        </form>
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
    <script>
      var displayImage = function(event) {
        var image = document.getElementById('productImage');
        image.src = URL.createObjectURL(event.target.files[0]);
      };
    </script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker({
          defaultDate: "10/22/2020"
        });
      });
    </script>
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
</body>

</html>