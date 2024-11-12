

        <!-- Footer Start -->
        <div class="container-fluid fixed-bottom  bg-info text-light footer  g-2  pb-0 mb-0 wow fadeIn" >
            <div class="container gx-2 mt-1">
                <div class="row gx-2">
                    <div class="col-lg-4 col-md-4">
                        <h4 class="text-white mb-1">Quick Link</h4>
                       <li><a class="text-white p-1 mb-1" href="personal_info.php">Personal info</a></li>
                       <li><a class="text-white p-1 mb-1" href="education.php">Education</a></li>
                       
                      
                       <li><a class="text-white p-1 mb-1" href="training_info.php">Training info</a></li>
                       <li><a class="text-white p-1 mb-1" href="experience.php">Experience</a></li>
                       <li><a class="text-white p-1 mb-1" href="skills.php">Skills</a></li>
                                           
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h4 class="text-white mb-3">Contact</h4>
						<p class="mb-2 text-white">Email:&nbsp;<?php  echo $_SESSION['email']; ?>
                        </p>
                        <p class="mb-2 text-white">Number:&nbsp; <i class="fa fa-phone-alt me-3"></i>----------</p>
                        
                    </div>
                   
                    <div class="col-lg-4 col-md-4">
                        <h4 class="text-white mb-3">My email account</h4>
                        <p class="text-white">Lorem ipsum dolor sit amet.</p>
                        <div class="position-relative mx-auto " style="max-width: 300px;">
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