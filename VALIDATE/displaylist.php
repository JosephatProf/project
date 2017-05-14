<?php
error_reporting(0);

// Start the session
session_start();
$_SESSION["logged"] ="no";
$title="Todo Preview";
// session_unset(); 

if ($_SESSION["logged"]=='no') {
	$btn='Log In';
	$link='login.php';
}elseif($_SESSION["logged"]=='yes'){
	$btn='Log Out';
	$link='logout.php';
}

include_once("includes/connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Life2Do-Home</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  
  <script type="text/javascript" src="lib/jquery-2.2.4.js"></script>
<script type="text/javascript" src="lib/jquery-1.12.4.js"></script>
<script type="text/javascript" src="lib/jquery-ui.js"></script>
<script type="text/javascript" src="lib/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery-validate.min.js"></script>
<script type="text/javascript" src="js/display.js"></script>
</head>
<body>
<div id="container">
	<?php include_once("includes/header.php"); ?>

	<aside id="sidebar">
		<section>
  		  <h3>Welcome</h3>
			  <a href='logout.php'>Log Out</a> <br/>
			  <a href='login.php'>Log In</a>
		</section>
		<section>
			<h3>2Do Actions</h3>
			<ul>
  		  <li><a href="index.php" class="button">Home</a></li>
				<li><a href="account.php" class="button">Create Account</a></li>
				<li><a href="edituser.php" class="button">Edit Profile</a></li>
				<li><a href="editlist.php" class="button">Edit List Details</a></li>
				<li><a href="additem.php" class="button">Add 2Do List Item</a></li>
				<li><a href="displaylist.php" class="button">Preview 2Do List</a></li>
      </ul>
		</section>
	
		<section>
			<h3>Random List Suggestion</h3>
			This is hard coded right now..but will be dynamic later
		</section>
		<section>
			<h3>Other Useful Links</h3>
			<ul>
			  <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 2</a></li>
			</ul>
		</section>
	</aside>
	<main id="displaylist">
    <p class="warning">Note: Your list isn't visible to anyone but you</p>
    <h2>Jamie's Bucket List</h2>

  	<ol class="bucketlist">
    	<li id="open"><a href="#getdetails.php?id=4">Go Sky Diving</a></li>
    	<li id="open"><a href="#getdetails.php?id=3">Get a Tattoo</a></li>
    	<li>Play Blackjack in Las Vegas</li>
    	<li>Learn to Play the Guitar</li>

  	</ol>
  	<div id="dialog" title="Lists Displayed">
  		<span id="displayitems"></span>
	</div>

  </main>
	<footer>
		<p>
			| &copy; Jamie Mitchell 2017 | 
		</p>
	</footer>

</div>
</body>
</html>