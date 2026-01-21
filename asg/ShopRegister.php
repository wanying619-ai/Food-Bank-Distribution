<?php

include('index.php');



?>
<!DOCTYPE html>
<html>
    <title>
        Registration form
    </title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="format.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    </head>
    <style>
        .form{
            padding : 0px 30px;
            background-color: white;
            top: 5px;
            width: 500px;
            margin: auto;
            text-align: center;
            position: relative;
            
        }
        input[type=text],input[type= password],input[type=tel]{
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
        .signIn{
            text-align: center;
            top:80px;
            font-size :20px;
        }
       
        #title {
			font-weight: bold;
			font-size: 40px;
			font-family: Lucida;
		}
        .registerbtn{
            margin: 20px;
			background-color: #90EE90;
			padding: 10px 10px;
			font-size: 20px;
			font-family: Lucida Console, monospace;
        }

    </style>

    <body>
    <div id ="nav-placeholder"></div>
<script>
    
	$(function(){
		$("#nav-placeholder").load("MainPageNavigation.html");

	});
</script>
<p id = "title" style = "text-align: center">Shop Registration Form</p>
        <form action = "" method = "POST">
            <div class = "form">
                <p>Please fill in this form to create an account</p>
                <br>
                <div class = "textBorder">
                    <label for="shopName" class = "label"><b>Shop Name</b></label>
                    <input type="text" placeholder="Enter shop name" name= "shopName" id="name" required>
                <br>
                </div>

                <div class = "textBorder">
                    <label for="shopAddress" class = "label"><b>Shop Address</b></label>
                    <input type="text" placeholder="Enter shop address" name= "shopAddress" id="add" required>
                <br>
                </div>

                <div class = "textBorder">
                    <label for="shopPostCode" class = "label"><b>Post Code</b></label>
                    <input type="text" placeholder="Enter shop post code" name= "shopPostCode" id="postcode" required>
                <br>
                </div>

                <div class = "textBorder">
                    <label for="shopCounty" class = "label"><b>Shop County</b></label>
                    <input type="text" placeholder="Enter shop county" name= "shopCounty" id="county" required>
                <br>
                </div>

                <div class = "textBorder">
                    <label for="shopState" class = "label"><b>Shop State</b></label>
                    <input type="text" placeholder="Enter shop state" name= "shopState" id="state" required>
                <br>
                </div>

                <div class = "textBorder">
                    <label for="shopPhone" class = "label"><b>Shop Phone</b></label>
                    <input type="text" placeholder="Enter shop phone number" name= "shopPhone" id="phone" required>
                <br>
                </div>

                <div class = "textBorder">
                    <label for="shopRegisNo" class = "label"><b>Shop Registration Number</b></label>
                    <input type="text" placeholder="Enter shop registration number" name= "shopResNo" id="resNo" required>
                <br>
                </div>


                <div class = "textBorder">
                    <label for="name" class = "label"><b>Employer's Name</b></label>
                    <input type="text" placeholder="Enter full name" name= "name" id="name" required>
                <br>
                </div>

                <div class = "textBorder">
                    <label for = "username" class = "label">Shop Username</label>
                    <input type = "text" placeholder = "Enter username" name = "username" id = "username" required>
                    <br>
                </div>

                <div class = "textBorder">    
                    <label for = "password"class = "label">Password</label>
                    <input type = "password" placeholder="Enter password" name = "password" id ="password"required>
                    <br>
                </div>

                
                <button type = "submit" name ="shopSubmit" class = "registerbtn">Register</button>
            </div>
            </form>
            
        <div class = "signIn">
            <p>Already have an account?<a href = "ShopLogin.php">Sign in</a></p>
        </div>  

    </body>
</html>