<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
$username = $_POST['username'];
$password = $_POST['password'];
require_once('dbConnect.php');
 
$sql = "select * from androidotp where username='$username' and password='$password'";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);
 
if(isset($check)){
echo 'success';
}else{
echo 'failure';
}
 
mysqli_close($con);
}
?>