<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/product.php");
require_once("includes/member.php");
session_start();

if(isset($_SESSION['MemberID'])){
	
}else{
	header("Location: sell-an-item.php");
}

$oProduct = new Product();
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
		$oForm->moveFile('PhotoPath',$sPhotoName);
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
$oForm->makeUpLoadBox('','browse-upload');
$oForm->makeTextInput('','price');
$oForm->makeSubmit('sell my item','submit');


$oView = new View();//store the view class in the OView variable
$oCollection = new Collection(); //store the Collection class in the oCollection variable.
$aAllProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}


require_once("includes/header.php");

?>
<!-- left main container -->
<div id="left-container-sell">
<p class="header">sell my item</p>
<p id="gst">price will automatically<br/>include 15% GST</p>
	<?php echo $oForm->html;?>

<p class="disclaimer">* - account members NZ address only</p>
<div id="terms-conditions">
	<p><strong>terms & conditions</strong></p><p>the price listed will automatically include GST with users input.<br/><br/> 

paperbag boutique will automatically accrue 
20% of the sale price, from sale of item.<br/><br/> 

once sold online, the item will be automatically
removed from your "items selling" and you will
receive notification about payment pick up.<br/><br/> 

*please fill in all fields on application.</p>

</div>
</div>
<!-- right main container -->
<?php
echo View::renderNavigation($aAllProductTypes);



require_once("includes/footer-loggedin.php");
?>