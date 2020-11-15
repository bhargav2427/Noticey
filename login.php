<?php 
session_start();
require('connection.php');
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
    <title>Noticey-Login</title>
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

    .center {
        margin-left: auto;
        margin-right: auto;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="index.php">Noticey</a><button data-toggle="collapse"
                data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button"
                data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger"
                            href="./registration.php">Sign up</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger"
                            href="./login.php">Login&nbsp;</a></li>

                </ul>
            </div>
        </div>
    </nav><br><br><br><br><br><br><br><br><br><br><br><br>





    <h2 style="text-align:center">Login Form</h2><br>
    <form method="post" class="center" style="width:30%">

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"><?php echo @$err;?></div>
        </div>



        <div class="row">
            <div class="col-sm-4">Enter YOur Email</div>
            <div class="col-sm-5">
                <input type="email" name="e" class="form-control" />
            </div>
        </div><br>

        <div class="row">
            <div class="col-sm-4">Enter YOur Password</div>
            <div class="col-sm-5">
                <input type="password" name="p" class="form-control" />
            </div>
        </div>
        <div class="row" style="margin-top:10px">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <br>
                <input type="submit" value="Login" name="save" class="btn btn-success"
                    style="background-color:#fec810;border:0px;position:absolute;left:45%" />

            </div>
        </div>
    </form>
</body>

</html>