<?php 
session_start();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Sign In | JobNexus</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

 
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

 
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="job-post.php" method="post">
      <img class="mb-4" src="admin/images/logo.png" alt="" width="150" height="102">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail"  class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
     
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" placeholder="Sign In">
      <a href="sign_up.php">Create Account </a>
      <p class="mt-5 mb-3 text-muted">&copy; JobNexus 2025-2026</p>
    </form>
  </body>
</html>

<?php 
include('db_connection/db.php');
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = $_POST['password'];


 
  $query=mysqli_query($conn,"select *from jobseeker where email='$email' and password='$password'");
  
  if($query){

  if(mysqli_num_rows($query)>0){

    $_SESSION['email']=$email;
    header('location:index.php');


  }
  else{
    echo "<script>alert('Invalid Email or Password, Please try again')</script>";
  }
}
}
?>