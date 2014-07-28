<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/product.php");
require_once("includes/member.php");

session_start();
//redirect to login page if member has not logged in.
if(!isset($_SESSION['MemberID'])){
	header("Location:login.php");
}

$oProduct = new Product();
//load the product of that member in te session
$oProduct->load($_SESSION['ProductID']);

// $iProductID = 1;
// if(isset($_GET["ProductID"])){
// 	$iProductID = $_GET["ProductID"];
// }


$aExsistingData = array();

$aExsistingData['ItemName'] = $oProduct->ItemName;
$aExsistingData['TypeName'] = $oProduct->TypeName;
$aExsistingData['Description'] = $oProduct->Description;
$aExsistingData['Size'] = $oProduct->Size;
$aExsistingData['Label'] = $oProduct->Label;
$aExsistingData['Price'] = $oProduct->Price;
$aExsistingData['PhotoPath'] = $oProduct->PhotoPath;




$oForm = new Form();
$oForm->data = $aExsistingData;

if(isset($_POST['submit'])){
	$oForm->data = $_POST;
	$oForm->files = $_FILES;
	$oForm->checkRequired('ItemName');
	$oForm->checkRequired('TypeName');
	$oForm->checkRequired('Description');
	$oForm->checkRequired('Size');
	$oForm->checkRequired('Label');
	$oForm->checkRequired('Price');
	$oForm->checkUpload('PhotoPath','image/jpg',1000);

	if($oForm->isValid){
		$sPhotoName = "Product".date("Y-m-d-H-i-s")."jpg";
		$oProduct->moveFile('PhotoPath',$sPhotoName);
		$oProduct->ItemName = $_POST['ItemName'];
		$oProduct->TypeName = $_POST['TypeName'];
		$oProduct->Description = $_POST['Description'];
		$oProduct->Size = $_POST['Size'];
		$oProduct->Label = $_POST['Label'];
		$oProduct->PhotoPath = $sPhotoName;
		$oProduct->Price = $_POST['Price'];

		$oProduct->save();

		header("Location:success-created-item.php");
		exit();
	}
}

$oForm->makeTextInput('','item-name');
$oForm->makeTextDropDown('','typeName');
$oForm->makeTextInput('','description');
$oForm->makeTextInput('','size');
$oForm->makeTextInput('','labels');
// $oForm->makeTextInput('upload item','upload-photo');
$oForm->makeHiddenField('MAX_FILE_SIZE',1000);
// $oForm->makeTextInput('upload item','browse');
$oForm->makeUpLoadBox('','item-image-edit');
$oForm->makeUpLoadBox('','browse-upload');
$oForm->makeTextInput('','price');
$oForm->makeSubmit('save changes','submit');


$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();



$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}


require_once("includes/header.php");

?>
<!-- left main container -->
<!-- left main container -->
<div id="left-container-sell">
<p class="header">edit my item</p>
<p id="gst">price will automatically<br/>include 15% GST</p>
<?php echo $oForm->html; ?>


<p id="required-edit-sell-an-item">* required input - account members NZ address only</p>
</div>


<!-- <!right main container --> 
<?php echo View::renderNavigation($aAllProductTypes);?>


<?php
require_once("includes/footer-loggedin.php");
?>