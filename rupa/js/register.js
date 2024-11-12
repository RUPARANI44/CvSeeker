function register_validation(){
	name=document.forms['regform'].name.value;
	if(name.length<1){
		document.getElementById('namemsg').innerHTML="Please enter your name";

	}
	else{
		document.getElementById('namemsg').innerHTML="";

	}

	dob=document.forms['regform'].dob.value;
	if(dob.length<1){
		document.getElementById('dobmsg').innerHTML="Please enter your date of birth";

	}
	else{
		document.getElementById('dobmsg').innerHTML="";

	}

	email= document.forms['regform'].email.value;
	if(email.length<1){
		//msgs+="Please enter an email.";
		document.getElementById("email").innerHTML="Please write your an email."/*msgs*/;
		return false;
	}
	else{
		document.getElementById("email").innerHTML="";
	}
	
	password= document.forms['regform'].password.value;
	if(password.length<8 || password.length>20 ){
		//msgs+="\npassword length must be at least 8 character long or maximum 20 character.";
		document.getElementById("passwordmsg").innerHTML="password length must be at least 8 character long or maximum 20 character.";
		return false;
	}
	
	else{
		document.getElementById("passwordmsg").innerHTML="";
	}
	
	 
	

	

	
}