<?php
include('index3.php');

$sql = "SELECT F.Food_ID,F.Food_Name,F.Food_Category,S.Food_Quantity FROM food AS F 
						INNER JOIN supply AS S on F.Food_ID = S.Food_ID
						INNER JOIN shop AS SH on SH.Shop_ID = S.Shop_ID 
						WHERE SH.Shop_Name = '".$_SESSION['shopUsername']['Shop_Name']."'";
						
				$result = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
    <title>
        Shop Food catagory
    </title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="format.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
		#title {
			font-weight: bold;
			font-size: 40px;
			font-family: Lucida;
		}
		#shop_name {
			font-weight: bold;
			font-size: 30px;
			font-family: Lucida ;
			text-align: center;
		}
		table {
			margin-left: auto;
			margin-right: auto;
			margin-top: 100px;

			border-collapse: collapse;
		}
        .foodTable{
            bottom:60%;
        }

		th, td {
			padding: 0.5rem;
			text-align: center;
			font-size: 20px;
			border: 1px solid #000000;
		}

		tbody tr:hover {
		  	background: #D3D3D3;
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
			width: 150px;
			height: 150px;
			margin-top: 50px;
			margin-left: 30px;
		}
        </style>
</head>

<body>
<div id ="nav-placeholder"></div>
<script>
	$(function(){
		$("#nav-placeholder").load("ShopNavigation.html");

	});
</script>
<div class="container">
	<p style = "text-align :center" id = "title">Food Category</p>
	<p  id = "shop_name" ><?php  if (isset($_SESSION['shopUsername'])) : ?>
					<strong><?php echo $_SESSION['shopUsername']['Shop_Name']; ?></strong>
					</p>
					<?php endif ?>
	<div class = "buttons">
        <button id = "add" class="button1" name = "add">Add</button>
            <script >
                var btn = document.getElementById('add');
                btn.addEventListener('click',function(){
                    document.location.href = 'ShopAddFoodCategory.php'
                });
            </script>
            </script>
     </div>
</div>
<div class = "foodTable">
    <div class = "food">
        <table>
            <thread>
                <tr>
					<th>Food ID</th>
                    <th>Food Name</th>
                    <th>Food Category</th>
                    <th>Food Quantity</th>
					<th>Delete</th>
					<th>Edit</th>
                </tr>
            </thread>
            <tbody>
                <?php
				
					while($row = $result->fetch_assoc()){
                
						echo "<tr>";
						echo '<td><b>' . $row['Food_ID'] . '</b></td>';
						echo '<td><b>' . $row['Food_Name'] . '</b></td>';
						echo '<td><b>' . $row['Food_Category'] . '</b></td>';
						echo '<td><b>' . $row['Food_Quantity'] . '</b></td>';
						echo '<td><b><a href="ShopDeleteFood.php?id=' . $row['Food_ID'] . '">Delete</a></b></td>';
						echo '<td><b><a href="ShopEditFoodCategory.php?id=' . $row['Food_ID'] . '">Edit</a></b></td>';
						echo "</tr>";
						
						}
						
						echo "</table>";
						?>
            </tbody>
         </table>
    </div>
</div>
<a href='http://localhost/asg/ShopMainPage.html'><img src = "pic/arrow.png" alt="back" class="arrow"></a>

</body>
</html>
