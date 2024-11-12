<?php
		/* it always writes in the 1st line*/
			session_start();
			if(empty($_SESSION['email'])){
				header("Location:index.php");
			}
			include('config.php');
			
		 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
   <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">

        <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <style>
      body{
        background:#ecf8fc;
      }
    </style>
  
</head>
<body >

	<nav class=" navbar navbar-expand-lg fixed-top navbar-light g-2 bg-light text-dark ">
  <div class="container-fluid">
    <a id="logo" href="dashboard.php"><img src="img/image1.jpeg" width="50px"></a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav">
        <span class="navbar-toggler-icon"></span>
      </button>


        
      <div class="collapse navbar-collapse " id="mynav">
        <ul class="navbar-nav  me-auto">
        <li class="nav-item">
          <b><h5><a class="nav-link text mx-3  mb-2 text-dark active" aria-current="page" href="dashboard.php">Home</a></h5></b>
        </li>
        <li class="nav-item">
          <b><h5><a class="nav-link mx-3 text-dark mb-2" href="personal_info.php">Personal info </a></h5></b>
        </li>
        <li class="nav-item">
          <b><h5><a class="nav-link mx-3 text-dark mb-2" href="education.php">Education </a></h5></b>
        </li>
        <li class="nav-item">
          <b><h5><a class="nav-link mx-3 text-dark mb-2" href="training_info.php">Training	</a></h5></b>
        </li>
        <li class="nav-item">
          <b><h5><a class="nav-link mx-3 text-dark mb-2" href="experience.php">Experience	</a></h5></b>
        </li>
        <li class="nav-item">          <b><h5><a class="nav-link mx-3 text-dark mb-2" href="skills.php">Skills	</a></h5></b>
        </li>
        <li class="nav-item">
          
        </li>
        
      </ul>
    
    </div> 
    
    
      <button class="btn btn-danger " >
         <h5><a class=" text-white" href="logout.php">logout</a></h5>
    </button>
    <b><p class="text-dark m-1"><h5>
    <?php
      echo $_SESSION['email'];
        
       ?>
      </h5></p></b>
  </div>
</nav>
		

		