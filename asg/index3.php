<?php
session_start();
$con = mysqli_connect("localhost","root","","database");

if(!$con)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>