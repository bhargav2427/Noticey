<?php 
include('connection.php');
extract($_POST);

if(isset($save))
{
    
	if($e=="" || $p=="")
	{
    $err="<font color='red'>fill all the fileds first</font>";	
    
	}
	else
	{
$pass=md5($p);	

$sql=mysqli_query($conn,"select * from user where email='$e' and pass='$pass'");

$r=mysqli_num_rows($sql);

if($r==true)
{
echo 'bhargav';
$_SESSION['user']=$e;
header('location:user');
}

else
{

$err="<font color='red'>Invalid login details</font>";

}
}
}

?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Online Notice board</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=d8757aeceb75e3b7250ddf3380e9d994">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css?h=587ac2057624923cd5be3eaf8b1158cd">
    <style>
    body {
        background-color: #f1f6fd;
    }
    </style>
</head>

<body>
    <!-- Start: Login Form Clean -->
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-log-in"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="e" placeholder="Email" required>
            </div>
            <div class="form-group"><input class="form-control" type="password" name="p" placeholder="Password"
                    required>
            </div>
            <div class="form-group">
                <input type="submit" value="Log win" name="save" class="btn btn-primary btn-block" />
                <!--
                <button class="btn btn-primary btn-block" type="submit">Log In</button>-->
            </div><a class="forgot" href="#">Forgot your email or password?</a>
        </form>
    </div>
    <!-- End: Login Form Clean -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js?h=55603d8db4181fc7bc80e0433e95435c"></script>
</body>

</html>