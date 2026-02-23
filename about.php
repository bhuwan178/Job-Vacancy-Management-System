<?php
session_start();
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

                  <li class="nav-item">
                    <div class="dropdown">
                      <img src="images/profile.png" class="img circle dropdown-toggle" type="button" data-toggle="dropdown" alt="Profile" width="60" height="60">
                      <ul class="dropdown-menu">
                      <li> <a href="my_profile.php" style="color:blue"> My Profile</li>
                      <li> <a href="userlogout.php" class="nav-link" style="color:blue">Logout</a></li>

              </ul>
              </div>
              </li>

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
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About</h1>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
    	<div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <h2 class="mb-4"><span>We Are Job Nexus</span></h2>
        </div>
        <div>
  				<p>At JobNexus, we connect job seekers with employers, simplifying the hiring process for everyone. Our platform empowers individuals to find the right opportunities while helping businesses discover top talent efficiently. Join us and build a brighter future together!</p>
  			</div>
    	</div>
    </section>


<?php
include('include/footer.php');
?>