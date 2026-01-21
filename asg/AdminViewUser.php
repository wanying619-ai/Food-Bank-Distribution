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

		.buttons { 
			display: inline-block;
			float: right;
			margin-right: 200px;
		}

		.button2 {
			padding: 10px 10px;
			margin: 0px 10px;
			font-size: 15px;
			text-align: center;
			text-decoration: none;
		}

		.arrow {
			width: 100px;
			height: 100px;
			margin-top: 100px;
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
	<p id = "title" style = "text-align: center">User List</p>
	<div class = "buttons">
		<button class="button2" onclick="delfunc()">DELETE</button>
	</div>

	<br> 

	<div class = "users">
		<table>
			<thead>
				<tr>
					<th>User ID</th>
					<th>Username</th>
					<th>User Full Name</th>
					<th>User Phone</th>
					<th>User Address</th>
					<th>Postcode</th>
					<th>City</th>
					<th>State</th>
					<th>User Gender</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$conn = mysqli_connect("localhost", "root", "", "database");
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT * FROM userprofile AS u JOIN user ON u.User_ID = user.User_ID JOIN area ON user.Username = area.Username";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["User_ID"]. "</td><td>" . $row["Username"]. "</td><td>" . $row["User_Name"]. "</td><td>" . $row["User_Phone"]. "</td><td>" . $row["User_Address"]. "</td><td>" . $row["Postcode"]. "</td><td>" . $row["City"]. "</td><td>" . $row["Instate"].  "</td><td>" . $row["Gender"]. "</td></tr>";
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

<a href='adminHome.html'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
<!-- END of content -->

<script>
	function delfunc() {
		window.location.href="AdminDelUser.php";
	}
</script>

</body>
</html>