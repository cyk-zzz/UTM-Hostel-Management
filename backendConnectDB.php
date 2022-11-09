<?php
$servername = "127.0.0.1";
$username = "group7";
$password = "12345";
$databasename = "student_college";

$con = mysqli_connect($servername,$username,$password,$databasename);

if (!$con){
    die("ERROR: Could not connect. ");
}
?>