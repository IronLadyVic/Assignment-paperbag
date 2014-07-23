<?php
require_once("includes/header-loggedin.php");

?>
<!-- left main container -->
<div id="left-container-sell">
	<form action="" method="post">
		<fieldset>
			<legend><strong>items im selling</strong></legend>
			<label for="item-name"></label>
			<input type="text" name="item-name" placeholder="*" id="item-name" readonly>
			<br/>
			<label for="type"></label>
			<input type="text" name="producttype" placeholder="*" id="producttype-items" readonly>
			<label for="description"></label>
			<input type="text" name="description" placeholder="*" id="description" readonly>			
			<br/>
			<label for="size"></label>
			<input type="text" name="size" placeholder="*" id="size" readonly>
			<label for="labels"></label>
			<input type="text" name="labels" placeholder="*" id="labels" readonly>			
			<label for="price"></label>
			<input type="text" name="price" placeholder="*" id="price-items-im-selling" readonly>			
			<div id="edit-sell-item"><a href="edit-sell-an-item.php">edit item</a></div> 
			<input type="submit" name="submit" value="remove" id="remove-sell-item"> 
			<p id="withdraw-disclaimer">you can withdraw your item selling<br/> 
by clicking remove item. <br/> 
a charge of $50.00 will be issued <br/> 
to your email on removal of item.</p>
			<input type="image" name="image" id="item-image" alt="item-image"readonly>
		</fieldset>
	</form>
	<img alt="next" src="assets/img/view-next-item.png" id="next-item-text"></img>
	<div id="next-item">

		<p><a href="items-im-selling.php">1</a> <!-- //hook up #typeId to each individual page. -->
		</p><p><a href="items-im-selling.php">2</a></p>
		<p><a href="items-im-selling.php">3</a></p>
		<p><a href="items-im-selling.php">4</a></p>
		<p><a href="items-im-selling.php">5</a></p>
	</div>
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