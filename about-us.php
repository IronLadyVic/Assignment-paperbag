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
	<p class="header-hello"></p>
	 <p class="success-statements">Specialist quality recycled clothing shop paperbag boutique has something for every woman, catering for all sizes and all ages. Browse through a wide selection of overseas and local labels, from Trelise Cooper and Marks and Spencers.</br></br>
New stock arrives daily, and the prices are always affordable.
paperbag boutique was set up in 2014 in Remuera, Auckland, by owner Estella. </br></br>Her love for clothes started when she was at university, and living on a budget, second hand stores were the place to go and within her means. Which is why she has started online and instore trading. You can shop any time any where! 
paperbag boutique is located just 10 minutes drive from Aucklands CBD in Remuera Village. </p>
	</div>
	<img id="hello-image" src="assets/img/index-maniquin.png" alt="hello-image"></img>
	</div>';
// <!-- right main container -->


echo View::renderNavigation($aAllProductTypes);

require_once("includes/footer-loggedin.php");

?>