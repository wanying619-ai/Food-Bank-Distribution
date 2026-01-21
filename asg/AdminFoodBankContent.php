<!DOCTYPE type>
<html>
<head>
	<title>Food Bank Distribution App</title>
	<link rel="stylesheet" href="format.css">
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
			width: 90%;
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

		.button1, .button2 {
			padding: 10px 10px;
			margin: 0px 10px;
			font-size: 15px;
			text-align: center;
			text-decoration: none;
		}

		.button3 {
			border-radius: 12px;
			text-align: center;
			text-decoration: none;
			font-size: 15px;
			cursor: pointer;
			
			background-color: #e7e7e7;
		}

		.button3:hover {
			opacity: 0.5;
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
<div class="top">
  	<img src = "pic/logo.png" alt="logo" class="logo">
  	<nav>
  		<ul>
  			<li><p id = "navbar"><a href="AdminHome.html">HOME</a></p></li>
            <li><p id = "navbar"><a href="AdminReport.html">REPORT</a></p></li>
            <li><p id = "navbar"><a href="http://localhost/asg/AdminFoodBankContent.php">FOOD BANK CONTENT</a></p></li>
            <li><p id = "navbar"><a href="http://localhost/asg/AdminViewUser.php">USER LIST</a></p></li>
            <li>
                <div class="dropdown">
                    <button class = "dropbtn"><img src="pic/profile.png" alt="profile" class="profile"></button>
                    <div class="dropdown-content">
                        <a href="AdminMainPage.html">LOG OUT</a>
                    </div>
                </div>
            </li>
  		</ul>
  	</nav>
</div>
<!-- END of Navbar -->

<!-- Content -->
<div class="container">
	<p id = "title" style = "text-align: center">Food Bank Content</p>
	<div class = "buttons">
		<button class="button1" onclick="addfunc()">ADD</button>
		<button class="button2" onclick="delfunc()">DELETE</button>
	</div>

	<br>

	<div class = "foodbank">
		<table>
			<thead>
				<tr>
					<th>Shop ID</th>
					<th>Shop Name</th>
					<th>Shop Address</th>
					<th>Postcode</th>
					<th>City</th>
					<th>State</th>
					<th>Shop Phone</th>
					<th>Shop Registration No</th>
					<th>Employer Name</th>
					<th>Shop Username</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$conn = mysqli_connect("localhost", "root", "", "database");
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT * FROM shop INNER JOIN distribution_location AS d ON shop.Location_ID = d.Location_ID";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
                
						echo "<tr>";
						echo '<td>'. $row['Shop_ID'] . '</td>';
						echo '<td>' . $row['Shop_Name'] . '</td>';
						echo '<td>' . $row['Shop_Address'] . '</td>';
						echo '<td>' . $row['Shop_Postcode'] . '</td>';
						echo '<td>' . $row['Location_City'] . '</td>';
						echo '<td>' . $row['Location_State'] . '</td>';
						echo '<td>' . $row['Shop_Phone'] . '</td>';
						echo '<td>' . $row['Shop_RegisNo'] . '</td>';
						echo '<td>' . $row['Employer_Name'] . '</td>';
						echo '<td>' . $row['Shop_UserName'] . '</td>';
						echo '<td><a href="AdminEditFoodBank.php?id=' . $row['Shop_ID'] . '"><button type="button" class="button3">EDIT</button></a></td>';
						echo "</tr>";
						
						}
						
						echo "</table>";
					}
						?>
			</tbody>
		</table>
	</div>
</div>

<br>

<a href='adminHome.html'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
<!-- END of content -->

<script>
	function addfunc() {
		window.location.href="http://localhost/asg/AdminAddFoodBank.php";
	}	

	function delfunc() {
		window.location.href="http://localhost/asg/AdminDelFoodBank.php";
	}
</script>

</body>
</html>