<?php
	session_start();
	$con = mysqli_connect("vergil.u.washington.edu","ghs9",
							"12345","nutrition", 8787);
	$date = $_POST["date"];
	$food = $_POST["food"];
	$qty = $_POST["qty"];
	$type = $_POST["type"];
	$dateToPrint = date('Y-m-d', strtotime($date));
	$dateToPrint = stripcslashes($dateToPrint);
	$food = stripcslashes($food);
	$qty = stripcslashes($qty);
	$type = stripcslashes($type);
	$dateToPrint = mysqli_real_escape_string($con,$dateToPrint);
	$food = mysqli_real_escape_string($con,$food);
	$qty = mysqli_real_escape_string($con,$qty);
	$type = mysqli_real_escape_string($con,$type);

	// echo $dateToPrint;
	// echo $food;
	// echo $qty;
	// echo $type;
	// echo $_SESSION[u_id];

	$query = "UPDATE meal_has_food SET m_id = ".$type.", m_date = \"".$dateToPrint."\", ";
	$query .= "food_id = ".$food.", serving_size = ".$qty." WHERE meal_record = ".$_SESSION[meal_alter];
	// echo $query;
	$result = mysqli_query($con,$query);
	header("Location: Nutri_startScreen.php");
?>