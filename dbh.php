<?php
$dbservername ="localhost";
$dbUsername = "root";
$dbpassword = "";
$dbname = "my_db";

$conn = mysqli_connect($dbservername,$dbUsername,$dbpassword,$dbname);

if(!$conn){
    die("connection failed".mysqli_connect_error());
}