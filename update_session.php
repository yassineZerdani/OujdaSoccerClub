<?php session_start(); if(!isset($_SESSION['admin'])){header("Location:login.php");die();} ?>
<?php
if(isset($_POST["product"]) && $_POST["product"]!=""){
	$id = $_POST["product"]["id"];
	if(!isset($_SESSION["products"])){
		$_SESSION["products"]=[];
	}
	if(!isset($_SESSION["products"][$id])){
		$_SESSION["products"][$id]["name"]=$_POST["product"]["name"];
		$_SESSION["products"][$id]["category"]=$_POST["product"]["category"];
		$_SESSION["products"][$id]["price"]=$_POST["product"]["price"];
		$_SESSION["products"][$id]["quantity"]=1;
	}
	else{
		$_SESSION["products"][$id]["quantity"]++;
	}
}
#unset($_SESSION["products"]);
if(isset($_POST["action"]) && $_POST["action"]=="delete" && isset($_POST["id"])){
	unset($_SESSION["products"][$_POST["id"]]);
}
echo var_dump($_SESSION);
?>