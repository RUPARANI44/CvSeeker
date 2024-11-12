<?php
	/* it always writes in the 1st line*/
	session_start();

	include("config.php");
	//echo "success";
	$email = $_POST['email'];
	$password = hash('md5',$_POST['password']);

	$sql ="SELECT * FROM user where email='$email' && password='$password'";

	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		
		$_SESSION['email']= $email;
		header('Location: dashboard.php');
	}
	else{
		$_SESSION['loginerror']= "Email or password is not matched";
		header('Location: login.php');
	}
?>