<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

include("config.php");

$sql = "SELECT * FROM user
        WHERE reset_token_hash_t = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at_t"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">

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
        .col-lg-4.col-md-4.bg-white.pt-5.h-100.bgimg.m-5 {
            background-image: url('img/picture4.png'); /* Path to your image */
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-6  m-1" >
            <form method="post" action="process-reset-password.php" class="form-group  register-form ">
             <div class="text-info mt-2 "><h3 class="pt-5 text-center">Reset Password</h3><hr></div>

    

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

       <h6 class="text-center"> New password:</h3><input type="password" id="password" name="password" class="form-control" placeholder="write your password"><br>
        

        <h6 class="text-center">Confirm password</h6><input type="password" id="password_confirmation" class="form-control" placeholder="Retype password" name="password_confirmation"><br>
                        
        <button class="btn btn-info">Submit</button>
    </form>
    <div class="col-lg-3"></div>
            </div><!-- /end col-md-12 -->
        </div><!-- /end row -->
    </div><!-- /end container -->

</body>
</html>