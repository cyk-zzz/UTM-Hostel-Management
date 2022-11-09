<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accomodation Management System</title>
    <link rel="icon" type="image/x-icon" href="img/website_icon.png" />
    <link rel="stylesheet" type="text/css" href="generalStyle1.css?<?=time()?>" />

    <script src="https://kit.fontawesome.com/6bed2e30fa.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body class="error">
<?php
require "backendConnectDB.php";
session_start();

$_SESSION["role"] = "";
$_SESSION["year"] = 2022;
$_SESSION["semester"] = 1;

//echo $_POST["role"]
//echo $_POST["id"]
//echo $_POST["password"];

if ($_POST["role"] == "admin") {
    $sql = "SELECT id FROM admin WHERE username='{$_POST['username']}' and password='{$_POST['password']}'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result);

    if($row_count == 0){
        $link = "index.php";
        echo "Invalid Password<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    }

    $_SESSION["role"] = "admin";
    $_SESSION["id"] = $row['id'];
    header("location: admin");
} 
else if ($_POST["role"] == "manager") {
    $sql = "SELECT id FROM manager WHERE username='{$_POST['username']}' and password='{$_POST['password']}'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result);

    if($row_count == 0){
        $link = "index.php";
        echo "Invalid Password<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    }

    $_SESSION["role"] = "manager";
    $_SESSION["id"] = $row['id'];
    header("location: manager");
} 
else if ($_POST["role"] == "student") {
    $sql = "SELECT id FROM student WHERE username='{$_POST['username']}' and password='{$_POST['password']}'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result);

    if($row_count == 0){
        $link = "index.php";
        echo "Invalid Password<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    }
    
    $_SESSION["role"] = "student";
    $_SESSION["id"] = $row['id'];
    header("location: student");
}
?>

</body>