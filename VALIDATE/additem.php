

<?php
error_reporting(0);

// Start the session
session_start();
$_SESSION["logged"] ="no";
$title="Add Items";
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
	<main>
  	 
  	 <form action="pitem.php" method="post" name="item" id="item" >
        <fieldset>
        	<legend>Basic Items Details</legend>
         	
        	<div>
        	  <label for="item" class="first">2Do Item:</label>
            <input name="item" id="item" type="text" size="50" maxlength="255"/>
        	</div>      	
        	
          <div>
        	  <label for="itemNum">Item Number:</label>
            <input name="itemNum" id="itemNum" type="text" size="5" maxlength="5" />
            <span style="font-size:.7em;">&nbsp;If left empty, inserted order is assumed</span>
          </div>
        </fieldset>
        
        

        <div>
          <input name="submit" type="submit" value="Submit" class="btn">
          <input name="reset" type="reset" value="Reset" class="btn">
  	    </div>
    </form>
  	   	
  </main>
	<footer>
		<p>
			| &copy; Jamie Mitchell 2017 | 
		</p>
	</footer>

</div>
</body>
</html>