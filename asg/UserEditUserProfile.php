<?php
function valid($UserID, $UserName, $UserPhone,$UserAddress,$UserGender,$Username,$Password,$postcode,$city,$instate,$error)
{
?>

    <!DOCTYPE html>
    <html>
    <head>
    <title>
         Edit User Profile
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
            padding : 40px 40px;
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
            text-align: center;
            background-color:yellowgreen;
            width:100px;
            padding:14px 20px;
            color: white;
            
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
		$("#nav-placeholder").load("UserNav.html");

	});
</script>

    <form action = "" method = "POST">
    <p id = "title" style = "text-align: center">Edit User Profile</p>
        <div class = "formPosition">
        <div class = "form">
            
        <table>
        <input type="hidden" name="id" value="<?php echo $UserID; ?>"/>
    <tr>
    <td width="179"><b>Name<em>*</em></b></td>
    <td><label>
    <input type="text" name="name" value="<?php echo $UserName; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Phone<em>*</em></b></td>
    <td><label>
    <input type="text" name="phone" value="<?php echo $UserPhone; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Address<em>*</em></b></td>
    <td><label>
    <input type="text" name="address" value="<?php echo $UserAddress; ?>" />
    </label></td>
    </tr>

    <tr>
    <td width="179"><b>Postcode<em>*</em></b></td>
    <td><label>
    <input type="text" name="postcode" value="<?php echo $postcode; ?>" />
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
    <td width="179"><b>Gender<em>*</em></b></td>
    <td><label>
    <input type="text" name="gender" value="<?php echo $UserGender; ?>" />
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

    <tr align = "right">
    <td colspan="2"><label>
    <button type ="submit"name = "submit" id = "submit">Submit</button>
    </label>
    </tr>
    <br> 
    <br> 
    </table>
    </form>
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
    $gender = mysqli_real_escape_string($con,$_POST['gender']);
    $postcode = mysqli_real_escape_string($con,$_POST['postcode']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $state = mysqli_real_escape_string($con,$_POST['state']);
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

   
    if ($name == '' || $phone == '' || $address == '' || $gender == '' || $username == ''
        || $password == '' || $postcode == ''|| $city == '' || $state == '')
    {
        $error = 'ERROR: Please fill in all required fields!';

        valid($id,$name,$phone,$address,$gender,$username,$password,$postcode,$city,$state,$error);
    }
    else
    {

   $result =  mysqli_query($con,"UPDATE userprofile SET User_Name='$name', User_Phone='$phone' ,User_Address = '$address',Gender = '$gender'
                            WHERE User_ID ='$id'")or die(mysqli_error());
   $result2 =  mysqli_query($con,"UPDATE user SET Username ='$username', Password = '$password' 
                            WHERE User_ID ='$id'")or die(mysqli_error());
    $result3 =  mysqli_query($con,"UPDATE area SET Postcode ='$postcode', City = '$city' ,Instate = '$state'
                WHERE Username ='$username'")or die(mysqli_error()); 
    valid($id, $name, $phone,$address,$gender,$username,$password,$postcode,$city,$state, $error);
    header("Location: UserProfile.php");
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
    $id = $_GET['id'];
    $sql = "SELECT UP.User_ID,UP.User_Name,UP.User_Phone,UP.User_Address,UP.Gender,U.Username,U.Password,A.Postcode,A.City,A.Instate FROM userprofile AS UP
						INNER JOIN user AS U on U.User_ID = UP.User_ID
						INNER JOIN area AS A on A.Username = U.Username
						WHERE U.User_ID = '$id'";
    
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    

        if($row)
        {

        $UserName = $row['User_Name'];
        $UserPhone = $row['User_Phone'];
        $UserAddress = $row['User_Address'];
        $UserGender = $row['Gender'];
        $Username = $row['Username'];
        $Password= $row['Password'];
        $postcode = $row['Postcode'];
        $city = $row['City'];
        $instate = $row['Instate'];
        valid($id, $UserName, $UserPhone,$UserAddress,$UserGender,$Username,$Password,$postcode,$city,$instate,'');
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