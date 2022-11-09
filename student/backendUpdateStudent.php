<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Main Page</title>
    <link rel="icon" type="image/x-icon" href="../img/website_icon.png" />
    <link rel="stylesheet" type="text/css" href="../generalStyle1.css?<?=time()?>" />
    <script src="../actions.js?<?= time()?>"></script>

    <script src="https://kit.fontawesome.com/6bed2e30fa.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

</head>

<body>

<?php
        include "backendSelectStudent.php";
        include "../backendPermission.php";
        pageStudent();
?>

<div class="top-nav">
        <img src="../img/website_icon.png" style="float:left">

        <a href = "../backendLogout.php" style="float:right;margin:5px ;">Log out</a>

        <a href="#">
            <img src="../img/anonymous.jpg" style="float:right" class="profile-pic" alt="profile" >
        </a>
        
    </div>
    
    <div class="container">

        <div id="side-nav-container" class="side-nav">
            <a href="index.php"><i class="fa-solid fa-house"></i> Dashboard </a>
            <a href="studentProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a>
            <!-- <a href="collegeStudent.php"><i class="fa-solid fa-building-columns"></i> College</a> -->
            <a href="studentApplication.php"><i class="fa-solid fa-user-tie"></i> Application</a>
        </div>

        <div class="main-body">
            <div class = "message">
        <?php
            include "../backendConnectDB.php";
            session_start();

            if(($_POST['do']=='studentSaveProfile')){
                $sql = "UPDATE student SET fullname='{$_POST['fullname']}'
                ,phone='{$_POST['phone']}'
                ,email='{$_POST['email']}'
                ,password='{$_POST['password']}'
                WHERE id={$_SESSION['id']}";
                if(!mysqli_query($con,$sql)){
                    echo "Profile Failed To Update, Please Change The Username<br>";
                }
                else{
                    echo "Profile Updated<br>";
                }
                $link = "index.php";
                die("<a href={$link}> Back To Main Menu </a>");
            }
        
            if($_POST['do']=='studentApplyCollege'){
                $sql = "INSERT INTO application(student_id,college_name,apply_date,year,semester,status)
                VALUES ({$_SESSION['id']}
                ,'{$_POST['college']}'
                ,now()
                ,{$_SESSION['year']}
                ,{$_SESSION['semester']}
                ,'Pending'
                )";
                if (!mysqli_query($con, $sql)) {
                    echo "College Apply Failed<br>";
                } else {
                    echo "College Applied<br>";
                }
                $link = "index.php";
                die("<a href={$link}> Back To Main Menu </a>");
            }

        ?>
    </div>
</div>
</body>