<?php
session_start();

if(isset($_SESSION['email'])==true){

}
else{
  header('location:job-post.php');
}
?>

<?php

include('db_connection/db.php');

$id = isset($_GET['id']) ? $_GET['id'] : null; 

$title = '';
$job_des = '';
$country = '';
$c_state = '';
$city = '';

if ($id) { 
    $query = mysqli_query($conn, "SELECT * FROM all_jobs WHERE job_id='$id'") or die("Query Failed: " . mysqli_error($conn));

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
        $title = $row['job_title'];
        $job_des = $row['job_des'];
        $country = $row['country'];
        $c_state = $row['c_state'];
        $city = $row['city'];
        $job_id=$row['job_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JobNexus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">JobNexus</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

            <?php 
              if (isset($_SESSION['email'])==true) { ?>
                  <li class="nav-item cta mr-md-2"><a href="job-post.php" class="nav-link"><?php echo $_SESSION['email']; ?></a></li>
                  <li class="nav-item cta cta-colored"><a href="userlogout.php" class="nav-link">Logout</a></li>
              <?php 
              } else { ?>
                  <li class="nav-item cta mr-md-2"><a href="job-post.php" class="nav-link">Login</a></li>
              <?php 
              } 
              ?>

          
        
	        </ul>
	      </div>
	    </div>
	  </nav>


    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Apply</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Apply Jobs</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">

<h2 class="mb-3"> <td> <?php echo $title;?> </td> </h2>
<h5><?php echo $country; ?>, <?php echo $c_state;?>, <?php echo $city;?> </h5>
<p> <?php echo $job_des;?> </p>

    <form action="apply_job.php" method="POST" id="JobPortal" enctype="multipart/form-data" style="border:1px solid gray">
      <div style="padding:2%">
        <input type="hidden" name="job_seeker" value="<?php echo $_SESSION['email'];?>" id="job_seeker">
        <input type="hidden" name="id_job" value="<?php echo $id_job;?>" id="job_seeker">        
   
        <div class="row">
          <div class="col-sm-6">
            <label for=""> Enter Your First Name
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">  
          </label>
          </div>
         
         
          <div class="col-sm-6">
            <label for=""> Enter Your Last Name
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">  
          </label>
          </div>
          </div>
       
          <div class="row">
          <div class="col-sm-6">
            <label for=""> Enter Your Date of Birth
            <input type="date" class="form-control" name="dob" id="dob">  
          </label>
          </div>   
          
          <div class="col-sm-6">
            <label for=""> Enter Your Contact Number
            <input type="number" class="form-control" name="number" id="number" placeholder="Contact Number">  
          </label>
          </div>   
            </div>
          
          <div class="row">
          <div class="col-sm-6">
            <label for=""> Email
            <input type="text" class="form-control" disabled="disabled" value="<?php echo $_SESSION['email'];?>">  
          </label>
          </div>   

          <div class="col-sm-6">
            <label for=""> Upload Resume
            <input type="file" name="job_file" id="job_file" class="form-control">  
          </label>
          </div>  
        
    </div>

    <br>
    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary btn-block">  
   
</form>
  </form>


</div>
</div>
</section>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

