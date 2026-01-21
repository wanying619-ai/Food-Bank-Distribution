<?php
error_reporting(0);
include_once 'index3.php';

if (isset($_SESSION['shopUsername']) && is_numeric($_GET['id'])){

$id = (int)$_GET['id']; // get id through query string
$name = $_SESSION['shopUsername']['Shop_ID'];
echo $name ;

$sql = "DELETE FROM supply WHERE  Food_ID = '$id' AND shop_ID = '$name'";
$fff = "DELETE FROM food WHERE  Food_ID = '$id' ";

$result = mysqli_query($con, $sql);

header('location:http://localhost/asg/Shopfoodcategory.php');
}
else {
    echo "Wrong";
}
?>