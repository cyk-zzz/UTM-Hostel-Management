<?php
function pageAdmin(){
    session_start();
    if($_SESSION["role"] != "admin"){
        $link = "../index.php";
        if($_SESSION["role"] == "student"){
            $link = "../student/index.php";
        }
        else if($_SESSION["role"] == "manager"){
            $link = "../manager/index.php";
        }
        echo "Page Not Found<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    }
}

function pageManager(){
    session_start();
    if(($_SESSION["role"]!="admin")And($_SESSION["role"]!="manager")){
        $link = "../index.php";
        if($_SESSION["role"] == "student"){
            $link = "../student/index.php";
        }
        echo "Page Not Found<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    }
}

function pageStudent(){
    session_start();
    if(($_SESSION["role"]!="admin") and ($_SESSION["role"]!="manager") and ($_SESSION["role"]!="student")){
        $link = "../index.php";
        if($_SESSION["role"] == "manager"){
            $link = "../manager/index.php";
        }
        echo "Page Not Found<br>";
        die("<a href={$link}> Back To Main Menu </a>");
    }
}

function getRole(){
    session_start();
    switch ($_SESSION['role']){
        case ('admin'): echo "Admin";
        break;
        case ('manager'): echo "Accomodation Manager";
        break;
        case ('student'): echo "Student";
        break;
        default:
        echo "Guest";
    }
}
?>