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
			font-family: Lucida ;
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
	<p id = "title" style = "text-align: center">Food Category</p>

	<div class = "foodbank">
		<table>
			<thead>
				<tr>
					<th>Food Category</th>
					<th>Food Name</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$conn = mysqli_connect("localhost", "root", "", "database");
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT Food_Category, Food_Name FROM food ORDER BY Food_Category";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						?>
						<tr>
							<td><?php echo $row['Food_Category']; ?></td>
							<td><?php echo $row['Food_Name']; ?></td>
						</tr>
				<?php
				}
				echo "</table>";
				} else { echo "0 results";}
				$conn->close();
			?>
			</tbody>
		</table>
	</div>
</div>

<br>

<a href='AdminReport.html'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
<!-- END of content -->

</body>
</html>