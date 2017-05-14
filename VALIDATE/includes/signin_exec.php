<?php 
include("session.php");
include("functions.php"); 
include_once("connect.php");

// define variables and set to empty values
$uname = $password = "";
$unameErr = $passwordErr = "";

	
//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = trim($str);
		$str = stripslashes($str);
		return $str;
	}
	
//Input Validations
		$uname = clean($_POST["username"]);
		$password = clean($_POST["password"]);
		$hashed=md5($password);
		// $hashed=md5('sam');
/*		$hashed_pass=sha1($password);
*/			
//create sessions
	$ses=mysqli_query($con,"SELECT * FROM assn_user WHERE(username='".$uname."' && pass='".$hashed."')");
	while($row=mysqli_fetch_array($ses))
	{
	$_SESSION['id']=$row['id'];
	$_SESSION['name']=$row['name'];
	$_SESSION['uname']=$row['username'];
		
	}
	//end of sessions creation    
	$qury=mysqli_query($con,"SELECT count(*) FROM assn_user WHERE(username='".$uname."' && pass='".$hashed."')");
	$result=mysqli_fetch_array($qury);
	if($result[0]>0)
	{
	redirect_to('../index.php?sign_up_msg=1');
	}
	else
	{
	redirect_to('../index.php?login_error=1');
	}
	

?>