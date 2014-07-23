<?php
require_once("connection.php");
require_once("product.php");

class ProductType{

	private $iTypeID;
	private $sTypeName;
	private $sDescription;
	private $iDisplayOrder;
	private $bExisting;
	private $aProducts;

	public function __construct(){
		$this->iTypeID = 0;
		$this->sTypeName = '';
		$this->sDescription = '';
		$this->iDisplayOrder = 0;
		$this->bExisting = false;
		$this->aProducts = array();
	}

	public function load($iProductTypeID){ //loading product types and querying products belongin to that product type.

		//open connection
		$oConnection = new Connection();
		//execute query from database
		$sSQL = "SELECT TypeID, TypeName, Description, DisplayOrder 
		FROM producttype
		WHERE TypeID = ".$iProductTypeID;
		// echo $sSQL;

		$oResult = $oConnection->query($sSQL);
		//extract data from Result set which is in the connection function
		$aProductType = $oConnection->fetch_array($oResult);

		$this->iTypeID = $aProductType['TypeID'];
		$this->sTypeName = $aProductType['TypeName'];
		$this->sDescription = $aProductType['Description'];
		$this->iDisplayOrder = $aProductType['DisplayOrder'];

		//load all product belonging to that product type id.
		$sSQL = "SELECT ProductID
				FROM tbproduct
				WHERE TypeID=".$iProductTypeID;

			
				$oResult = $oConnection->query($sSQL);

				while($aRow= $oConnection->fetch_array($oResult)){ //loop through each row by fetching out from oResult.
					$oProduct = new Product();
					$oProduct->load($aRow['ProductID']);
					$this->aProducts[] = $oProduct;
				}

		$oConnection->close_connection();
		
		$this->bExisting = true;
	}

	public function save(){
		//open connection
		$oConnection = new Connection();

		if($this->bExisting == false){
		//execute query from database and insert data into....
		$sSQL = "INSERT INTO producttype(TypeName, Description, DisplayOrder) 
		VALUES (
			'".$this->sTypeName."',
			'".$this->sDescription."',
			'".$this->iDisplayOrder."')";
		//if the query runs, the result is ture and the save function will insert into id. if not true, then the query has failed.
		$bResult = $oConnection->query($sSQL);
		if($bResult == true){
			$this->iTypeID = $oConnection->get_insert_id();
		}
		else{
			die($sSQL."Failed query");
		}
	}
		else{
		$sSQL = "UPDATE producttype 
		SET TypeName='".$this->sTypeName."',
			Description='".$this->sDescription."', 
			DisplayOrder='".$this->iDisplayOrder."'
			WHERE producttype.TypeID=".$this->iTypeID;
		
			$bResult = $oConnection->query($sSQL);

		if($bResult == false){
			die($sSQL."Failed to update Product Type in Table");	
			}
		}
	//close connection
	$oConnection->close_connection();

}

public function __get($var){
	switch ($var) {
		case "TypeID":return $this->iTypeID;break;
		case "TypeName":return $this->sTypeName;break;
		case "Description":return $this->sDescription;break;
		case "DisplayOrder":return $this->iDisplayOrder;break;
		case "Products":return $this->aProducts;break;
		default: die($var."Does not exsist with Product type");
		
	}
}

public function __set($var, $value){
	switch ($var) {
		case "TypeID":
		$this->iTypeID = $value;
		break;
		case "TypeName":
		$this->sTypeName = $value;
		break;
		case "Description":
		$this->sDescription = $value;
		break;
		case "DisplayOrder":
		$this->iDisplayOrder = $value;
		break;
		default: die($var."Product type could not be set");
		
	}
}

}
//TESTING

// $oProductType = new ProductType();

// // $oProductType->TypeID= 11;
// // $oProductType->TypeName = 'Eyewear';
// // $oProductType->Description = 'Protect the eyes';
// // $oProductType->DisplayOrder = Null;

// // $oProductType ->save();

// $oProductType->load(1);
// echo "<pre>";
// print_r($oProductType);
// echo "</pre>";




?>