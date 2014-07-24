<?php
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/collection.php");
require_once("includes/member.php");

session_start();





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
<div id="left-container-cart">
	<p class="header"><strong>my paperbag</strong></p>
	<div class="datagrid"><table>
		<thead>
			<tr>
				<th id="item-text">item</th>
				<th id="producttype-text">product type</th>
				<th id="description-text">description</th>
				<th id="size-text">size</th>
				<th id="label-text">label</th>
				<th id="price-text">price</th>
			</tr>
		</thead>
		<tfoot><tr><td colspan="7"><div id="subtotal"><p>subtotal incl. GST $</p></div></tr></tfoot>
		<tbody><tr><td id="product-image"></td>
			<td valign="top">Jacket</td>
			<td valign="top">Beautiful jacket 100% leather</td>
			<td valign="top">XS</td>
			<td valign="top">label</td>
			<td valign="top">$ 100.00</td>
			</tr>
		</tbody>
	</table>
</div>
<div id="cart-buttons">
	<form>
	<input id="remove-items" type="submit" value="remove-items"/>
		<input id="add-items" type="submit" value="add-items"/>
		<input id="checkout" type="submit" value="checkout"/>
	</form>
</div>
<a href=""><img alt="next" src="assets/img/previous.png" id="previous"></img></a>
	<a href=""><img alt="next" src="assets/img/next.png" id="next"></img></a>
</div>
<!-- right main container -->


<?php echo View::renderNavigation($aAllProductTypes);?>
<?php
require_once("includes/footer-loggedin.php");

?>