

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Successful</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        a:focus,
        a:hover {
        color: #fff;
        }

     
        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
        color: #333;
        text-shadow: none; 
        background-color: #fff;
        border: .05rem solid #fff;
        }

        html,
        body {
        height: 100%;
        background-color: #333;
        }

        body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-pack: center;
        -webkit-box-pack: center;
        justify-content: center;
        color: #fff;
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
        }

        .cover-container {
        max-width: 42em;
        }


        .masthead {
        margin-bottom: 2rem;
        }

        .masthead-brand {
        margin-bottom: 0;
        }

        .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link + .nav-link {
        margin-left: 1rem;
        }

        .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
        }

        @media (min-width: 48em) {
        .masthead-brand {
            float: left;
        }
        .nav-masthead {
            float: right;
        }
        }


        .cover {
        padding: 0 1.5rem;
        }
        .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
        }

        .mastfoot {
        color: rgba(255, 255, 255, .5);
        }
        </style>

  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
     
      <main role="main" class="inner cover">
        <h1 class="cover-heading">JobNexus</h1>

        <?php
session_start();
include('db_connection/db.php');


$img_profile = $_FILES['img_profile']['name'];
$user_email=$_SESSION['email'];
 $name=$_POST['name'];
 $dob=$_POST['dob'];
 $number=$_POST['number'];
 $email=$_POST['email'];
 $tmp_name=$_FILES['img_profile']['tmp_name'];

 $sql=mysqli_query($conn,"select * from profiles where user_email='{$_SESSION['email']}'");
 $sql_check=mysqli_num_rows($sql);

 
        if(!empty($sql_check)){

                $query=mysqli_query($conn,"update profiles set image='$img_profile', name='$name', dob='$dob', number='$number', email='$email' WHERE
                user_email='{$_SESSION['email']}'");

                if($query){
                    echo "<h1>Profile Updated Successfully</h1>";
                }
                else{
                    echo "<h1>Failed to Update Profile</h1>";
                }

        }
        else{

                move_uploaded_file($_FILES["img_profile"]["tmp_name"], 'profile_img/'.$img_profile);

                $query=mysqli_query($conn,"insert into profiles(image, name, dob, number, email, user_email) values('$img_profile','$name','$dob','$number','$email','$user_email')");

                if($query){
                    echo "<h1>Profile Added Successfully</h1>";
                }
                else{
                    echo "<h1>Failed to Add Profile</h1>";
                }
        }
        ?>
        <p class="lead">
          <a href="http://localhost/job_vacancy/my_profile.php" class="btn btn-lg btn-secondary">Back</a>
        </p>
      </main>

     
    </div>

    

   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>

