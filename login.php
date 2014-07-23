<?php
require_once("includes/header.php");

?>
<!-- left main container -->
<div id="left-container-login">
	<form action="index-loggedin.php" method="post">
		<fieldset>
			<legend><strong>log in</strong></legend>
			<label for="username-login"></label><input type="text" name="username" placeholder="*" id="username-login" onblur="checkInput(this.id)">
			<span id="username-loginMessage"></span>
			<label for="password-login"></label><input type="password" name="password" placeholder="*" id="password-login" onblur="checkInput(this.id)">
			<span id="password-loginMessage"></span>
			<label for="submit-login"></label><input id="submit-login" type="submit" name="sumbit" value="log in">
		</fieldset>
	</form>
	<div id="right-new-member">
		<p><strong>new member</strong></p>
		<p>create an account with paperbag boutique.<br/><br/>
			you will be able to shop faster, list your clothing items you want to sell, make money and keep <br/>your information up to date.</p>
			<a href="create-an-account.php"><ul id="create-an-account"><li>create an account</li></ul></a>
	</div>
<p class="required-login">* required input - NZ account holders only</p>
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
require_once("includes/footer.php");

?>