<?php session_start(); if(!isset($_SESSION['admin'])){header("Location:login.php");die();} ?>
<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: login.php");
   }
?>