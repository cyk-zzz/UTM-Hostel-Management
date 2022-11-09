<!--
    Icon: fontawesome.com
-->
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
            <a class = "current" href="index.php"><i class="fa-solid fa-house"></i> Dashboard </a>
            <a href="adminProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a>
            <a href="collegeAdmin.php"><i class="fa-solid fa-building-columns"></i>College</a>
            <a href="managerList.php"><i class="fa-solid fa-user-tie"></i> Manager </a>
            <a href="studentList.php"><i class="fa-solid fa-users"></i> Student </a>
        </div>

        <div class="main-body">
            <div class="sub-top-nav">
                <h2>Admin Main Page</h2>
                <div>
                    <a href="adminMainPage.php" style="color: darkblue;"><b>Dashboard</b></a>
                </div>
            </div>

            <div class="center">
                    You are logged in as an admin.
                    Select actions from the side bar. <br>
                    <a href="adminProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a> <br>
                    <a href="collegeAdmin.php"><i class="fa-solid fa-building-columns"></i>College</a> <br>
                    <a href="managerList.php"><i class="fa-solid fa-user-tie"></i> Manager </a> <br>
                    <a href="studentList.php"><i class="fa-solid fa-users"></i> Student </a>
            </div>
            
        </div>

    </div>

</body>

</html>