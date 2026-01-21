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
    #title {
      font-weight: bold;
      font-size: 40px;
      font-family: Lucida ;
    }

    .form{
        padding : 10px 10px;
        background-color: #FFFFFF;
        width: 500px;
        margin: auto;
        text-align: center;
        position: relative;
    }

    input[type=text] {
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

    .arrow {
      width: 100px;
      height: 100px;
      margin-top: 50px;
      margin-left: 30px;
    }

    .del {
      margin: 10px;
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

    if(isset($_POST["delete"])) {
        $Username = $_POST["Username"];
        $query2 = "SELECT * FROM user WHERE Username='$Username'";
        $res2 = mysqli_query($conn, $query2);

        if (mysqli_num_rows($res2) > 0) {
            // sql to delete a record
            $query="DELETE user, userprofile, area FROM user
                    JOIN userprofile
                    ON user.User_ID = userprofile.User_ID
                    JOIN area
                    ON user.Username = area.Username
                    WHERE user.Username = '$Username'";
            $result=mysqli_query($conn, $query);
            if ($result) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $conn->error;
            }
        } else {
            echo '<script>alert("This user does not exist.")</script>';
        }

        mysqli_close($conn);
    }
?>
    <div class="container">
     <p id = "title" style = "text-align: center">Delete User</p>
       <form action ="AdminDelUser.php" method="post">
            <div class = "form">
                <div class = "textBorder">
                    <label for="username" class = "label"><b></b>Username</label>
                    <input type="text" placeholder="Enter username" name= "Username" id="username" required>
                </div>

                <button type="submit" name="delete" class="del">DELETE</button>
            </div>
       </form>
    </div>

<a href='http://localhost/asg/AdminViewUser.php'><img src = "pic/arrow.png" alt="back" class="arrow"></a>
<!-- END of content -->
</body>
</html>