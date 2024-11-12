<?php 
	include("header.php");

?>
<div class="container-fluid grad1">
	<div class="row">
		<div class="col-lg-5 col-md-5"></div>
			<div class="col-lg-3 col-md-3">
				<h1 class="m-5 pt-3 g-4 text-center bg-info text-white">Experience  </h1>
			</div>
				<div class="col-lg-4 col-md-4">
			
		</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->

<!-- add experience -->

<?php 
	if(isset($_POST['add_new'])){

?>
	<form action="" method="post">
		Job title:<input type="text" class="mb-2" name="title" placeholder="write title"><br>
			Organization:<input type="text" class="mb-2" name="organization" placeholder=""><br>
			Starting day:<input type="text" class="mb-2" name="starting" placeholder="Starting day"><br>
			Ending day:<input type="text" class="mb-2" name="ending" placeholder="Starting day"><br>
			Responsibility:<input type="text" class="mb-2" name="responsibility" placeholder="Responsibilities"><br>
			<input type="submit" class="btn btn-info mb-2" name="add_experience" value="Add Experience details">
	</form>
<!-- ==========/add experience==========-->

<?php
	}
	elseif(isset($_POST['add_experience'])){
	$title=$_POST['title'];
	$org=$_POST['organization'];
	$start=$_POST['starting'];
	$end=$_POST['ending'];
	$res=$_POST['responsibility'];
	$pid=$_SESSION['pid'];


	/*============Duplicate check==========*/
		$check_sql = "SELECT * FROM experience where pid=$pid and jobtitle='$title'";
		//echo $check_sql;
		$result=mysqli_query($con, $check_sql);
		if(mysqli_num_rows($result)>0){
		
		die("This title ".$title." already exists.Please Change it...");
	
		}
		elseif ($title<1  ) {
		     die("Please fill up the title");
		           
		}
		elseif ($org<1  ) {
		     die("Please fill up organization name");
		           
		}
		elseif ($start<1  ) {
		     die("Please fill up the starting date");
		           
		}

		$sql = "INSERT INTO experience(pid,jobtitle,organization,start_date,end_date,responsibility) Values($pid,'$title','$org','$start','$end','$res')";
			echo $sql;
		if(mysqli_query($con, $sql)){
			header("Location:experience.php");
		}
		else{
			echo "Failed";
		}
	}
/*=============for edit=============*/
	
	elseif(isset($_POST['edit'])){
		//echo" Load edit form";
		$sql = "SELECT * FROM experience WHERE exid=".$_POST['exid'];
		//echo $sql;
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
		}
		?>
		<form action="" method="post">
		Job Title:<input type="text" name="title" value="<?php echo $row['jobtitle'] ?>"><br>
			Organization:<input type="text" name="organization" value="<?php echo $row['organization'] ?>"><br>
			Starting day:<input type="text" name="starting" value="<?php echo $row['start_date'] ?>"><br>
			Ending day:<input type="text" name="ending" value="<?php echo $row['end_date'] ?>"><br>
			Responsibility:<input type="text" name="responsibility" value="<?php echo $row['responsibility'] ?>" ><br>
			<input type="hidden" name="exid" value="<?php echo $_POST['exid']; ?>">
			<input type="submit" name="update" value="Update">
	</form>


<?php
	}
	elseif(isset($_POST['update'])){
	$title=$_POST['title'];
	$org=$_POST['organization'];
	$start=$_POST['starting'];
	$end=$_POST['ending'];
	$res=$_POST['responsibility'];
	$pid=$_SESSION['pid'];

	$sql = "UPDATE experience set jobtitle='$title',organization='$org',start_date='$start',end_date='$end',responsibility='$res' WHERE exid=".$_POST['exid'];
	if(mysqli_query($con, $sql)){
			header("location:experience.php");
		}
	}
	elseif(isset($_POST['delete'])){
		//echo" Load delete form";
		$sql = "DELETE FROM experience WHERE exid=".$_POST['exid'];
		if(mysqli_query($con, $sql)){
			header("location:experience.php");
		}
	}
	else{

?>

<!-- =======Experience info -->

<div class="container-fluid grad2">
	<div class="row m-3">
		<div class="col-lg-3  col-md-3 col-sm-3 col-xs-2" id="vertical-line">
			<h3 >If you want to add more information click here.</h3>
			<form  action="" method="post">
				<input class=" btn btn-info btn-outline-success text-white" type="submit" name="add_new" value="Add New">
			</form>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 grad">
	<table class="table table-border" border="1">
		<tr>
			<th>Job Title</th>	
			<th>Organization</th>
			<th>Starting Date</th>
			<th> Ending Date</th>
			<th>Responsibility</th>
			<th>Action</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM experience WHERE pid=".$_SESSION['pid'];
			//echo $sql;
			$result= mysqli_query($con, $sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
					echo"<tr><td>".$row['jobtitle']."</td><td>".$row['organization']."</td><td>".$row['start_date']."</td><td>".$row['end_date']."</td><td>".$row['responsibility']."</td><td>";
				?>
				<form action="" method="post">
					<input type="hidden" name="exid" value="<?php echo $row['exid']; ?>">
					<input type="submit" class="btn btn-primary" name="edit" value="Edit">
					<input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete??') " name="delete" value="Delete">
				</form>
				<?php
				echo "</td></tr>";				
				}
			}
		?>
	
	</table>

<?php
	 }
?>
	<!-- =============/end experience========== -->
</div>
	</div>	
</div>


<?php 
	include("footer.php");

?>

			
