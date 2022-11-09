<!--
    Icon: fontawesome.com
-->
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
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
        include "backendSelectManager.php";
        include "../backendPermission.php";
        include "../backendGeneral.php";
        pageManager();
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
            <a href="managerProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a>
            <!--<a href="collegeManager.php"><i class="fa-solid fa-building-columns"></i> College</a>-->
            <!--<a href="#"><i class="fa-solid fa-users"></i> Application</a>-->
            <a href="viewApplication.php" ><i class="fa-solid fa-clipboard-list"></i> Applications</a>
            <a class = "current" href="report.php" ><i class="fa-solid fa-folder"></i> Report</a>
        </div>


        <div class="main-body">
            <div class="sub-top-nav">
                <h2>Report</h2>
                <div>
                    <a href="managerMainPage.html">Dashboard</a> /
                    <a href="report.html" style="color: darkblue;"><b>Report</b></a>
                </div>
            </div>

            <div class="page-info">
                <br>
                <table class="user-list" id="college-list">
                        <tr>
                            <th>College Name</th>
                            <th>Rooms Left</th>
                        </tr>
                        <?php loadCollegeTable(); ?>
                </table>
                <br>
                <div class="sorting">
                    <span>Sort Report By</span>
                    <select name='sortBy' id='sortBy'>
                        <option value=0 selected>Booking ID</option>
                        <option value=1>Student Name</option>
                        <option value=2>Gender</option>
                        <option value=3>College</option>
                        <option value=4>Date Applied</option>
                        <option value=5>Status</option>
                    </select>
                    <br>
                    <span>Sort Report Order</span>
                    <select name='sortOrder' id='sortOrder'>
                        <option value=0 selected>Ascending</option>
                        <option value=1>Descending</option>
                    </select>
                    <br>
                    <button type='button' class='blueSubmit' style="max-width:200px;" onclick="sortReport()"> Sort Now </button>
                </div>

                <br>
                <table class="user-list" id="applicationReport" name='applicationReport'>
                    <tr>
                        <th>Booking ID </th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>College</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                    </tr>

                    <?php loadReport(); ?>
                    
                </table>

            </div>


            
        </div>

    </div>

</body>

</html>