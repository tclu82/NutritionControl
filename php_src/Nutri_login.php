<!DOCTYPE HTML>
<html>

<head>
<?php
	session_unset();
	$con = mysqli_connect("vergil.u.washington.edu","ghs9","12345","nutrition", 8787);
	
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>	
  <title>TCSS445 Team7 Login</title>
  <link rel="stylesheet" type="text/css" href="style_1.css">
</head>

<body>
	<div id="frm">
  		<h1 class="login">Nutrition</h1>
  	 	<form action="process.php" method="POST">
		    <p class="login">
		        <label for="mail">E-mail:</label>
		        <input type="email" id="mail" name="mail" />
		    </p>
		    <p class="login">
		        <label for="pass">Password:</label>
		        <input type="password" id="pass" name="pass" />
		    </p>
		    <p class="login">
	        	<input type="submit" id="btn" value="Login" />
	    	</p>
	    </form>
    </div>
</body>
</html>