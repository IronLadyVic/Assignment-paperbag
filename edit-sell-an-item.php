<?php
require_once("includes/header-loggedin.php");
?>
<!-- left main container -->
<div id="left-container-sell">
	<form enctype="multipart/form-data" action="success-created-item.php" method="post" onsubmit="return checkAllFields()">
		<fieldset>
			<legend><strong>edit my item</strong></legend>
			<label for="item-name"></label>
			<input type="text" name="item-name" placeholder="*" id="item-name" onblur="checkInput(this.id)">
			<span id="item-nameMessage"></span>
			<br/>
			<label for="type"></label>
			<select name="producttype" id="typeName" onblur="checkInput(this.id)">
			<option value="choose">*</option>
			<option value="jackets">jacket</option>
			<option value="tops">top</option>
			<option value="tees">tee</option>
			<option value="pants">pants</option>
			<option value="shorts">shorts</option>
			<option value="knitwear">knitwear</option>
			<option value="dresses">dress</option>
			<option value="skirts">skirt</option>
			</select>
			<span id="typeNameMessage"></span>
			<label for="description"></label>
			<input type="text" name="description" placeholder="*" id="description" onblur="checkInput(this.id)">
			<span id="descriptionMessage"></span>
			<br/>
			<label for="size"></label>
			<input type="text" name="size" placeholder="*" id="size" onblur="checkInput(this.id)">
			<span id="sizeMessage"></span>
			<label for="labels"></label>
			<input type="text" name="labels" placeholder="*" id="labels" onblur="checkInput(this.id)">
			<span id="labelsMessage"></span>
			<div id="upload-photo">
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
				<input name="uploaded_file" id="browse" type="file" />
				<span style="-webkit-user-select: none; line-height: 400%; margin-left:-30px; font-size:10px;">double click here</span>
				<input type="submit" value="upload file" id="browse-upload"/>
			</div>
			<label for="price"></label>
			<input type="text" name="price" placeholder="*" id="price" onblur="checkNumeric(this.id)">
			<span id="priceMessage"></span>
			<p id="gst">price will automatically<br/>include 15% GST</p>
			<input type="submit" name="submit" value="save edit" id="submit-item"> <!-- on submit page is redirected to success-created-item.php -->
			<input type="image" name="image" id="item-image" alt="item-image">
		</fieldset>
	</form>
<p class="disclaimer">* - account members NZ address only</p>
<div id="uploaded-item">

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