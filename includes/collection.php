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
}
//TESTING

// $oCollection = new Collection();

// $aProductTypes = $oCollection->getAllProductTypes();

// echo "<pre>";
// print_r($aProductTypes);
// echo "</pre>";

?>
