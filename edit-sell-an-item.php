<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/product.php");

session_start();
//redirect to login page if member has not logged in.
if(!isset($_SESSION['MemberID'])){
	header("Location:login.php");
}

$oProduct = new Product();

$aExsistingDetails = array();
$aExsistingDetails['username'] = $oProduct->UserName;
$aExsistingDetails['pass1'] = $oProduct->Password;
$aExsistingDetails['pass2'] = $oProduct->Password;
$aExsistingDetails['firstName'] = $oProduct->FirstName; //$oProduct->FirstName this is in the getter.
$aExsistingDetails['lastName'] = $oProduct->LastName;
$aExsistingDetails['mobile'] = $oProduct->Mobile;
$aExsistingDetails['email'] = $oProduct->Email;
$aExsistingDetails['address'] = $oProduct->StreetAddress;
$aExsistingDetails['city'] = $oProduct->City;
$aExsistingDetails['postcode'] = $oProduct->PostCode;


$oForm = new Form(); //store the Form class in the oFrom Variable.
$oForm->data = $aExsistingDetails;


if(isset($_POST["submit"])){
	$oForm->data = $_POST;
	$oForm->checkRequired("username");
	$oForm->checkRequired("password");
	$oForm->checkRequired("firstName");
	$oForm->checkRequired("lastName");
	$oForm->checkRequired("mobile");
	$oForm->checkRequired("email");
	$oForm->checkRequired("address");
	$oForm->checkRequired("city");
	$oForm->checkRequired("postcode");


	if($oForm->isValid){
		$oProduct->username=$_POST['username'];
		$oProduct->password=$_POST['password'];
		$oProduct->firstName=$_POST['firstName'];
		$oProduct->lastName=$_POST['lastName'];
		$oProduct->mobile=$_POST['mobile'];
		$oProduct->email=$_POST['email'];
		$oProduct->address=$_POST['address'];
		$oProduct->city=$_POST['city'];
		$oProduct->postcode=$_POST['postcode'];
		

		$oProduct->save();

		header("location: success-created-account.php");
		exit();

	}

}
$oForm->makeTextInput('','item-name');
$oForm->makeTextInput('','typeName');
$oForm->makeTextInput('','description');
$oForm->makeTextInput('','size');
$oForm->makeTextInput('','labels');
$oForm->makeTextInput('','browse');
$oForm->makeTextInput('','browse-upload');
$oForm->makeTextInput('','price');
$oForm->makeTextInput('','item-image');
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
<div id="left-container-sell">
<p class="header">edit my item</p>
<?php echo $oForm->html; ?>
<p id="gst">price will automatically<br/>include 15% GST</p>
</div>
<!-- left main container -->

<!-- 	<form enctype="multipart/form-data" action="success-created-item.php" method="post" onsubmit="return checkAllFields()">
		<fieldset>
			<legend><strong>edit my item</strong></legend>
			<label for="item-name"></label>
			<input type="text" name="item-name" placeholder="*" id="item-name" onblur="checkInput(this.id)">
			<span id="item-nameMessage"></span>
			<br/>
			<label for="type"></label>
			<select name="producttype" id="typeName" onblur="checkInput(this.id)">
			<option value="choose">*</option>
			<option value="jackets">jacket</option>
			<option value="tops">top</option>
			<option value="tees">tee</option>
			<option value="pants">pants</option>
			<option value="shorts">shorts</option>
			<option value="knitwear">knitwear</option>
			<option value="dresses">dress</option>
			<option value="skirts">skirt</option>
			</select>
			<span id="typeNameMessage"></span>
			<label for="description"></label>
			<input type="text" name="description" placeholder="*" id="description" onblur="checkInput(this.id)">
			<span id="descriptionMessage"></span>
			<br/>
			<label for="size"></label>
			<input type="text" name="size" placeholder="*" id="size" onblur="checkInput(this.id)">
			<span id="sizeMessage"></span>
			<label for="labels"></label>
			<input type="text" name="labels" placeholder="*" id="labels" onblur="checkInput(this.id)">
			<span id="labelsMessage"></span>
			<div id="upload-photo">
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
				<input name="uploaded_file" id="browse" type="file" />
				<span style="-webkit-user-select: none; line-height: 400%; margin-left:-30px; font-size:10px;">double click here</span>
				<input type="submit" value="upload file" id="browse-upload"/>
			</div>
			<label for="price"></label>
			<input type="text" name="price" placeholder="*" id="price" onblur="checkNumeric(this.id)">
			<span id="priceMessage"></span>
			<p id="gst">price will automatically<br/>include 15% GST</p>
			<input type="submit" name="submit" value="save edit" id="submit-item"> 
			<input type="image" name="image" id="item-image" alt="item-image">
		</fieldset>
	</form>
<p class="disclaimer">* - account members NZ address only</p>
<div id="uploaded-item">

</div>
</div> --> 
<!-- right main container -->
<?php echo View::renderNavigation($aAllProductTypes);?>


<?php
require_once("includes/footer-loggedin.php");
?>