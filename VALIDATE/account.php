
<?php
error_reporting(0);

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


function test_input($data)
{

  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}


$name=$email=$uname=$nameErr=$emailErr=$unameErr=$passErr=$password=$password2="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $description=$_POST["descr"];
  $available=$_POST["display"];

  if(empty($_POST["name"])){
    $nameErr = "Name is required";
  }else{
    $name=test_input($_POST["name"]);
    if(!preg_match("/^[a-zA-Z]*$/" , $name)){
      $nameErr = "Only letters and white space allowed";
    }

  }

  if(empty($_POST["email"])){
    $emailErr = "Email is required";
  }else{
    $email=test_input($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format";
    }
  }
   if(empty($_POST["username"])){
    $unameErr = "Username is required";
  }else{
    $username=test_input($_POST["username"]);
    if(!preg_match("/^[a-zA-Z]*$/" , $name)){
      $unameErr = "Only letters and white space allowed";
    }
  }
  if($password==$password2){
        $hashed_password = md5($password);
        $sql="INSERT INTO assn_user (name, email, username, pass, title, description, available)
        VALUES ('".$name."', '".$email."', '".$username."', '".$hashed_password."', '".$title."', '".$description."', '".$available."')";
            //query
            $qury=mysqli_query($con,$sql);
            if (!$qury)
            {
            die("Error connecting to database!:".mysqli_error($con));
            }
            //echo "<script> window.alert('Thanks, Your message was sent successfuly!'); </script>";
            else
            {
              echo "<script> alert(\"Thank you! Sign-up was successful, \n Please Log in to your Email and confirm your Account Details then now you can Log-in!\" ); </script>";
              header('location:index.php');
            } 
        }else{
          $passErr = "Password did not match";
      }
  
  
  
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Life2Do- <?php echo $title; ?></title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/password.css">
  <script type="text/javascript" src="lib/jquery-2.2.4.js"></script>
<script type="text/javascript" src="lib/jquery-1.12.4.js"></script>
<script type="text/javascript" src="lib/jquery-ui.js"></script>
<script type="text/javascript" src="lib/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery-validate.min.js"></script>
<script type="text/javascript" src="js/create_account.js"></script>
<style type="text/css">
  .error{
      color: red;
      font-weight: bold;
      
  }
  .hidden{
    display: none;
  }
  .strong{
font-weight:bold;
color: limegreen;
font-size:larger;
}
</style>
</head>
<body>
<div id="container">
	<?php include_once("includes/header.php"); ?>

	<aside id="sidebar">
		<section>
  		  <h3>Welcome</h3>
			  <a href="account.php" class="button"><?php echo $btn; ?></a> <br/>
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
  	 
  
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="createList" id="createlist">
          <fieldset>
          	<legend>User Details</legend>
           
          	<div>
          	  <label for="name" class="first">Name:</label>
              <input name="name" id="name" type="text" size="25" maxlength="50"/><span class ="error"><?php echo $nameErr; ?></span>
          	</div> 
          
            <div>
          	  <label for="email">Email:</label>
              <input name="email" id="email" type="text" size="25" maxlength="100"/><span class ="error"><?php echo $emailErr; ?></span>
          	</div>      	
          	

            <div>
          	  <label for="username">User Name:</label>
              <input name="username" id="username" type="text" size="25" maxlength="25"/>
              <ul>
              <li><span class ="error " id="uname_error_message"><?php echo $unameErr; ?></span></li>
              <li><span id="uname_error_message1"><?php echo $unameErr; ?></span></li>
              </ul>
          	</div>      	
          	
     	
          	
            <div>
          	  <label for="password">Password:</label>
              <input name="password" id="password" type="password" size="25" /><span id="error_password"><?php echo $passErr; ?></span>
            </div> 
            
             	
            <div>
          	  <label for="password2">Re-Enter Password:</label>
              <input name="password2" id="password2" type="password" size="25" /><span id="error_comfirm_pass"><?php echo $passErr; ?></span>
            </div>                 
          </fieldset>
             
             
          <fieldset>
          	<legend>List Details</legend>
            <div>
          	  <label for="title" class="first">List Title:</label>
              <input name="title" id="title" type="text" size="25" maxlength="100"/>
              <span class ="error" id="list_error_message"></span>
          	</div> 
          
            <div>
          	  <label for="descr">List Description:</label>
              <textarea name="descr" id="descr" cols="55" rows="10"></textarea>
          	</div> 
          	
          	<div>
          	  <label for="display">Make Available:</label>
              <input name='display' id='display' type='checkbox' />   
          	</div>       	  
          </fieldset>
           
        <div>
          <input name="submit" type="submit" value="Submit" class="btn" id="submit">
          <input name="reset" type="reset" value="Reset" class="btn">
          <span class="error" id="submit_error_message"></span>
  	    </div>

    </form>
  </main>
	<footer>
		<p>
			| &copy; Jamie Mitchell 2017 | 
		</p>
	</footer>

</div>
<?php




?>
</body>


</html>