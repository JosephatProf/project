<?php 
require 'includes/connect.php';
//check if username is available
if (isset($_POST['username'])) {
	$query = mysqli_query($con, "SELECT * FROM assn_user WHERE username = '".$_POST['username']."'");

	if (mysqli_num_rows($query) > 0) {
	
		echo '<span class="btn-success" style="color:red;"> Username available Please try another username</span>';
		
	}else{
		echo 'Ok';
	}
}

 ?>