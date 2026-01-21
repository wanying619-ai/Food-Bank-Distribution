<?php
include('index3.php');

$sql = "SELECT * FROM shop AS S INNER JOIN distribution_location AS D
ON D.Location_ID = S.Location_ID 
WHERE S.Shop_UserName = '".$_SESSION['shopUsername']['Shop_UserName']."'";
		
$result = mysqli_query($con,$sql);
?>
<html>
<head>
<title> User Profile </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="format.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<style>
*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		List-style: none;
	}

	.wrapper{
		position:absolute;
		top:350px;
		left:53%;
		transform:translate(-50%,-50%);
		height:520px;
		width:800px;
		display:flex;
		box-shadow: 0 3px 50px 0 rgba(69,90,100,0.08)
	}

	.wrapper .left{
		width:35%;
		background:#474e5d;
		padding:60px 50px;
		border-top-left-radius: 5px;
		text-align:center;
		color:#fff;
	}

	.wraper .left img{
		margin-bottom:10px;
		border-radius:5px;
	}

	.wrapper .left h4{
		margin-bottom:10px;
	}

	.wrapper .left p{
		font-size: 15px;
	}

	.wrapper .right {
		width:65%;
		background:#fff;
		border-top-right-radius:5px;
		border-bottom-right-radius:5px;
		padding:30px 25px;
	}

	.wrapper .right .info,
	.wrapper .right .projects{
		margin-bottom:80px;
	}

	.wrapper .right .info h3,
	.wrapper .right .projects h3{
		margin-bottom: 15px;
		padding-bottom:5px;
		border-bottom:1px solid #e0e0e0;
		color: #353c4e;
		text-transform: uppercase;
		letter-spacing:4px;
	}

	.wrapper .right .projectdata,
	.wrapper .right .infodata{
		display:flex;
	}

	.wrapper .right .projectdata .data,
	.wrapper .right .infodata .data{
		width: 45%;
	}

	.wrapper .right .projectdata .data h4,
	.wrapper .right .infodata .data h4{
		color:#353c4e;
		margin-bottom:5px;
	}

	.wrapper .right .projectdata .data p,
	.wrapper .right .infodata .data p{
		font-size:13px;
		margin-bottom: 10px;
		color: #919aa3;
	}

	.submit a{
		
			text-decoration: none;
	}
	.submit {
		margin: 20px;
		background-color: #90EE90;
		padding: 10px 10px;
		font-size: 20px;
		font-family: Lucida Console, monospace;
		text-align:center;
		width : 100px;
	}

</style>
</head>
<body>
<body>
<div id ="nav-placeholder"></div>
<script>
	$(function(){
		$("#nav-placeholder").load("ShopNavigation.html");

	});
</script>
<div class = "wrapper">
	<?php
		while($row = mysqli_fetch_array($result)){
		?>
		<div class = "left">
		<img src = "pic/user.png" alt = "user" width = "105" height = "110">
		<br>
		<br>
			<?php echo "<b>Shop Name:</b> ". $row['Shop_Name'];echo "<br>";?>
		</div>
		<div class = "right">
			<div class = "info">
				<h3>Information</h3>
				<div class = "Infodata">
					<div class = "data">
						<h4> Phone </h4>
						<?php echo  $row['Shop_Phone'];?>
                        <br><br>
                        <h4> Registration Number </h4>
						<?php echo  $row['Shop_RegisNo'];?>
                        <br><br>
                        <h4> Shop Employer </h4>
                        <?php echo $row['Employer_Name'];?>
					</div>
					<div class = "data">
						<h4>Address</h4>
						<?php echo $row['Shop_Address'];?>
						<br><br>
						<h4>Postcode</h4>
						<?php echo $row['Shop_Postcode'];?>
						<br><br>
						<h4>City</h4>
						<?php echo $row['Location_City'];?>
						<br><br>
						<h4>State</h4>
						<?php echo $row['Location_State'];?>
					</div>
				</div>
				<br><br>
				<div class = "projects">
				<h3> About me</h3>
				<div class = "projectdata">
					<div class = "data">
					<h4>Username</h4>
					<?php echo $row['Shop_UserName'];?>
				</div>
				<div class = "data">
					<h4>Password</h4>
					<?php echo $row['Shop_Password'];?>
				</div>
			</div>
			</div>

		
		</div>
		<br>
		<div class = "submit">
		<?php
		echo '<b><font color="#663300"><a href="ShopEditProfile.php?id=' . $row['Shop_ID'] . '">Edit</a></font></b>';
		}
		
		
	?>
	</div>
</body>
</html>