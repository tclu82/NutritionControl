<?php
	session_start();
	$con = mysqli_connect("vergil.u.washington.edu","ghs9",
							"12345","nutrition", 8787);
	$user = $_POST["user"];
	$user = stripcslashes($user);
	$user = mysqli_real_escape_string($con,$user);

	$query = "SELECT id, fname, lname FROM user WHERE id =".$user;
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$_SESSION["u_id"]=$row[id];
	$_SESSION["u_name"]=$row[fname]." ".$row[lname];
	header("Location: Nutri_startScreen.php");
?>