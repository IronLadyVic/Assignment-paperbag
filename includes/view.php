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
			$sHTML .='<a href="producttype.php?productType='.htmlentities($oType->TypeID).'">';//this query string will link to product type ie. Jackets, tees, tshirt
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
			$sHTML.='<a href="#" onclick="showItem('.htmlentities($oProduct->ProductID).')">+ view<img class="image" alt="product-type-image" src="assets/img/'.htmlentities($oProduct->PhotoPath).'"/></a>';
			$sHTML.='<div class="product-name">'.htmlentities($oProduct->ItemName).'</div>';
			$sHTML.='<div class="producttype-name">'.htmlentities($oProduct->TypeName).'</div>';
			$sHTML.='<div class="description"><p class="description-text">'.htmlentities($oProduct->Description).'</p></div>';
			$sHTML.='<div class="size">'.htmlentities($oProduct->Size).'</div>';
			$sHTML.='<div class="label">'.htmlentities($oProduct->Label).'</div>';
			$sHTML.='<div class="price">'.htmlentities($oProduct->Price).'</div>';
			$sHTML.='<div>';
			if(isset($_SESSION['MemberID']) == true){
			$sHTML.='<a href="add-to-cart.php?ProductID='.htmlentities($oProduct->ProductID).'" class="submit">add to my paperbag</a>';
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
			$sHTML.='<div class="shop-image-enlarge"><a href="#" onclick="showItem('.htmlentities($oProductOverlay->ProductID).')"><img src="assets/img/'.htmlentities($oProductOverlay->PhotoPath).'"/></a></div>';
		$sHTML.='<div class="product-name-enlarge">'.htmlentities($oProductOverlay->ItemName).'</div>';
		$sHTML.='<div class="producttype-name-enlarge">'.htmlentities($oProductOverlay->TypeName).'</div>';
		$sHTML.='<div class="description-enlarge"><p class="description-text-enlarge">'.htmlentities($oProductOverlay->Description).'</p></div>';
		$sHTML.='<div class="size-enlarge">'.htmlentities($oProductOverlay->Size).'</div>';
		$sHTML.='<div class="label-enlarge">'.htmlentities($oProductOverlay->Label).'</div>';
		$sHTML.='<div class="price-enlarge">'.htmlentities($oProductOverlay->Price).'</div>';

		if(isset($_SESSION['MemberID']) == true){
			$sHTML.='<a href="my-paperbag-cart.php?ProductID='.htmlentities($oProductOverlay->ProductID).'" class="submit-enlarge">add to my paperbag</a>';}
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
			$sHTML.='<li id="username">"'.htmlentities($oMember->username).'"</li>';
			$sHTML.='<li id="pass1">"'.htmlentities($oMember->password).'"</li>';
			$sHTML.='<li id="pass2">"'.htmlentities($oMember->password).'"</li>';
			$sHTML.='<p class="header">my personal details</p>';
			$sHTML.='<li id="firstName">"'.htmlentities($oMember->firstName).'"</li>';
			$sHTML.='<li id="lastName">"'.htmlentities($oMember->lastName).'"</li>';
			$sHTML.='<li id="mobile">"'.htmlentities($oMember->mobile).'"</li>';
			$sHTML.='<li id="email">"'.htmlentities($oMember->email).'"</li>';
			$sHTML.='<li id="address">"'.htmlentities($oMember->address).'"</li>';
			$sHTML.='<li id="city">"'.htmlentities($oMember->city).'"</li>';
			$sHTML.='<li id="postcode">"'.htmlentities($oMember->postcode).'"</li>';
			$sHTML.='<a id="send" href="edit-my-account.php">edit my details</a>';		
		$sHTML.='</ul>';	
	$sHTML.='<p id="required">* required li - account members NZ address only</p>';
	$sHTML.='</div>';

	return $sHTML;
}




static public function renderProductDetails($oProduct, $iCurrentPage, $iItemsPerPage){
	$aProducts = $oProduct->ProductID;
	$sHTML='';
	$sHTML='<div id="left-container-sell">';
	$sHTML.='<p class="header">items im selling</p>';

		$iStartIndex = ($iCurrentPage - 1) * $iItemsPerPage;

		$iEndIndex = $iStartIndex + $iItemsPerPage -1;
		if($iEndIndex > count($aProducts) -1){
			$iEndIndex = count($aProducts) -1;
		}

		for($i=$iStartIndex; $i<=$iEndIndex; $i++){

			$oProduct = new Product();
			$oProduct->load($_SESSION["MemberID"]);

			$aListOfProducts = $oProduct->ProductID;

			$sLastItem = "";
			

			if(count($aListOfProducts) > 0){
				$oLastItem = $aListOfProducts[count($aListOfProducts) -1];
				$oLastItem = new Product();
				$oLastItem->load($oLastItem->ProductID);

				$sLastItem = $oLastItem->ItemName;
			}
		$sHTML.='<ul>';		
		$sHTML.='<li id="item-name-view">'.htmlentities($oProduct->ItemName).'</li>';
		$sHTML.='<li id="typeName-view" ">'.htmlentities($oProduct->TypeName).'</li>';		
		$sHTML.='<li id="description-view" ">'.htmlentities($oProduct->Description).'</li>';			
		$sHTML.='<li id="size-view" ">'.htmlentities($oProduct->Size).'</li>';		
		$sHTML.='<li id="labels-view" ">'.htmlentities($oProduct->Label).'</li>';
		$sHTML.='<li id="price-view">'.htmlentities($oProduct->Price).'</li>';	
		$sHTML.='<div id="edit-sell-item"><a href="edit-sell-an-item.php?productID='.htmlentities($oProduct->ProductID).'">edit item</a></div>' ;
		$sHTML.='<div id="remove-sell-item"><a href="remove-from-items.php?productID">remove item</a></div> ';
		$sHTML.='<p id="withdraw-disclaimer">you can withdraw your sell item<br/> 
		by clicking remove item. <br/> 
		A charge of $50.00 will be issued <br/> 
		to your email on removal of item.</p>';
		$sHTML.='<img id="imageCanvas-items-im-selling" alt="item-image" src="assets/img/'.htmlentities($oProduct->PhotoPath).'"/>';
		$sHTML.='</ul>';
		$sHTML.='<a href="#" ><img alt="next" src="assets/img/view-next-item.png" id="next-item-text">'.htmlentities($sLastItem).'</img></a>';
		$sHTML.='<p class="disclaimer-view">* - account members NZ address only</p>';	
		}
		
		
			
	return $sHTML;
}

static public function renderCart($oCart){
	$sHTML = '<div id="left-container-cart">
	<p class="header"><strong>my paperbag</strong></p>
	<div class="datagrid">
	<table>
		<thead>
			<tr>
				<th id="item-text">item</th>
				<th id="producttype-text">product type</th>
				<th id="description-text">description</th>
				<th id="size-text">size</th>
				<th id="label-text">label</th>
				<th id="price-text">price</th>
			</tr>
		</thead>';
	
		$aContents = $oCart->Contents; //array of products created in the getter.
		foreach($aContents as $keyProductID => $value){
			$oProduct = new Product();
			$oProduct->load($keyProductID);

			$sHTML .='<tbody><tr>';
			$sHTML .='<td><img id="product-image" alt="item-image" src="assets/img/'.htmlentities($oProduct->PhotoPath).'"/></td>';
			$sHTML .='<td valign="top">'.htmlentities($oProduct->TypeName).'</td>';
			$sHTML .='<td valign="top">'.htmlentities($oProduct->Description).'</td>';
			$sHTML .='<td valign="top">'.htmlentities($oProduct->Size).'</td>';
			$sHTML .='<td valign="top">'.htmlentities($oProduct->Label).'</td>';
			$sHTML .='<td valign="top">'.htmlentities($oProduct->Price).'</td>';
			// $sHTML .= '<tfoot><tr><td colspan="7"><div id="subtotal"><p>subtotal incl. GST $'..'</p></div></tr></tfoot>';
			$sHTML .='</tr>';
			$sHTML .='<div id="cart-buttons">';
			$sHTML .='<tr>';

			$sHTML .='<td id="remove-items" value="remove-items"><a href="remove-item.php?ProductID='.$keyProductID.'">remove item</a></td>';
			$sHTML .='<td id="add-items"  value="add-items"><a href="producttype.php">add item</a></td>';
			$sHTML .='<td id="checkout" value="checkout"><a href="#">checkout</a></td>';
			$sHTML .='</tr>';
			$sHTML .='</div>';
			$sHTML .='</tbody>';
}

return $sHTML .= '</table>';
$sHTML ='</div>';

// $sHTML ='<a href=""><img alt="next" src="assets/img/previous.png" id="previous"></img></a>';
// $sHTML ='<a href=""><img alt="next" src="assets/img/next.png" id="next"></img></a>';
$sHTML ='</div>';

}

	static public function renderPaginator($sURL,$iTotalCount,$iItemsPerPage,$iCurrentPage){
		
		$iNumberOfPages = ceil($iTotalCount/$iItemsPerPage);
		
        $sHTML='<ul id="next-item">';
       
        for($i=1; $i<=$iNumberOfPages; $i++){
			if($i==$iCurrentPage){
				$sHTML .='<li><a class="current" href="'.$sURL.'&page='.$i.'">'.$i.'</a></li>';
			}else{
				$sHTML .='<li><a href="'.$sURL.'&page='.$i.'">'.$i.'</a></li>';
			}
	        
		}
        $sHTML .='</ul>';

		return $sHTML;

	}

}

		



?>
