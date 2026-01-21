<?php
include('index.php');
?>
<!DOCTYPE html>
<html>
    <title>
        Shop Login
    </title>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="format.css">

</head>
<style>
    .form{
        background-color: white;
        top:180px;
        position :absolute;
        left: 420px;
        margin:auto;
        height: 430px;
    }
    .userinput{
        padding : 40px 40px;
        width: 500px;
        margin: auto;
        text-align: center;
        font-size: 40;
    }
    label{
        float: left;
        width: 10em;
        margin-right: 1em;
        font-weight: bold;
    }
    input[type=text],input[type= password]{
        width :60%;
        display:inline-block;
        background:ghostwhite;
    }
    button{
        background-color:yellowgreen;
        width:100px;
        padding:14px 20px;
        color: white;
    }
    .btn{
        padding:20px;
        text-align: center;
    }
    .cancelBtn{
        background-color:#f44336;
        width:auto;
        padding:10px 18px;

    }
    #title {
        font-weight: bold;
        font-size: 40px;
        font-family: Lucida;
	}
</style>

<body>
<div id ="nav-placeholder"></div>
  <div class="top">
  	<img src = "pic/logo.png" alt="logo" class="logo">
  	<nav>
  		<ul>
  			<li><p id = "navbar"><a href="MainPage.html">HOME</a></p></li>
  			<li><p id = "navbar"><a href="ContactUs.html">CONTACT US</a></p></li>
  			<li><p id = "navbar"><a href="AboutUs.html">ABOUT US</a></p></li>
  	</nav>
</div>
<p id = "title" style = "text-align: center">Shop Login</p>
    <form action = "ShopLogin.php" method ="post">
        <div class = "form">
          
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
                <button type ="submit" name = "shoplogin" class = "submit">Login</button>
            </div>

            <div class = "btn">
            <button onclick="location.href='LoginRegisterPage.html'" type = "button" class = "cancelBtn">Cancel</button>
            </div>
        </div>
        
    </form>
    
</body>   

</html>