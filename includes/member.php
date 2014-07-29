<?php
require_once("connection.php");

class Member{

	private $iMemberID;
	private $sUserName;
	private $sPassword;
	private $sFirstName;
	private $sLastName;
	private $iMobile;
	private $sEmail;
	private $sStreetAddress;
	private $sCity;
	private $iPostCode;
	private $bExisting;
	private $aProducts; //many products to a product type. A member can be a buyer or a seller.

	public function __construct(){
		$this->iMemberID = 0;
		$this->sUserName = "";
		$this->sPassword = "";
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->iMobile = 0;
		$this->sEmail = "";
		$this->sStreetAddress = "";
		$this->sCity = "";
		$this->iPostCode = 0;
		$this->bExisting = false;
		$this->aProducts = array();
	}

	public function load($iMemberID){

		//open connection
		$oConnection = new Connection();
		//execute query from database
		$sSQL = "SELECT MemberID, UserName, Password, FirstName, LastName, Mobile, Email, StreetAddress, City, PostCode 
		FROM tbmember
		WHERE MemberID = ".$iMemberID;
		// echo $sSQL;

		$oResult = $oConnection->query($sSQL);
		//extract data from Query Result
		$aMember = $oConnection->fetch_array($oResult);


		$this->iMemberID = $aMember['MemberID'];
		$this->sUserName = $aMember['UserName'];
		$this->sPassword = $aMember['Password'];
		$this->sFirstName = $aMember['FirstName'];
		$this->sLastName = $aMember['LastName'];
		$this->iMobile =$aMember['Mobile'];
		$this->sEmail = $aMember['Email'];
		$this->sStreetAddress = $aMember['StreetAddress'];
		$this->sCity = $aMember['City'];
		$this->iPostCode =$aMember['PostCode'];

		$sSQL = "SELECT ProductID
				FROM tbproduct
				WHERE SellerID=".$iMemberID;

			
				$oResult = $oConnection->query($sSQL);

				while($aRow= $oConnection->fetch_array($oResult)){ //loop through each row by fetching out from oResult.
					$oProduct = new Product();
					$oProduct->load($aRow['ProductID']); //automatically a product has a product type.
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
		$sSQL = "INSERT INTO tbmember(UserName, Password, FirstName, LastName, Mobile, Email, StreetAddress, City, PostCode) 
		VALUES ('".$this->sUserName."',
			'".$oConnection->escape_value($this->sPassword)."',
			'".$oConnection->escape_value($this->sFirstName)."',
			'".$oConnection->escape_value($this->sLastName)."',
			'".$oConnection->escape_value($this->iMobile)."',
			'".$oConnection->escape_value($this->sEmail)."',
			'".$oConnection->escape_value($this->sStreetAddress)."',
			'".$oConnection->escape_value($this->sCity)."',
			'".$oConnection->escape_value($this->iPostCode)."')";
		//if the query runs, the result is ture and the save function will insert into id. if not true, then the query has failed.
		$bResult = $oConnection->query($sSQL);
		if($bResult == true){
			$this->iMemberID = $oConnection->get_insert_id();
		}
		else{
			die($sSQL."Failed query");
		}
	}
		else{
		$sSQL = "UPDATE tbmember 
		SET FirstName='".$oConnection->escape_value($this->sFirstName)."',
			LastName='".$oConnection->escape_value($this->sLastName)."',
			Mobile='".$oConnection->escape_value($this->iMobile)."',
			Email='".$oConnection->escape_value($this->sEmail)."',
			StreetAddress='".$oConnection->escape_value($this->sStreetAddress)."',
			City='".$oConnection->escape_value($this->sCity)."',
			PostCode='".$oConnection->escape_value($this->iPostCode)."'
			WHERE tbmember.MemberID=".$this->iMemberID;
		
			$bResult = $oConnection->query($sSQL);

		if($bResult == false){
			die($sSQL."Failed to update");	
			}
		}
	//close connection
	$oConnection->close_connection();

}

public function __get($var){//reading data to inaccessible properties
	switch ($var) {
		case "MemberID":return $this->iMemberID;break;
		case "UserName":return $this->sUserName;break;
		case "Password":return $this->sPassword;break;
		case "FirstName":return $this->sFirstName;break;
		case "LastName":return $this->sLastName;break;
		case "Mobile":return $this->iMobile;break;
		case "Email":return $this->sEmail;break;
		case "StreetAddress":return $this->sStreetAddress;break;
		case "City":return $this->sCity;break;
		case "PostCode":return $this->iPostCode;break;
		case "Products": return $this->aProducts;break;
		default: die($var."Does not exsist with Member");
		
	}
}

//setter
	//once the form checks have been done, the POST data is sent here for the setter to assign the values
	//to the class attributes ready to run the save function after all the attributes have been set

public function __set($var, $value){ //writing data to inaccessible properties
	switch ($var) {
		case "username":
		$this->sUserName = $value;
		break;
		case "password":
		$this->sPassword = $value;
		break;
		case "firstName":
		$this->sFirstName = $value;
		break;
		case "lastName":
		$this->sLastName = $value;
		break;
		case "mobile":
		$this->iMobile = $value;
		break;
		case "email":
		$this->sEmail = $value;
		break;
		case "address":
		$this->sStreetAddress = $value;
		break;
		case "city":
		$this->sCity = $value;
		break;
		case "postcode":
		$this->iPostCode = $value;
		break;
		default: die($var."details could not be set");
		
	}
}

}
//TESTING

// $oMember = new Member();

// $oMember->load(4);

// // $oMemberTwo = new Member();

// // $oMemberTwo->load(4);

// // $oMemberTwo->UserName='test';
// // $oMemberTwo->Password='test';
// // $oMemberTwo->FirstName='test';
// // $oMemberTwo->LastName='test';
// // $oMemberTwo->Mobile=35235234523;
// // $oMemberTwo->Email='test';
// // $oMemberTwo->StreetAddress='test';
// // $oMemberTwo->City='test';
// // $oMemberTwo->PostCode=34646346;

// // $oMemberTwo ->save();

// echo "<pre>";
// print_r($oMember);
// echo "</pre>";


?>