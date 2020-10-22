<?php 
include('../connection.php');
$nid=$_GET['id'];

$pq=mysqli_query($conn,"select email from user where id='$nid'");
$q=mysqli_query($conn,"delete from user where id='$nid'");

header('location:index.php?page=manage_users');

?>