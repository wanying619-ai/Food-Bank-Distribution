<?php

session_start();


$con = mysqli_connect('localhost','root','','database');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

if(isset($_POST['submit'])){
    $username = $_POST['uname'];
    $password = $_POST['pwd'];


   $s = "SELECT * FROM admin where Admin_Username = '$username' && Admin_Password ='$password'";

   $result = mysqli_query($con,$s);

   $num = mysqli_num_rows($result);

   if($num == 1){
       header('location: AdminHome.html');
   }
   else{
    echo "<script> alert('Wrong Username and Password'); </script>";
   }
    
    $con ->close();

}
?>

<!DOCTYPE html>
<html>
    <title>Food Bank Distribution App</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="format.css">
	

</head>
<style>
    .form {
        background-color: white;
        top: 150px;
        position: absolute;
        width: 45%;
        margin-left: 400px;
        height: 480px;
    }

    .userinput {
        padding: 30px 30px;
        width: 500px;
        margin: auto;
        text-align: center;
        font-size: 40;
    }

    label {
        float: left;
        width: 10em;
        margin-right: 1em;
        font-weight: bold;
    }

    input[type = text], input[type = password] {
            width :60%;
            display: inline-block;
            background: ghostwhite;
    }

    .submit {
        background-color: yellowgreen;
        width: 100px;
        padding: 14px 20px;
        color: white;
    }

    .btn {
        padding: 20px;
        text-align: center;
    }

    .cancelBtn {
        background-color: #f44336;
        width: auto;
        padding: 10px 18px;
    }

    #title {
        font-weight: bold;
        font-size: 40px;
        font-family: Lucida Handwriting, cursive;
    }
</style>

<!-- Navbar -->
<div class="top">
  	<img src = "pic/logo.png" alt="logo" class="logo">
  	<nav>
  		<ul>
  			<li><a class="login" href="AdminMainPage.html">HOME</a></li>
  		</ul>
  	</nav>
</div>
<!-- END of Navbar -->

<!-- Content -->
<form action = "AdminLogin.php" method ="post">
    <div class = "form">
        <p id = "title" style = "text-align: center">Admin Login</p>
        <div class = "userinput">
            <label for = "uname">Username</label>
            <input type = "text" placeholder="Enter Username" name = "uname" required>
            <br>
        </div>
        <div class = "userinput">
            <label for = "pwd">Password</label>
            <input type = "password" placeholder = "Enter Password" name = "pwd" required>
            <br>
        </div>
        <div class = "userinput">
            <button type ="submit" name = "submit" class = "submit">Login</button>
        </div>
    </div>  
</form>
</body>   
</html>