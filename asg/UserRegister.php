
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
            padding : 0px 40px;
            background-color: white;
            width: 500px;
             margin: auto;
            text-align: center;
            top:30px;
            position:relative;
            
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
            top:100px;
            position:relative;
        }

        .registerbtn{
            margin: 20px;
			background-color: #90EE90;
			padding: 10px 10px;
			font-size: 20px;
			font-family: Lucida Console, monospace;
            
        }
        #title {
			font-weight: bold;
			font-size: 40px;
			font-family: Lucida ;
		}
        .signIn{
            text-align: center;
            top:80px;
            font-size :20px;
        }
       
        

    </style>

    <body>
    <div id ="nav-placeholder"></div>
<script>
    
	$(function(){
		$("#nav-placeholder").load("MainPageNavigation.html");

	});
</script>
<p id = "title" style = "text-align: center">User Registration Form</p>
        <form action = "userRegister.php" method = "POST" >
       
            <div class = "form" >
                <p>Please fill in this form to create an account</p>
                <br>
                <div class = "textBorder">
                    <label for="name" class = "label"><b></b>Full Name</label>
                    <input type="text" placeholder="Enter full name" name= "fullname" id="name" required>
                <br>
                </div>

                 <div class = "textBorder">
                <label for="phone"class = "label">Phone number</label>
                <input type ="tel" placeholder="12345678" name = "phone" id = "phone" required>
                <br>
                </div>

                <div class = "textBorder">
                    <label for = "address"class = "label">Address</label>
                    <input type = "text" size = "50"placeholder="Enter Address" name = "address" id = "add" required>
                    <br>
                </div>

                <div class = "textBorder">
                    <label for = "postcode"class = "label">Postcode</label>
                    <input type = "text" size = "50"placeholder="Enter Postcode" name = "postcode" id = "postcode" required>
                    <br>
                </div>

                <div class = "textBorder">
                    <label for = "county"class = "label">County</label>
                    <input type = "text" size = "50"placeholder="Enter County" name = "county" id = "county" required>
                    <br>
                </div>

                <div class = "textBorder">
                    <label for = "state"class = "label">State</label>
                    <input type = "text" size = "50"placeholder="Enter State" name = "state" id = "state" required>
                    <br>
                </div>

                <div class = "textBorder">
                    <label for = "gender"class = "label">Gender</label>
                    <input type = "radio" id = "Male" name = "gender" value = "Male">
                    <label for = "Male">Male</label>
                    <input type = "radio" id = "Female" name = "gender" value = "Female">
                    <label for = "Female">Female</label>
                    <br>
                </div>

                <div class = "textBorder">
                    <label for = "username" class = "label">Username</label>
                    <input type = "text" placeholder = "Enter username" name = "username" id = "username" required>
                    <br>
                </div>

                <div class = "textBorder">    
                    <label for = "password"class = "label">Password</label>
                    <input type = "password" placeholder="Enter password" name = "password" id ="password"required>
                    <br>
                </div>

                <button type = "submit" class = "registerbtn" name = "userSubmit">Register</button>
            </div>

            <div class = "signIn">
                <p>Already have an account?<a href = "UserLogin.php">Sign in</a></p>
                <br>
                <br>
            </div>
        </form>
    </body>
</html>