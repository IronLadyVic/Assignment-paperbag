<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");


session_start();

$oCollection = new Collection();
$oView = new View();

$aAllProductTypes = $oCollection->getAllProductTypes();



$oForm = new Form();


if(isset($_POST["submit"])){
	$oForm->data = $_POST;
	$oForm->checkRequired("username");
	$oForm->checkRequired("password-login");

	if($oForm->isValid){
	
	$oCheckMember = $oCollection->findCustomerByUsername($_POST["username"]);

	if($oCheckMember == false){
		$oForm->raiseError("username","Username is incorrect");
	}else if($oCheckMember->password != $_POST["password-login"]){
			$oForm->raiseError("password-login","password is incorrect");
		
	}else{
		$_SESSION['MemberID'] = $oCheckMember->MemberID;

		//istantiate a cart object using session.

		header("Location:index-loggedin.php");
		exit(); 
	}
}
}

		

	$oForm->makeTextInput('','username');
	$oForm->makeTextInput('','password-login');
	$oForm->makeSubmit('log in','submit');

//product types & Render Navigation - right hand side using the View.

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
<div id="left-container-login">
<p class="header-login">log in</p>
<?php echo $oForm->html; ?>
<p class="required-login">* required input - NZ account holders only</p>
</div>
<div id="right-new-member">
	<p class="header-new-member">new member</p>
	<p>create an account with paperbag boutique.<br/><br/>
		you will be able to shop faster, list your clothing items you want to sell, make money and keep <br/>your information up to date.</p>
		<a href="create-an-account.php">
			<ul id="create-an-account">
				<li>create an account</li>
			</ul>
		</a>
</div>	
<!-- right main container -->

<?php echo View::renderNavigation($aAllProductTypes);

require_once("includes/footer.php");

?>