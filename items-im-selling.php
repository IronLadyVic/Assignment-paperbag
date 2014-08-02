<?php
session_start();
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");
require_once("includes/product.php");



if(isset($_SESSION['MemberID'])){
	
}else{
	header("Location: login.php");
}



$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();

$oProduct = new Product();
$oProduct->load($_SESSION["MemberID"]);

// $_SESSION['Products'] = $oProduct;

$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}
$iProductID = 1;
if(isset($_GET["productID"])){
	$iProductID = $_GET["productID"];
}

//paginato for list of items memberid is selling//
$sURL = 'items-im-selling.php?productID='.$iProductID;

$iItemsPerPage = 5;
$iTotalCount = count($oProduct->ProductID);


$iCurrentPage = 5;
if(isset($_GET['page'])){
	$iCurrentPage = $_GET['page'];
}

require_once("includes/header.php");
 echo View::renderNavigation($aAllProductTypes);
 
//Paginator - bottom left of product image// 
echo View::renderProductDetails($oProduct,$iCurrentPage,$iItemsPerPage);

echo View::renderPaginator($sURL,$iTotalCount,$iItemsPerPage,$iCurrentPage);
// <!-- left main container -->
 
 // <!-- right main container -->



require_once("includes/footer-loggedin.php");

?>