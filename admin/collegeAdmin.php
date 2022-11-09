<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College</title>
    <link rel="icon" type="image/x-icon" href="../img/website_icon.png" />
    <link rel="stylesheet" type="text/css" href="../generalStyle1.css?<?= time() ?>" />
    <script src="../actions.js?<?= time() ?>"></script>

    <script src="https://kit.fontawesome.com/6bed2e30fa.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

</head>

<!-- default set to admin first-->

<body>

    <?php
    include "backendSelectAdmin.php";
    include "../backendPermission.php";
    pageAdmin();
    ?>

    <div class="top-nav">
        <img src="../img/website_icon.png" style="float:left">

        <a href="../backendLogout.php" style="float:right;margin:5px ;">Log out</a>

        <a href="#">
            <img src="../img/anonymous.jpg" style="float:right;" class="profile-pic" alt="profile" id="curr-user-profile-pic">
        </a>
    </div>

    <div class="container">

        <div id="side-nav-container" class="side-nav">
            <a href="index.php"><i class="fa-solid fa-house"></i> Dashboard </a>
            <a href="adminProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a>
            <a class="current" href="collegeAdmin.php"><i class="fa-solid fa-building-columns"></i>College</a>
            <a href="managerList.php"><i class="fa-solid fa-user-tie"></i> Manager </a>
            <a href="studentList.php"><i class="fa-solid fa-users"></i> Student </a>
        </div>

        <div class="main-body">
            <div class="sub-top-nav">
                <h2>College</h2>
                <div>
                    <a href="adminMainPage.html">Dashboard</a>/
                    <a href="collegeAdmin.html" style="color: darkblue;"><b>College</b></a>
                </div>
            </div>

            <div class="page-info">
                <br>
                <div class="sorting">
                    <span>Sort Report By</span>
                    <select name='sortBy' id='sortBy'>
                        <option value=0 selected>College Name</option>
                        <option value=1>Total Rooms</option>
                        <option value=2>Empty Rooms</option>
                    </select>
                    <br>
                    <span>Sort Report Order</span>
                    <select name='sortOrder' id='sortOrder'>
                        <option value=0 selected>Ascending</option>
                        <option value=1>Descending</option>
                    </select>
                    <br>
                    <button type='button' class='blueSubmit' style="max-width:200px;" onclick="sortCollegeAdmin()"> Sort Now </button>
                </div>
                <br>

                <table class="user-list" id="collegeAdmin">
                    <tr>
                        <th>College Name.</th>
                        <th>Total Rooms</th>
                        <th>Empty Rooms</th>
                    </tr>

                    <?php loadCollegeTableAdmin(); ?>

                </table>

            </div>

        </div>

</body>

</html>