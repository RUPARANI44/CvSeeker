<?php
/* it always writes in the 1st line*/
	session_start();
	if(isset($_SESSION['email'])){
		unset($_SESSION['email']);
	}
/*
	include("config.php");
	if(isset($_POST['register'])){
		echo 'code to add record';

		$name =$_POST['name'];
		$dob =$_POST['dob'];
		$email =trim($_POST['email']);
		$password =hash('md5',$_POST['password']);
		$creation_date=date("Y-m-d");
		
		$sql1 ="INSERT INTO user(email, password,creation_date ) VALUES('$email','$password','$creation_date')";
		$sql2 ="INSERT INTO personal_info(name,date_of_birth) VALUES('$name','$dob')";

		//echo $sql;
		
			if(mysqli_query($con, $sql1)){
				$id= mysqli_insert_id($con);

				if( mysqli_query($con, $sql2)){
				$pid =  mysqli_insert_id($con);
				$sql3= "UPDATE user set pid='$pid' where id='$id'";
					if(mysqli_query($con, $sql3)){
					//echo $sql3;
						header("location:login.php");
					}
				}	
			}

			/*	if(mysqli_query($con, $sql1) && ( mysqli_query($con, $sql2))){
				*/
				//echo ("New record added successfully..");
				//header("location:login.php");}
			
			/*else{
				echo "Registration failed:".$sql."<br>".mysqli_error($con);
			}
			
		mysqli_close($con);
	}

		else{*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6 col-md-6" >
				<form action="register_validation.php" method="post" name="regform" align="center" class="form-group register-form " onsubmit="return register_validation()">
						<div>Registration Form</div>
						<!-- register verification -->
						<div  class="text-danger"><?php
							if(isset($_SESSION['regerror'])){
								echo $_SESSION['regerror'];

								unset($_SESSION['regerror']);
						}?></div>

						User Name: <input type="text" name="name" class="form-control" placeholder="write your Name"><br>
						<div id="namemsg" class="text-danger"></div>
						Date of Birth: <input type="date" name="dob" class="form-control" placeholder="write your Name"><br>
						<div id="dobmsg"  class="text-danger"></div>
						Email:<input type="email" name="email" class="form-control" placeholder="write your Email"><br>
						<div id="email" class="text-danger"></div>
						Password<input type="password" name="password" class="form-control" placeholder="write your password"><br>
						<div id="passwordmsg" class="text-danger"></div>
						Confirm Password<input type="password" name="confirm_password" class="form-control" placeholder="Retype password"><br>
						
						<input type="submit" name="register" class="form-control bg-primary" value="Register"><br>
				</form>
				<div class="col-lg-3"></div>
			</div><!-- /end col-md-12 -->
		</div><!-- /end row -->
	</div><!-- /end container -->

<script type="text/javascript" src="js/register.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>

	
<?php
	/*}*/
?>




