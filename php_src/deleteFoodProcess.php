<?php 
	session_start();
	$con = mysqli_connect("vergil.u.washington.edu","ghs9",
							"12345","nutrition", 8787);
	$meal = $_POST["meal"];
	$meal = stripcslashes($meal);
	$meal = mysqli_real_escape_string($con,$meal);

	$query = "DELETE FROM meal_has_food WHERE meal_record = ".$meal;
	$result = mysqli_query($con,$query);
	header("Location: Nutri_startScreen.php");
?>