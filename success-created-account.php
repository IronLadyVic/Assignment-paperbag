<?php
require_once("includes/header-loggedin.php");

?>
<!-- left main container -->
<div id="left-container-login">
	<div class="header">
		<p><strong>success!</strong></p>
		<p>thank you for creating an account with paperbag boutique.<br/><br/>please view your account details or start selling your second hand <br/><br/>labels by listing an item.</p>
		<a href=""><ul id="account-button"><li>view your account</li></ul></a>
			<a href=""><ul id="sell-button"><li>list an item</li></ul></a>
		</div>
</div>
<!-- right main container -->
<!-- <div id="right-navigation-shop"> -->

<?php echo View::renderNavigation($aAllProductTypes);
require_once("includes/footer-loggedin.php");

?>