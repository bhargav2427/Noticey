<?php 
require('connection.php');
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from user where email='$e'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'>This user already exists</font>";
}
else
{

//dob
$dob=$yy."-".$mm."-".$dd;

//hobbies
$hob=implode(",",$hob);

//image
$imageName=$_FILES['img']['name'];


//encrypt your password
$pass=md5($p);

$abc = 2;
$query = "insert into user (name, email, pass, mobile, gender, hobbies,image, dob) VALUES ('$n','$e','$pass','$mob','$gen','$hob','$imageName','$dob')";

mysqli_query($conn,$query);

//upload image

mkdir("images/$e");
move_uploaded_file($_FILES['img']['tmp_name'],"images/'$e'/'$imageName'");


$err="<font color='blue'>Registration successfull !!</font>";

}

}




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Noticey-Sign UP</title>
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
    </nav>



    <br><br><br><br><br><br>
    <h2 style="text-align:center;">Registration Form</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered center" style="width:50%;border:1px solid black; ">
            <Tr>
                <Td colspan="2"><?php echo @$err;?></Td>
            </Tr>

            <tr>
                <td>Enter Your name</td>
                <Td><input type="text" class="form-control" name="n" required /></td>
            </tr>
            <tr>
                <td>Enter Your email </td>
                <Td><input type="email" class="form-control" name="e" required /></td>
            </tr>

            <tr>
                <td>Enter Your Password </td>
                <Td><input type="password" class="form-control" name="p" required /></td>
            </tr>

            <tr>
                <td>Enter Your Mobile </td>
                <Td><input class="form-control" type="number" name="mob" required /></td>
            </tr>

            <tr>
                <td>Select Your Gender</td>
                <Td>
                    Male<input type="radio" name="gen" value="m" required />
                    Female<input type="radio" name="gen" value="f" />
                </td>
            </tr>

            <tr>
                <td>Choose Your hobbies</td>
                <Td>
                    Reading<input value="reading" type="checkbox" name="hob[]" />
                    Singing<input value="singin" type="checkbox" name="hob[]" />

                    Playing<input value="playing" type="checkbox" name="hob[]" />
                </td>
            </tr>


            <tr>
                <td>Upload Your Image </td>
                <Td><input class="form-control" type="file" name="img" required /></td>
            </tr>

            <tr>
                <td>Enter Your DOB</td>
                <Td>
                    <select name="yy" required>
                        <option value="">Year</option>
                        <?php 
					for($i=1950;$i<=2016;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>

                    </select>

                    <select name="mm" required>
                        <option value="">Month</option>
                        <?php 
					for($i=1;$i<=12;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>

                    </select>


                    <select name="dd" required>
                        <option value="">Date</option>
                        <?php 
					for($i=1;$i<=31;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>

                    </select>

                </td>
            </tr>

            <tr>


                <Td colspan="2" align="center">
                    <input type="submit" class="btn btn-success" value="Save" name="save" />
                    <input type="reset" class="btn btn-success" value="Reset" />

                </td>
            </tr>
        </table>
    </form>
</body>

</html>