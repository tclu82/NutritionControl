<?php
	$con = mysqli_connect("vergil.u.washington.edu","ghs9",
							"12345","nutrition", 8787);
	$mail = $_POST["mail"];
	$pass = $_POST["pass"];
	$mail = stripcslashes($mail);
	$pass = stripcslashes($pass);
	$mail = mysqli_real_escape_string($con,$mail);
	$pass = mysqli_real_escape_string($con,$pass);

	$query = "SELECT * FROM user WHERE email = '$mail' AND user_password = '$pass'";
	$result = mysqli_query($con,$query)
				or die("Failed to query database".mysqli_connect_error());
	$row = mysqli_fetch_array($result);

	if ($row[email] == $mail && $row[user_password] == $pass) {
		ob_start();
		session_start();
		session_unset();
		$_SESSION["u_id"]=$row[id];
		$_SESSION["u_name"]=$row[fname]." ".$row[lname];
		$_SESSION["u_type"]=$row[user_status];
		$_SESSION["u_trainer"]=$row[trainer_id];
		header("Location: Nutri_startScreen.php");
		exit();
	} else {
		echo "Failed to login";
	}
?>