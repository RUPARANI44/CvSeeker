<?php
	$con=mysqli_connect('localhost','root','','jobseeker');
	if(!$con){
		die("Connection error: ".mysqli_connect_error());
	}
	//echo "success";
?>