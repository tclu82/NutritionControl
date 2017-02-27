<?php
	session_start();
	$con = mysqli_connect("vergil.u.washington.edu","ghs9",
						"12345","nutrition", 8787);
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>TCSS445 Team7 Add Food</title>
  <link rel="stylesheet" type="text/css" href="style_1.css">
</head>

<body>
	<h1>
		Add Food
	</h1>
	<div id="frm">
		<form action="addFoodProcess.php" method="POST">
	    <p class="login">
	  		Select a specific date:
	  		<input id="date" name="date" size="15" type="Date" />
	    </p>
		<p class="login">
			Select a food:
			<select name="food">	
				  <?php
				  	$query = "SELECT name, food_id FROM food";
				  	$result = mysqli_query($con,$query);
				  	while($row = mysqli_fetch_array($result))
				    {
				  		echo	"<option value=\"".$row[food_id]."\">".$row[name]."</option>";
				    }
				  ?>
			</select>
		</p>
		<p class="login">
			Select a quantity:
			<select name="qty">	
				<?php
					$count = 1;
					while($count < 11)
				    {
				    	echo "<option value=\"".$count."\">".$count."</option>";
				    	$count = $count + 1;
				    }

				?>
			</select>
		</p>
		<p class="login">
			Select a meal type:
			<select name="type">
				<?php
					$query = "SELECT m_id, name FROM meal GROUP BY m_id";
					$result = mysqli_query($con,$query);
					while($row = mysqli_fetch_array($result))
					{
						echo "<option value=\"".$row[m_id]."\">".$row[name]."</option>";
					}

				// <option value="breakfast">Breakfast</option>
				// <option value="brunch">Brunch</option>
				// <option value="lunch">Lunch</option>
				// <option value="snack">Snack</option>
				// <option value="dinner">Dinner</option>
				// <option value="dessert">Dessert</option>
				?>
			</select>
		</p>
		<p class="login">
			<input type="submit" id="btn" value="Add Food" />
		</p>
	</div>
</body>