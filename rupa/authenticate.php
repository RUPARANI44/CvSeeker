<?php
	/* it always writes in the 1st line*/
	session_start();
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
	include("config.php");
	//echo "success";
	$email = $_POST['email'];
	$password = hash('md5',$_POST['password']);

	$sql ="SELECT * FROM user where email='$email' && password='$password'";

	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		$row =mysqli_fetch_assoc($result);
		if($row["account_activation_hash"] === null){
			//echo "login successfully".
		$_SESSION['pid']=$row['pid'];
		$_SESSION['trid']=$row['trid'];
		$_SESSION['email']= $email;
		header('Location: dashboard.php');
		}
		
	}
	else{
		$_SESSION['loginerror']= "Email or password is not matched";
		header('Location: login.php');
	}

}
?>