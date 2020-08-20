<?php session_start(); if(!isset($_SESSION['admin'])){header("Location:login.php");die();} ?>
<?php

include("db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='cancel')
{
$id=$_GET['id'];
mysqli_query($con,"DELETE FROM stadium_reservations WHERE reservation_id='$id'")or die("query is incorrect...");
}
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='confirm')
{
$id=$_GET['id'];
$price=$_GET['price'];
$query = "SELECT COUNT(*) FROM stadium_reservations WHERE reservation_id='$id' AND (status<>'Paid' OR status IS NULL)";
$run = mysqli_query($con,$query);
$row = mysqli_fetch_array($run);
if($row[0]>0){
	
mysqli_query($con,"UPDATE stadium_reservations SET status = 'Paid' WHERE reservation_id='$id'")or die("query is incorrect...");
$query = "SELECT COUNT(*) FROM day WHERE date=DATE(NOW())";
$run = mysqli_query($con,$query);
$row = mysqli_fetch_array($run);
if($row[0]<1){
	mysqli_query($con,"INSERT INTO day(date,value) VALUES(DATE(NOW()),'$price')")or die("query is incorrect...");
}
else
	mysqli_query($con,"UPDATE day SET value = value+$price WHERE date=DATE(NOW())")or die("query is incorrect...");
}
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
  <link href="css/jquery.scheduler.css" rel="stylesheet" />
  <link href="assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
  <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />

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
            <li class="has-sub active expand">
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
          <br><!-- Recent Order Table -->
          <br>
          <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
              <h2>Reservations</h2>
            </div>
            <div class="card-body pt-0 pb-5" style="overflow-x:auto;">
			
			
			
              <table class="table card-table table-responsive table-responsive-large table-striped" >
                <thead>
                  <tr>
                    <th>Numero De Réservation</th>
                    <th class="d-none d-md-table-cell">Date</th>
                    <th>Terrain</th>
                    <th class="d-none d-md-table-cell">Client</th>
                    <th class="d-none d-md-table-cell">Prix</th>
                    <th class="d-none d-md-table-cell">Commentaire</th>
                    <th class="d-none d-md-table-cell">Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $query = "SELECT * FROM `stadium_reservations`";
                      $run = mysqli_query($con,$query);
                      if(mysqli_num_rows($run) > 0){

                       while($row = mysqli_fetch_array($run)){
                         $id = $row['reservation_id'];
                         //$email = $row['email'];
                         //$f_name = $row['f_name'];
                         $date = $row['reservation_date'];
                         $stadium = $row['reservation_stadium'];
                         $customer = $row['customer'];
                         $price = $row['price'];
                         $note = $row['note'];
                         $status = $row['status'];

                      ?>
                            <tr id = <?php echo $id ?>>
                                <td style='text-align: center;'><?php echo $id; ?></td>
                                <td>
                            	<?php
                                	echo $date;
                                ?>
                                </td>
								<td><?php echo $stadium; ?></td>
                <td><?php echo $customer; ?></td>
                <td><?php echo $price; ?></td>
                <td><?php echo $note; ?></td>
                  <td style="padding: 10px;">
				  <?php
				  if($status=="Canceled")
					  echo 'Annulé';
				  else if($status=="Paid")
					  echo 'Payé';
				  else
					  echo'<a href="reservations.php?action=confirm&id='.$id.'&price='.$price.'" class="badge badge-success">Payé</a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#cancelPopUp'.$id.'">Annulé</a>';
				  echo '
  <div class="modal fade" id="cancelPopUp'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr d\'annuler la réservation ? ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <a type="button" class="btn btn-primary" href="reservations.php?action=cancel&id='.$id.'">Supprimer</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>';
				  ?>
                  </td>
                            </tr>
                            <?php } ?>
                            <?php
                   }else {
                     //echo "<center><h2>No users Available</h2><br><hr></center>";
                     }
                  ?>
                  
                </tbody>
              </table>
              <div id="scheduler" style="padding-top: 50px;"></div>
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
      <script src="js/date.format.min.js"></script>
      <script src="js/jquery.scheduler.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	  <script>
var reservations = [
				 <?php
                      $query = "SELECT DATE(reservation_date) AS date,HOUR(reservation_date) AS hour,customer,reservation_stadium,status FROM `stadium_reservations`";
                      $run = mysqli_query($con,$query);
                      if(mysqli_num_rows($run) > 0){

                       while($row = mysqli_fetch_array($run)){
                         //$email = $row['email'];
                         //$f_name = $row['f_name'];
                         $date = $row['date'];
                         $startHour = intval($row['hour']);
						 $finishHour = $startHour+1;
                         $stadium = $row['reservation_stadium'];
                         $name = $row['customer'];
                         $status = $row['status'];
						 if($stadium=="5v5_1")
							 $row=0;
						 if($stadium=="5v5_2")
							 $row=1;
						 if($stadium=="5v5_3")
							 $row=2;
						 if($stadium=="7v7_1")
							 $row=3;
						 if($stadium=="Padel_1")
							 $row=4;
						 if($stadium=="Padel_2")
							 $row=5;
						 
						 if($status=="Paid")
							$isPaid = "true";
						 else
							$isPaid = "false";	
						 echo"{date: '$date', name: '$name', start: '$startHour:00', end: '$finishHour:00', row: $row, isPaid: $isPaid },";
					   }
					  }
                      ?>
              ];    
console.log(reservations);	  
var stadiums = ['5v5_1', '5v5_2', '5v5_3', '7v7_1', 'Padel1', 'Padel2'];

// Initialize 
$("#scheduler").scheduler({startDate: new Date(), startTime: '0', endTime: '24', use24Hour: true, items: stadiums, reservations: reservations, timeslotHeight: 70, timeslotWidth: 100});

$('#datepicker').css({top: $('.date').offset().top, left: $('.date').offset().left});
$('#datepicker').on('change', function() {
	value = $('#datepicker').val();
	$("#scheduler").empty();
	$("#scheduler").scheduler({startDate: new Date(value), startTime: '0', endTime: '24', use24Hour: true, items: stadiums, reservations: reservations, timeslotHeight: 70, timeslotWidth: 100});
});
</script>
</body>
</html>