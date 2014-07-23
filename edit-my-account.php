<?php
require_once("includes/header-loggedin.php");

?>
<!-- left main container -->
<div id="left-container-account">
	<form action="http://www.google.co.nz" method="post" onsubmit="return checkAllFields()">
		<fieldset>
			<legend><strong>edit log in details</strong></legend>
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
			<legend><strong>edit account details</strong></legend>
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
			<input id="send" type="submit" name="sumbit" value="create an account">
		</fieldset>
		
	</form>
<p id="required">* required input - account members NZ address only</p>
</div>
<!-- right main container -->
<div id="right-navigation-shop">
	<nav id="shop-links">
		<ul>
		<p><strong>shop</strong></p>	
			<li><a href="#">jackets</a></li>
			<li><a href="#">tops</a></li>
			<li><a href="#">tees</a></li>
			<li><a href="#">pants</a></li>
			<li><a href="#">shorts</a></li>
			<li><a href="#">knitwear</a></li>
			<li><a href="#">dresses</a></li>
			<li><a href="#">skirts</a></li>
		</ul>
</nav>
</div>
<?php
require_once("includes/footer-loggedin.php");
?>