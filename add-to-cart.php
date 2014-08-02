<?php
session_start();

require_once("includes/model-my-paperbag-cart.php");


$iProductID = 1;
if(isset($_GET['ProductID'])){
	$iProductID = $_GET['ProductID'];
}

$oCart = new Cart();
		$_SESSION['Cart'] = $oCart;
		
$oCart->addProduct($iProductID);

header("Location: my-paperbag-cart.php");
exit();


?>