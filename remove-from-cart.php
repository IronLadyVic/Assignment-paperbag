<?php

require_once("includes/my-paperbag-cart.php");

session_start();

$iProductID = 0;

if(isset($_GET['ProductID'])){
	$iProductID = $_GET['ProductID'];
}
$oCart = $_SESSION['Cart'];
$oCart->removeProduct($iProductID);

header("Location: my-paperbag-cart.php");
exit();




?>