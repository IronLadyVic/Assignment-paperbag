<?php

require_once("includes/product.php");

session_start();

$iProductID = 0;

if(isset($_GET['ProductID'])){
	$iProductID = $_GET['ProductID'];
}
$oProduct = new Product();
$oProduct->load($iProductID);
$oProduct->status = 0;

$oProduct->save();

header("Location:sell-an-item.php");
exit();




?>