<?php
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");

session_start();

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
		<p class="success-statements">thank you for logging in to paperbag boutique.<br/><br/>please view your account details or start selling your second hand </br></br>labels by listing an item.</p>
		<a href="edit-my-account.php"><ul id="account-button"><li>view your account</li></ul></a>
			<a href="sell-an-item.php"><ul id="sell-button"><li>list an item</li></ul></a>
			</div>
		</div>';

		
// <!-- right main container -->


echo View::renderNavigation($aAllProductTypes);

require_once("includes/footer-loggedin.php");

?>