<?php
	/* it always writes in the 1st line*/
	session_start();
	include("config.php");
	//echo "success";
	$name =$_POST['name'];
	$dob =$_POST['dob'];
	$email =trim($_POST['email']);
	$password =hash('md5',$_POST['password']);
	$confirm_password=hash('md5',$_POST['confirm_password']);
	$creation_date=date("Y-m-d");

		
	$token = $_GET["token"];

	$token_hash = hash("sha256", $token);

	
	$sql1 ="INSERT INTO user(email, password,creation_date,reset_token_hash_t ) VALUES('$email','$password','$creation_date','$token_hash')";
	$sql2 ="INSERT INTO personal_info(name,date_of_birth) VALUES('$name','$dob')";

			$email_check = "SELECT * FROM user WHERE email='$email' LIMIT 1";
		    $result1 = mysqli_query($con,$email_check);
		   
			$user=mysqli_fetch_assoc($result1);
			  /*============ checking duplicate email============*/
		        if ($user['email'] === $email ) {
		            $_SESSION['regerror']="Email already exists";
		            header('Location: register.php');
		           
		        }
		        /*============ checking password and confirm password============*/
		        elseif ($password !== $confirm_password) {
		        	$_SESSION['regerror']="Passwords and confirm_password do not match.";
		        	 header('Location: register.php');
		    	}
				elseif(mysqli_query($con, $sql1)){
							$id= mysqli_insert_id($con);

							if( mysqli_query($con, $sql2)){
							$pid =  mysqli_insert_id($con);
							$sql3= "UPDATE user set pid='$pid' where id='$id'";
							
						
							if(mysqli_query($con, $sql3)){
							//echo $sql3;
								header("location:login.php");
							}
				}	
	/* ======Email checking=====*/


	 
       
        elseif(mysqli_query($con, $sql1)&&mysqli_query($con, $sql2)){
        	header("location:login.php");
        }
        mysqli_close($con);
}
        
	
	/*else if (mysqli_num_rows(mysqli_query($con,$sql) && mysqli_query($con,$sql4))>0) {
	 	header('Location: login.php');
    }*/

	
	
?>
