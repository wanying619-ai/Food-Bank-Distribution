<?php
include ('index3.php');
  if(isset($_POST['submit'])){
    $foodName = $_POST['foodname'];
    $foodCategory = $_POST['category'];
    $foodQuantity = $_POST['foodquantity'];
    $shopID = $_SESSION['shopUsername']['Shop_ID'];
    $shopName = $_SESSION['shopUsername']['Shop_Name'];

    $check = "SELECT * from food INNER JOIN supply ON supply.Food_ID = food.Food_ID
            INNER JOIN shop ON shop.Shop_ID = supply.Shop_ID WHERE food.Food_Name = '$foodName'
            AND shop.Shop_ID = '$shopID'";
    $result = mysqli_query($con,$check);
    if($result->num_rows > 0){
        function_alert("Available Food.");

    }
    else{
        $checkFood = "SELECT * FROM food WHERE Food_Name = '$foodName' AND Food_Category = '$foodCategory'";
        $checkFoodResult = mysqli_query($con, $checkFood);
        if($checkFoodResult->num_rows == 0){
            $sql = "INSERT INTO food(Food_Name,Food_Category) VALUES
            ('$foodName','$foodCategory')";
            $result = mysqli_query($con, $sql);
            if($result == FALSE){
                echo "error here";
            }
        }
    $supply ="INSERT INTO supply(Food_ID,Shop_ID,Food_Quantity) VALUES ((SELECT Food_ID From food WHERE Food_Name = '$foodName' AND Food_Category = '$foodCategory'),'$shopID','$foodQuantity')";
    
    $result2 = mysqli_query($con,$supply);
    if($result2){
        header('Location:ShopFoodCategory.php');
    }
    else{
        echo "Wrong here";
    }

    $con ->close();
    }
}

function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>
         Add Food 
    </title>
    <link rel="stylesheet" href="format.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        #title {
			font-weight: bold;
			font-size: 40px;
			font-family: Lucida;
		}
        .form{
            padding : 0px 30px;
            background-color: #FFFFFF;
            width: 500px;
            margin: auto;
            text-align: center;
            position: relative;
        }
        input[type=text]{
            width: 60%;
            display: inline-block;
            background: ghostwhite;
        
        }
        .label{
            float: left;
            width: 10em;
            margin-right: 1em;
            font-weight: bold;
        }
        .textBorder{
            padding : 20px;
        }
        .submit{
            text-align: center;
        }

        .category{
            width :150px;
            margin:5px;
          
        }
        
        .shopName{
            font-size : 40px;
            color : blue;
        }
        .submit {
			margin: 20px;
			background-color: #90EE90;
			padding: 10px 10px;
			font-size: 20px;
			font-family: Lucida Console, monospace;
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
<div id ="nav-placeholder"></div>
<script>
	$(function(){
		$("#nav-placeholder").load("ShopNavigation.html");

	});
</script>

<p id = "title" style = "text-align: center">Add Food Category</p>
<div class = "form">
    <form action = "" method = "post">
        <div class = "text-border">
            <label class = "shopName"><?php  if (isset($_SESSION['shopUsername'])) : ?>
					<?php echo $_SESSION['shopUsername']['Shop_Name']; ?>
            </label>
					<?php endif ?>
        </div>
       
        <div class = "textBorder">
            <label for = "name" class = "label"><b></b>Food Name</label>
                <input type = "text"  size = "50"placeholder="Enter the food name" name = "foodname" id = "inputBox" size = "30" required>
                <br> 
        </div>
        
        <div class = "textBorder">
            <label class = "label">Food Category</label>
            <select name = "category" id = "category">
                <option value = "Food">Food</option>
                <option value = "Drink">Drink</option>
                <option value = "Fruit">Fruit</option>
                <option value = "Vegetable">Vegetable</option>
            </select>
            </div>
            
        
        <div class = "textBorder">
            <label for = "name" class = "label">Food Quantity</label>
                <input type = "text" placeholder="Enter amount of food" name = "foodquantity" id = "inputBox" maxlength="3" required>
                <br> 
        </div>

        <button type = "submit" class = "submit" name = "submit">Submit</button>
    </form>
    <br>

</div>
<a href='http://localhost/asg/ShopFoodCategory.php'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
</body>
</html>
