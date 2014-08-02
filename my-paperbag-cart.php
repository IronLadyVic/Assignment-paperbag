<?php
session_start();
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/product.php");
require_once("includes/model-my-paperbag-cart.php");



$oCart = $_SESSION['Cart'];

if(!isset($_SESSION['MemberID'])){
		header("Location: login.php");
	}

$oCart = new Cart();
$_SESSION['Cart'] = $oCart;



$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}

require_once("includes/header.php");

// <!-- left main container -->
echo View::renderNavigation($aAllProductTypes);
echo View::renderCart($oCart);


// <!-- right main container -->




require_once("includes/footer-loggedin.php");

?>