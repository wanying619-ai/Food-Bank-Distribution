<?php
function valid($id, $ShopName,$ShopAddress ,$ShopPostcode,$ShopPhone,$ShopRegisNo,$EmployerName,$Username,$Password,$city,$instate,$error)
{
?>

    <!DOCTYPE html>
    <html>
    <head>
    <title>
         Edit Shop Profile
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="format.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
                .formPosition{
            position:absolute;
            top: 30%;
            margin:auto;
            left: 28%;
        }
        .form{
            padding : 0px 40px;
            background-color: white;
            width: 570px;
            margin: auto;
            text-align: center;
           
        }
        input[type=text]{
            width :200%;
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
        #submit{
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
    .arrow {
			width: 100px;
			height: 100px;
			margin-top: 390px;
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

    <form action = "" method = "POST">
    <p id = "title" style = "text-align: center">Edit Shop Profile</p>
        <div class = "formPosition">
        <div class = "form">
            
        <table>
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <tr>
    <td width="179"><b>Name<em>*</em></b></td>
    <td><label>
    <input type="text" name="name" value="<?php echo $ShopName; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Phone<em>*</em></b></td>
    <td><label>
    <input type="text" name="phone" value="<?php echo $ShopPhone; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Address<em>*</em></b></td>
    <td><label>
    <input type="text" name="address" value="<?php echo $ShopAddress; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Registation Number<em>*</em></b></td>
    <td><label>
    <input type="text" name="regisNo" value="<?php echo $ShopRegisNo; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Postcode<em>*</em></b></td>
    <td><label>
    <input type="text" name="postcode" value="<?php echo $ShopPostcode; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Employer Name<em>*</em></b></td>
    <td><label>
    <input type="text" name="employer" value="<?php echo $EmployerName; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>City<em>*</em></b></td>
    <td><label>
    <input type="text" name="city" value="<?php echo $city; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>State<em>*</em></b></td>
    <td><label>
    <input type="text" name="state" value="<?php echo $instate; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Username<em>*</em></b></td>
    <td><label>
    <input type="text" name="username" value="<?php echo $Username; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Password<em>*</em></b></td>
    <td><label>
    <input type="text" name="password" value="<?php echo $Password; ?>" />
    </label></td>
    </tr>

    
    <br> 
    <br> 
    </table>
    <button type ="submit"name = "submit" id = "submit">Submit</button>
</div>
</div>
</form>



<a href='http://localhost/asg/ShopProfile.php'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
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
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $postcode = mysqli_real_escape_string($con,$_POST['postcode']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $state = mysqli_real_escape_string($con,$_POST['state']);
    $employer = mysqli_real_escape_string($con,$_POST['employer']);
    $regisNo = mysqli_real_escape_string($con,$_POST['regisNo']);
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

   
        if ($name == '' || $phone == '' || $address == '' || $username == ''
            || $password == '' || $postcode == ''|| $city == '' || $state == '' || $regisNo == '' || $employer == '')
        {
          $error = 'ERROR: Please fill in all required fields!';

            valid($id,$name,$phone ,$address,$postcode,$city,$employer,$username,$password,$city,$state,$error);
        }
        else
        {

        $result =  mysqli_query($con,"UPDATE shop SET Shop_Name='$name',Shop_Phone='$phone' ,Shop_Address = '$address',Shop_Postcode = '$postcode',
                            Shop_RegisNo = '$regisNo',Employer_Name = '$employer',Shop_UserName  = '$username',Shop_Password = '$password'
                            WHERE Shop_ID ='$id'")or die(mysqli_error());

      
        valid($id,$name,$phone ,$address,$postcode,$city,$employer,$username,$password,$city,$instate,$error);
        header("Location: ShopProfile.php");
        }
    }
    else
    {
    echo 'Error!';
    }
    
}
else {
    if (isset($_GET['id']) )
    {
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM shop AS S INNER JOIN distribution_location AS D
    ON D.Location_ID = S.Location_ID 
    WHERE S.Shop_ID = '$id'";
    
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    

        if($row)
        {

        $ShopName = $row['Shop_Name'];
        $ShopAddress = $row['Shop_Address'];
        $ShopPostcode = $row['Shop_Postcode'];
        $ShopPhone = $row['Shop_Phone'];
        $ShopRegisNo = $row['Shop_RegisNo'];
        $EmployerName = $row['Employer_Name'];
        $Username = $row['Shop_UserName'];
        $Password= $row['Shop_Password'];
        $city = $row['Location_City'];
        $instate = $row['Location_State'];
        valid($id, $ShopName,  $ShopAddress ,$ShopPostcode,$ShopPhone,$ShopRegisNo,$EmployerName,$Username,$Password,$city,$instate,'');
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



    