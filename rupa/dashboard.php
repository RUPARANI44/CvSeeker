<?php include("header.php") ?>



<!--===================== personal info page=====================-->
<div style="max-height: 1000px;" class="h-auto">
<?php
$sql = "SELECT * FROM personal_info WHERE pid='".$_SESSION['pid']."'";
	//echo $sql;
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		//echo $row['name'];
}
?>
<div class="container-fluid  cirvit mt-2 mb-2 text-center ">

    <div class="container py-4 wow fadeInUp" data-wow-delay="0.1s">
	<div class="row bg-info cv">		
		<h1 class="cirvit1 mt-2   mx-3 text-center  text-white">Welcome<b> <p class="text-dark ">
    <?php
      echo $_SESSION['email'];
        
       ?>
      </p></b>This is your<br><span class="text-danger">Curriculum Vitae</span> </h1><div class="imgd"><img src="img/pic.jpg"></div>
	</div><!-- /end row  -->


</div>
<div class="container-fluid g-5 m-5">
	<div class="row g-5">
		<div class="col-lg-5 col-md-5 col-sm-5"></div>
			<div class="col-lg-3 col-md-3 col-sm-3">
				
			</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
			
		</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->
</div>
 <div class="container-xxl p-5 wow fadeInUp personal2" data-wow-delay="0.1s">
	<div class="container-fluid m-4 personal" >
	<div class="row">
		<div class="col-md-3 col-lg-3 col-sm-3" id="vertical-line4">
			<b><h1 class="mb-4"><span class="text-danger">#</span>About Me</h1></b>     
		  		<h4 class=" lead mx-3 p-2 mb-4"><b><?php echo $row['description']?></b></h4>

<body>
	<div class="container-fluid card1 g-3 m-3">
		<div class="row">
			
			<div class="col-lg-6 col-md-6 col-sm-12">
	      <div class="addphoto">
	        <div class="card">
	            <h1> Add your photo</h1>
	            <img src="images/profile.png" id="profile-pic">
	            <label for="input-file">update Image</label>
	            <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file">
	        </div>
	      </div>
	  	</div>
 		 </div>
		</div>
        <script >
		          let profilePic = document.getElementById('profile-pic');
		let inputFile = document.getElementById('input-file');

		inputFile.onchange =function () {
		  profilePic.src = URL.createObjectURL(inputFile.files[0]);
		}
        </script>
</body>
                <a class="btn btn-success btn-outline-info text-white py-3 px-5 mt-5" href="personal_info.php">
                             Know More
                </a>
        </div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<table class="table" border="1" id="text1" class="mb-2">
				<tr>
					<th>Name</th>
					<td>:</td>
					<td><?php echo $row['name']?></td>
				</tr>
				<tr>
					<th>Father's Name</th>
					<td>:</td>
					<td><?php echo $row['father']?></td>
				</tr>
				<tr>
					<th>Mother's Name</th>
					<td>:</td>
					<td><?php echo $row['mother']?></td>
				</tr>
				<tr>
					<th>Date of Birth</th>
					<td>:</td>
					<td><?php echo $row['date_of_birth']?></td>
				</tr>
				<tr>
					<th>Address</th>
					<td>:</td>
					<td><?php echo $row['address']?></td>
				</tr>
				<tr>
					<th>Blood Group</th>
					<td>:</td>
					<td><?php echo $row['blood_group']?></td>
				</tr>
				<tr>
					<th>Religion</th>
					<td>:</td>
					<td><?php echo $row['religion']?></td>
				</tr>
				<tr>
					<th>description</th>
					<td>:</td>
					<td><textarea rows="5" cols="50" > <?php echo $row['description']?></textarea></td>
				</tr>
				
				
			</table>
		</div>
	</div>
</div>
</div>


        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
<!--===================== education info=====================-->
<div class="container-fluid m-5">
	<div class="row">
		<div class="col-lg-5 col-md-5 col-sm-5"></div>
			<div class="col-lg-3 col-md-3 col-sm-3">
				<h2 class=" m-2 text-center bg-info text-white">Education info </h2>
			</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
			
		</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->

<?php
if(isset($_POST['add_education'])){
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
		
		die("Exam record for".$exname." already exists.Please go to education link and edit existing exam...");
		/*============different between die and exit(in die, we can show echo message which need to give in first bracket however we cannot do this in exit ==========*/
	}

/*if a give values in this line, I have to type exactly like database table*/
		$sql = "INSERT INTO education(pid,exam_name,exam_sequence,subject,year,gpa_class,institute,board) Values( $pid, '$exname','$exseq','$subject','$pyear','$gpa','$inst','$board')";
		//echo $sql;
		
		if(mysqli_query($con, $sql)){
			header("Location:dashboard.php");
		}
		else{
			echo "Failed";
		}
	}
/*=============for edit=============*/


	else{
	
?>
<!-- Show education -->

	<div class="container-fluid showedu">
	<div class="row m-3">
		<div class="col-lg-1 col-md-1 col-sm-1">
		</div>
			<div class="col-lg-10 col-md-10 col-sm-10">
				
	<table class="table table-border" border="1">
		<tr>
			<th>Exam Name</th>
			<th>Subject</th>
			<th>Passing Year</th>
			<th>GPA</th>			
			<th>Institute</th>
			<th>Board</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM education WHERE pid=".$_SESSION['pid'];
			//echo $sql;
			$res= mysqli_query($con, $sql);
			if(mysqli_num_rows($res)>0){
				while($row=mysqli_fetch_assoc($res)){
			
				echo"<tr><td>".$row['exam_name']."</td><td>".$row['subject']."</td><td>".$row['year']."</td><td>".$row['gpa_class']."</td><td>".$row['institute']."</td><td>".$row['board']."</td>";
				?>

				
				<?php
				echo "</tr>";				
				}
			}
		?>
		
	</table>
<?php
	 }
?>
</div>

</div>
<div class="col-lg-1"></div>
</div>
	<!-- ====================================/End Education info=========== -->

	
	<!-- ====================================Training info=========== -->
<div class="container-fluid mt-2">	
	<section  class="Training">			
		<div class="section-heading text-center">
			<h2 class=" mt-2 pb-2 text-center  text-dark">Training info</h2>
		</div>
		</section>

	
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
					<tr><td>Training details</td><td>:</td><td><input type="text"class="mb-2" name="details" placeholder="Training details">&nbsp;<input type="submit" class="btn btn-info" name="add_training"class="m-2" value="Add Training details"></td></tr>
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
		
		$sql = "INSERT INTO training_info(pid,title,institution,duration,hour_day,starting_day,ending_day,training_detalis) Values( $pid, '$title','$ins','$duration','$hour','$start','$end','$detalis')";

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
	$ins=$_POST['institution'];
	$duration=$_POST['duration'];
	$hour=$_POST['hour'];
	$start=$_POST['starting'];
	$end=$_POST['ending'];
	$detalis=$_POST['detalis'];
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

<div class="container-fluid trainInfo mt-4 pt-4 ">
	<div class="row m-3">
		<div class="col-lg-3 col-md-3 col-sm-8 training2" id="vertical-line2">
			<h3 class=" mt-3 px-5 pt-5"> If you want to add more information click here.</h3>
			<form action="" method="post">
				<input class=" btn btn-info btn-outline-success mx-5 text-white" type="submit" name="add_new" value="Add New">
			</form>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-10">
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
	<!-- =======================Experience info=========== -->

<div class="container-fluid g-3 m-5">
	<div class="row ">
		<div class="col-lg-5 col-md-5 col-sm-5"></div>
			<div class="col-lg-3 col-md-3 col-sm-3">
				<h2 class=" m-2 text-center bg-info   text-white">Experience  </h2>
			</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
			
		</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->


<?php
	
	if(isset($_POST['add_experience'])){
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
	else{

?>

<!-- =======Experience info -->
<div class="d-grid gap-3">
<div class="container-fluid gb-2 experInfo">
	<div class="row m-3">
		<div class="col-lg-1 col-md-1 ">
		</div>
			<div class="col-lg-10 col-md-10 col-sm-5 experInfo">
	<table class="table table-border" border="1">
		<tr>
			<th>Job Title</th>	
			<th>Organization</th>
			<th>Starting Date</th>
			<th> Ending Date</th>
			<th>Responsibility</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM experience WHERE pid=".$_SESSION['pid'];
			//echo $sql;
			$result= mysqli_query($con, $sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
					echo"<tr><td>".$row['jobtitle']."</td><td>".$row['organization']."</td><td>".$row['start_date']."</td><td>".$row['end_date']."</td><td>".$row['responsibility']."</td>";
				?>
				
				<?php
				echo "</tr>";				
				}
			}
		?>
	
	</table>

<?php
	 }
?>
</div>

</div>
<div class="col-lg-1 col-md-1 col-sm-5"></div>
</div>
</div>

	<!-- =======================/Experience info=========== -->

	<!-- ======================Skills ============ -->

<div class="container-fluid ">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5"></div>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<h2 class=" m-2 text-center bg-info text-white">Skills </h2>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
				
			</div><!-- /end col-lg-4  -->
	</div><!-- /end row  --><hr>
</div><!-- /end container -->

<?php
	
	if(isset($_POST['add_skills'])){
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
	else{

?>

<!-- =======skills info======= -->
<div class="container-fluid mb-2 h-50 skills">
	<div class="row ">
		<div class="col-lg-1 col-md-1 col-sm-1">
		</div>
			<div class="col-lg-10 col-md-10 col-sm-10">
			<table class="table table-border pb-2" border="1">
		<tr>
			<th>Skills Title</th>	
			<th>Skills Description</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM skills WHERE pid=".$_SESSION['pid'];
			//echo $sql;
			$result= mysqli_query($con, $sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
					echo"<tr><td>".$row['skills_title']."</td><td>".$row['skills_description']."</td>";
				?>
				<?php
				echo "</tr>";				
				}
			}
		?>
	
	</table>

<?php
	 }
?>
	
</div>

</div>
<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>
</div>

	

	

	<!-- =======================/Skills =========== -->
	



        <!-- Footer Start -->
        <div class="container-fluid bg-info text-light footer  g-2  pb-1 mb-0 wow fadeIn" >
            <div class="container gx-2 mt-1">
                <div class="row gx-2">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <h4 class="text-white mb-1">Quick Link</h4>
                       <li><a class="text-white p-1 mb-1" href="personal_info.php">Personal info</a></li>
                       <li><a class="text-white p-1 mb-1" href="education.php">Education</a></li>              
                       <li><a class="text-white p-1 mb-1" href="training_info.php">Training info</a></li>
                       <li><a class="text-white p-1 mb-1" href="experience.php">Experience</a></li>
                       <li><a class="text-white p-1 mb-1" href="skills.php">Skills</a></li>
                                           
                    </div>
                    <div class="col-lg-4  col-md-4 col-sm-4">
                        <h4 class="text-white mb-3">Contact</h4>
						<p class="mb-2 text-white">Email:&nbsp;<?php  echo $_SESSION['email']; ?>
                        </p>
                        <p class="mb-2 text-white">Number:&nbsp; <i class="fa fa-phone-alt me-3"></i>----------</p>
                        
                    </div>
                   
                    <div class="col-lg-4  col-md-4 col-sm-4 ">
                        <h4 class="text-white mb-3">Newsletter</h4>
                        <p class="text-white">Lorem ipsum dolor sit amet.</p>
                        <div class="position-relative mx-auto" style="max-width: 300px;">
                            <input class="form-control  border-0 w-100 py-3 ps-3 pe-4" type="text" value="<?php  echo $_SESSION['email']; ?>">
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!-- Footer End -->

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>


