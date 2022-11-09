<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main Page</title>
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
        include "backendSelectAdmin.php";
        include "../backendPermission.php";
        pageAdmin();
    ?>

    <div class="top-nav">
        <img src="../img/website_icon.png" style="float:left">
        
        <a href = "../backendLogout.php" style="float:right;margin:5px ;">Log out</a>

        <a href="#">
            <img src="../img/anonymous.jpg" style="float:right;" class="profile-pic" alt="profile" id="curr-user-profile-pic">
        </a>

        
    </div>
    <div class="container">

        <div id="side-nav-container" class="side-nav">
            <a href="index.php"><i class="fa-solid fa-house"></i> Dashboard </a>
            <a href="adminProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a>
            <a href="collegeAdmin.php"><i class="fa-solid fa-building-columns"></i>College</a>
            <a href="managerList.php"><i class="fa-solid fa-user-tie"></i> Manager </a>
            <a href="studentList.php"><i class="fa-solid fa-users"></i> Student </a>
        </div>

        <div class="main-body">
            <div class="message">
            <?php
    include "../backendConnectDB.php";
    session_start();

    if(($_POST['do']=='adminSaveProfile')){
        $sql = "UPDATE admin SET fullname='{$_POST['fullname']}'
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

    if(($_GET['do']=='deleteManager')){
        $sql = "DELETE FROM manager WHERE id={$_GET['id']}";
        if(!mysqli_query($con,$sql)){
            echo "Failed To Delete Manager<br>";
        }
        else{
            echo "Manager Deleted<br>";
        }
        $link = "index.php";
        die("<a href={$link}> Back To Main Menu </a>");
    }

    if(($_GET['do']=='deleteStudent')){
        $sql1 = "DELETE FROM application WHERE student_id={$_GET['id']}";
        $sql2 = "DELETE FROM student WHERE id={$_GET['id']}";

        if(!mysqli_query($con,$sql1)){
            echo "Failed To Delete Student<br>";
        }
        else{
            mysqli_query($con,$sql2);
            echo "Student Deleted<br>";
        }
        $link = "index.php";
        die("<a href={$link}>Back To Main Menu </a>");
    }

    if(($_POST['do']=='editManager')){
        $sql = "UPDATE manager SET
        fullname='{$_POST['fullname']}'
        , gender='{$_POST['gender']}'
        , phone='{$_POST['phone']}'
        , email='{$_POST['email']}'
        , password='{$_POST['password']}'
        WHERE id={$_POST['ID']}";

        if(!mysqli_query($con,$sql)){
            echo "Failed To Edit Manager<br>";
        }
        else{
            echo "Manager Edited<br>";
        }
        $link = "index.php";
        die("<a href={$link}>Back To Main Menu </a>");
    }

    if(($_POST['do']=='editStudent')){
        $sql = "UPDATE student SET
        fullname='{$_POST['fullname']}'
        , gender='{$_POST['gender']}'
        , phone='{$_POST['phone']}'
        , email='{$_POST['email']}'
        , password='{$_POST['password']}'
        WHERE id={$_POST['ID']}";

        if(!mysqli_query($con,$sql)){
            echo "Failed To Edit Student<br>";
        }
        else{
            echo "Student Edited<br>";
        }
        $link = "index.php";
        die("<a href={$link}>Back To Main Menu </a>");
    }

    if(($_POST['do']=='addStudent')){
        $sql = "INSERT INTO student (username,password,fullname,gender,phone,email) 
        VALUES (
            '{$_POST['username']}',
            '{$_POST['password']}',
            '{$_POST['fullname']}',
            '{$_POST['gender']}',
            '{$_POST['phone']}',
            '{$_POST['password']}'
            )";
        
        if(!mysqli_query($con,$sql)){
            echo "Failed To Add Student<br>";
        }
        else{
            echo "Student Added<br>";
        }
        $link = "index.php";
        die("<a href={$link}>Back To Main Menu </a>");
    }

    if(($_POST['do']=='addManager')){
        $sql = "INSERT INTO manager (username,password,fullname,gender,phone,email) 
                VALUES (
            '{$_POST['username']}',
            '{$_POST['password']}',
            '{$_POST['fullname']}',
            '{$_POST['gender']}',
            '{$_POST['phone']}',
            '{$_POST['password']}'
            )";
        
        if(!mysqli_query($con,$sql)){
            echo "Failed To Add Student<br>";
        }
        else{
            echo "Student Added<br>";
        }
        $link = "index.php";
        die("<a href={$link}>Back To Main Menu </a>");
    }
?>
            </div>
            
        </div>

    </div>

</body>

</html>