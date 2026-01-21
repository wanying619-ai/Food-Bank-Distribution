<!DOCTYPE type>
<html>
<head>
	<title>Food Bank Distribution App</title>
	<link rel="stylesheet" href="format.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<style>
		#title {
			font-weight: bold;
			font-size: 40px;
			font-family: Lucida;
		}

		table {
			margin-left: auto;
			margin-right: auto;
			margin-top: 60px;

			border-collapse: collapse;
		}

		th, td {
			padding: 0.5rem;
			text-align: center;
			font-size: 20px;
			border: 1px solid #000000;
		}
		
		.arrow {
			width: 100px;
			height: 100px;
			margin-top: 50px;
			margin-left: 30px;
		}
	</style>
</head>

<body>
<!-- Navbar -->
<div id ="nav-placeholder"></div>
<script>
	$(function(){
		$("#nav-placeholder").load("AdminNavigation.html");

	});
</script>
<!-- END of Navbar -->

<!-- Content -->
<div class="container">
	<p id = "title" style = "text-align: center">Distribution Location</p>

	<div class = "foodbank">
		<table>
			<thead>
				<tr>
					<th>State</th>
					<th>City</th>
					<th>Total Number</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$db = "database";
				$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
				foreach($dbh->query('SELECT d.Location_State,d.Location_City, shop.Location_ID, COUNT(*) AS nums 
					FROM shop INNER JOIN distribution_location AS d
					ON shop.Location_ID = d.Location_ID
					GROUP BY shop.Location_ID ORDER BY shop.Location_ID') AS $row) {
				echo "<tr>";
				echo "<td>" . $row['Location_State'] . "</td>";
				echo "<td>" .$row['Location_City'] . "</td>";
				echo "<td>" . $row['nums'] . "</td>";
				echo "</tr>"; 
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<br>

<a href='adminReport.html'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
<!-- END of content -->

</body>
</html>