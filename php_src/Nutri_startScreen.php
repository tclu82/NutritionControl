<?php
	session_start();
	$con = mysqli_connect("vergil.u.washington.edu","ghs9",
						"12345","nutrition", 8787);
?>

<!doctype html>

<html lang="en">
<head>
  <style>
  	table, th, td {
  		border: 1px solid black;
  	}

	table {
	    width: 100%;
	    background-color: #ff7b00;
	}
	td {
    	text-align: center;
	}
  </style>
  <meta charset="utf-8">

  <title>TCSS445 Team7 Start</title>

  <link rel="stylesheet" type="text/css" href="style_1.css">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body
  <script src="js/scripts.js"></script>
  <div style="float: left">
	  <h1>Nutrition</h1>
<!-- 	  <p>
	  	Find a specific date?
	  	<input name="Specific Date" size="15" type="Date" />
	  </p>
	  <p>
	  	Or look for a specific month?
	  	<input name="Specific month" size="15" type="month" />
	  </p>
	  <p>
	  	Or look for a specific week?
	  	<input name="Specific week" size="15" type="week" />
	  </p> -->
	  <p>
		<!-- <form action="Nuti_addFood.php"> -->
			<!-- Or  -->
        	<a href="Nutri_addFood.php">add a meal?</a>
	<!-- 	</form> -->
	  </p>
	  <p>
	  		Or
	  		<a href="Nutri_deleteFood.php">delete a meal?</a>
	  </p>
		<div>
			<form action="Nutri_alterFood.php" method="POST">
			<p class="login">
				Or select a meal to alter?
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
				<input type="submit" id="btn" value="Change Meal" />
			</p>
			</form>
		</div>
	    <div>
	      <form action="processTrainer.php" method="post">
			  <p>
			  	<?php
			  		if ($_SESSION[u_type] == 'T') {
		  	 			// echo "<form action=\"processTrainer.php\" method=\"POST\">";
			  			echo "Trainer, select which profile to view";
			  			echo "<select name=\"user\">";
			  			$query = "SELECT id, fname, lname FROM user WHERE trainer_id = ".$_SESSION["u_trainer"];
			  			$result = mysqli_query($con,$query)
			  					  or die("Failed to query database".mysqli_connect_error());
					  	while($row = mysqli_fetch_array($result))
					    {
					    	echo	"<option value=\"".$row[id]."\">".$row[fname]." ".$row[lname]."</option>";
					    }
			  			echo "</select>";
						echo "<input type=\"submit\" id=\"btn\" value=\"View Profile\" />";
			    		// echo "</form>";
			  		}
			  	?>
			  </p>
		  </form>
		</div>
		<div>
			<p>
				Or, Log out?
	  			<a href="Nutri_login.php">log out</a>
			</p>
		</div>
  </div>
  <div>
	  <h2>Hello, <?php echo $_SESSION["u_name"];?>, The day is
		  <?php
		  		echo " ".date('F j, Y')." ";
		  ?>
	    and here is your report. Happy eating!
	  </h2>

	  <p>
	  	<?php
		  // $query = "SELECT macros.m_date, macros.protein_g, macros.carb_g, ";
		  // $query = $query."macros.fat_g,Water.water_oz, calories.calorie_num FROM meal ";
		  // $query = $query."JOIN calories ON meal.m_id = calories.m_id JOIN macros ";
		  // $query = $query."ON meal.m_id = macros.m_id JOIN Water ON meal.m_id = Water.m_id ";
		  // $query = $query."WHERE meal.id = ".$_SESSION["u_id"];

		  	$query = "SELECT mh.m_date AS 'date', mh.m_id, u.fname, m.name AS 'meal_name', f.name AS 'food_name',";
			$query = $query."SUM(mh.serving_size * f.protein_g)  AS 'protein_g',";
			$query = $query."SUM(mh.serving_size * f.carb_g)  AS 'carb_g', SUM(mh.serving_size * f.fat_g)  AS 'fat_g',";
			$query = $query."SUM(mh.serving_size * f.calories_cal) AS 'cal' ";
			  
			$query = $query."FROM user u, meal m, meal_has_food mh, food f ";
			$query = $query."WHERE u.id = m.id AND mh.id = m.id AND mh.id = m.id AND mh.m_id = m.m_id AND f.food_id = mh.food_id ";

			$query = $query."AND u.id = ".$_SESSION["u_id"]." ";

			$query = $query."GROUP BY mh.m_date, mh.m_id";
			// echo $query;
		    $result = mysqli_query($con,$query)
					or die("Failed to query database".mysqli_connect_error());


			  echo "<table style=\"width:56%\">";
			  echo 	  "<tr>";
			  echo 		"<th>Date</th>";
			  echo 		"<th>Meal Type</th>";
			  echo 		"<th>Calories</th>";
			  echo 		"<th>Protein (g)</th>";
			  echo 		"<th>Fat (g)</th>";
			  echo 		"<th>Carbohydrates (g)</th>";
			  // echo	    "<th>Water</th>";
			  echo	  "</tr>";
		  while($row = mysqli_fetch_array($result))
		  {
		  	  $date = $row[date];
		  	  $dateToPrint = date('j F, Y', strtotime($date));
			  echo	  "<tr>";
			  echo	    "<td width=\"12%\">".$dateToPrint."</td>";
			  echo 		"<td width=\"6%\">".$row[meal_name]."</td>";
			  echo	    "<td width=\"10%\">".$row[cal]."</td>";
			  echo	    "<td width=\"7%\">".$row[protein_g]."</td>"; 
			  echo	    "<td width=\"7%\">".$row[fat_g]."</td>";
			  echo	    "<td width=\"7%\">".$row[carb_g]."</td>";
			  // echo	    "<td width=\"7%\">".$row[water_oz]."</td>";
			  echo	  "</tr>";

		  }
			  echo  "</table>";

		?>
	  </p>
	</div>
  <script language="javascript">
    function getDate() {
	  	var monthNames = [
		  "January", "February", "March",
		  "April", "May", "June", "July",
		  "August", "September", "October",
		  "November", "December"
		];

		var date = new Date();
		var day = date.getDate();
		var monthIndex = date.getMonth();
		var year = date.getFullYear();

		console.log(day, monthNames[monthIndex], year);
		return (monthIndex + '/' + day + '/' + year);
	}
	document.getElementById("date1").innerHTML = getDate();
	document.getElementById("date2").innerHTML = getDate();
	document.getElementById("date3").innerHTML = getDate();
  </script>
</body>

</html>