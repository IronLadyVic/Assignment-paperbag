<?php
session_start();
define("MAX_SIZE","10000000");
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/product.php");
require_once("includes/member.php");


if(isset($_SESSION['MemberID'])){
	
}else{
	header("Location: sell-an-item.php");
}

$oProduct = new Product();

$oForm = new Form();

if(isset($_POST['submit'])){
	$oForm->data = $_POST;
	$oForm->files = $_FILES;
	$oForm->checkRequired('item-name');
	$oForm->checkRequired('typeName');
	$oForm->checkRequired('description');
	$oForm->checkRequired('size');
	$oForm->checkRequired('labels');
	// $oForm->checkUpload("upload-photo", "image/png", MAX_SIZE);
	$oForm->checkRequired('price');


	if($oForm->isValid){
		$oProduct->SellerID = $_SESSION['MemberID'];
		$oProduct->TypeID = $_SESSION['TypeName'];
		$oProduct->ItemName = $_POST['item-name'];
		$oProduct->TypeName = $_POST['typeName'];
		$oProduct->Description = $_POST['description'];
		$oProduct->Size = $_POST['size'];
		$oProduct->Label = $_POST['labels'];
		// print_r($_FILES);
		if($_FILES["imageLoader-sell"]["error"]==0){
			$sPhotoName = "product".date("Y-m-d-H-i-s").".png";
			$oProduct->PhotoPath = $sPhotoName;
			$oForm->moveFile('imageLoader-sell',$sPhotoName);
		}
		
		
		$oProduct->Price = $_POST['price'];
		$oProduct->Active = 1;

		$oProduct->save();

		header("Location:success-created-item.php");
		exit();
	}
}

$oForm->makeTextInput('','item-name');
$oForm->makeTextInput('','typeName');
$oForm->makeTextInput('','description');
$oForm->makeTextInput('','size');
$oForm->makeTextInput('','labels');
$oForm->makeUpLoadBox("double click here","imageLoader-sell");
$oForm->makeHiddenField("MAX_FILE_SIZE", MAX_SIZE);
// $oForm->makeTextInput("upload","browse-upload");
$oForm->makeTextInput('','price');
$oForm->makeSubmit('save changes','submit');




$oView = new View();//store the view class in the OView variable
$oCollection = new Collection(); //store the Collection class in the oCollection variable.
$aAllProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}


require_once("includes/header.php");


// <!-- left main container -->
echo '<div id="left-container-sell">
<p class="header">sell my item</p>
<p id="gst">price will automatically<br/>include 15% GST</p>';


echo $oForm->html;

echo '<p class="disclaimer">* - account members NZ address only</p>
<div id="terms-conditions">
	<p><strong>terms & conditions</strong></p><p>the price listed will automatically include GST with users input.<br/><br/> 

paperbag boutique will automatically accrue 
20% of the sale price, from sale of item.<br/><br/> 

once sold online, the item will be automatically
removed from your "items selling" and you will
receive notification about payment pick up.<br/><br/> 

*please fill in all fields on application.</p>

</div>
</div>';
// <!-- right main container -->

echo View::renderNavigation($aAllProductTypes);



require_once("includes/footer-loggedin.php");
?>