<?php session_start(); if(!isset($_SESSION['admin'])){header("Location:login.php");die();} ?>
<?php
if(isset($_GET['show']) && $_GET['show']!="" && $_GET['show']=='all')
{
	include 'all_orders.php';
}
else{
	include 'orderss.php';
}
?>