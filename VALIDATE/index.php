

<?php
error_reporting(0);

// Start the session
session_start();
$_SESSION["logged"] ="no";
$title="Home";
// session_unset();

if ($_GET['sign_up_msg']==1)
{
echo "<script> alert(\"Thank you! Sign-up was successful, \n Please Log in to your Email and confirm your Account Details then now you can Log-in!\" ); </script>";
}
if ($_GET['login_error']==1)
{
echo "<script> alert(\"Wrong username or password, Please try again with correct credentials!\" ); </script>";
}


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
  <title>Life2Do- <?php echo $title; ?></title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="lib/jquery-2.2.4.js"></script>
<script type="text/javascript" src="lib/jquery-1.12.4.js"></script>
<script type="text/javascript" src="lib/jquery-ui.js"></script>
<script type="text/javascript" src="lib/jquery-ui.min.js"></script>
<script type="text/javascript" src="lib/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery-validate.min.js"></script>
<script type="text/javascript" src="js/additem.js"></script>
<!-- <script type="text/javascript" src="lib/jquery-ui.custom.min.js"></script> -->
<style type="text/css">
	#sortable { list-style-type: none; margin: 0; padding: 0; width: 80%; }
  	#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 35px; }
  	#sortable li span { position: absolute; margin-left: -1.3em; }
</style>
</head>
<body>
<div id="container">
	<?php include_once("includes/header.php"); ?>
	<aside id="sidebar">
		<section>
  		  <h3>Welcome</h3>
			  <a href="<?php echo $link; ?>" class="button"><?php echo $btn; ?></a> <br/>
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
	<main id="editlist">
  	<p class="warning">Note: Your list isn't visible to anyone but you</p>
  	<h2>Jamie's Bucket List</h2>
  	<a href="#additem.php" class="button" id="add">Add New Item</a>
  	<span id="additemdialog" title="ADD NEW ITEMS">
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

  		<form name="item" id="formitem" >
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
        <button type="submit">Submit</button>
       <!--  <div>
          <input name="submit" type="submit" value="Submit" class="btn">
          <input name="reset" type="reset" value="Reset" class="btn">
  	    </div> -->
    </form>
  	</span>
  	<ol class="bucketlist" id="sortable">
    	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Go Sky Diving
    	  <a href="editdetails.php?id="><img src="img/blue_edit.gif" alt="Edit List Item" height="18" width="18" /></a>
        <a href="deleteitem.php?id="><img src="img/blue_delete.gif" alt="Delete List Item" height="18" width="18" /></a>
      </li>
    	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Get a Tattoo
    	  <a href="editdetails.php?id="><img src="img/blue_edit.gif" alt="Edit List Item" height="18" width="18" /></a>
        <a href="deleteitem.php?id="><img src="img/blue_delete.gif" alt="Delete List Item" height="18" width="18" /></a>
    	</li>
    	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Play Blackjack in Las Vegas
    	  <a href="editdetails.php?id="><img src="img/blue_edit.gif" alt="Edit List Item" height="18" width="18" /></a>
        <a href="deleteitem.php?id="><img src="img/blue_delete.gif" alt="Delete List Item" height="18" width="18" /></a>
    	</li>
    	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Learn to Play the Guitar
    	  <a href="editdetails.php?id="><img src="img/blue_edit.gif" alt="Edit List Item" height="18" width="18" /></a>
        <a href="deleteitem.php?id="><img src="img/blue_delete.gif" alt="Delete List Item" height="18" width="18" /></a>
    	</li>
  	</ol>

  </main>
	<footer>
		<p>
			| &copy; Jamie Mitchell 2017 |
		</p>
	</footer>

</div>
</body>
</html>
