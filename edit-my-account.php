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
$aExsistingDetails['username'] = $oMember->UserName;
$aExsistingDetails['pass1'] = $oMember->Password;
$aExsistingDetails['pass2'] = $oMember->Password;
$aExsistingDetails['firstName'] = $oMember->FirstName; //$oMember->FirstName this is in the getter.
$aExsistingDetails['lastName'] = $oMember->LastName;
$aExsistingDetails['mobile'] = $oMember->Mobile;
$aExsistingDetails['email'] = $oMember->Email;
$aExsistingDetails['address'] = $oMember->StreetAddress;
$aExsistingDetails['city'] = $oMember->City;
$aExsistingDetails['postcode'] = $oMember->PostCode;


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
$oForm->makeTextInput('','pass1');
$oForm->makeTextInput('','pass2');
$oForm->makeTextInput('','firstName');
$oForm->makeTextInput('','lastName');
$oForm->makeTextInput('','mobile');
$oForm->makeTextInput('','email');
$oForm->makeTextInput('','address');
$oForm->makeTextInput('','city');
$oForm->makeTextInput('','postcode');
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
<p class="header-personaldetails"></p>
<?php echo $oForm->html; ?>


<p id="required">* required input - account members NZ address only</p>
</div>

<!-- <div id="right-navigation-shop"> -->

<?php echo View::renderNavigation($aAllProductTypes);?>


<?php
require_once("includes/footer-loggedin.php");
?>