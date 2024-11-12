<?php 
	include("header.php");

?><div class="container-fluid mt-5">
	<div class="row">
		<div class="col-lg-5 col-md-5"></div>
			<div class="col-lg-3 col-md-3">
				<h1 class=" m-5 pt-2 g-4 text-center bg-info text-white">Training info </h1>
			</div>
				<div class="col-lg-4 col-md-4">
			
		</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->

<!-- ===========add training form=========-->

<?php 
	if(isset($_POST['add_new'])){
?>


			<form action="" method="post" class="trainNew">

				<table>
					<tr><td>Title</td><td>:</td><td><input type="text" name="title"class="mb-2" placeholder="write title"></td></tr>
					<tr><td>Institution</td><td>:</td><td><input type="text"class="mb-2" name="institution" placeholder="Institute name"></td></tr>
					<tr><td>Duration</td><td>:</td><td><input type="number"class="mb-2" name="duration" placeholder="duration"></td></tr>
					<tr><td>Hour/day</td><td>:</td><td><input type="text"class="mb-2" name="hour"></td></tr>
					<tr><td>Starting day</td><td>:</td><td><input type="text"class="mb-2" name="starting" placeholder="Starting day"></td></tr>
					<tr><td>Ending day</td><td>:</td><td><input type="text"class="mb-2" name="ending" placeholder="ending day"></td></tr>
					<tr><td>Training details</td><td>:</td><td><input type="text"class="mb-2" name="details" placeholder="Training details">&nbsp;<input type="submit" class="btn btn-info" name="add_training" class="m-2" value="Add Training details"></td></tr>
					<tr><td></td></tr>
				</table>
			</form>
		
	
<!-- ===============/add Training form============-->

<?php
	}
	elseif(isset($_POST['add_training'])){
	$title=$_POST['title'];
	$ins=$_POST['institution'];
	$duration=$_POST['duration'];
	$hour=$_POST['hour'];
	$start=$_POST['starting'];
	$end=$_POST['ending'];
	$detalis=$_POST['details'];
	$pid=$_SESSION['pid'];
	
	
	/*============Duplicate check==========*/
		$check_sql = "SELECT * FROM training_info where pid=$pid and title='$title'";
		//echo $check_sql;
		$result=mysqli_query($con, $check_sql);
		if(mysqli_num_rows($result)>0){
		
		die("This title ".$title." already exists.Please go to training_info page and edit existing title...");
		
		}
		elseif ($title<1  ) {
		     die("Please fill up the title");
		           
		}
		elseif ($ins<1  ) {
		     die("Please fill up the institution");
		           
		}
		elseif ($duration<1  ) {
		     die("Please fill up the duration");
		           
		}
		elseif ($hour<1  ) {
		     die("Please fill up the hour box");
		           
		}
		elseif ($start<1  ) {
		     die("Please fill up the starting date");
		           
		}
		
		$sql = "INSERT INTO training_info(pid,title,institution,duration,hour_day,starting_day,ending_day,	training_detalis) Values( $pid, '$title','$ins','$duration','$hour','$start','$end','$detalis')";

		if(mysqli_query($con, $sql)){
			header("Location:training_info.php");
		}
		else{
			echo "Failed";
		}
	}
/*=============for edit=============*/

	elseif(isset($_POST['edit'])){
		//echo" Load edit form";
		$sql = "SELECT * FROM training_info WHERE trid=".$_POST['trid'];
		//echo $sql;
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
		}
		?>
		<form action="" method="post" >
			Title:<input type="text" name="title" value="<?php echo $row['title'] ?>"><br>
			Institution:<input type="text" name="institute" value="<?php echo $row['institution'] ?>"><br>
			duration:<input type="number" name="duration" value="<?php echo $row['duration'] ?>"><br>
			Hour/day:<input type="text" name="hour" value="<?php echo $row['hour_day'] ?>"><br>
			Starting day:<input type="text" name="starting" value="<?php echo $row['starting_day'] ?>"><br>
			Ending day:<input type="text" name="ending" value="<?php echo $row['ending_day'] ?>"><br>
			Training details:<input type="text" name="details" value="<?php echo $row['training_detalis'] ?>"><br>
			<input type="hidden" name="trid" value="<?php echo $_POST['trid']; ?>">
			<input type="submit" name="update" value="Update">
	</form>

<?php
	}
	elseif(isset($_POST['update'])){
	$title=$_POST['title'];
	$ins=$_POST['institute'];
	$duration=$_POST['duration'];
	$hour=$_POST['hour'];
	$start=$_POST['starting'];
	$end=$_POST['ending'];
	$detalis=$_POST['details'];
	$pid=$_SESSION['pid'];

	$sql = "UPDATE training_info set title='$title',institution='$ins',duration='$duration',hour_day='$hour',starting_day='$start',ending_day='$end',training_detalis='$detalis' WHERE trid=".$_POST['trid'];
	if(mysqli_query($con, $sql)){
			header("location:training_info.php");
		}
	}
	elseif(isset($_POST['delete'])){
		//echo" Load delete form";
		$sql = "DELETE FROM training_info WHERE trid=".$_POST['trid'];
		if(mysqli_query($con, $sql)){
			header("location:training_info.php");
		}
	}
	else{

?>

<!-- =======Training info=========== -->

<div class="container-fluid ">
	<div class="row m-3">
		<div class="col-lg-3 " id="vertical-line">
			<h3>If you want to add more information click here.</h3>
			<form action="" method="post">
				<input class=" btn btn-info btn-outline-success text-white" type="submit" name="add_new" value="Add New">
			</form>
		</div>
		<div class="col-lg-9 col-md-9">
	<table class="table table-border " border="1">
		<tr>
			<th>Title</th>						
			<th>institution</th>
			<th>Duration</th>
			<th>Hour/day</th>
			<th>Starting Day</th>
			<th> Ending Day </th>
			<th>Training Details</th>
			<th>Action</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM training_info WHERE pid=".$_SESSION['pid'];
			//echo $sql;
			$res= mysqli_query($con, $sql);
			if(mysqli_num_rows($res)>0){
				while($row=mysqli_fetch_assoc($res)){
			
				echo"<tr><td>".$row['title']."</td><td>".$row['institution']."</td><td>".$row['duration']."</td><td>".$row['hour_day']."</td><td>".$row['starting_day']."</td><td>".$row['ending_day']."</td><td>".$row['training_detalis']."</td><td>";
				?>
				<form action="" method="post">
					<input type="hidden" name="trid" value="<?php echo $row['trid']; ?>">
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
	<!--================= /end training============ -->
</div>
	</div>	
</div>
		


<?php 
	include("footer.php");

?>
