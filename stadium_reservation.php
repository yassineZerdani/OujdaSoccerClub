<?php session_start(); if(!isset($_SESSION['admin'])){header("Location:login.php");die();} ?>
<?php
include("db.php");
if(isset($_POST['name']) && $_POST['name']!="" && isset($_POST['category']) && $_POST['category']!="" && isset($_POST['date']) && $_POST['date']!="" && isset($_POST['hour']) && $_POST['hour']!="" && isset($_POST['price']) && $_POST['price']!=""){
	$name = $_POST['name'];
	$category = $_POST['category'];
	$stadium = $_POST['stadium'];
	$date = $_POST['date'];
	$hour = $_POST['hour'];
	$price = $_POST['price'];
	if(isset($_POST['note']) && $_POST['note']!=""){
		$note = $_POST['note'];
	}
	else{
		$note ="";
	}
	$query  = "SELECT * FROM stadium_reservations WHERE reservation_stadium='$stadium' AND reservation_date='$date"." "."$hour:00'";
	$result=mysqli_query($con,$query) or die("query is incorrect...");
	if(mysqli_num_rows($result)>0){
		echo '<script>alert("'.$query.'")</script>';
	}
	else{
		mysqli_query($con,"INSERT INTO stadium_reservations	(reservation_stadium,reservation_date,customer,price,note) VALUES ('$stadium','$date .$hour','$name','$price','$note')") or die ("query incorrect");
	}
	$_POST['name'] = "";
	$_POST['category'] = "";
	$_POST['stadium'] = "";
	$_POST['date'] = "";
	$_POST['hour'] = "";
	$_POST['note'] = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Reservation du terrain</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<!--<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />-->

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<!-- FAVICON -->
	<link href="wah.png" rel="shortcut icon" />
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

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
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
            <li class="has-sub active expand">
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

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Reserver Chez <span style="color: rgb(241, 56, 0);">O</span>ujda <span style="color: rgb(241, 56, 0);">S</span>occer 
								<span style="color: rgb(241, 56, 0);">C</span>lub</h1>
							<p>Oujda Soccer Club, Golf Oujda. 
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form action="stadium_reservation.php" method="POST">
								<div class="form-group">
									<span class="form-label">Nom Complet</span>
									<input class="form-control" name="name" type="text" placeholder="Saisir le nom complet">
								</div>
								<div class="form-group">
									<span class="form-label">Catégorie</span>
                 <select id="category" name="category" type="text"
                      class="form-control validate" onchange=handler()>
                      <option value="5v5">Terrain 5 v 5</option>
                      <option value="7v7">Terrain 7 v 7</option>
                      <option value="Padel">Padel</option>
                      
                      </select>
                      <span class="select-arrow"></span>
                </div>
                <div class="form-group">
									<span class="form-label">Prix</span>
									<input class="form-control" name="price" type="number" placeholder="Saisir le prix">
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Date</span>
											<input id="date" class="form-control" name="date" type="date" onchange=dateHandler() required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Heure</span>
											<select id="hour" name="hour" type="text"
											  class="form-control validate" onchange=hourHandler()>
											  <?php
												/*for($i=0;$i<24;$i=$i+1){
													echo '<option value="'.$i.'"';
													if(in_array($i,$reserved)){
														echo 'class="strikeout" disabled >'.$i.':00</option>';
													}
													else{
													echo '>'.$i.':00</option>';
													}
												}*/
											  ?>
											  
                      </select>
                      <span class="select-arrow"></span>
										</div>
									</div>
                </div>
				 <div class="form-group">
					<span class="form-label">Terrain</span>
					<select id="stadium" class="form-control" name="stadium">
						<option value="5v5_1">5v5_1</option>
						<option value="5v5_2">5v5_2</option>
						<option value="5v5_3">5v5_3</option>
					</select>
				</div>
                <div class="form-group">
					<span class="form-label">Commentaire</span>
					<textarea class="form-control" name="note" type="text" placeholder="Commenter ici .."></textarea>
				</div>
								<!--
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Rooms</span>
											<select class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Adults</span>
											<select class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Children</span>
											<select class="form-control">
												<option>0</option>
												<option>1</option>
												<option>2</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								-->
								<div class="form-btn">
									<button class="submit-btn">Reserver le Match</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<script>
	var reservations = {};
	var stadiumsList = {
		"5v5":["5v5_1","5v5_2","5v5_3"],
		"7v7":["7v7_1"],
		"Padel":["Padel_1","Padel_2"]
	}
	for(i = 0; i < 24; i++){
				$("#hour").append("<option value="+i+">"+i+":00</option>");
	}
	$.ajax({
		   url : 'check_reservation.php',
		   type : 'GET',
		   success: function(response,status){
			   data = JSON.parse(response);
			   $.each(JSON.parse(response),(k,v)=>{
					for(k1 in v){
						reservations[k]=reservations[k]||{};
					   reservations[k][k1]=data[k][k1];
					}
			   });
			   $("#hour").empty();
			   reserved = [];
			   for(i = 0; i < 24; i++){
					$("#hour").append("<option value="+i+">"+i+":00</option>");
			}
			}
			});
	function dateHandler(){
			$("#hour").empty();
			reserved = [];
			 for(k of stadiumsList[document.getElementById("category").value]){
			   if(reservations[k]!==undefined && reservations[k][document.getElementById("date").value]!==undefined)
				reserved.push(reservations[k][document.getElementById("date").value]);	
		   }
		   while(reserved.length<stadiumsList[document.getElementById("category").value].length){
			   reserved.push([]);
		   }
		   for(i = 0; i < 24; i++){
			if(!reserved.every(e=>e.includes(i+""))){
				$("#hour").append("<option value="+i+">"+i+":00</option>");
			}
			else{
				$("#hour").append("<option value="+i+" class=\"strikeout\" disabled>"+i+":00</option>");
			}
		}
		hourHandler();
	};
	function hourHandler(){
		$("#stadium").empty();
		for(stadium of stadiumsList[document.getElementById("category").value]){
			if(reservations[stadium]!==undefined && reservations[stadium][document.getElementById("date").value]!==undefined && [].concat(reservations[stadium][document.getElementById("date").value]).includes((document.getElementById("hour").value).split(":")[0]))
				$("#stadium").append("<option value="+stadium+" class=\"strikeout\" disabled>"+stadium+"</option>");
			else{
				$("#stadium").append("<option value="+stadium+">"+stadium+"</option>");
			}
		}
	}
	function handler(){
		dateHandler();
	}
	</script>
	
</body>

</html>
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