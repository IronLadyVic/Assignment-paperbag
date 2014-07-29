<?php

class Form{

	private $sHTML;
	private $aData;
	private $aFiles;
	private $aErrors;

	public function __construct(){
		$this->sHTML = '<form action="" method="post" onsubmit="return checkAllFields()" id="form" enctype="multipart/form-data">';
		$this->aData = array();
		$this->aFiles = array();
		$this->aErrors = array();
	}
	public function makeTextInput($sLabelText, $sControlName, $sClassName=""){
		$sData ="";
		if(isset($this->aData[$sControlName])){
			$sData = $this->aData[$sControlName];
		}
		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sData = $this->aErrors[$sControlName];
		}

		$this->sHTML .='<label for="'.$sControlName.'">'.$sLabelText.'</label>';
		$this->sHTML .='<input type="text" name="'.$sControlName.'" class="'.$sClassName.'" placeholder="*" id="'.$sControlName.'" value="'.$sData.'" onblur="checkInput(this.id)" onkeyup="checkPasswordMatch(); return true;">';
		$this->sHTML .='<span id="'.$sControlName.'Message">'.$sError.'</span>';
		// $this->sHTML .='<span id="usernameMessage">'.$sError.'</span>';

	}
	public function makeTextDropDown($sLabelText, $sControlName){
		$sData ="";
		if(isset($this->aData[$sControlName])){
			$sData = $this->aData[$sControlName];
		}
		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sData = $this->aErrors[$sControlName];
		}
		$this->sHTML .='<label for="'.$sControlName.'">'.$sLabelText.'</label>';

		$this->sHTML .='<select name="'.$sControlName.'" id="'.$sControlName.'" onblur="checkInput(this.id)">
			<option value="'.$sData.'">*</option>
			<option value="'.$sData.'">jacket</option>
			<option value="'.$sData.'">top</option>
			<option value="'.$sData.'">tee</option>
			<option value="'.$sData.'">pants</option>
			<option value="'.$sData.'">shorts</option>
			<option value="'.$sData.'">knitwear</option>
			<option value="'.$sData.'">dress</option>
			<option value="'.$sData.'">skirt</option>
			</select> ';
		$this->sHTML .='<span>'.$sError.'</span>';
	}

	 public function makePasswordInput($sLabelText, $sControlName){
		$sData ="";
		if(isset($this->aData[$sControlName])){
			$sData = $this->aData[$sControlName];
		}
		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sData = $this->aErrors[$sControlName];
		}

		$this->sHTML .='<label for="'.$sControlName.'">'.$sLabelText.'</label>';
		$this->sHTML .='<input type="password" name="'.$sControlName.'" placeholder="*" id="'.$sControlName.'" value="'.$sData.'" onblur="checkInput(this.id)" onkeyup="checkPasswordMatch(); return true;">';
		$this->sHTML .='<span id="'.$sControlName.'Message">'.$sError.'</span>';
		

	}
 public function makeUpLoadBox($sLabelText, $sControlName){
	$sError = "";

	if(isset($this->aErrors[$sControlName])){
		$sError = $this->aErrors[$sControlName];
	}
	$this->sHTML .='<div id="upload-photo">';
	$this->sHTML.='<label for="'.$sControlName.'">'.$sLabelText.'</label>';
	$this->sHTML.='<input type="file" name="'.$sControlName.'" placeholder="*" id="'.$sControlName.'" onblur="checkInput(this.id)">';
	$this->sHTML .='<span id="'.$sControlName.'Message">'.$sError.'</span>';
	$this->sHTML .='</div>';
}

 public function makeHiddenField($sControlName, $sValue){
	// $this->sHTML .='<div id="upload-photo">';
	$this->sHTML .='<input type="hidden" name="'.$sControlName.'" value="'.$sValue.'" />';			
	// $this->sHTML .='</div>';
	
}


 public function makeSubmit($sLabelText, $sControlName){
	$this->sHTML .='<input id="send" type="'.$sControlName.'" name="'.$sControlName.'" value="'.$sLabelText.'">';
}



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

  public function checkUpload($sControlName, $sMimeType, $iSize){
 	$sErrorMessage = '';

 	if(empty($this->aFiles[$sControlName]['name'])){
 		$sErrorMessage = "No files specified";
 	}elseif($this->aFiles[$sControlName]['error'] != UPLOAD_ERR_OK){
 		$sErrorMessage = "File cannot be uploaded";
 	}elseif($this->aFiles[$sControlName]['type'] != $sMimeType){
 		$sErrorMessage = "Only".$sMimeType."format can be uploaded";
 	}elseif($this->aFiles[$sControlName]['size'] != $iSize){
 		$sErrorMessage = "Files cannot exceed".$iSize."bytes in size";
 	}
 	if($sErrorMessage != ""){
 		$this->aErrors[$sControlName] = $sErrorMessage;
 	}

 }

  public function raiseError($sControlName, $sErrorMessage){
 	$this->aErrors[$sControlName] = $sErrorMessage;
 }

  public function moveFile($sControlName, $sNewFileName){
 		$newname = dirname(__FILE__).'paperbagboutique/assets/img'.$sNewFileName;
		
		move_uploaded_file($this->aFiles[$sControlName]['tmp_name'],$newname);
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
 		break;	
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