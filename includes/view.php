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
			$sHTML.='<a href="#" onclick="showItem('.$oProduct->TypeID.')">+ view<img class="image" src="assets/img/'.$oProduct->PhotoPath.'"/></a>';
			$sHTML.='<div class="product-name">'.$oProduct->ItemName.'</div>';
			$sHTML.='<div class="producttype-name">'.$oProduct->TypeName.'</div>';
			$sHTML.='<div class="description"><p class="description-text">'.$oProduct->Description.'</p></div>';
			$sHTML.='<div class="size">'.$oProduct->Size.'</div>';
			$sHTML.='<div class="label">'.$oProduct->Label.'</div>';
			$sHTML.='<div class="price">'.$oProduct->Price.'</div>';
			$sHTML.='<div>';
			$sHTML.='<a href="my-paperbag-cart.php?ProductID='.$oProduct->ProductID.'" class="submit">add to my paperbag</a>';
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
		$sHTML.='<a href="my-paperbag-cart.php?ProductID='.$oProductOverlay->ProductID.'" class="submit-enlarge">add to my paperbag</a>';
		$sHTML.='</li>';
	}
	
	$sHTML.='</ul>';
	$sHTML.='</div>';
	return $sHTML;
}

}
?>
