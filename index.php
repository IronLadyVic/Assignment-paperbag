<?php
require_once("includes/header.php");
?>
<!-- left main container -->
<div id="left-container">
	<div class="gallery items-3">
  <div id="item-1" class="control-operator"></div>
  <div id="item-2" class="control-operator"></div>
  <div id="item-3" class="control-operator"></div>
  <div class="gallery autoplay items-3">
	<figure class="item">
    <h1>create an account</h1>
    <img src="assets/img/slider1.png" alt="slider1" id="clothing-rack1"/>
  </figure>
  
  <figure class="item"><a href="login.php">
  <h1>sell your clothes online</h1>
	<ul>
		<li>1. sell second hand labelled clothing online</li>
		<li id="index-productname"></li>
		<li>2. manage the items you list </li>
		<li id="index-price"></li>
		<li>3. make money</li>
		<li id="index-sold"></li>
		<li>4. buy second hand labelled clothing online</li>
		<li id="index-addtocart"></li>
		<img src="assets/img/slider2.png" alt="slider2" id="clothing-rack2"/>
	</ul>	
  </a>
  </figure>
  <figure class="item">
    <h1>shop paperbag</h1>
    <img src="assets/img/slider3.png" alt="slider3" id="clothing-rack3"/>
  </figure>
  <div class="controls">
    <a href="create-an-account.php" class="control-button">•</a>
    <a href="login.php" class="control-button">•</a>
    <a href="shop-online.php" class="control-button">•</a>
   </div> 
  </div>
</div>
</div>
<!-- right main container -->
<div id="right-container">
	<ul>
		
		<img src="assets/img/index-rightColomn.png" alt="second-hand-clothes" id="index-clothes"/>
		<a href="#"><li id="brands-we-except">brands we except</li></a>
	</ul>
</div>
<?php
require_once("includes/footer.php");
?>