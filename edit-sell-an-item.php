<?php
session_start();
define("MAX_SIZE","10000000");
require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/product.php");
require_once("includes/member.php");


//redirect to login page if member has not logged in.
if(!isset($_SESSION['MemberID'])){
	header("Location:login.php");
}



$oProduct = new Product();
//load the product of that member in the GET array
$oProduct->load($_GET['productID']); //the Control name is the query string for that productID

$aExsistingData = array();

$aExsistingData['item-name-edit'] = $oProduct->ItemName;
$aExsistingData['typeName-edit'] = $oProduct->TypeName;
$aExsistingData['description-edit'] = $oProduct->Description;
$aExsistingData['size-edit'] = $oProduct->Size;
$aExsistingData['labels-edit'] = $oProduct->Label;
$aExsistingData['imageLoader'] = $oProduct->PhotoPath;
// $aExsistingData['MAX_FILE_SIZE'] = $oProduct->PhotoPath;
$aExsistingData['price-edit'] = $oProduct->Price;



$oForm = new Form();
$oForm->data = $aExsistingData;

if(isset($_POST['submit'])){
	$oForm->data = $_POST;
	$oForm->files = $_FILES;
	$oForm->checkRequired('item-name-edit');
	$oForm->checkRequired('typeName-edit');
	$oForm->checkRequired('description-edit');
	$oForm->checkRequired('size-edit');
	$oForm->checkRequired('labels-edit');
	// $oForm->checkUpload("upload-photo", "image/png", MAX_SIZE);
	$oForm->checkRequired('price-edit');


	if($oForm->isValid){
		
		$oProduct->ItemName = $_POST['item-name-edit'];
		$oProduct->TypeName = $_POST['typeName-edit'];
		$oProduct->Description = $_POST['description-edit'];
		$oProduct->Size = $_POST['size-edit'];
		$oProduct->Label = $_POST['labels-edit'];
		// print_r($_FILES);
		if($_FILES["imageLoader"]["error"]==0){
			$sPhotoName = "product".date("Y-m-d-H-i-s").".png";
			$oProduct->PhotoPath = $sPhotoName;
			$oForm->moveFile('upload-photo',$sPhotoName);
		}
		
		
		$oProduct->Price = $_POST['price-edit'];
		$oProduct->Active = 1;

		$oProduct->save();

		header("Location:success-edited-item.php");
		exit();
	}
}

$oForm->makeTextInput('','item-name-edit');
$oForm->makeTextInput('','typeName-edit');
$oForm->makeTextInput('','description-edit');
$oForm->makeTextInput('','size-edit');
$oForm->makeTextInput('','labels-edit');
$oForm->makeUpLoadBox("double click here","imageLoader");
$oForm->makeHiddenField("MAX_FILE_SIZE", MAX_SIZE);
// $oForm->makeTextInput("upload","browse-upload");
$oForm->makeTextInput('','price-edit');
$oForm->makeSubmit('save changes','submit');



$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();



$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}


require_once("includes/header.php");



// <!-- left main container -->
echo '<div id="left-container-edit">
<p class="header">edit my item</p>
<p id="gst">price will automatically<br/>include 15% GST</p>';?>

<!-- <canvas id="imageCanvas"></canvas>
		<input type="file" id="imageLoader" name="imageLoader"/> -->
	<!-- <img src="assets/img/'.htmlentities($oProduct->PhotoPath).'"</img> -->


<?php echo $oForm->html;


echo '<p id="required-edit-sell-an-item">* required input - account members NZ address only</p>
</div>';


// <!-- <!right main container --> 
echo View::renderNavigation($aAllProductTypes);



require_once("includes/footer-loggedin.php");
?>