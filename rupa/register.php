<?php
/* it always writes in the 1st line*/
	session_start();
	if(isset($_SESSION['email'])){
		unset($_SESSION['email']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<style>
		body {
            background-image: url('img/image.png'); /* Path to your image */
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }
        .account{
        	float: right;
        	font-family:Arial, sans-serif;
        	font-size: 20px;
        }
        img {
		    width: 60px;
		    border-radius: 40px;
		    margin: 20px;
		}
	</style>
</head>
<body>

	<div ><img src="img/image1.jpeg" ><a href="login.php" class="mt-2 mx-4 btn btn-danger bg-danger account text-light ">Login Here</a><h4 class="text-white mt-3 account">Already Have an account?</h4></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6 col-md-6 col-sm-6  m-1" >
				<form action="register_validation.php" method="post" name="regform" align="center" class="form-group  register-form " onsubmit="return register_validation()">
						<div class="text-info mt-2 "><h3 class="pt-5">Registration Form</h3><hr></div>

						<!-- ===============register verification================ -->
						<div  class="text-danger"><?php
							if(isset($_SESSION['regerror'])){
								echo $_SESSION['regerror'];

								unset($_SESSION['regerror']);
						}?></div>

						User Name: <input type="text" name="name" class="form-control" placeholder="write your Name">
						<div id="namemsg" class="text-danger"></div>
						Date of Birth: <input type="date" name="dob" class="form-control" placeholder="write your Name">
						<div id="dobmsg"  class="text-danger"></div>
						Email:<input type="email" name="email" class="form-control" placeholder="write your Email">
						<div id="email" class="text-danger"></div>
						Password<input type="password" name="password" class="form-control" placeholder="write your password">
						<div id="passwordmsg" class="text-danger"></div>
						Confirm Password<input type="password" name="confirm_password" class="form-control" placeholder="Retype password"><br>
						
						<input type="submit" name="register" class="form-control mt-3 bg-info text-light" value="Register">
						
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




