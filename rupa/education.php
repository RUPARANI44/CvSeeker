<?php 
	include("header.php");

?>
<div class="container-fluid mt-5 grad1">
	<div class="row">
		<div class="col-lg-5 col-md-5"></div>
			<div class="col-lg-3 col-md-3">
				<h1 class="m-5 pt-3 gt-4 text-center bg-info text-white">Education info </h1>
			</div>
				<div class="col-lg-4 col-md-4">
			
		</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->

<!-- add Education form-->
<?php 
	if(isset($_POST['add_new'])){
?>
	<form action="" method="post">
		Exam Level:<select name="exam_sequence">
			<option value="1">SSC /Equivalent</option>
			<option value="2">HSC /Equivalent</option>
			<option value="3"> Diplomas/Equivalent</option>
			<option value="4">BA/Hon's /Equivalent</option>
			<option value="5">Post Graduate Diplomas</option>
			<option value="6">MA /Equivalent</option>
			<option value="7">PhD /Equivalent</option>
			</select><br>
			<div id="msg1" class="text-danger"></div>
			Exam Name:<input type="text" name="exam" placeholder="Exam Name"><br>
			Subject/Group:<input type="text" name="subject" placeholder="Subject /Group name"><br>
			Passing Year:<input type="number" name="passing_year" placeholder="Passing_year">[4 digit year]<br>
			GPA/Class:<input type="text" name="gpa" placeholder="GPA/Class"><br>
			Institute:<input type="text" name="institute" placeholder="Institute Name"><br>
			Board/University:<input type="text" name="board" placeholder="Board or University Name"><br>
			<input type="submit" class="btn btn-info" name="add_education" value="Add Education">
	</form>


<!-- /add Education form-->
<?php	
	}
	elseif(isset($_POST['add_education'])){
		$exname=$_POST['exam'];
		$exseq=$_POST['exam_sequence'];
		$subject=$_POST['subject'];
		$pyear=$_POST['passing_year'];
		$gpa=$_POST['gpa'];
		$inst=$_POST['institute'];
		$board=$_POST['board'];
		$pid=$_SESSION['pid'];
		/*============check duplicate==========*/
		$chk_sql = "SELECT * FROM education where pid=$pid and exam_sequence=$exseq";
		//echo $chk_sql;
		$result=mysqli_query($con, $chk_sql);
		
		if(mysqli_num_rows($result)>0){
	
			die("Exam record for <b>".$exname."</b> already exists.Please go to education link and edit existing exam...");
			/*============different between die and exit(in die, we can show echo message which need to give in first bracket however we cannot do this in exit ==========*/
		}
		elseif ($exname<1  ) {
		     die("Please fill up the exam name");
		           
		}
		elseif ($subject<1  ) {
		     die("Please fill up the Group or subject name");
		           
		}

		elseif ($pyear>4 && $pyear<4) {
		     die("The passing year must be in four digits.");
		           
		}
		elseif ($gpa<1  ) {
		     die("Please fill up the gpa ");
		           
		}
		elseif ($inst<1  ) {
		     die("Please fill up the institute ");
		           
		}
		elseif ($board<1  ) {
		     die("Please fill up the board ");
		           
		}
		
/*if a give values in this line, I have to type exactly like database table*/
		$sql = "INSERT INTO education(pid,exam_name,exam_sequence,subject,year,gpa_class,institute,board) Values( $pid, '$exname','$exseq','$subject','$pyear','$gpa','$inst','$board')";
		//echo $sql;
		
		if(mysqli_query($con, $sql)){
			header("Location:education.php");
		}
		else{
			echo "Failed";
		}
	}
/*=============for edit=============*/


	elseif(isset($_POST['edit'])){
		//echo" Load edit form";
		$sql = "SELECT * FROM education WHERE edid=".$_POST['edid'];
		//echo $sql;
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0){
			$row=mysqli_fetch_assoc($res);
		}
		?>
		<form action="" method="post">
		Exam Level:<select name="exam_sequence">
			<option value="1" <?php if($row['exam_sequence']==1) echo "selected"; ?>>SSC /Equivalent</option>
			<option value="2" <?php if($row['exam_sequence']==2) echo "selected"; ?>>HSC /Equivalent</option>
			<option value="3" <?php if($row['exam_sequence']==3) echo "selected"; ?>> Diplomas/Equivalent</option>
			<option value="4" <?php if($row['exam_sequence']==4) echo "selected"; ?>>BA/Hon's /Equivalent</option>
			<option value="5" <?php if($row['exam_sequence']==5) echo "selected"; ?>>Post Graduate Diplomas</option>
			<option value="6" <?php if($row['exam_sequence']==6) echo "selected"; ?>>MA /Equivalent</option>
			<option value="7" <?php if($row['exam_sequence']==7) echo "selected"; ?>>PhD /Equivalent</option>
			</select><br>
			Exam Name:<input type="text" name="exam"  value="<?php echo $row['exam_name'] ?>"><br>
			Subject/Group:<input type="text" name="subject" value="<?php echo $row['subject']; ?>"><br>
			Passing Year:<input type="number" name="passing_year" value="<?php echo $row['year']; ?>">[4 digit year]<br>
			GPA/Class:<input type="text" name="gpa" value="<?php echo $row['gpa_class'] ;?>"><br>
			Institute:<input type="text" name="institute" value="<?php echo $row['institute'] ;?>"><br>
			Board/University:<input type="text" name="board" value="<?php echo $row['board']; ?>"><br>
			<input type="hidden" name="edid" value="<?php echo $_POST['edid']; ?>">
			<input type="submit" class="btn btn-info" name="update" value="Update">
	</form>


<?php
	}
	elseif(isset($_POST['update'])){
		$exname=$_POST['exam'];
		$exseq=$_POST['exam_sequence'];
		$subject=$_POST['subject'];
		$pyear=$_POST['passing_year'];
		$gpa=$_POST['gpa'];
		$inst=$_POST['institute'];
		$board=$_POST['board'];
		$pid=$_SESSION['pid'];

		$sql = "UPDATE education set exam_name='$exname',exam_sequence='$exseq',subject='$subject',year='$pyear',gpa_class='$gpa',institute='$inst',board='$board' WHERE edid=".$_POST['edid'];
		//echo $sql;
		if(mysqli_query($con, $sql)){
			header("location:education.php");
		}
	}
	elseif(isset($_POST['delete'])){
		//echo" Load delete form";
		$sql = "DELETE FROM education WHERE edid=".$_POST['edid'];
		if(mysqli_query($con, $sql)){
			header("location:education.php");
		}
	}
	
	else{
	
?>
<!-- Show education -->

<div class="container-fluid grad2">
	<div class="row m-3">
		<div class="col-lg-3 " id="vertical-line">
			<h3>If you want to add more information click here.</h3>
			<form action="" method="post">
				<input class=" btn btn-info btn-outline-success text-white" type="submit" name="add_new" value="Add New">
			</form>
		</div>
		<div class="col-lg-9 col-md-9 grad">
	<table class="table table-border" border="1">
		<tr>
			<th>Exam Name</th>
			<th>Subject</th>
			<th>Passing Year</th>
			<th>GPA</th>			
			<th>Institute</th>
			<th>Board</th>
			<th>Action</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM education WHERE pid=".$_SESSION['pid'];
			//echo $sql;
			$res= mysqli_query($con, $sql);
			if(mysqli_num_rows($res)>0){
				while($row=mysqli_fetch_assoc($res)){
			
				echo"<tr><td>".$row['exam_name']."</td><td>".$row['subject']."</td><td>".$row['year']."</td><td>".$row['gpa_class']."</td><td>".$row['institute']."</td><td>".$row['board']."</td><td>";
				?>
				<form action="" method="post">
					<input type="hidden" name="edid" value="<?php echo $row['edid']; ?>">
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

	<!-- /show education -->
	</div>
	</div>	
</div>

<?php 
	include("footer.php");

?>