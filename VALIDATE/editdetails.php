<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Life2Do-Home</title>
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
<script type="text/javascript" src="js/editdetails.js"></script>
<style type="text/css">
  .error_form{
    color: red;
  }
</style>

</head>
<body>
<div id="container">
<div id="dialog-confirm" title="Delete User?">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These user details will be permanently deleted and cannot be recovered. Are you sure?</p>
            </div>
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

  	 <form action="pdetails.php" method="post" name="addItem" enctype="multipart/form-data" id="details" >
        <fieldset>
        	<legend>Basic Items Details</legend>

        	<div>
        	  <label for="item" class="first">2Do Item:</label>
            <input name="item" id="item" type="text" size="50" maxlength="255"/>
            <span class="error_form" id="item_error_message"></span>
        	</div>

          <div>
        	  <label for="itemNum">Item Number:</label>
            <input name="itemNum" id="itemNum" type="text" size="5" maxlength="5" />
            
            <span id="itemNo_error_message" style="font-size:.7em;">&nbsp;If left empty, inserted order is assumed</span>
          </div>
        </fieldset>


        <fieldset>
          <legend>Completed Item Details</legend>
           <div>
            <label class="first" for="completed">Completed:</label>
            <input name="completed" id="completed" type="checkbox" />
           </div>

           <div>
            <label for="dateCompleted">Date Completed:</label>
        		<input name="dateCompleted" id="dateCompleted" placeholder="YYYY-MM-DD" type="text" />
           </div>

           <div>
             <label for="itemDets" class="tarealabel">Dets & Thoughts:</label>
        		<textarea name="itemDets" id="itemDets" cols="55" rows="15"></textarea>
           </div>
           <div>
              <label for="itemImage">Upload Picture</label>
              <input type="hidden" name="MAX_FILE_SIZE" value ="2097152">
              <input name="itemImage" id="itemImage" type="file">
           </div>
        </fieldset>


        <div>
          <input name="submit" type="submit" value="Submit" class="btn">
          <input name="reset" type="reset" value="Reset" class="btn">
          <span class="error_form" id="submit_error_message"></span>
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
