<?php

include('db_connection/db.php');
include('include/header.php');

$query = mysqli_query($conn, "SELECT * FROM profiles WHERE user_email='{$_SESSION['email']}'");

while ($row = mysqli_fetch_array($query)) {
    $img_profile = $row['image'];
    $name = $row['name'];
    $dob = $row['dob'];
    $number = $row['number'];
    $email = $row['email'];
}


?>



<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">My Profile</h1>
          </div>
        </div>
      </div>
    </div>
              <br>
    <div style="margin-left:25%; width:50%; border:1px solid gray; padding:10px;">

        <form action="profile_add.php" method="POST" id="profile_form" name="profile_form"  enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                <img src="profile_img/<?php  echo $img_profile ?>" class="img-thumbnail" alt="Profile">
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control" name="img_profile" id="img_profile">
            </div>
              
            </div>
            <br>
            <div style="margin-left:10%">
            <div class="row">
              <div class="col-md-6">
                <td>Enter Your Name : </td>
        </div>
        <div class="col-md-6">
                <td> <input type="text" name="name" value="<?php if(!empty($name)) echo $name;?>" id="name" placeholder="Full Name" class="form-control"> </td>
        </div>
       
            </div>
            </div>

            <br>
            <div style="margin-left:10%">
            <div class="row">
              <div class="col-md-6">
                <td>Enter Your DOB : </td>
        </div>
        <div class="col-md-6">
                <td> <input type="date" name="dob" id="dob" value="<?php if(!empty($dob)) echo $dob?>" class="form-control"> </td>
        </div>
       
            </div>

            </div>
            <br>
            <div style="margin-left:10%">
            <div class="row">
              <div class="col-md-6">
                <td>Enter Your Mobile Number : </td>
        </div>
        <div class="col-md-6">
                <td> <input type="number" name="number" id="number" value="<?php if(!empty($number)) echo $number?>" placeholder="Mobile Number" class="form-control"> </td>
        </div>
       
            </div>

            <br>

            <div class="row">
              <div class="col-md-6">
                <td>Enter Your Email : </td>
        </div>
        <div class="col-md-6">
                <td> <input type="email" name="email" id="email" placeholder="Email" value="<?php if(!empty($email)) echo $email?>" class="form-control"> </td>
        </div>
        <div class="col-md-6">
                <td><input type="submit" name="submit" id="submit" class="btn btn-success" value="Update">
                </td>
                <td><a href="checkout.html">Upgrade to Premium</a>
</td>

        </div>
            </div>


            </form>
            </div>
            </div>
            </div>
            <br>
    <section class="ftco-about d-md-flex">
    	
    </section>


<?php
include('include/footer.php');
?>

