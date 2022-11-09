<!--
    Icon: fontawesome.com
-->
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
            <a class = "current" href="index.php"><i class="fa-solid fa-house"></i> Dashboard </a>
            <a href="studentProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a>
            <!-- <a href="collegeStudent.php"><i class="fa-solid fa-building-columns"></i> College</a> -->
            <a href="studentApplication.php"><i class="fa-solid fa-user-tie"></i> Application</a>
        </div>


        <div class="main-body">

            <div class="sub-top-nav">
                <h2>Student Main Page</h2>
                <div>
                    <a href="studentMainPage.html" style="color: darkblue;"><b>Dashboard</b></a>
                </div>
            </div>


            <div class="center">
                    You are logged in as a student.
                    Select actions from the side bar. <br>
                    <a href="studentProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a> <br>
                    <a href="studentApplication.php"><i class="fa-solid fa-user-tie"></i> Application</a>
            </div>

        </div>

    </div>

</body>

</html>