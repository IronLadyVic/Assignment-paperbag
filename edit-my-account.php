<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");

session_start();
//redirect to login page if member has not logged in.
if(!isset($_SESSION['MemberID'])){
	header("Location:login.php");
}

$oMember = new Member();
//load the member that is in session
$oMember->load($_SESSION['MemberID']);

$aExsistingDetails = array();
$aExsistingDetails['firstName-edit'] = $oMember->FirstName; //$oMember->FirstName in the get function. Allowing to read the properties.
$aExsistingDetails['lastName-edit'] = $oMember->LastName;
$aExsistingDetails['mobile-edit'] = $oMember->Mobile;
$aExsistingDetails['email-edit'] = $oMember->Email;
$aExsistingDetails['address-edit'] = $oMember->StreetAddress;
$aExsistingDetails['city-edit'] = $oMember->City;
$aExsistingDetails['postcode-edit'] = $oMember->PostCode;


$oForm = new Form(); //store the Form class in the oFrom Variable.
$oForm->data = $aExsistingDetails;


if(isset($_POST["submit"])){
	$oForm->data = $_POST;
	
	$oForm->checkRequired("firstName-edit");
	$oForm->checkRequired("lastName-edit");
	$oForm->checkRequired("mobile-edit");
	$oForm->checkRequired("email-edit");
	$oForm->checkRequired("address-edit");
	$oForm->checkRequired("city-edit");
	$oForm->checkRequired("postcode-edit");

	//echo "bla";
	if($oForm->isValid){
		//echo "bla1";
	
		$oMember->firstName=$_POST['firstName-edit'];
		$oMember->lastName=$_POST['lastName-edit'];
		$oMember->mobile=$_POST['mobile-edit'];
		$oMember->email=$_POST['email-edit'];
		$oMember->address=$_POST['address-edit'];
		$oMember->city=$_POST['city-edit'];
		$oMember->postcode=$_POST['postcode-edit'];
		

		$oMember->save();

		header("location: success-created-account.php");
		exit();

	}

}

$oForm->makeTextInput('','firstName-edit');
$oForm->makeTextInput('','lastName-edit');
$oForm->makeTextInput('','mobile-edit');
$oForm->makeTextInput('','email-edit');
$oForm->makeTextInput('','address-edit');
$oForm->makeTextInput('','city-edit');
$oForm->makeTextInput('','postcode-edit');
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
<div id="left-container-account">
<p class="header">edit my account</p>

<?php echo $oForm->html; ?>


<p id="required">* required input - account members NZ address only</p>
</div>

<!-- <div id="right-navigation-shop"> -->

<?php echo View::renderNavigation($aAllProductTypes);?>


<?php
require_once("includes/footer-loggedin.php");
?>