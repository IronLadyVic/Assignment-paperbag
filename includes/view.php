<?php
class View{
	//$aProductTypes must be an array of ProductType objects
	static public function renderNavigation($aProductTypes){
		$sHTML = '<div id="right-navigation-shop">';
		$sHTML .= '<nav id="shop-links">';
		$sHTML .='<ul>';
		for($i=0; $i<count($aProductTypes); $i++){
			$oType = $aProductTypes[$i];
			$sHTML .='<li>';
			$sHTML .='<a href="producttype.php?productType='.$oType->TypeID.'">';//this query string will link to product type ie. Jackets, tees, tshirt
			$sHTML .= $oType->TypeName;
			$sHTML .='</a>';
			$sHTML .='</li>'; 
		}
		
		$sHTML .='</ul>';
		$sHTML .='</nav>';
		$sHTML .='</div>';

		return $sHTML;
	}

	static public function renderProductType($oProductType){

		$sHTML='<div id="left-container-shop">';
		$sHTML.='<p class="header"><strong>shop online</strong></p>';
		$sHTML.='<div id="product-type-list">';
		$sHTML.='<ul>';

		$aProducts = $oProductType->Products;
		for($i=0; $i<count($aProducts); $i++){

			$oProduct = $aProducts[$i];
			$sHTML.='<li id="item">';
			$sHTML.='<a href="#" onclick="showItem('.$oProduct->TypeID.')">+ view<img class="image" alt="product-type-image" src="assets/img/'.$oProduct->PhotoPath.'"/></a>';
			$sHTML.='<div class="product-name">'.$oProduct->ItemName.'</div>';
			$sHTML.='<div class="producttype-name">'.$oProduct->TypeName.'</div>';
			$sHTML.='<div class="description"><p class="description-text">'.$oProduct->Description.'</p></div>';
			$sHTML.='<div class="size">'.$oProduct->Size.'</div>';
			$sHTML.='<div class="label">'.$oProduct->Label.'</div>';
			$sHTML.='<div class="price">'.$oProduct->Price.'</div>';
			$sHTML.='<div>';
			if(isset($_SESSION['MemberID']) == true){
			$sHTML.='<a href="my-paperbag-cart.php?ProductID='.$oProduct->ProductID.'" class="submit">add to my paperbag</a>';
		}else{
			$sHTML.='<a href="login.php" class="submit">add to my paperbag</a>';
		}
			$sHTML.='</div>';
			$sHTML.='</li>';
		}
		
		$sHTML.='</ul>';
		$sHTML.='</div>';
		$sHTML.='</div>';

		return $sHTML;

	}

static public function renderProductOverlay($oOverlay){
	$sHTML='<div id="overlay" onclick="hideItem()">';
	
	$sHTML.='<ul id="viewItem">';
	$aProducts = $oOverlay->Products;
	for($i=0; $i<count($aProducts); $i++){
		$oProductOverlay = $aProducts[$i];

		$sHTML.='<li id="item-enlarge">';
			$sHTML.='<div class="shop-image-enlarge"><a href="#" onclick="showItem('.$oProductOverlay->TypeID.')"><img src="assets/img/'.$oProductOverlay->PhotoPath.'"/></a></div>';
		$sHTML.='<div class="product-name-enlarge">'.$oProductOverlay->ItemName.'</div>';
		$sHTML.='<div class="producttype-name-enlarge">'.$oProductOverlay->TypeName.'</div>';
		$sHTML.='<div class="description-enlarge"><p class="description-text-enlarge">'.$oProductOverlay->Description.'</p></div>';
		$sHTML.='<div class="size-enlarge">'.$oProductOverlay->Size.'</div>';
		$sHTML.='<div class="label-enlarge">'.$oProductOverlay->Label.'</div>';
		$sHTML.='<div class="price-enlarge">'.$oProductOverlay->Price.'</div>';

		if(isset($_SESSION['MemberID']) == true){
			$sHTML.='<a href="my-paperbag-cart.php?ProductID='.$oProductOverlay->ProductID.'" class="submit-enlarge">add to my paperbag</a>';}
			else{
				return false;
			$sHTML.='<a href="login.php" class="submit-enlarge">add to my paperbag</a>';
		}

		
		
		 //need help on this one session can it be added to the view.

		$sHTML.='</li>';
	}
	
	$sHTML.='</ul>';
	$sHTML.='</div>';
	return $sHTML;
}

static public function renderMemberDetails($oMember){
	$sHTML='';
	$sHTML.='<div id="left-container-account">';
	$sHTML.='<ul>';
		$sHTML.='<p class="header">my account details</p>';
			$sHTML.='<li id="username">"'.$oMember->username.'"</li>';
			$sHTML.='<li id="pass1">"'.$oMember->password.'"</li>';
			$sHTML.='<li id="pass2">"'.$oMember->password.'"</li>';
			$sHTML.='<p class="header">my personal details</p>';
			$sHTML.='<li id="firstName">"'.$oMember->firstName.'"</li>';
			$sHTML.='<li id="lastName">"'.$oMember->lastName.'"</li>';
			$sHTML.='<li id="mobile">"'.$oMember->mobile.'"</li>';
			$sHTML.='<li id="email">"'.$oMember->email.'"</li>';
			$sHTML.='<li id="address">"'.$oMember->address.'"</li>';
			$sHTML.='<li id="city">"'.$oMember->city.'"</li>';
			$sHTML.='<li id="postcode">"'.$oMember->postcode.'"</li>';
			$sHTML.='<a id="send" href="edit-my-account.php">edit my details</a>';		
		$sHTML.='</ul>';	
	$sHTML.='<p id="required">* required li - account members NZ address only</p>';
	$sHTML.='</div>';

	return $sHTML;
}




static public function renderProductDetails($oProduct){
	$sHTML='';
	$sHTML='<div id="left-container-sell">';
	$sHTML.='<p class="header">items im selling</p>';
	$sHTML.='<ul>';		
		$sHTML.='<li id="item-name-view">'.$oProduct->ItemName.'</li>';
		$sHTML.='<li id="typeName-view" ">'.$oProduct->TypeName.'</li>';		
		$sHTML.='<li id="description-view" ">'.$oProduct->Description.'</li>';			
		$sHTML.='<li id="size-view" ">'.$oProduct->Size.'</li>';		
		$sHTML.='<li id="labels-view" ">'.$oProduct->Label.'</li>';
		$sHTML.='<li id="price-view">'.$oProduct->Price.'</li>';	
		$sHTML.='<div id="edit-sell-item"><a href="edit-sell-an-item.php">edit item</a></div>' ;
		$sHTML.='<div id="remove-sell-item"><a href="">remove item</a></div> ';
		$sHTML.='<p id="withdraw-disclaimer">you can withdraw your sell item<br/> 
		by clicking remove item. <br/> 
		A charge of $50.00 will be issued <br/> 
		to your email on removal of item.</p>';
		$sHTML.='<img id="item-image-view" alt="item-image" src="assets/img/'.$oProduct->PhotoPath.'"/>';
		$sHTML.='<img alt="next" src="assets/img/view-next-item.png" id="next-item-text"></img>';
		$sHTML.='</ul>';
		$sHTML.='</div>';

		$sHTML.='<div id="next-item">';
		$aProducts = $oProduct->Contents;

		foreach ($aProducts as $keyProductId => $value) {

			

			$oProduct = new Product();
			$oProduct->load($keyProductId);
	
		$sHTML.='<p><a href="items-im-selling.php?ProductID="'.$keyProductId.'>1</a></p>'; //use query string here to access/get the producttype the memberid is selling.
		$sHTML.='<p><a href="items-im-selling.php?ProductID="'.$keyProductId.'>2</a></p>';
		$sHTML.='<p><a href="items-im-selling.php?ProductID="'.$keyProductId.'>3</a></p>';
		$sHTML.='<p><a href="items-im-selling.php?ProductID="'.$keyProductId.'>4</a></p>';
		$sHTML.='<p><a href="items-im-selling.php?ProductID="'.$keyProductId.'>5</a></p>';
		
	}
$sHTML.='<p class="disclaimer-view">* - account members NZ address only</p>';	
		$sHTML.='</div>';
		
	return $sHTML;
}



}

		



?>
