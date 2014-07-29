<?php
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");

session_start();

if(!isset($_SESSION['MemberID'])){
		header("Location: login.php");
	}


$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}

$oMember = new Member();
$oMember->load($_SESSION['MemberID']);

require_once("includes/header.php");


// <!-- left main container -->

echo View::renderMemberDetails($oMember); 


// <!-- <div id="right-navigation-shop"> -->

echo View::renderNavigation($aAllProductTypes);



require_once("includes/footer-loggedin.php");
?>