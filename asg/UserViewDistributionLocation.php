<?php

include("index3.php");

?>
<!DOCTYPE html>
<html>
<head>
	<style>
		#title {
			font-weight: bold;
			font-size: 40px;
			font-family: Lucida;
		}
	

	</style>
<title> Distribution Location </title>

<link rel="stylesheet" href="format.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
<div id ="nav-placeholder"></div>
<script>
	$(function(){
		$("#nav-placeholder").load("UserNav.html");

	});
</script>

<br><br><br><br>
<p style = "text-align :center" id = "title">Distribution Location</p>
<table align="center" border="2" bordercolor="white">

			
			<tbody>
				<?php
				$ccc = $_SESSION['user']['Username'];
		
			
				$sql = "SELECT Shop_Name,Shop_Address,Shop_Postcode,Location_City,Location_State,Shop_Phone FROM shop AS S
				INNER JOIN distribution_location AS D
				 ON S.Location_ID = D.Location_ID WHERE S.Location_ID IN (SELECT Location_ID From area AS A
				WHERE A.Username ='$ccc')";
				
				$result = mysqli_query($con,$sql);
			
				if ($result->num_rows > 0) {
					echo "<tr>
						<th> Image</th>
						<th> Shop Name</th>
						<th> Shop Address </th>
						<th> Shop Postcode</th>
						<th> Shop City</th>
						<th> Shop State</th>
						<th> Shop Phone</th>
						</tr>";
				while($row = $result->fetch_assoc()){
					$imgUrl = "pic/001.jpg";
				
				
					echo"<tr><td>";
					echo '<img src="'.$imgUrl.'" width="400" height="287">';
					echo"</td><td>"; 
					echo $row["Shop_Name"];
					echo"</td><td>";
					echo $row["Shop_Address"];
					echo"</td><td>";
					echo $row["Shop_Postcode"];
					echo"</td><td>";
					echo $row["Location_City"];
					echo"</td><td>";
					echo $row["Location_State"];
					echo"</td><td>";
					echo $row["Shop_Phone"];
					echo "<br>";
					
				}
			}
				?>
			</tbody>
</table>
</body>
</html>