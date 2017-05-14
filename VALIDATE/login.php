
<?php
// error_reporting(0);

// Start the session
session_start();
$_SESSION["logged"] ="no";
$title="Account";
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
	<header>
		<img src="img/phoenixenlightened3.png" alt="PhoenixEnlightened Logo" width="100" height="100" />
		<h1>Life<span class="do">2Do</span></h1>
		<h2>Things you've always wanted to do but have never gotten around to</h2>
		
	</header>

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
			<?php
		      $items=mysqli_query($con,"SELECT * FROM assn_list ORDER BY RAND() LIMIT 1");
		                        while ($result=mysqli_fetch_array($items))
		                        {
		                          $tem_name=$result['item'];
		                        }
		      echo $tem_name;

		      ?>
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
  	<form action="./includes/signin_exec.php" method="post" name="login" id="login" >
        <fieldset>
        	<legend>Login Credentials</legend>
         	
        	<div>
        	  <label for="username" class="first">User Name:</label>
            <input name="username" id="username" type="text" size="25" maxlength="100"/>
        	</div>      	
        	
          <div>
        	  <label for="password">Password:</label>
            <input name="password" id="password" type="password" size="25" maxlength="100" />
          </div>
          <div>
        	  <label for="password">Remember Me:</label>
            <input name="remember" id="remember" type="checkbox" value="1" />
          </div>
          

        </fieldset>
        <div>
          <input name="submit" type="submit" value="Submit" class="btn">
          <input name="reset" type="reset" value="Reset" class="btn">
  	    </div>
  	</form>
    <div>
      <p>Forgot your password? <a href="retrievePassword.php">Click Here</a></p>
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