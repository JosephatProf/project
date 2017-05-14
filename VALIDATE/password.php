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
  	<form action="plogin.php" method="post" name="login" id="login" >
        <fieldset>
        	<legend>Login Credentials</legend>
         	
        	<div>
        	  <label for="username" class="first">User Name:</label>
            <input name="item" id="item" type="text" size="25" maxlength="100"/>
        	</div>      	
        	  
        </fieldset>
        <div>
          <input name="submit" type="submit" value="Submit" class="btn">
          <input name="reset" type="reset" value="Reset" class="btn">
  	    </div>
  	</form>
    <div>
      <p>Forgot your password? <a href="password.php">Click Here</a></p>
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