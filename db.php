

<?php

include("Cloudinary/Cloudinary.php");
\Cloudinary::config(array( 
  "cloud_name" => "dnhuupkqa", 
  "api_key" => "994627515834378", 
  "api_secret" => "QB3O8PFLpxyONx9GD1gRc-JMu5w", 
  "secure" => true
));


$servername = "us-cdbr-east-02.cleardb.com";
$username = "b757ff0df897f7";
$password = "77b62a27";
$db = "heroku_85f8cfc15f34318";
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