<?php
function valid($foodID, $foodname, $foodcategory,$foodquantity, $error)
{
?>

    <!DOCTYPE html>
    <html>
    <head>
    <title>
         Edit Food 
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="format.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        .formPosition{
            position:absolute;
            top: 30%;
            margin:auto;
            left: 500px;
        }
        .form{
            padding : 40px 40px;
            background-color: white;
            width: 500px;
            margin: auto;
            text-align: center;
           
        }
        .arrow {
			width: 100px;
			height: 100px;
			margin-top: 390px;
			margin-left: 30px;
		}
        input[type=text]{
            width :60%;
            display:inline-block;
            background:ghostwhite;
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
        #submit {
			margin: 20px;
			background-color: #90EE90;
			padding: 10px 10px;
			font-size: 20px;
			font-family: Lucida Console, monospace;
		}
        #title {
        font-weight: bold;
        font-size: 40px;
        font-family: Lucida;
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

    <form action = "" method = "POST">
    <p id = "title" style = "text-align: center">Edit Food Form</p>
        <div class = "formPosition">
        <div class = "form">
            
        <table>
        <input type="hidden" name="id" value="<?php echo $foodID; ?>"/>
    <tr>
    <td width="179"><b>Food Name<em>*</em></b></td>
    <td><label>
    <input type="text" name="foodname" value="<?php echo $foodname; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Food Category<em>*</em></b></td>
    <td><label>
    <input type="text" name="foodcategory" value="<?php echo $foodcategory; ?>"/>
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Food Quantity<em>*</em></b></td>
    <td><label>
    <input type="text" name="foodquantity" value="<?php echo $foodquantity; ?>" />
    </label></td>
    </tr>

    <tr align = "right">
    <td colspan="2"><label>
    <button type ="submit"name = "submit" id = "submit">Submit</button>
    </label>
    </tr>
    <br> 
    <br> 
    </table>
    </div>
</div>
    </form>

    <a href='http://localhost/asg/ShopFoodCategory.php'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
    </body>
    </html>
    <?php
}

include('index3.php');


if (isset($_POST['submit']))
{
   
   if (is_numeric($_POST['id']))
    {
    
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $name = mysqli_real_escape_string($con,$_POST['foodname']);
    $category = mysqli_real_escape_string($con,$_POST['foodcategory']);
    $quantity = mysqli_real_escape_string($con,$_POST['foodquantity']);

   
    if ($name == '' || $category == '' || $quantity == '')
    {
        $error = 'ERROR: Please fill in all required fields!';

        valid($id, $name, $category,$quantity, $error);
    }
    else
    {

   $result =  mysqli_query($con,"UPDATE food SET Food_Name='$name', Food_Category='$category'WHERE Food_ID='$id'")or die(mysqli_error());
   $result2 =  mysqli_query($con,"UPDATE supply SET Food_Quantity='$quantity'WHERE Food_ID='$id'")or die(mysqli_error());
          
    valid($id, $name, $category,$quantity, $error);
    header("Location: http://localhost/asg/Shopfoodcategory.php");
        }
    }
    else
    {
    echo 'Error!';
    }
    
}
else {
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
    {
    $id = (int)$_GET['id'];
    $ggg = "SELECT * FROM food WHERE Food_ID= '$id'";
    $hhh = "SELECT * FROM supply WHERE Food_ID= '$id'";
    $result = mysqli_query($con,$ggg);
    $result2 = mysqli_query($con,$hhh);

    $row = mysqli_fetch_array($result);
    $row2 = mysqli_fetch_array($result2);

        if($row && $row2)
        {

        $name = $row['Food_Name'];
        $category = $row['Food_Category'];
        $quantity = $row2['Food_Quantity'];
        valid($id, $name, $category,$quantity,'');
        }
        else
        {
        echo "No results!";
        }
    
    
    }
    else{
        echo "Error";
    }
}
?>



    