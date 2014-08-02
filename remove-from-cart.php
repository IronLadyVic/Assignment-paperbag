<?php
session_start();

require_once("includes/my-paperbag-cart.php");


$iProductID = 0;

if(isset($_GET['ProductID'])){
	$iProductID = $_GET['ProductID'];
}
$oCart = $_SESSION['Cart'];
$oCart->removeProduct($iProductID);

header("Location: my-paperbag-cart.php");
exit();




?>