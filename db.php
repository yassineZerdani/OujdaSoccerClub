

<?php

include("Cloudinary/Cloudinary.php");
\Cloudinary::config(array( 
  "cloud_name" => "dnhuupkqa", 
  "api_key" => "994627515834378", 
  "api_secret" => "QB3O8PFLpxyONx9GD1gRc-JMu5w", 
  "secure" => true
));


$servername = "us-cdbr-east-02.cleardb.com";
$username = "b7d774973c8abc";
$password = "8c8b3f7a";
$db = "heroku_c4f1eaaf2d60e8f";
/*
$servername = "localhost";
$username = "hmida";
$password = "root";
$db = "onlineshop1";
*/
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>