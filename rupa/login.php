<?php
	/* it always writes in the 1st line*/
	session_start();
	if(isset($_SESSION['email'])){
		header('Location: dashboard.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
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
        img {
		    width: 60px;
		    border-radius: 40px;
		    margin: 20px;
		}
	</style>
</head>
<body>
	<div ><img src="img/image1.jpeg" >
	<div class="container-fluid ">
		<div class="row">
			<div class="col-lg-4"></div>
				<div class="col-lg-4 col-md-4 bg-info login-form h-50 m-5" >

					
					<form action="authenticate.php" method="post" name="loginform" class="form-group  " onsubmit="return login_validattion()">
						<div class="text-center  m-2"><h3>Login Form</h3><hr></div>

						<!-- login verification -->
						<div class="text-danger bg-light"><?php
							if(isset($_SESSION['loginerror'])){
								echo $_SESSION['loginerror'];

								unset($_SESSION['loginerror']);
						}
								  
								?></div>
						Email:<input type="email" name="email"  class="form-control" id="x" placeholder="write your Email"  value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"><br>
						<div id="msg1" class="text-danger bg-light"></div>
						Password<input type="password" class="form-control center"  name="password" placeholder="write your password"><br>
						<div id="msg2" class="bg-light text-danger"></div><br>
						<input type="submit" class="form-control bg-primary text-dark" name="submit" value="Login"><br>
						Forgot Password? <a href="forget-password.php" class="text-dark btn btn-light">Click here</a><br>
						Not Yet Registered? <a href="register.php" class="text-dark m-2 p-2 btn btn-light">Register Here</a>
					</form>
				<div class="col-lg-4"></div>
			</div><!-- /end col-md-12 -->
		</div><!-- /end row -->
	</div><!-- /end container -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
