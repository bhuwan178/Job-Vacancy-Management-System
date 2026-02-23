
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Sign Up | JobNexus</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

 
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

 
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="sign_up.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please Sign Up</h1>
     
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
     
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

      <label for="inputEmail" class="sr-only">First Name</label>
      <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter Your First Name" required autofocus>
        
      
      <label for="inputEmail" class="sr-only">Last Name</label>
      <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Your Last Name" required autofocus>

      <label for="inputEmail" class="sr-only">Phone Number </label>
      <input type="number" id="phone_number" name="phone_number" class="form-control" placeholder="Enter Your Phone Number" required autofocus>

      <label for="inputEmail" class="sr-only">Date of Birth </label>
      <input type="date" id="dob" name="dob" class="form-control" placeholder="Enter Your Date of Birth" required autofocus>

      <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign Up">
      <a href="job-post.php">Already Have An Account? Sign In </a>

      <p class="mt-5 mb-3 text-muted">&copy; JobNexus 2025-2026</p>
    </form>
  </body>
</html>

<?php
include('db_connection/db.php');
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $dob=$_POST['dob'];
    $phone_number=$_POST['phone_number'];


$query=mysqli_query($conn,"insert into jobseeker (email, password, first_name, last_name, dob, phone_number) values('$email',
'$password', '$first_name', '$last_name', '$dob', '$phone_number') ");

var_dump($query);

if($query){
    echo "<script>alert('Now You Can LogIn')</script>";
    header('location:job-post.php');
}
else{
    echo "<script>alert('Error! Please try again')</script>";
}
}
?>


