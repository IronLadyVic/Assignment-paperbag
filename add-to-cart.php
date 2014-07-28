<?php

require_once("includes/model-my-paperbag-cart.php");

session_start();

$iProductID = 1;
if(isset($_GET['ProductID'])){
	$iProductID = $_GET['ProductID'];
}

$oCart = $_SESSION['Cart'];
$oCart->addProduct($iProductID);

header("Location: my-paperbag-cart.php");
exit();


?>