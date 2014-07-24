<?php
require_once("includes/header-loggedin.php");

?>
<!-- left main container -->
<div id="left-container-login">
	<div class="header">
		<p><strong>success!</strong></p>
		<p>thank you for selling your item on behalf of
paperbag boutique.<br/><br/>please click below to see your clothing items you have listed.</p>
		<a href="items-im-selling.html"><ul id="view-your-items-listed"><li>view items listed</li></ul></a>
			</div>
		</div>
<!-- right main container -->
<!-- <div id="right-navigation-shop"> -->

<?php echo View::renderNavigation($aAllProductTypes);

require_once("includes/footer-loggedin.php");

?>