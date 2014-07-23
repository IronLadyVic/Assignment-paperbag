<?php
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/product.php");
require_once("includes/model_producttype.php");
session_start();

$oView = new View();
$oCollection = new Collection();

$aAllProductTypes = $oCollection->getAllProductTypes();



$iTypeID = 1;
if(isset($_GET["TypeID"])){
	$iTypeID = $_GET["TypeID"];
}
$oType= new ProductType();
$oType->load($iTypeID);


require_once("includes/header-loggedin.php");


// <!-- left main container -->
echo View::renderProductType($oType);
// <!-- right main container -->
echo View::renderNavigation($aAllProductTypes);

echo View::renderProductOverlay($oType);


require_once("includes/footer-shoponline.php");
?>
