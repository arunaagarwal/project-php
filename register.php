<?php
define('SMSUSER','aruna_agarwal09');
 define('PASSWORD','aruna123456789');
 define('SENDERID','DEMOOO');
 
 
 
 function sendOtp($otp, $phone){
 
 $sms_content = "Welcome to Ecoxin: Your verification code is $otp";
 
 
 $sms_text = urlencode($sms_content);
 
 
 $api_url = 'http://login.cheapsmsbazaar.com/vendorsms/pushsms.aspx?user='.SMSUSER.'&password='.PASSWORD.'&msisdn=91'.$phone.'&sid='.SENDERID.'&msg='.$sms_text.'&fl=0&gwid=2';
 
 $response = file_get_contents( $api_url);
 
  
 return $response;
 }
 
 
 
 if($_SERVER['REQUEST_METHOD']=='POST'){ 
 
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 
 
 $otp = rand(100000, 999999);
 
 
 require_once('dbConnect.php');
 
 
 $sql = "INSERT INTO androidotp (username,email, password, phone, otp) values ('$username','$email','$password','$phone','$otp')";
 
 
 if(mysqli_query($con,$sql)){
 
            echo sendOtp($otp,$phone);
 }else{
 
 echo '{"ErrorMessage":"Failure"}';
 }
 
  
 mysqli_close($con);
 }
 ?>