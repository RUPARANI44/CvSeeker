<?php 
	include("header.php");

?>
<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-lg-5 col-md-5"></div>
				<div class="col-lg-3 col-md-3">
					<h1 class="m-5 pt-2 g-4 text-center bg-info text-white">Skills </h1>
				</div>
				<div class="col-lg-4 col-md-4">
				
			</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->

<!-- add skills -->

<?php 
	if(isset($_POST['add_new'])){

?>
	<form action="" method="post" class="text-center m-2">
			Skill title:<input type="text" name="title" placeholder="write title"><br>
			Skill Description:<input type="text" class="m-2" name="description" placeholder=""><br>
			<input type="submit" class="btn btn-info m-2" name="add_skills" value="Add skills details">
	</form>
<!-- ==========/add skills==========-->

<?php
	}
	elseif(isset($_POST['add_skills'])){
	$title=$_POST['title'];
	$des=$_POST['description'];
	$pid=$_SESSION['pid'];

	/*============Duplicate check==========*/
		$check_sql = "SELECT * FROM skills where pid=$pid and skills_title='$title'";
		//echo $check_sql;
		$result=mysqli_query($con, $check_sql);
		
   
		if(mysqli_num_rows($result)>0){
		
		die("This skills title ".$title." already exists.Please Change it...");
	
		}
		elseif ($title<1) {
		       die("Please ensure that the skills title section is not left empty. Kindly fill it out.");
		}
		$sql = "INSERT INTO skills(pid,skills_title	,skills_description) Values( $pid, '$title','$des')";

		if(mysqli_query($con, $sql)){
			header("Location:skills.php");
		}
		else{
			echo "Failed";
		}
	}
/*=============for edit=============*/
	
	elseif(isset($_POST['edit'])){
		//echo" Load edit form";
		$sql = "SELECT * FROM skills WHERE skid=".$_POST['skid'];
		//echo $sql;
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
		}
		?>
		<form action="" method="post" class="form-group text-center m-2 editForm">
			
		Skills Title:<input type="text" class="" name="title" value="<?php echo $row['skills_title'] ?>"><br>
			Skills Description:<input type="text" class="m-2" name="description" value="<?php echo $row['skills_description'] ?>" ><br>
			<input type="hidden"  name="skid" value="<?php echo $_POST['skid']; ?>">
			<input type="submit" class="btn btn-info " class="m-2" name="update" value="Update">
	</form>


<?php
	}
	elseif(isset($_POST['update'])){
	$title=$_POST['title'];
	$des=$_POST['description'];
	$pid=$_SESSION['pid'];

	$sql = "UPDATE skills set skills_title='$title',skills_description='$des' WHERE skid=".$_POST['skid'];
	if ($title<1) {
		        	die("Please ensure that the skills title section is not left empty. Kindly fill it out.");

	}
   
	elseif(mysqli_query($con, $sql)){
			header("location:skills.php");
		}
	}
	elseif(isset($_POST['delete'])){
		//echo" Load delete form";
		$sql = "DELETE FROM skills WHERE skid=".$_POST['skid'];
		if(mysqli_query($con, $sql)){
			header("location:skills.php");
		}
	}
	else{

?>

<!-- =======skills info======= -->
<div class="container-fluid ">
	<div class="row m-3">
		<div class="col-lg-3 " id="vertical-line">
			<h3>If you want to add more information click here.</h3>
			<form action="" method="post">
				<input class=" btn btn-info btn-outline-success text-white" type="submit" name="add_new" value="Add New">
			</form>
		</div>
		<div class="col-lg-9 col-md-9">
			<table class="table table-border" border="1">
		<tr>
			<th>Skills Title</th>	
			<th>Skills Description</th>
			<th>Action</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM skills WHERE pid=".$_SESSION['pid'];
			//echo $sql;
			$result= mysqli_query($con, $sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
					echo"<tr><td>".$row['skills_title']."</td><td>".$row['skills_description']."</td><td>";
				?>
				<form action="" method="post">
					<input type="hidden" name="skid" value="<?php echo $row['skid']; ?>">
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
	<!-- =============/end skills========== -->
		</div>
	</div>	
</div>
	

	



<?php 
	include("footer.php");

?>

			
