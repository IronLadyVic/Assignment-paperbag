//Form Validation

function checkField(sInputId){

	var bValid = false;

	var oField = document.getElementById(sInputId);

	var sDataValue = oField.value;

	var oErrorMessage = document.getElementById(sInputId + "Message");

	if(sDataValue.length == 0){
		oErrorMessage.innerHTML = "submission required";
		oErrorMessage.className = "form-error";

	}else{
		oErrorMessage.innerHTML = "";
		oErrorMessage.className = "";
		bValid = true;
	}

	return bValid;

}

function checkInput(sNameId){

	var bValid = false;

	var bFilled = checkField(sNameId);
	if(bFilled == true){
	var oField = document.getElementById(sNameId);
	var sDataValue = oField.value;
	var oErrorMessage = document.getElementById(sNameId + "Message");
	
	var oRegExp = new RegExp("[a-zA-Z]");


	if(oRegExp.test(sDataValue) == false){
		
		oErrorMessage.innerHTML = "";
		oErrorMessage.className = "form-error";
		bValid = true;

	}else{
		oErrorMessage.innerHTML = "";
		oErrorMessage.className = "";
		
		
	}

	
}
return bValid;
}

//onkey event used for Username

// function colorField(sFieldId){

// 	var oField = document.getElementById(sFieldId);

// 	var sDataValue = oField.value;

// 	var oUsername = document.getElementById('username');
// 	var oFirstName = document.getElementById('firstName');
// 	var oLastName = document.getElementById('lastName');
// 	var oMobile = document.getElementById('mobile');
// 	var oEmail = document.getElementById('email');
// 	var oAddress = document.getElementById('address');
// 	var oCity = document.getElementById('city');
// 	var oPostCode = document.getElementById('postcode');

// 	var oValid = "#B4E0E0";
// 	var oInvalid = "#FF6666";

// 	var oMessage = document.getElementById('confirmMessage');

// 	var oRegExp = new RegExp("[a-zA-Z]");

// 	if(oRegExp.test(sDataValue) == false){
// 		//bad
// 		oUsername.style.backgroundColor = oInvalid;
// 		oMessage.style.color = oInvalid;
// 		oMessage.innerHTML = "username must be alphabetic";
		

// 	}else{
// 		//good
// 		oUsername.style.backgroundColor = oValid;
// 		oMessage.style.color = oValid;
// 		oMessage.innerHTML = "";
// 	}


// }


function checkPasswordMatch(){

	var pass1 = document.getElementById('pass1');
	var pass2 = document.getElementById('pass2');

	var oMessage = document.getElementById('confirmMessage');

	var oValid = "#B4E0E0";
	var oInValid = "#FF6666";

	if(pass1.value == pass2.value){
		pass1.style.backgroundColor = oValid;
		pass2.style.backgroundColor = oValid;
		oMessage.style.color = oValid;
		oMessage.innerHTML = "";
		

	}else{
		pass2.style.backgroundColor = oInValid;
		oMessage.style.color = oInValid;
		oMessage.innerHTML = "passwords do not match!";
		oMessage.className = "form-error";
	}
}

function checkEmail(sEmailInputId){

	var bValid = false;

	var bFilled = checkField(sEmailInputId);

	if(bFilled == true){

	var oEmailField = document.getElementById(sEmailInputId);

	var sDataValue = oEmailField.value;

	var oErrorMessage = document.getElementById(sEmailInputId + "Message");

	var oRegExp = new RegExp("^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$");

	if(oRegExp.test(sDataValue) == false){
		oErrorMessage.innerHTML = "invalid email address";
		oErrorMessage.className = "form-error";
		bValid = true;
	}else{
		oErrorMessage.innerHTML = "";
		oErrorMessage.className = "";
	}


}
return bValid;
}

function checkNumeric(sNumberInputId){
	var bValid = false;

	var bFilled = checkField(sNumberInputId);

	if(bFilled == true){

	var oPostField = document.getElementById(sNumberInputId);

	var sDataValue = oPostField.value;

	var oErrorMessage = document.getElementById(sNumberInputId + "Message");

	var oRegExp = new RegExp("^(0|[1-9][0-9]*|[1-9][0-9]{0,2}(,[0-9]{3,3})*)$");

	if(oRegExp.test(sDataValue) == false){
		oErrorMessage.innerHTML = "must be numeric input";
		oErrorMessage.className = "form-error";
		bValid = true;
	}else{
		oErrorMessage.innerHTML = "";
		oErrorMessage.className = "";
	}


}
return bValid;
}

function checkAllFields(){

	var bValidUsername = checkUsername('username');
	var bValidPassOne = checkPassword('pass1');
	var bValidPassTwo = checkConfirmPassword('pass2');
	var bValidFirstName = checkUsername('firstName');
	var bValidLastName = checkUsername('lastName');
	var bValidMobile = checkUsername('mobile');
	var bValidEmail = checkUsername('email');
	var bValidAddress = checkUsername('address');
	var bValidCity = checkUsername('city');
	var bValidPostCode = checkUsername('postcode');

	//edit my item validation check
	var bValidItemName = checkItemName('item-name');
	var bValidDescription = checkDescription('description');
	var bValidSize = checkSize('size');
	var bValidLabels = checkLabels('labels');
	var bValidPrice = checkPrice('price');

	var bValid = bValidUsername && bValidPassOne && bValidPassTwo && bValidFirstName && bValidLastName && bValidMobile && bValidEmail && bValidAddress && bValidCity && bValidPostCode;

	return bValid;

}

//onclick event - shop online and collections

function showItem(iItemIndex){
	var oOverlay = document.getElementById('overlay');
	oOverlay.className = 'show';

	var oItem = document.getElementById('viewItem');
	var oDiv = oItem.children[iItemIndex];
	var oImg = oDiv.children[0];
	oImg.className = 'show';

}

function hideItem(){
	var oOverlay = document.getElementById('overlay');
	oOverlay.className = '';
	var oItemImage = document.getElementById('viewItem');
	for(var i=0; i<oItemImage.children.length; i++){
		var oDiv = oItemImage.children[i];
		var oImg = oDiv.children[0];

		oImg.className = "";
	}
}
























