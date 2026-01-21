<!DOCTYPE type>
<html>
<head>
    <title>Food Bank Distribution App</title>
    <link rel="stylesheet" href="format.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        *{
            font-family: "Josefin Sans", sans-serif;
        }

        .form{
            padding : 20px 40px;
            background-color: #FFFFFF;
            width: 500px;
            margin: auto;
            text-align: center;
            position: relative;
        }

        input[type=text], input[type= password], input[type=int]{
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

        #title {
            font-weight: bold;
            font-size: 40px;
            font-family: Lucida;
        }

        .arrow {
            width: 100px;
            height: 100px;
            margin-top: 50px;
            margin-left: 30px;
        }

        .save {
            margin: 20px;
            background-color: #90EE90;
            padding: 10px 10px;
            font-size: 20px;
            font-family: Lucida Console, monospace;
        }
    </style>
</head>

<body>
<!-- Navbar -->
<div id ="nav-placeholder"></div>
<script>
	$(function(){
		$("#nav-placeholder").load("AdminNavigation.html");
	});
</script>

<!-- END of Navbar -->

<!-- Content -->
<?php
    $conn = mysqli_connect("localhost", "root", "", "database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["save"])) {
        $name = $_POST["name"];
        $add = $_POST["add"];
        $postcode = $_POST["postcode"];
        $county = $_POST["county"];
        $state = $_POST["state"];
        $phone = $_POST["phone"];
        $regisNo = $_POST["regisNo"];
        $emName = $_POST["emName"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $admin = $_POST["admin"];

        $sqlC = "SELECT * FROM distribution_location WHERE Location_City='$county' AND Location_State='$state'";
        $resC = mysqli_query($conn, $sqlC);

        $sqlU = "SELECT * FROM shop WHERE Shop_UserName='$username'";
        $resU = mysqli_query($conn, $sqlU);

        if (mysqli_num_rows($resU) > 0) {
            echo '<script>alert("Shop_Username Exist. Please change another username.")</script>';
        } else {
            if (mysqli_num_rows($resC) > 0) {
                $query = "INSERT INTO shop(Shop_Name, Shop_Address, Shop_Postcode, Shop_Phone, Shop_RegisNo, Employer_Name, Shop_UserName, Shop_Password, Admin_ID, Location_ID) VALUES ('$name', '$add', '$postcode', '$phone', '$regisNo', '$emName', '$username', '$password', '$admin', (SELECT Location_ID FROM distribution_location WHERE Location_City='$county' AND Location_State='$state'))";
                $rs = mysqli_query($conn, $query);
                if ($rs) {
                    echo "shop added successfully";
                } else {
                    echo "Error : shop added failed";
                }

            } else {
                $query = "INSERT INTO distribution_location(Location_City, Location_State) VALUES ('$county', '$state')";
                $query2 = "INSERT INTO shop(Shop_Name, Shop_Address, Shop_Postcode, Shop_Phone, Shop_RegisNo, Employer_Name, Shop_UserName, Shop_Password, Admin_ID, Location_ID) VALUES ('$name', '$add', '$postcode', '$phone', '$regisNo', '$emName', '$username', '$password', '$admin', (SELECT Location_ID FROM distribution_location WHERE Location_City='$county' AND Location_State='$state'))";
                $rs = mysqli_query($conn, $query);
                $rs2 = mysqli_query($conn, $query2);

                if ($rs2) {
                    echo "shop added successfully";
                } else {
                    echo "Error : shop added failed";
                }
            }
        }
        mysqli_close($conn);
    }
?>
<div class="container">
    <p id = "title" style = "text-align: center">Add Food Bank Content</p>
    <form action="AdminAddFoodBank.php" method="post">
    <div class = "form">
        <div class = "textBorder">
            <label for="name" class = "label"><b></b>Shop Name</label>
            <input type="text" placeholder="Enter full shop name" name= "name" id="name" required>
        </div>

        <br>

        <div class = "textBorder">
            <label for = "address"class = "label">Shop Address</label>
            <input type = "text" size = "50" placeholder="Enter Shop Address" name = "add" id = "add" required>
        </div>

        <br>
        
         <div class = "textBorder">
            <label for="postcode"class = "label">Postcode</label>
            <input type ="int" placeholder="eg: 43300" name = "postcode" id = "postcode" required>
        </div>

        <br>

        <div class = "textBorder">
            <label for = "county"class = "label">City</label>
            <input type ="text" placeholder="eg: Hulu Selangor" name = "county" id = "county" required>
        </div>

        <br>

        <div class = "textBorder">
            <label for = "state" class = "label">State</label>
            <input type = "text" placeholder = "eg: Selangor" name = "state" id = "state" required>
        </div>

        <br>

        <div class = "textBorder">
            <label for = "phone" class = "label">Shop Phone</label>
            <input type = "text" placeholder = "0124238905" name = "phone" id = "phone" required>
        </div>

        <br>

        <div class = "textBorder">
            <label for = "regisNo" class = "label">Shop Register No</label>
            <input type = "text" placeholder = "Enter shop register number" name = "regisNo" id = "regisNo" required>
        </div>

        <br>

        <div class = "textBorder">
            <label for = "emName" class = "label">Employer Name</label>
            <input type = "text" placeholder = "Enter full name" name = "emName" id = "emName" required>
        </div>

        <br>

        <div class = "textBorder">
            <label for = "username" class = "label">Shop Username</label>
            <input type = "text" placeholder = "Enter username" name = "username" id = "username" required>
        </div>

        <br>

        <div class = "textBorder">    
            <label for = "password"class = "label">Shop Password</label>
            <input type = "password" placeholder="Enter password" name = "password" id ="password"required>
        </div>

        <br>

        <div class = "textBorder">    
            <label for = "admin"class = "label">Admin_ID</label>
            <input type = "text" placeholder="Enter admin id" name = "admin" id ="admin"required>
        </div>

        <button type = "submit" name="save" class = "save">SAVE</button>

    </div>
    </form>
</div>

<br>

<a href='http://localhost/asg/AdminFoodBankContent.php'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
<!-- END of content -->

</body>
</html>