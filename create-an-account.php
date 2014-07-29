<?php
// error_reporting(E_ALL | E_STRICT);  
// ini_set('display_startup_errors',1);  
// ini_set('display_errors',1);

require_once("includes/view-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");

session_start();
$oCollection = new Collection();
$oForm = new Form();



if(isset($_POST["submit"])){
	$oForm->data = $_POST;
	$oForm->checkRequired("username");
	$oForm->checkRequired("pass1");
	$oForm->checkRequired("pass2");
	$oForm->checkMatching("pass1", "pass2");
	$oForm->checkRequired("firstName");
	$oForm->checkRequired("lastName");
	$oForm->checkRequired("mobile");
	$oForm->checkRequired("email");
	$oForm->checkRequired("address");
	$oForm->checkRequired("city");
	$oForm->checkRequired("postcode");

	$oCheckMember = $oCollection->findCustomerByUsername($_POST['username']);

	if($oCheckMember != false){
		$oForm->raiseError('username','Username name already taken');
	}

	if($oForm->isValid){
		$oMember = new Member();

		$oMember->username=$_POST['username'];
		$oMember->password=$_POST['password'];
		$oMember->firstName=$_POST['firstName'];
		$oMember->lastName=$_POST['lastName'];
		$oMember->mobile=$_POST['mobile'];
		$oMember->email=$_POST['email'];
		$oMember->address=$_POST['address'];
		$oMember->city=$_POST['city'];
		$oMember->postcode=$_POST['postcode'];


		$oMember->save();

		header("location: success-created-account.php");
		exit();

	}

}

$oForm->makeTextInput('','username');
$oForm->makePasswordInput('','pass1');
$oForm->makePasswordInput('','pass2');
$oForm->makeTextInput('','firstName');
$oForm->makeTextInput('','lastName');
$oForm->makeTextInput('','mobile');
$oForm->makeTextInput('','email');
$oForm->makeTextInput('','address');
$oForm->makeTextInput('','city');
$oForm->makeTextInput('','postcode');
$oForm->makeSubmit('create an account','submit');

$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}
// $oType= new ProductType();
// $oType->load($iTypeID);

require_once("includes/header.php");
?>
<!-- left main container -->
<div id="left-container-account">
<p class="header">create an account</p>
<p class="header-personaldetails">personal details</p>
<?php echo $oForm->html; ?>


<p id="required">* required input - account members NZ address only</p>
</div>
<!-- right main container -->
<!-- <div id="right-navigation-shop"> -->

<?php echo View::renderNavigation($aAllProductTypes);?>

<!-- </div> -->
<?php
require_once("includes/footer.php");
?>