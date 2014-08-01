<?php
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");

session_start();



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
echo '<div id="left-container-other">
 	<div>
	<p class="header-contact"></p>
	 <ul>
	 <li id="phone">09 445 3213</li>
	 <li id="email-contact">paperbagboutique@xtra.co.nz</li>
	 <li id="location-contact">300 Remuera Road Remuera
	    Auckland 1050</li>
	 <li id="drop-off">Please leave your member username pinned to your clothing and we will do the rest.</li>
	 <li id="hours">Monday - Saturday<br/>09.00 - 17.00</li>
	 </ul>
	</div>
	<div id="map"></div>
	</div>';
// <!-- right main container -->


echo View::renderNavigation($aAllProductTypes);

require_once("includes/footer-loggedin.php");

?>