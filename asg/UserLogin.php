<?php
include('index.php');

?>
<!DOCTYPE html>
<html>
    <title>
        User Login
    </title>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="format.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

</head>
<style>
    .form{
        background-color: white;
        top:200px;
        position :absolute;
        left: 500px;
        margin:auto;
        

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
    .login{
        margin: 20px;
		background-color: #90EE90;
		padding: 10px 10px;
		font-size: 20px;
		font-family: Lucida Console, monospace;
        right : 20px;
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

<body>
<div id ="nav-placeholder"></div>
<script>
	$(function(){
		$("#nav-placeholder").load("MainPageNavigation.html");

	});
</script>
<p id = "title" style = "text-align: center">User Login</p>
    <form action = "" method ="post">
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
            
               
           
            <button type ="submit"name = "login" class = "login">Login</button>
    
        </div>
       
        
    </form>
    <a href='UserHomePage.html'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
</body>   

</html>

