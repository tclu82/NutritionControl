<?php
	session_start();
	$con = mysqli_connect("vergil.u.washington.edu","ghs9",
						"12345","nutrition", 8787);
	$meal = $_POST["meal"];
	$meal = stripcslashes($meal);
	$meal = mysqli_real_escape_string($con,$meal); 

	$query = "SELECT mh.m_date AS 'm_date', mh.serving_size AS 'portion', ";
	$query .= "u.fname, m.name AS 'meal_name', f.name AS 'food_name', ";
	$query .= "mh.serving_size * f.protein_g  AS 'protein(g)', ";
	$query .= "mh.serving_size * f.carb_g  AS 'carb(g)', ";
	$query .= "mh.serving_size * f.fat_g  AS 'fat(g)', ";
	$query .= "mh.serving_size * f.calories_cal AS 'cal' ";
	$query .= "FROM ((user u JOIN meal m) JOIN meal_has_food mh) JOIN food f ";
	$query .= "WHERE u.id = m.id  ";
	$query .= "AND mh.id = m.id AND mh.id = m.id ";
	$query .= "AND mh.m_id = m.m_id AND f.food_id = mh.food_id ";
	$query .= "AND u.id = ".$_SESSION[u_id]." AND mh.meal_record = ".$meal;

	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$date = $row[m_date];
	$dateToPrint = date('Y-m-d', strtotime($date));
	$food = $row[food_name];
	$type = $row[meal_name];
	$qty = $row[portion];
	$_SESSION[meal_alter] = $meal;
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>TCSS445 Team7 Alter Food</title>
  <link rel="stylesheet" type="text/css" href="style_1.css">
</head>

<body>
	<h1>
		Change Meal
	</h1>
	<div id="frm">
		<form action="alterFoodProcess.php" method="POST">
	    <p class="login">
	  		Change date:
	  		<?php
	  			echo "<input id=\"date\" name=\"date\" size=\"15\" type=\"Date\" value=\"".$dateToPrint."\"/>";
	  		?>
	    </p>
		<p class="login">
			Change food:
			<select name="food">	
				  <?php
				  	$query = "SELECT name, food_id FROM food";
				  	$result = mysqli_query($con,$query);
				  	while($row = mysqli_fetch_array($result))
				    {
				    	if ($row[name] == $food)
				    	{
				  			echo	"<option value=\"".$row[food_id]."\" selected=\"selected\">".$row[name]."</option>";
				    	}
				  		else
				  		{
				  			echo	"<option value=\"".$row[food_id]."\">".$row[name]."</option>";
				  		}
				    }
				  ?>
			</select>
		</p>
		<p class="login">
			Qhange portion:
			<select name="qty">	
				<?php
					$count = 1;
					while($count < 11)
				    {
				    	if ($count == $qty)
				    	{
				    		echo "<option value=\"".$count."\" selected=\"selected\">".$count."</option>";
				    	}
				    	else
				    	{
				    		echo "<option value=\"".$count."\">".$count."</option>";
				    	}
				    	$count = $count + 1;
				    }

				?>
			</select>
		</p>
		<p class="login">
			Change meal type:
			<select name="type">
				<?php
					$query = "SELECT m_id, name FROM meal GROUP BY m_id";
					$result = mysqli_query($con,$query);
					while($row = mysqli_fetch_array($result))
					{
						if ($row[name] == $type)
						{
							echo "<option value=\"".$row[m_id]."\" selected=\"selected\">".$row[name]."</option>";
						}
						else
						{
							echo "<option value=\"".$row[m_id]."\">".$row[name]."</option>";
						}
					}

				?>
			</select>
		</p>
		<p class="login">
			<input type="submit" id="btn" value="Add Food" />
		</p>
	</div>
</body>