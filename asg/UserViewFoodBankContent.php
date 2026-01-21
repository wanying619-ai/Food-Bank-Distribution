<!DOCTYPE type>
<html>
<head>
	<title>Food Bank Distribution App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

		.button1, .button2, .button3 {
			padding: 10px 10px;
			margin: 0px 10px;
			font-size: 15px;
			text-align: center;
			text-decoration: none;
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
		$("#nav-placeholder").load("UserNav.html");

	});
</script>

<!-- END of Navbar -->

<!-- Content -->
<div class="container">
	<p id = "title" style = "text-align: center">Food Bank Content</p>

	<div class = "foodbank">
		<table>
			<thead>
				<tr>
					<th>Shop ID</th>
					<th>Shop Name</th>
					<th>Shop Address</th>
					<th>Postcode</th>
					<th>County</th>
					<th>State</th>
					<th>Shop Phone</th>
					<th>Shop Registration No</th>
					<th>Employer Name</th>
                    <th>Food Available</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$conn = mysqli_connect("localhost", "root", "", "database");
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT Shop_ID,Shop_Name,Shop_Address,Shop_Postcode,Location_City,Location_State,Shop_Phone,Shop_RegisNo,Employer_Name FROM shop AS S
				INNER JOIN distribution_Location AS D
				 ON S.Location_ID = D.Location_ID WHERE S.Location_ID ";
				$result = $conn->query($sql);

              
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						?>
						<tr>
							<td><?php echo $row['Shop_ID'] ; ?></td>
							<td><?php echo $row['Shop_Name']; ?></td>
							<td><?php echo $row['Shop_Address']; ?></td>
							<td><?php echo $row['Shop_Postcode']; ?></td>
							<td><?php echo $row['Location_City']; ?></td>
							<td><?php echo $row['Location_State']; ?></td>
							<td><?php echo $row['Shop_Phone']; ?></td>
							<td><?php echo $row['Shop_RegisNo']; ?></td>
							<td><?php echo $row['Employer_Name']; ?></td>
                            <td>
                            <ul>
                            <?php 
                            $id = $row['Shop_ID'];
                             $ggg = "SELECT * FROM food AS F INNER JOIN supply AS S on F.Food_ID = S.Food_ID 
                             INNER JOIN shop AS SH ON SH.Shop_ID = S.Shop_ID WHERE SH.Shop_ID = '$id'";
                              
                            $result2 = $conn->query($ggg);
                            if ($result2->num_rows > 0) {
                                
                                while($row = $result2->fetch_assoc()) {
                                    ?>
                                    <li><?php echo $row['Food_Name']; ?></li>
                                
                            <?php
                                }
                            }else { echo "-";}
                            ?>
                            </ul>
                        </td>
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


<!-- END of content -->

</body>
</html>