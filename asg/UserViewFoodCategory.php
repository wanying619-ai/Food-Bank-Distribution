<?php
include ('index3.php');
                    
?>
<!DOCTYPE html>
<html>
    <title>
        User Food catagory
    </title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
			margin-top: 50px;

			border-collapse: collapse;
		}
		
		.column {
  			float: left;
 			 width: 23%;
  			padding: 10px;
			min-height:400px;
			overflow: hidden;
			font-size:25px;
			height:auto;
  visibility:visible;
  		
}

		/* Clear floats after the columns */
		.row:after {
  			content: "";
  			display: table;
  			clear: both;
		}
        
    
        </style>
</head>

<body>
<div id ="nav-placeholder"></div>
<script>
	$(function(){
		$("#nav-placeholder").load("UserNav.html");

	});
</script>



	<p style = "text-align :center" id = "title">Food Category</p>

	<div class = 'row'>
	
	<div class = "column"  style="background-color:#aaa ;text-align : center">
	<p style= "font-size:30px"><b>Food</b></p>
		  <?php
					$sql = "SELECT Food_Name from food WHERE Food_Category = 'Food'";
					$result = mysqli_query($con,$sql);
                    if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
                ?>
                
				
					<?php echo $row["Food_Name"];?>
						<br><br>
                <?php
                        }
                 }
				
                ?>
  		
	</div>

	
	
	<div class = "column"style="background-color:Bisque;text-align : center">
	<p style= "font-size:30px"><b>Fruit</b></p>
		  <?php
					$sql = "SELECT Food_Name from food WHERE Food_Category = 'Fruit'";
					$result = mysqli_query($con,$sql);
                    if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
                ?>
                
				
					<?php echo $row["Food_Name"];?>
						<br><br>
                <?php
                        }
                 }
				
                ?>
  		
	</div>

	<div class = "column"style="background-color:Beige;text-align : center">
	<p style= "font-size:30px"><b>Vegetable</b></p>
		  <?php
					$sql = "SELECT Food_Name from food WHERE Food_Category = 'Vegetable'";
					$result = mysqli_query($con,$sql);
                    if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
                ?>
                
				
					<?php echo $row["Food_Name"];?>
						<br><br>
                <?php
                        }
                 }
				
                ?>
  		
	</div>

	<div class = "column"style="background-color:aliceblue;text-align : center">
	<p style = "font-size:30px"><b>Drink</b></p>
		  <?php
					$sql = "SELECT Food_Name from food WHERE Food_Category = 'Drink'";
					$result = mysqli_query($con,$sql);
                    if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
                ?>
                
				
					<?php echo $row["Food_Name"];?>
						<br><br>
                <?php
                        }
                 }
				
                ?>
  		
	</div>
	</div>       




</body>
</html>
