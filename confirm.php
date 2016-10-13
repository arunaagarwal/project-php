<?php 
	

if($_SERVER['REQUEST_METHOD']=='POST'){

	
	$username = $_POST['username'];
	$otp = $_POST['otp'];

    
	require_once('dbConnect.php');
	
	
	$sql = "SELECT otp FROM androidotp WHERE username = '$username'";
	
	
	$result = mysqli_fetch_array(mysqli_query($con,$sql));
	

	$realotp = $result['otp'];
	
	
	if($otp == $realotp){
		 
		$sql = "UPDATE androidotp SET  verified =  '1' WHERE username ='$username'";
		
		
		if(mysqli_query($con,$sql)){
			
			echo 'success';
		}else{
			 
			echo 'failure';
		}
	}else{
		  
		echo 'failure';
	}
	
	
	mysqli_close($con);
}
?>