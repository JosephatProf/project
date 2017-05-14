<?php
	// include('config.php');
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'ngari');
	//create connection
	$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	//test connection
	if (!$con)
	{
	die("Error connecting to server!:".mysqli_error($con));
}
?>