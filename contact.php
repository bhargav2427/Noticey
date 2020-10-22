<?php
include('connection.php');
extract($_POST);
if(isset($_POST)){
    mysqli_query($conn,"insert into contact (name,email,number,message) VALUES ('$name','$email','$number','$message')");
    header('location:index.php');
}
?>