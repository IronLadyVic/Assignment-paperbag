<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");

session_start();

if(isset($_SESSION['MemberID'])){
	header("Location:login.php");
}

$oMember = new Member();

$oMember->load($_SESSION['MemberID']));
$aExsistingDetails = array();
$aExsistingDetails['username'] = $oMember->username;
$aExsistingDetails['pass1'] = $oMember->password;
$aExsistingDetails['pass2'] = $oMember->password;
$aExsistingDetails['firstName'] = $oMember->firstName;
$aExsistingDetails['lastName'] = $oMember->lastName;
$aExsistingDetails['mobile'] = $oMember->mobile;
$aExsistingDetails['email'] = $oMember->email;
$aExsistingDetails['address'] = $oMember->address;
$aExsistingDetails['city'] = $oMember->city;
$aExsistingDetails['postcode'] = $oMember->postcode;

$oCollection = new Collection();
$oForm = new Form();
$oForm->data = $aExsistingDetails;


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

		header("location: create-an-account.php");
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

$aAllProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["productType"])){
	$iTypeID = $_GET["productType"];
}

require_once("includes/header-loggedin.php");

?>

<!-- left main container -->
<div id="left-container-account">
<p class="header">edit my account</p>
<p class="header-personaldetails">update details</p>
<?php echo $oForm->html; ?>


<p id="required">* required input - account members NZ address only</p>
</div>

<!-- <div id="right-navigation-shop"> -->

<?php echo View::renderNavigation($aAllProductTypes);?>


<?php
require_once("includes/footer-loggedin.php");
?>