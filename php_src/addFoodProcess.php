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

	$query = "INSERT INTO meal_has_food (id, m_id, m_date, food_id, serving_size)";
	$query = $query."VALUES(".$_SESSION[u_id].", ".$type.", '".$dateToPrint."', ".$food.", ".$qty.")";
	$result = mysqli_query($con,$query);
	header("Location: Nutri_startScreen.php");
?>