function login_validattion(){
	email= document.forms['loginform'].email.value;
	msgs = "";
	if(email.length<1){
		//msgs+="Please enter an email.";
		document.getElementById("msg1").innerHTML="Please enter an email."/*msgs*/;
		return false;
	}
	else{
		document.getElementById("msg1").innerHTML="";
	}
	password= document.forms['loginform'].password.value;
	if(password.length<8 || password.length>20){
		//msgs+="\npassword length must be at least 8 character long or maximum 20 character.";
		document.getElementById("msg2").innerHTML="password length must be at least 8 character long or maximum 20 character.";
		return false;
	}
	else{
		document.getElementById("msg2").innerHTML="";
	}
	
	
	//document.getElementById("x").value=msgs;
	return true;
}
