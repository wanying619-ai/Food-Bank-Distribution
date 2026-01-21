<?php

session_start();
$con = mysqli_connect('localhost','root','','database');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

  $fullname = "";
  $phone = "";
  $address = "";
  $postcode ="";
  $county = "";
  $state = "";
  $gender = "";
  $username = "";
  $password    = "";
  $errors = array(); 
  $_SESSION['success'] = "";

if(isset($_POST['userSubmit'])){
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address =mysqli_real_escape_string($con, $_POST['address']);
    $postcode =mysqli_real_escape_string($con, $_POST['postcode']);
    $county =mysqli_real_escape_string($con, $_POST['county']);
    $state =mysqli_real_escape_string($con, $_POST['state']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $username =mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $checkName = "SELECT * FROM userprofile WHERE User_Name = '$fullname'";
    $result = mysqli_query($con,$checkName);
    if($result->num_rows == 0){
            $sql = "INSERT INTO userprofile(User_Name,User_Phone,User_Address,Gender) VALUES
                ('$fullname','$phone','$address','$gender')";

            if($con ->query($sql) == TRUE )
            {
                $ggg = "INSERT INTO user(Username,Password,User_ID,Admin_ID) VALUES
                ('$username','$password',(SELECT User_ID from userprofile WHERE User_Name = '$fullname'),'1')";
                if($con ->query($ggg) == TRUE){ 
                    $checkLocation = "SELECT * FROM distribution_location WHERE Location_City = '$county' AND Location_State = '$state'";
                    $result = mysqli_query($con,$checkLocation);
                    if($result->num_rows > 0)
                    {
                        $qqq = "INSERT INTO area(Username,Location_ID,Postcode,City,Instate) VALUES
                        ('$username',(SELECT Location_ID FROM distribution_location WHERE Location_City = '$county' AND Location_State = '$state'),
                        '$postcode','$county','$state')";
                        if($con ->query($qqq) == TRUE){
                            header('Location:userLogin.php');
                        }
                        else{
                            echo "Wrong in area";
                        }
                    }
                    else{
                        $qqq = "INSERT INTO distribution_location(Location_City,Location_State) VALUES
                        ('$county','$state')";
                        if($con ->query($qqq) == TRUE){
                            $rrr = "INSERT INTO area(Username,Location_ID,Postcode,City,Instate) VALUES
                            ('$username',(SELECT Location_ID FROM distribution_location WHERE Location_City = '$county' AND Location_State = '$state'),
                            '$postcode','$county','$state')";
                            if($con ->query($rrr) == TRUE){
                                header('Location:userLogin.php');
                            }
                            else{
                                echo "Wrong here";
                            }
                        }
                        else{
                            echo "Wrong in distribution location";
                        }
                        

                    }
                
            }
                else{
                    echo"Wrong in user";
                }
            }
            else{
                //header('Location: index.php');
                echo"Invalid";
        }
        $con ->close();
    }
    else{
        function_alert("Available User Name.Please key in again");

    }
}

else if (isset($_POST['login'])){
    $username =mysqli_real_escape_string($con, $_POST['uname']);
    $password = mysqli_real_escape_string($con, $_POST['pwd']);

    
    $query = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) { // user found
        // check if user is admin or user
        $logged_in_user = mysqli_fetch_assoc($result);
        
            $_SESSION['user'] = $logged_in_user;
        
        header("Location:UserHomePage.html");
    
    
    }
}
else if (isset($_POST['shoplogin'])){
    $username =mysqli_real_escape_string($con, $_POST['uname']);
    $password = mysqli_real_escape_string($con, $_POST['pwd']);

    $query = "SELECT * FROM shop WHERE Shop_UserName='$username' AND Shop_Password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) { // user found
        // check if user is admin or user
        $logged_in_shop = mysqli_fetch_assoc($result);
        
        $_SESSION['shopUsername'] = $logged_in_shop;
        
        header('Location:ShopMainPage.html');
    
    
    }
}
else if(isset($_POST['shopSubmit'])){
    $shopname = $_POST['shopName'];
    $shopaddress = $_POST['shopAddress'];
    $shoppostcode = $_POST['shopPostCode'];
    $shopCity = $_POST['shopCounty'];
    $shopstate = $_POST['shopState'];
    $phone = $_POST['shopPhone'];
    $shopRegisNo = $_POST['shopResNo'];
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

   $checkAvailableUsername = "SELECT * FROM shop WHERE Shop_Name = '$shopname'";
   $result = mysqli_query($con,$checkAvailableUsername);
  if($result->num_rows == 0){
        $check = "SELECT * FROM distribution_location WHERE Location_City = '$shopCity' AND Location_State = '$shopstate'";
        $result = mysqli_query($con,$check);
        if($result->num_rows > 0){
            $sql = "INSERT INTO shop 
            (Shop_Name,Shop_Address,Shop_Postcode,Shop_Phone,Shop_RegisNo,Employer_Name
            ,Shop_UserName,Shop_Password,Admin_ID,Location_ID) VALUES
            ('$shopname','$shopaddress','$shoppostcode','$phone'
            ,'$shopRegisNo','$fullname','$username','$password','1',(SELECT Location_ID 
            FROM distribution_location WHERE Location_City = '$shopCity' AND Location_State = '$shopstate'))";

            if($con ->query($sql) == TRUE){
                header('Location: ShopLogin.php');
            }
            else{
                echo "Wrong in shop";
            }
        }
        else{
        $mmm = "INSERT INTO distribution_location(Location_City,Location_State) VALUES (
        '$shopCity','$shopstate')";
            if($con ->query($mmm) == TRUE){
                $sql = "INSERT INTO shop 
                (Shop_Name,Shop_Address,Shop_Postcode,Shop_Phone,Shop_RegisNo,Employer_Name
                ,Shop_UserName,Shop_Password,Admin_ID,Location_ID) VALUES
                ('$shopname','$shopaddress','$shoppostcode','$phone'
                ,'$shopRegisNo','$fullname','$username','$password','1',(SELECT Location_ID FROM distribution_location 
                WHERE Location_City = '$shopCity' AND Location_State = '$shopstate'))";
                if($con ->query($sql) == TRUE){
                     header('Location: ShopLogin.php');
                }
                else{
                    echo "Wrong in insert location";
                }
            }
            else{
                echo "Wrong in add distribution location";
            }
        }
    
   }else{
    function_alert("Available Shop Name.");

   }
    $con ->close();
}

function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
