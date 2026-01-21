<?php
function valid($shopID, $shopname, $shopaddress,$shoppc,$shopcity,$shopstate,$shopphone,$shopre,$emp,$username,$adminID,$error)
{
?>

<!DOCTYPE type>
<html>
<head>
	<title>Food Bank Distribution App</title>
	<link rel="stylesheet" href="format.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<style>
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
			font-family: Lucida ;
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

<form action="" method="post">
	<p id = "title" style = "text-align: center">Edit Food Bank Content</p>
	<div class = "form">
    <input type="hidden" name="id" value="<?php echo $shopID; ?>"/>
        <div class = "textBorder">
            <label for="name" class = "label"><b></b>Shop Name</label>
            <input type="text" name= "name"  value="<?php echo $shopname; ?>" />
        </div>

        <br>

        <div class = "textBorder">
            <label for = "address"class = "label">Shop Address</label>
            <input type = "text" size = "50" name = "add" value="<?php echo $shopaddress; ?>" />
        </div>

        <br>
        
         <div class = "textBorder">
	        <label for="postcode"class = "label">Postcode</label>
	        <input type ="int" placeholder="eg: 43300" name = "postcode" value="<?php echo $shoppc; ?>" />
        </div>

        <br>

        <div class = "textBorder">
            <label for = "city" class = "label">County</label>
            <input type ="text" placeholder="eg: Hulu Selangor" name = "county" value="<?php echo $shopcity; ?>" />
        </div>

        <br>

        <div class = "textBorder">
            <label for = "state" class = "label">State</label>
            <input type = "text" placeholder = "eg: Selangor" name = "state" value="<?php echo $shopstate; ?>" />
        </div>

        <br>

        <div class = "textBorder">
            <label for = "phone" class = "label">Shop Phone</label>
            <input type = "text" placeholder = "0124238905" name = "phone" value="<?php echo $shopphone; ?>" />
        </div>

        <br>

        <div class = "textBorder">
            <label for = "regisNo" class = "label">Shop Register No</label>
            <input type = "text" placeholder = "Enter shop register number" name = "regisNo" value="<?php echo $shopre; ?>" />
        </div>

        <br>

        <div class = "textBorder">
            <label for = "emName" class = "label">Employer Name</label>
            <input type = "text" placeholder = "Enter full name" name = "emName" value="<?php echo $emp; ?>" />
        </div>

        <br>

        <div class = "textBorder">
            <label for = "username" class = "label">Shop Username</label>
            <input type = "text" name = "username" value="<?php echo $username; ?>" readonly/>

        </div>
        <br>

        <div class = "textBorder">    
            <label for = "admin"class = "label">Admin_ID</label>
            <input type = "text" placeholder="Enter admin id" name = "admin"  value="<?php echo $adminID; ?>"/>
        </div>

        <button type = "submit" class = "save" name = "submit" id = "submit">SAVE</button>

    </div>
	</form>


<br>

<a href='http://localhost/asg/AdminFoodBankContent.php'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
<!-- END of content -->

</body>
</html>
<?php
}

    //session_start();
    $conn = mysqli_connect("localhost", "root", "", "database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //mysql_select_db("database", $conn);
    if (isset($_POST['submit'])) {
        if (is_numeric($_POST['id']))
        {
                $id = mysqli_real_escape_string($conn,$_POST['id']);
                $name = mysqli_real_escape_string($conn,$_POST['name']);
                $add = mysqli_real_escape_string($conn,$_POST['add']);
                $postcode = mysqli_real_escape_string($conn,$_POST['postcode']);
                $city = mysqli_real_escape_string($conn,$_POST['county']);
                $state = mysqli_real_escape_string($conn,$_POST['state']);
                $phone = mysqli_real_escape_string($conn,$_POST['phone']);
                $regisNo = mysqli_real_escape_string($conn,$_POST['regisNo']);
                $emName  = mysqli_real_escape_string($conn,$_POST['emName']);
                $username = mysqli_real_escape_string($conn,$_POST['username']);
                $admin = mysqli_real_escape_string($conn,$_POST['admin']);
    
                $sql = "UPDATE shop SET Shop_Name = '$name' WHERE  Shop_ID = '$id'";
                $sql = "UPDATE shop SET Shop_Name = '$name', Shop_Address = '$add', Shop_Postcode = '$postcode', Shop_Phone = '$phone', 
                 Shop_RegisNo = '$regisNo', Employer_Name = '$emName', Shop_UserName = '$username',
                  Admin_ID = '$admin' WHERE Shop_ID = '$id'";
                $sql2 = "UPDATE distribution_location SET Location_City = '$city', Location_State = '$state' WHERE Location_ID IN (SELECT Location_ID From shop
                 WHERE Shop_ID = '$id')";
                 $rs = mysqli_query($conn, $sql);
                $rs2 = mysqli_query($conn, $sql2);
                if($rs && $rs2){
                    valid($id, $name, $add,$postcode,$city,$state,$phone,$regisNo,$emName,$username,$admin,'');
        
                }
                else{
                    echo "Error HERE";
                }
        }
            
    }
    else{
        if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
            $id = (int)$_GET['id'];
            $ggg = "SELECT * FROM shop WHERE Shop_ID= '$id'";
            $hhh = "SELECT * FROM distribution_location WHERE Location_ID IN (SELECT Location_ID FROM shop WHERE Shop_ID = '$id')";
            $result = mysqli_query($conn,$ggg);
            $result2 = mysqli_query($conn,$hhh);

            $row = mysqli_fetch_array($result);
            $row2 = mysqli_fetch_array($result2);

            if($row && $row2)
                {
                $name = $row['Shop_Name'];
                $add = $row['Shop_Address'];
                $postcode = $row['Shop_Postcode'];
                $city = $row2['Location_City'];
                $state = $row2['Location_State'];
                $phone = $row['Shop_Phone'];
                $regisNo = $row['Shop_RegisNo'];
                $em = $row['Employer_Name'];
                $username = $row['Shop_UserName'];
                $admin = $row['Admin_ID'];
                valid($id, $name, $add,$postcode,$city,$state,$phone,$regisNo,$em,$username,$admin,'');
                
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