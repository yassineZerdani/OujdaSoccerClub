<?php session_start(); if(!isset($_SESSION['admin'])){header("Location:login.php");die();} ?>
<?php

include("db.php");
error_reporting(0);
$product_category = -1;
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$result=mysqli_query($con,"select product_image from products where product_id='$product_id'") or die("query is incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="product_images/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0")or die("query is incorrect...");
mysqli_query($con,"delete from products where product_id='$product_id'")or die("query is incorrect...");
mysqli_query($con,"SET FOREIGN_KEY_CHECKS=1")or die("query is incorrect...");
}


if(isset($_GET['category']))
  $product_category=$_GET['category'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Admin Dashboard</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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
  <link href="./image.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#delete").click(function () {
        $(this).hide();
      });
    });
  </script>
  <style>
  .toast-success{background-color:#51A351 !important}
  </style>
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
          <a href="/index.html">
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
            <li class="has-sub active expand">
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
            
            <li  class="has-sub " >
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
                      <span class="nav-text">Tous les Produits</span>
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
            <li>
            <a href="cart.php" class="fa fa-shopping-cart" style="font-size: 35px;margin:30px;color:#151d29"><span style="font-family: sans-serif" class='badge badge-warning' id='lblCartCount'><?php echo sizeof($_SESSION["products"]); ?></span></a>
            
            </li>
              <li><a href="logout.php" type="button" class="btn btn-outline-secondary" id="deconnexion">Deconnexion</a></li>
              
            </ul>
          </div>
        </nav>
      </header>




<div class="content-wrapper">
        <div class="content">
        <h2 style="color: rgba(0,0,0,0.5);font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:xx-large">
      Commander Ici :
    </h2>
        <br>
        <div class="btn-group">
  <button type="button" class="badge badge-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Filtrer
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="order_dashboard.php?category=0">Boissons</a>
    <a class="dropdown-item" href="order_dashboard.php?category=1">Boissons chaudes</a>
    <a class="dropdown-item" href="order_dashboard.php?category=2">Biscuits</a>
    <a class="dropdown-item" href="order_dashboard.php?category=3">Snacks</a>
    <a class="dropdown-item" href="order_dashboard.php">Tous</a>
    
  </div>
</div>
              
          <div class="breadcrumb-wrapper">
          </div>
          <div class="card card-default">
            <div class="card-body">
              <div class="row">
<?php 
if($product_category==-1)
  $result=mysqli_query($con,"select product_id,product_image, stock, stock_init, product_title,product_price,product_cat from products")or die ("query 1 incorrect.....");
else
  $result=mysqli_query($con,"select product_id,product_image,stock, stock_init, product_title,product_price,product_cat from products where product_cat=$product_category")or die ("query 1 incorrect.....");

while(list($product_id,$image,$stock,$stock_init,$product_name,$price,$product_cat)=mysqli_fetch_array($result))
{
  if($stock>0.75*$stock_init){
echo "
<div class='col-lg-6 col-xl-3' >
<span class='badge badge-success'>$stock</span>
";}
if($stock<=0.75*$stock_init && $stock>0.25*$stock_init){
  echo "
  <div class='col-lg-6 col-xl-3' >
  <span class='badge badge-warning'>$stock</span>
  ";}
  if($stock<=0.25*$stock_init){
    echo "
    <div class='col-lg-6 col-xl-3' >
    <span class='badge badge-danger'>$stock</span>
    ";}
echo "
    <div class='card text-white bg-primary mb-3'>
    
        <div class='hovereffect'  >
        
            <img class='img-responsive' src='https://res.cloudinary.com/dnhuupkqa/image/upload/$image' alt='' style='height: 16rem;width:100%; object-fit: cover;'>
            <div class='overlay'>
            
                <h2>$product_name</h2>
                <a id=$product_id category=$product_cat name=\"$product_name\" price= $price type='button' class='stretched-link'";
        if(!isset($_SESSION[products][$product_id])){
          echo "onClick=\"incrementCart(this)\"";
        }
        else{
          echo "onClick=\"addToSession(this)\"";
        }
echo"></a>
            </div>
        </div>
    </div>
</div>
";
}
?>
</div>
</div>
<script>
function incrementCart(e){
$('#lblCartCount').text(parseInt($('#lblCartCount').text())+1);
e.onclick=function(){addToSession(e)};
addToSession(e)
}
function addToSession(e){
  $.ajax({
  type: "POST",
  url: "update_session.php",
  data: {product:{
    id: e.getAttribute("id"),
    name: e.getAttribute("name"),
    category: e.getAttribute("category"),
    price: e.getAttribute("price")
  }
  },
  success: toast()
});
return false;
}
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
    <script>
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function  toast(){
  toastr.success("Produit Ajouté!")
}
</script>
</body>
</html>