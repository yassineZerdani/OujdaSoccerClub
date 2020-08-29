<?php session_start();
if (!isset($_SESSION['admin'])) {
  header("Location:login.php");
  die();
} ?>
<?php include("db.php"); ?>
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
  <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

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
            <li class="has-sub active expand">
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
      <div class="content">
        <div class="row">
          <div class="col-xl-12 col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-border-bottom">
                <h2>Produit par quantité vendue</h2>
              </div>
              <div class="card-body">
                <form method='get'>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Produit</th>
                        <th scope="col">quantité vendue</th>
                        <th scope="col">revenu</th>
                        <th scope="col">stock</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (!isset($_GET['startrow1']) or !is_numeric($_GET['startrow1'])) {

                        //We give the value of the starting row to 0 because nothing was found in URL
                        $startrow1 = 0;

                        //Otherwise we take the value from the URL
                      } else {
                        $startrow1 = (int) $_GET['startrow1'];
                      }
                      $result = mysqli_query($con, " SELECT SUM(order_products.qty) AS total, products.product_image AS image_link, product_title, product_price, stock FROM products JOIN order_products ON products.product_id = order_products.product_id GROUP BY order_products.product_id ORDER BY total DESC LIMIT $startrow1, 7") or die("query 1 incorrect.....");
                      while (list($total, $image_link, $product_title, $product_price, $stock) = mysqli_fetch_array($result)) {
                        $price = $product_price * $total;
                        echo "
                            <tr>
                              <td>$product_title</td>
                              <td>$total</td>
                              <td>$price DH</td>
                              <td>$stock</td>
                            </tr>
                            ";
                      }
                      //Now this is the link..
                      echo '<a href="' . $_SERVER['PHP_SELF'] . '?startrow1=' . ($startrow1 + 10) . '"><p>Suivante</p></a>';

                      $prev = $startrow1 - 10;

                      //only print a "Previous" link if a "Next" was clicked
                      if ($prev >= 0) {
                        echo '<a href="' . $_SERVER['PHP_SELF'] . '?startrow1=' . $prev . '"><p>Précédente</p></a>';
                      }
                      ?>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12 col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-border-bottom">
                <h2>Produit par revenu</h2>
              </div>
              <div class="card-body">
                <form method='get'>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Produit</th>
                        <th scope="col">quantité vendue</th>
                        <th scope="col">revenu</th>
                        <th scope="col">stock</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {

                        //We give the value of the starting row to 0 because nothing was found in URL
                        $startrow = 0;

                        //Otherwise we take the value from the URL
                      } else {
                        $startrow = (int) $_GET['startrow'];
                      }
                      $result = mysqli_query($con, " SELECT SUM(order_products.qty) AS total, products.product_image AS image_link, product_title, product_price*SUM(order_products.qty) AS total_price, stock FROM products JOIN order_products ON products.product_id = order_products.product_id GROUP BY order_products.product_id ORDER BY total_price DESC LIMIT $startrow, 7") or die("query 1 incorrect.....");
                      while (list($total, $image_link, $product_title, $total_price, $stock) = mysqli_fetch_array($result)) {
                        echo "
                            <tr>
                              <td>$product_title</td>
                              <td>$total</td>
                              <td>$total_price DH</td>
                              <td>$stock</td>
                            </tr>
                            ";
                      }
                      ?>
                          <?php
                          //Now this is the link..
                          echo '<a href="' . $_SERVER['PHP_SELF'] . '?startrow=' . ($startrow + 10) . '"><p>Suivante</p></a>';

                          $prev = $startrow - 10;

                          //only print a "Previous" link if a "Next" was clicked
                          if ($prev >= 0) {
                            echo '<a href="' . $_SERVER['PHP_SELF'] . '?startrow=' . $prev . '"><p>Précédente</p></a>';
                          }
                          ?>
                    </tbody>
                  </table>
                </form>
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




</body>

</html>