<?php
require_once("connection.php"); //connection to database
require_once("model_producttype.php"); //product types or categories of products - right hand navigation when logged in.


class Collection{

 	public function getAllProductTypes(){
 		$aTypes = array(); //the array will contain the collection of producttype elements.

 		$oConnection = new Connection();

 		$sSql = "SELECT TypeID FROM producttype";


 		$oResult = $oConnection->query($sSql);

 		// echo $sSql;

 		while($aRow = $oConnection->fetch_array($oResult)){
 			$oProductType = new ProductType();
 			$oProductType->load($aRow["TypeID"]);
 			$aTypes[] = $oProductType;
 		}

 		$oConnection->close_connection();

 		return $aTypes;

 	}

public function findProductByItemName($oItemName){
 		$aProducts = array();

 		$oConnection = new Connection();

 		$sSql = "SELECT ProductID
				FROM tbproduct
				WHERE TypeID = '".$oItemName."'";

		$oResult = $oConnection->query($sSql);

		$aProducts = $oConnection->fetch_array($oResult);
		$oConnection->close_connection();

		if($aProducts == false){
			return false;
		}else{
			$oProduct = new Product();
			$oProduct->load($aProducts['ProductID']);
			return $oProduct;
		}

 	}

 public function findCustomerByUsername($sUsername){

 		$aMembers = array();

 		$oConnection = new Connection();

 		$sSql = "SELECT MemberID
				FROM tbmember
				WHERE UserName = '".$sUsername."'";

		$oResult = $oConnection->query($sSql);

		$aMembers = $oConnection->fetch_array($oResult);
		$oConnection->close_connection();

		if($aMembers == false){
			return false;
		}else{
			$oMember = new Member();
			$oMember->load($aMembers['MemberID']);
			return $oMember;
		}

 	}


}
//TESTING

// $oCollection = new Collection();

// $oProduct = $oCollection->addGST();

// echo "<pre>";
// print_r($$oProduct);
// echo "</pre>";

?>
