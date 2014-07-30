<?php
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/product.php");
require_once("includes/model-my-paperbag-cart.php");

session_start();


if(!isset($_SESSION['MemberID'])){

	$keyProductID = array_search('Remove', $_POST);

	if ($key != false) {
		$oCart = new Cart();
		$oCart->removeProduct($keyProductID);
	}
	
}



$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}

require_once("includes/header.php");

// <!-- left main container -->

echo View::renderCart($oCart);


// <!-- right main container -->


echo View::renderNavigation($aAllProductTypes);

require_once("includes/footer.php");

?>