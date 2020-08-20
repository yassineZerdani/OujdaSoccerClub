
<?php

include("db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='terminer')
{
$order_id=$_GET['order_id'];
mysqli_query($con,"UPDATE orders SET p_status = N'Terminé' where order_id='$order_id'")or die("query is incorrect...");
$query1 = "SELECT * FROM order_products where order_id = $order_id";
$run1 = mysqli_query($con,$query1); 
while($row1 = mysqli_fetch_array($run1)){
   $product_id = $row1['product_id'];
   $quantity = $row1['qty'];

   $query2 = "SELECT * FROM products where product_id = $product_id";
   $run2 = mysqli_query($con,$query2);
   mysqli_query($con,"UPDATE products SET stock=stock-'$quantity' WHERE product_id=$product_id") or die ("query incorrect");
   }
}

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];
mysqli_query($con,"DELETE FROM order_products WHERE order_id='$order_id'")or die("query is incorrect...");
mysqli_query($con,"DELETE FROM orders_info WHERE order_id='$order_id'")or die("query is incorrect...");
mysqli_query($con,"DELETE FROM orders WHERE order_id='$order_id'")or die("query is incorrect...");
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
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
    rel="stylesheet" />
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
    NProgress.configure({ showSpinner: false });
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
            <li class="has-sub active expand">
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
        	<a href="ordersFinal.php?show=all" class="badge badge-secondary float-right" >Tous les commandes</a>
          <br><!-- Recent Order Table -->

          <br>
          <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
              <h2>Ordres</h2>
            </div>
            <div class="card-body pt-0 pb-5">
              <table class="table card-table table-responsive table-responsive-large table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Numero d'ordre</th>
                    <th class="d-none d-md-table-cell">Date</th>
                    <th>Produits</th>
                    <th>Stock</th>
                    
                    
                    
                    <th class="d-none d-md-table-cell">Prix Unitaire</th>
                    <th>Quantité</th>
                    <th class="d-none d-md-table-cell">Total</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $query = "SELECT * FROM `orders_info` WHERE `order_id` IN(SELECT `order_id` FROM `orders` WHERE `p_status` = 'En Attente')";
                      $run = mysqli_query($con,$query);
                      if(mysqli_num_rows($run) > 0){

                       while($row = mysqli_fetch_array($run)){
                         $order_id = $row['order_id'];
                         //$email = $row['email'];
                         //$f_name = $row['f_name'];
                         $date = $row['date'];
                         $total_amount = $row['total_amt'];
                         $user_id = $row['user_id'];
                         $qty = $row['prod_count'];
echo "<tr id = $order_id >";
echo "<td style='text-align: center;'>$order_id </td>";
echo "<td>                                	$date
                                </td>";
								echo "<td class='d-none d-md-table-cell'>";
								$query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $product_id = $row1['product_id'];

                               $query2 = "SELECT * FROM products where product_id = $product_id";
                               $run2 = mysqli_query($con,$query2);

                               while($row2 = mysqli_fetch_array($run2)){
                               $product_title = $row2['product_title'];
							   echo "$product_title<br/>";
							  }}
							  echo "</td>";
							  echo "<td>";
						  $query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $product_id = $row1['product_id'];

                               $query2 = "SELECT * FROM products where product_id = $product_id";
                               $run2 = mysqli_query($con,$query2);

                               while($row2 = mysqli_fetch_array($run2)){
                               $stock = $row2['stock'];
							   echo $stock."<br/>";
							  }}
							  echo "</td>";
							  echo "<td class='d-none d-md-table-cell'>";
							  $query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $product_id = $row1['product_id'];

                               $query2 = "SELECT * FROM products where product_id = $product_id";
                               $run2 = mysqli_query($con,$query2);

                               while($row2 = mysqli_fetch_array($run2)){
                               $product_price = $row2['product_price'];
							   echo "$product_price<br>";
							  }}
							  echo "</td>";
							  echo "<td class='d-none d-md-table-cell'>";
							  $query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $quantity = $row1['qty'];
							   echo "$quantity<br>";
							  }
							  echo "</td>";
							  echo "<td class='d-none d-md-table-cell'>$total_amount</td>";
							  echo "<td>
                                </td>";
								echo "<td class='text-right'>
                                    <button>
                                        <a href='orderss.php?order_id=$order_id&action=terminer' class='badge badge-success'>Terminer</a>
                                    </button>
                                    <button>
                                        <a href='orderss.php?order_id=$order_id&action=delete' class='badge badge-danger'>Supprimer</a>
                                    </button>
                                    
                                    <!-- Modal -->
<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Modifier</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        ...
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary'>Save changes</button>
      </div>
    </div>
  </div>
</div>
                                    
                                </td>";
							  echo "</tr>";
					  }}
                      ?>
                </tbody>
              </table>
            </div>
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
<script>
/*
setInterval(()=>{
$('tbody').empty();
$('tbody').html(getTable());
console.log(getTable());  
},10000);
function getTable(){
		table = `<?php
                      $query = "SELECT * FROM `orders_info` WHERE `order_id` IN(SELECT `order_id` FROM `orders` WHERE `p_status` = 'En Attente')";
                      $run = mysqli_query($con,$query);
                      if(mysqli_num_rows($run) > 0){

                       while($row = mysqli_fetch_array($run)){
                         $order_id = $row['order_id'];
                         //$email = $row['email'];
                         //$f_name = $row['f_name'];
                         $date = $row['date'];
                         $total_amount = $row['total_amt'];
                         $user_id = $row['user_id'];
                         $qty = $row['prod_count'];
echo "<tr id = $order_id >";
echo "<td style='text-align: center;'>$order_id </td>";
echo "<td>                                	$date
                                </td>";
								echo "<td class='d-none d-md-table-cell'>";
								$query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $product_id = $row1['product_id'];

                               $query2 = "SELECT * FROM products where product_id = $product_id";
                               $run2 = mysqli_query($con,$query2);

                               while($row2 = mysqli_fetch_array($run2)){
                               $product_title = $row2['product_title'];
							   echo "$product_title<br/>";
							  }}
							  echo "</td>";
							  echo "<td>";
						  $query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $product_id = $row1['product_id'];

                               $query2 = "SELECT * FROM products where product_id = $product_id";
                               $run2 = mysqli_query($con,$query2);

                               while($row2 = mysqli_fetch_array($run2)){
                               $stock = $row2['stock'];
							   echo $stock."<br/>";
							  }}
							  echo "</td>";
							  echo "<td class='d-none d-md-table-cell'>";
							  $query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $product_id = $row1['product_id'];

                               $query2 = "SELECT * FROM products where product_id = $product_id";
                               $run2 = mysqli_query($con,$query2);

                               while($row2 = mysqli_fetch_array($run2)){
                               $product_price = $row2['product_price'];
							   echo "$product_price<br>";
							  }}
							  echo "</td>";
							  echo "<td class='d-none d-md-table-cell'>";
							  $query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $quantity = $row1['qty'];
							   echo "$quantity<br>";
							  }
							  echo "</td>";
							  echo "<td class='d-none d-md-table-cell'>$total_amount</td>";
							  echo "<td>
                                </td>";
								echo "<td class='text-right'>
                                    <button>
                                        <a href='orderss.php?order_id=$order_id&action=terminer' class='badge badge-success'>Terminer</a>
                                    </button>
                                </td>";
							  echo "</tr>";
					  }}
                      ?>`;
return table;
}*/
</script>

</body>
</html>