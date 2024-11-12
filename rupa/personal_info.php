<?php 
	include("header.php");

?>
<?php
	$sql = "SELECT * FROM personal_info WHERE pid='".$_SESSION['pid']."'";
	//echo $sql;
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		//echo $row['name'];
	}
	if(isset($_POST['update'])){
		//echo "update";

		$name = $_POST['name'];
		$father = $_POST['father'];
		$mother = $_POST['mother'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$bg = $_POST['blood_group'];
		$religion = $_POST['religion'];
		$description = $_POST['description'];

		$sql = "UPDATE personal_info set name='$name',father='$father', mother='$mother', date_of_birth='$dob',address='$address', blood_group='$bg', religion='$religion', description='$description' WHERE pid='".$_SESSION['pid']."'";
		//echo $sql;
		 if ($name<1 ) {
		         die("Please go to personal_info page and edit your name ");
		           
		  }
		  elseif($father<1 ) {
		  	die("Please go to personal_info page and edit your father name ");
		  }
		 
		  elseif($mother<1 ) {
		  	die("Please go to personal_info page and edit your mother name ");
		  }
		  elseif($dob<1 ) {
		  	die("Please go to personal_info page and edit your date of birth ");
		  }
		  elseif($address<1 ) {
		  	die("Please go to personal_info page and enter your address ");
		  }
		  elseif($bg<1 ) {
		  	die("Please go to personal_info page and edit your Blood Group ");
		  }
		   elseif($religion<1 ) {
		  	die("Please go to personal_info page and edit your religion ");
		  }
		  
		elseif(mysqli_query($con, $sql)){
			//echo "Updated successfully";
			header("location:personal_info.php");
		}
		
	}
	else if(isset($_POST['edit'])){
		//echo "Load form";
?>
<div class="container-fluid m-2 ">
	<div class="row mt-5">
		<div class="col-lg-5 col-md-5"></div>
			<div class="col-lg-3 col-md-3">
				<h1 class=" m-5 pt-3 g-4 text-center bg-info text-white">Personal info </h1>
			</div>
				<div class="col-lg-4 col-md-4">
			
		</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->
	
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-3"></div>
		<div class="col-lg-6 col-md-6">
		
			
			<form action="" method="post" >
			<table class="table table-border " border="1">
				<tr>
					<th>Name</th>
					<td>:</td>
					<td><input type="text" name="name" value="<?php echo $row['name']?>"></td>
					<div id="namemsg" class="text-danger"></div>
				</tr>
				<tr>
					<th>Father's Name</th>
					<td>:</td>
					<td><input type="text" name="father" value="<?php echo $row['father']?>"></td>
				</tr>
				<tr>
					<th>Mother's Name</th>
					<td>:</td>
					<td><input type="text" name="mother" value="<?php echo $row['mother']?>"></td>
				</tr>
				<tr>
					<th>Date of Birth</th>
					<td>:</td>
					<td><input type="date" name="dob" value="<?php echo $row['date_of_birth']?>"></td>
				</tr>
				<tr>
					<th>Address</th>
					<td>:</td>
					<td><input type="text" name="address" value="<?php echo $row['address']?>"></td>
				</tr>
				<tr>
					<th>Blood Group</th>
					<td>:</td>
					<td><input type="text" name="blood_group" value="<?php echo $row['blood_group']?>"></td>
				</tr>
				<tr>
					<th>Religion</th>
					<td>:</td>
					<td><input type="text" name="religion" value="<?php echo $row['religion']?>"></td>
				</tr>
				<tr>
					<th>description</th>
					<td>:</td>
					<td><textarea rows="5" cols="50" placeholder="Enter your text here..." type="description" name="description" value="<?php echo $row['description']?>"></textarea></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td colspan="3">
							<input type="submit" class="btn btn-info" name="update" value="Update "></input>
					</td>
				</tr>
				
				
			</table>
			</form>
		</div><div class="col-lg-3">
		</div><!-- /end col-lg-12  -->
	</div><!-- /end row  -->
</div><!-- /end container -->

<?php
	}
	else{
 ?>

<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-lg-5 col-md-5"></div>
				<div class="col-lg-3 col-md-3 ">
					<h1 class=" m-5 pt-2 g-4 text-center bg-info text-white">Personal info </h1>
				</div>
				<div class="col-lg-4 col-md-4">
				
			</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->

<div class="container-fluid personal ">
	<div class="row">
		
		<div class="col-lg-10 col-md-10 col-sm-4 text-center" >
			<table class="table" border="1">
				<tbody class="table1">
				<tr>
					<th>Name</th>
					<td>:</td>
					<td><?php echo $row['name']?></td>
				</tr>
				<tr>
					<th class="pl-5">&nbsp; &nbsp; Father's Name</th>
					<td>:</td>
					<td><?php echo $row['father']?></td>
				</tr>
				<tr>
					<th class="pl-5">&nbsp; &nbsp; Mother's Name</th>
					<td>:</td>
					<td><?php echo $row['mother']?></td>
				</tr>
				<tr>
					<th class="pl-5">&nbsp; Date of Birth</th>
					<td>:</td>
					<td><?php echo $row['date_of_birth']?></td>
				</tr>
				<tr>
					<th class="pl-3">Address</th>
					<td>:</td>
					<td><?php echo $row['address']?></td>
				</tr>
				<tr>
					<th class="pl-5">&nbsp;Blood Group</th>
					<td>:</td>
					<td><?php echo $row['blood_group']?></td>
				</tr>
				<tr>
					<th class="pl-3">Religion</th>
					<td>:</td>
					<td><?php echo $row['religion']?></td>
				</tr>
				<tr>
					<th>description</th>
					<td>:</td>
					<td><textarea rows="5" cols="50" placeholder="Enter your text here..."> <?php echo $row['description']?></textarea></td>
				</tr>
				
				<tr>
					<td colspan="3">
						<form action="" method="post">
							<input type="submit" class="btn btn-info" name="edit" value="Edit Personal Info"></input>
						</form>
					</td>
				</tr>
				
				</tbody>
			</table>
		</div><!-- /end col-lg-9  -->
	</div><!-- /end row  -->
</div><!-- /end container -->
<?php
	}
?>
<?php 
	include("footer.php");

?>