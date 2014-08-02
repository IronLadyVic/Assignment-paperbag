<?php
session_start();
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");



if(!isset($_SESSION['MemberID'])){
	header("Location:login.php");
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
$sHTML="";
echo '<div id="left-container-login">
	<div>
		<p class="header">success!</p>
		<p class="success-statements">thank you for selling your item on behalf of
paperbag boutique. please click below to see your clothing items you have listed.</p>
		<a href="items-im-selling.php"><ul id="view-your-items-listed"><li>items im selling</li></ul></a>
			</div>
		</div>';
// <!-- right main container -->

echo View::renderNavigation($aAllProductTypes);

require_once("includes/footer-loggedin.php");

?>