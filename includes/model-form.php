<?php

class Form{

	private $sHTML;
	private $aData;
	private $aFiles;
	private $aErrors;

	public function __construct(){
		$this->sHTML = '<form action="success-created-account.php" method="post" onsubmit="return checkAllFields()">';
		$this->aData = array();
		$this->aFiles = array();
		$this->aErrors = array();
	}
	public function makeTextInput($sLabelText, $sControlName){
		$sData ="";
		if(isset($this->aData[$sControlName])){
			$sData = $this->aData[$sControlName];
		}
		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sData = $this->aErrors[$sControlName];
		}

		$this->sHTML .='<label for="'.$sControlName.'">'.$sLabelText.'</label>';
		$this->sHTML .='<input type="text" name="'.$sControlName.'" placeholder="*" id="'.$sControlName.'" value="'.$sData.'" onblur="checkInput(this.id)">';
		$this->sHTML .='<span id="usernameMessage">'.$sError.'</span>';

	}

public function makeUpLoadBox($sLabelText, $sControlName){
	$sError = "";

	if(isset($this->aErrors[$sControlName])){
		$sError = $this->aErrors[$sControlName];
	}
	$sHTML.='<label for="'.$sControlName.'">'.$sLabelText.'</label>';
	$sHTML.='<input type="text" name="'.$sControlName.'" placeholder="*" id="'.$sControlName.'" onblur="checkInput(this.id)">';
		$this->sHTML .='<span id="usernameMessage">'.$sError.'</span>'; //do i take the id out for styling the error message?
}

public function makeSubmit($sLabelText, $sControlName){
	$this->sHTML .='<input id="send" type="'.$sControlName.'" name="'.$sControlName.'" value="'.$sLabelText.'">';
}
//do i take the id out - even though this designs the make submit button? all buttons are different.


 public function checkRequired($sControlName){
 	$sData = "";
 	if(isset($this->aData[$sControlName])){
 		$sData =$this->aData[$sControlName];
 	}if($sData == ""){
 		$this->aErrors[$sControlName] = "Submission Required";	

 	}

 }

 public function checkMatching($sControlName1, $sControlName2){
 	$sData1 = "";
 	if(isset($this->aData[$sControlName1])){
 		$sData1 =$this->aData[$sControlName1];
 	}
 	$sData2="";
 	if(isset($this->aData[$sControlName2])){
 		$sData2 =$this->aData[$sControlName2];
 	}
 	if($sData1 != $sData2){
 		$this->aErrors[$sControlName2] = "Input does not match!";
 	}
 }

 public function raiseError($sControlName, $sErrorMessage){
 	$this->aErrors[$sControlName] = $sErrorMessage;
 }

 public function __get($var){
 	switch ($var) {
 		case "html":
 		return $this->sHTML .'</form>';
 		break;
 		case "isValid":
 		if(count($this->aErrors)==0){
 			return true;
 		}else{
 			return false;
 		}
 		break;
 		default:
 		die($var."Does not exsist in form");
 	}
 }

 public function __set($var, $value){
 	switch ($var) {
    case 'data':
        return $this->aData = $value;
        break;
    case 'files':
        return $this->aFiles = $value;
        break;
    default:
      die($var."Can not be set in form");
}
 }

}





?>