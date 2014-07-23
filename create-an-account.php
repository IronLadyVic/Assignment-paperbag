<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");

session_start();

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

	$oCheckMember = $oCollection->findCustomerByUsername($_POST['MemberID']);

	if($oCheckMember != false){
		$oForm->raiseError('username','Member name already taken');
	}

	if($oForm->isValid){
		$oMember = new Member();

		$oMember->username=$_POST['username'];
		$oMember->password=$_POST['password'];
		$oMember->firstName=$_POST['firstName'];
		$oMember->firstName=$_POST['lastName'];
		$oMember->firstName=$_POST['mobile'];
		$oMember->firstName=$_POST['email'];
		$oMember->firstName=$_POST['address'];
		$oMember->firstName=$_POST['city'];
		$oMember->firstName=$_POST['postcode'];

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


$oView = new View();
$oCollection = new Collection();
$aAllProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["TypeID"])){
	$iTypeID = $_GET["TypeID"];
}
// $oType= new ProductType();
// $oType->load($iTypeID);

require_once("includes/header.php");
?>
<!-- left main container -->
<div id="left-container-account">
<p class="header">create an account</p>
<?php echo $oForm->html; ?>
	<!-- <form action="success-created-account.php" method="post" onsubmit="return checkAllFields()">
		<fieldset>
			<legend><strong>create an account</strong></legend>
			<label for="username"></label>
			<input type="text" name="username" placeholder="*" id="username" onblur="checkInput(this.id)">
			<span id="usernameMessage"></span>
			<label for="pass1"></label>
			<input type="password" name="pass1" placeholder="*" id="pass1" onkeyup="checkPasswordMatch(); return true;">
			<span id="pass1Message"></span>
			<label for="pass2"></label>
			<input type="password" name="pass2" placeholder="*"  id="pass2" onkeyup="checkPasswordMatch(); return false;">
			<span id="confirmMessage"></span>
		</fieldset>
		<fieldset>
			<legend><strong>personal details</strong></legend>
			<label for="firstName"></label>
			<input type="text" name="firstName" placeholder="*" id="firstName" onblur="checkInput(this.id)">
			<span id="firstNameMessage"></span>
			<label for="lastName"></label>
			<input type="text" name="lastName" placeholder="*" id="lastName" onblur="checkInput(this.id)">
			<span id="lastNameMessage"></span>
			<label for="mobile"></label>
			<input type="text" name="mobile" placeholder="*" id="mobile" onblur="checkNumeric(this.id)">
			<span id="mobileMessage"></span>
			<label for="email"></label>
			<input type="text" name="email" placeholder="*" id="email" onblur="checkEmail(this.id)">
			<span id="emailMessage"></span>
			<label for="address"></label>
			<input type="text" name="address" placeholder="*" id="address" onblur="checkInput(this.id)">
			<span id="addressMessage"></span>
			<label for="city"></label>
			<input type="text" name="city" placeholder="*" id="city" onblur="checkInput(this.id)">
			<span id="cityMessage"></span>
			<label for="postcode"></label>
			<input type="text" name="postcode" placeholder="*" id="postcode" onblur="checkNumeric(this.id)">
			<span id="postcodeMessage"></span>
			<label for="send" class="create-an-account"></label>
			<input id="send" type="submit" name="submit" value="submit">
		</fieldset>	
	</form> -->
<p id="required">* required input - account members NZ address only</p>
</div>
<!-- right main container -->
<!-- <div id="right-navigation-shop"> -->

<?php echo View::renderNavigation($aAllProductTypes);?>

<!-- </div> -->
<?php
require_once("includes/footer.php");
?>