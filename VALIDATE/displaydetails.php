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
<script type="text/javascript" src="js/displaydetails.js"></script>
<script type="text/javascript" src="js/display.js"></script>
</head>
<body>
<div id="container">
	<header id="hed1">
		<img src="img/phoenixenlightened3.png" alt="PhoenixEnlightened Logo" width="100" height="100" />
		<h1>Life<span  class="do">2Do</span></h1>
		<h2>Things you've always wanted to do but have never gotten around to</h2>
		
	</header>

	<aside id="sidebar1">
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
	<main id="display">
  	<h2>Go Sky Diving</h2>
  	<div>2004-01-06</div>
  	<div>
    	<img src="uploadedimages/IMG_0747.jpg" width="500" alt=""/>
  	</div>
  	<div>
    	Completed this once while I was in Vegas.  Tandem jumped from 15,000 feet!  Thanks Vegas Extreme Sky Diving.  It was a hell of a rush, the view was amazing, and I ended up with bruises courtesy of the straps.
  	</div>
    	  
  	
	</main>
	<footer id="foot1">
		<p>
			| &copy; Jamie Mitchell 2017 | 
		</p>
	</footer>

</div>
</body>
</html>