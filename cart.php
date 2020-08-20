<?php session_start(); if(!isset($_SESSION['admin'])){header("Location:login.php");die();} ?>
<?php

include("db.php");
error_reporting(0);
  $result=mysqli_query($con,"select product_id,product_cat, product_title,product_price from products")or die ("query 1 incorrect.....");
if(isset($_POST['order']) and $_POST['order']!=""){
$total = $_POST['total'];
mysqli_query($con,"insert into orders (user_id) values ('12')") or die ("query incorrect");
$order_id = $con->insert_id;;
mysqli_query($con,"insert into orders_info (order_id,user_id,total_amt) values ('$order_id','12','$total')") or die ("query incorrect");
foreach(json_decode($_POST['order']) as $key=>$value)
{
    mysqli_query($con,"insert into order_products (order_id,product_id,qty) values ('$order_id','$key','$value')") or die ("query incorrect");
  //mysqli_query($con,"UPDATE products SET stock=stock-'$value' WHERE product_id=$key") or die ("query incorrect");
}
unset($_SESSION["products"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Table des Produits</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css2/util.css">
  <link rel="stylesheet" type="text/css" href="css2/main.css">
<!--===============================================================================================-->

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
            <li class="has-sub ">
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
  
  <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
        <div class="table100">
          <table id="dash_table text-center">
            <thead>
              <tr class="table100-head">
                <th class="column1">Produit</th>
                <th class="column2">Catégorie</th>
                <th class="column3">Prix</th>
                <th class="column4">Quantité</th>
                <th class="column5">Total</th>
                <th class="column6">Actions</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  foreach($_SESSION["products"] as $product_id => $product){
                    $name=$product["name"];
                    $nCategory=$product["category"];
                    if($nCategory==0)
                      $category="Boisson";
                    if($nCategory==1)
                      $category="Boisson Chaude";
                    if($nCategory==2)
                      $category="Biscuit";
                    if($nCategory==3)
                      $category="Snacks";
                    $price=$product["price"];
                    $quantity=$product["quantity"];
                    echo "<tr id=$product_id>
                        <td class=name>$name</td>
                        <td class=category>$category</td>
                        <td class=price>$price</td>
                        <td class=quantity><input type=\"number\"    min=\"1\" onchange=handleChange(this) value=\"$quantity\" /></td>
                        <td class=total></td>
                        <td class=\"column6\"><button id=\"ajouter\" onclick=handleDelete(this,$product_id) class=\"badge badge-danger\">Supprimer</button></td>
                      </tr>";
                  }
                ?>
                <!--
                <tr>
                <td class="column1 ajouter" onchange=handleProduct()><select></select></td>
                <td class="column2 ajouter" onchange=handleCategory()>
                <select>
                  <option value="0">Boissons</option>
                  <option value="1">Boissons Chaudes</option>
                  <option value="2">Biscuits</option>
                  <option value="3">Snacks</option>
                  <option value="-1" selected>Tous</option>
                  </select></td>
                <td class="column3 ajouter"></td>
                <td class="column4 ajouter" onchange=handleQuantity()><input type="number" value="1" /></td>
                <td class="column5 ajouter"></td>
                <td class="column6"><button id="ajouter" href="#" class="badge badge-danger">Supprimer</button></td>
              </tr>
              -->
            </tbody>
          </table>
<div class="row"><span>TOTAL: </span><div id="Total"></div><span>  DH</span></div>
<button id="Order" onclick=handleOrder() class="badge badge-success">Commander</button>
        </div>
      </div>
    </div>
  </div>

  

<!--===============================================================================================-->  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="js2/main.js"></script>

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
  <script>
function total(){
  $('#Total').text(0);
  $('.total').each((k,e)=>{
    e.textContent = parseInt(e.closest('tr').querySelector('.price').textContent)*parseInt(e.closest('tr').querySelector('.quantity input').value);
    $('#Total').text(parseInt($('#Total').text())+parseInt(e.textContent));
  });
};
total();
function handleDelete(e,id){
  console.log(id);
  $.ajax({
    type: "POST",
    url: "update_session.php",
    data: "action=delete&id="+id,
    success: (response)=>{
    n = parseInt(e.closest('tr').querySelector('.price').textContent)*parseInt(e.closest('tr').querySelector('.quantity input').value);
    $(e).closest('tr').remove();
    console.log(response);
    total();
    toastDeleted();
    }
  });
}
function handleChange(e){
  e.textContent = parseInt(e.closest('tr').querySelector('.price').textContent)*parseInt(e.closest('tr').querySelector('.quantity input').value);
  total();
}
function handleOrder(){
  order ={};
  $('tbody tr').each((k,e)=>{
    order[e.getAttribute('id')]= e.querySelector('.quantity input').value;
  });
  if($.isEmptyObject(order)){
    toastEmptyOrder();
  }
  else{
  $.ajax({
    type: "POST",
    url: "",
    data: {"order":JSON.stringify(order),
      "total": $('#Total').text().split(" DH")[0]},
    success: (response)=>{
      toastOrdered();
      setTimeout(location.reload(), 1000);}
  });
  }
}
</script>
<script>
function toastOrdered(){
  toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
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
};
  toastr.success("Commande Effectuée!");
}
function toastDeleted(){
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
  toastr.error("Produit Supprimé!");
}
function toastEmptyOrder(){
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
  toastr.error("Commande Vide!");
}
</script>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script src="bootstrap-number-input.js" ></script>
<script>
// Remember set you events before call bootstrapSwitch or they will fire after bootstrapSwitch's events
$("[name='checkbox2']").change(function() {
	if(!confirm('Do you wanna cancel me!')) {
		this.checked = true;
	}
});

$('#after').bootstrapNumber();
$('#colorful').bootstrapNumber({
	upClass: 'success',
	downClass: 'danger'
});
</script>