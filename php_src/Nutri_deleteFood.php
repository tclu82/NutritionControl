<?php
	session_start();
	$con = mysqli_connect("vergil.u.washington.edu","ghs9",
						"12345","nutrition", 8787);
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>TCSS445 Team7 Delete Food</title>
  <link rel="stylesheet" type="text/css" href="style_1.css">
</head>

<body>
	<h1>
		Delete Food
	</h1>
	<div id="frm">
		<form action="deleteFoodProcess.php" method="POST">
		<p class="login">
			Select a food:
			<select name="meal">	
				  <?php
				  	$query = "SELECT mh.meal_record AS 'm_rec', mh.m_date AS 'date', mh.m_id, u.fname, m.name AS 'meal_name', f.name AS 'food_name',";
					$query = $query."mh.serving_size * f.protein_g AS 'protein_g',";
					$query = $query."mh.serving_size * f.carb_g AS 'carb_g', mh.serving_size * f.fat_g AS 'fat_g',";
					$query = $query."mh.serving_size * f.calories_cal AS 'cal' ";
					  
					$query = $query."FROM user u, meal m, meal_has_food mh, food f ";
					$query = $query."WHERE u.id = m.id AND mh.id = m.id AND mh.id = m.id AND mh.m_id = m.m_id AND f.food_id = mh.food_id ";

					$query = $query."AND u.id = ".$_SESSION["u_id"]." ";

					$query = $query."ORDER BY mh.m_date DESC, m.name, f.name";

				  	$result = mysqli_query($con,$query);
				  	while($row = mysqli_fetch_array($result))
				    {
				    	$date = $row[date];
		  	  			$dateToPrint = date('j F, Y', strtotime($date));
				  		echo	"<option value=\"".$row[m_rec]."\">".$dateToPrint.": ".$row[meal_name].", ".$row[food_name]."</option>";
				    }
				  ?>
			</select>
		</p>
		<p class="login">
			<input type="submit" id="btn" value="Delete Meal" />
		</p>
	</div>
</body>