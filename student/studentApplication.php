<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application</title>
    <link rel="icon" type="image/x-icon" href="../img/website_icon.png" />
    <link rel="stylesheet" type="text/css" href="../generalStyle1.css?<?= time() ?>" />
    <script src="../actions.js?<?= time() ?>"></script>

    <script src="https://kit.fontawesome.com/6bed2e30fa.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

</head>

<body>

    <?php
    include "backendSelectStudent.php";
    include "../backendGeneral.php";
    include "../backendPermission.php";
    pageStudent();
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
            <a href="studentProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a>
            <!-- <a href="collegeStudent.php"><i class="fa-solid fa-building-columns"></i> College</a> -->
            <a class="current" href="studentApplication.php"><i class="fa-solid fa-user-tie"></i> Application</a>
        </div>

        <div class="main-body">
            <div class="sub-top-nav">
                <h2>Application</h2>
                <a href="studentMainPage.html">Dashboard</a>
                / <a href="studentApplication.html" style="color: darkblue;"><b>Application</b></a>
            </div>

            <div class="page-info">
                <div class=>
                    <br>
                    <table class="user-list" id="college-list">
                        <tr>
                            <th>College Name</th>
                            <th>Rooms Left</th>
                        </tr>
                        <?php loadCollegeTable(); ?>
                    </table>

                    <form method="POST" name='applyCollege' class='applyCollege' action='backendUpdateStudent.php'>

                        <label><b>Select College To Apply</b></label>
                        <input type='hidden' name='do' value='studentApplyCollege'>
                        <select name='college'>
                            <?php loadCollegeOption(); ?>
                        </select>
                        <br>
                        <?php loadApplyButton(); ?>
                    </form>

                    <div id="print">
                        <h3>Accommodation Application Result</h3>
                        <table id="student-application-records" class="student-result">
                            <?php loadApplyResult(); ?>
                        </table>

                        <p>#Respective college is responsible for giving the room key and room number.</p>
                    </div>
                    <button class="general-button" onclick="createPDF('print')" style="color:white;padding:5px 10px">View Report</button>

                </div>
            </div>
        </div>

    </div>

</body>

</html>