<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");
require_once("includes/product.php");

session_start();

if(isset($_SESSION['MemberID'])){
	
}else{
	header("Location: login.php");
}



$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();

$oProduct = new Product();
$oProduct->load($_SESSION["MemberID"]);


$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}


require_once("includes/header.php");

?>
<!-- left main container -->
<?php echo View::renderProductDetails($oProduct);?>
 <!-- right main container -->

<?php echo View::renderNavigation($aAllProductTypes);?>
<?php

require_once("includes/footer-loggedin.php");

?>