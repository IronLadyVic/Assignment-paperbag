<?php
define("MAX_SIZE","10000000");
require_once("includes/view-form.php");
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
// $oProduct->load($_SESSION['ProductID']);
$aExsistingData = array();

// $aExsistingData['ItemName'.$oProduct->ProductID] = $oProduct->ItemName;
$aExsistingData['item-name'] = $oProduct->ItemName;
$aExsistingData['typeName'] = $oProduct->TypeName;
$aExsistingData['description'] = $oProduct->Description;
$aExsistingData['size'] = $oProduct->Size;
$aExsistingData['labels'] = $oProduct->Label;
// $aExsistingData['item-image-edit'] = $oProduct->PhotoPath;
$aExsistingData['upload-photo'] = $oProduct->PhotoPath;
$aExsistingData['MAX_FILE_SIZE'] = $oProduct->PhotoPath;
// $aExsistingData['browse'] = $oProduct->PhotoPath;
$aExsistingData['price'] = $oProduct->Price;



$oForm = new Form();
$oForm->data = $aExsistingData;

if(isset($_POST['submit'])){
	$oForm->data = $_POST;
	$oForm->files = $_FILES;
	$oForm->checkRequired('item-name');
$oForm->checkRequired('typeName');
$oForm->checkRequired('description');
$oForm->checkRequired('size');
$oForm->checkRequired('labels');
$oForm->checkRequired('upload-photo');
$oForm->checkUpload("photo", "image/jpeg", 'MAX_SIZE');
$oForm->checkRequired('price');

	
	if($oForm->isValid){
		
		$oProduct->ItemName = $_POST['item-name'];
		$oProduct->TypeName = $_POST['typeName'];
		$oProduct->Description = $_POST['description'];
		$oProduct->Size = $_POST['size'];
		$oProduct->Label = $_POST['labels'];
		$oProduct->moveFile('PhotoPath',$sPhotoName);
			$sPhotoName = "Product".date("Y-m-d-H-i-s")."jpg";
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
$oForm->makeUpLoadBox("double click here","upload-photo");
$oForm->makeHiddenField("MAX_FILE_SIZE", 'MAX_SIZE');
// $oForm->makeTextInput("upload","browse-upload");
$oForm->makeTextInput('','price');
$oForm->makeSubmit('save changes','submit');



$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();


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