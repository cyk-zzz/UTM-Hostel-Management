<!--
    Icon: fontawesome.com
-->
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
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
    include "backendSelectAdmin.php";
    include "../backendPermission.php";
    pageAdmin();
    ?>

    <div class="top-nav">
        <img src="../img/website_icon.png" style="float:left">

        <a href="../backendLogout.php" style="float:right;margin:5px ;">Log out</a>

        <a href="#">
            <img src="../img/anonymous.jpg" style="float:right" class="profile-pic" alt="profile">
        </a>

    </div>
    <div class="container">

        <div id="side-nav-container" class="side-nav">
            <a href="index.php"><i class="fa-solid fa-house"></i> Dashboard </a>
            <a href="adminProfilePage.php"><i class="fa-solid fa-id-card"></i> Profile </a>
            <a href="collegeAdmin.php"><i class="fa-solid fa-building-columns"></i>College</a>
            <a href="managerList.php"><i class="fa-solid fa-user-tie"></i> Manager </a>
            <a class="current" href="studentList.php"><i class="fa-solid fa-users"></i> Student </a>
        </div>

        <div class="main-body">
            <div class="sub-top-nav">
                <h2>Student List</h2>
                <div>
                    <a href="adminMainPage.html" style="color: black;">Dashboard</a> /
                    <a href="studentList.html" style="color: darkblue;"><b>Student</b></a>
                </div>
            </div>

            <div class="page-info">
            <div class="sorting">
                    <span>Sort Student By</span>
                    <select name='sortBy' id='sortBy'>
                        <option value=0 selected>ID</option>
                        <option value=1>Full Name</option>
                        <option value=2>Gender</option>
                        <option value=3>Contact No</option>
                        <option value=4>Email</option>
                        <option value=5>Username</option>
                    </select>
                    <br>
                    <span>Sort Student Order</span>
                    <select name='sortOrder' id='sortOrder'>
                        <option value=0 selected>Ascending</option>
                        <option value=1>Descending</option>
                    </select>
                    <br>
                    <button type='button' class='blueSubmit' style="max-width:200px;" onclick="sortStudentList()"> Sort Now </button>
                </div>
                <br>

                <div>
                    <button class="list-button general-button" type="button" title="Add New Student" onclick="openPopupAddForm('popup-add-student')"><i class="fa-solid fa-plus"></i> Add New Student </button>
                    <br>
                    <br>
                    <table class="user-list" id="student-list-table">
                        <tr>
                            <th style=>ID</th>
                            <th style=>Full Name</th>
                            <th style=>Gender</th>
                            <th style=>Contact No</th>
                            <th style=>Email</th>
                            <th style=>Username</th>
                            <th style=>Password</th>
                            <th style=>Action</th>
                        </tr>
                        <?php loadStudentList(); ?>
                    </table>
                </div>

                <div class="popup-form" id="popup-add-student">
                    <span>Add New Student</span>
                    <form class="form-container" id="add-new-student" name="add-new-student" method="POST" onsubmit="return validateEditAdmin('add-new-student')" action="backendUpdateAdmin.php">

                        <input type='hidden' name='do' value='addStudent' />
                        <!-- <label><b>ID</b></label> -->
                        <input type='hidden' id='ID' name='ID' value='' />
                        <!-- <br> -->
                        <label><b>Full Name</b></label>
                        <input type='text' id='fullname' name='fullname' value='' required />
                        <br>
                        <label><b>Gender</b></label>
                        <select id='gender' name='gender' required>
                            <option value='Male'> Male </option>
                            <option value='Female'> Female </option>
                        </select>
                        <br>
                        <label><b>Contact Number</b></label>
                        <input type='text' id='phone' name='phone' value='' required />
                        <br>
                        <label><b>Email Address</b></label>
                        <input type='text' id='email' name='email' value='' required />
                        <br>
                        <label><b>Username</b></label>
                        <input type='text' id='username' name='username' value='' required/>
                        <br>
                        <label><b>Password</b></label>
                        <input type='text' id='password' name='password' value='' required />
                        <br>
                        <input class="form-button save-button" type="submit" value="Save" onclick="confirmBox()"> </input>
                        <button class="form-button cancel-button" type="button" onclick="closePopupForm('popup-add-student')"> <b>Cancel</b></button>
                    </form>
                </div>

            </div>


            <div class="popup-form" id="popup-edit-student">
                <span style="display: none;"></span>
                <span>Edit Student Information</span>
                <form class="form-container" id="edit-student" name="edit-student" method="post" onsubmit="return validateEditAdmin('edit-student')" action="backendUpdateAdmin.php">
                    <input type='hidden' name='do' value='editStudent' />
                    <!-- <label><b>ID</b></label> -->
                    <input type='hidden' id='ID' name='ID' value='' />
                    <!-- <br> -->
                    <label><b>Full Name</b></label>
                    <input type='text' id='fullname' name='fullname' value='' required />
                    <br>
                    <label><b>Gender</b></label>
                    <select id='gender' name='gender' required>
                        <option value='Male'> Male </option>
                        <option value='Female'> Female </option>
                    </select>
                    <br>
                    <label><b>Contact Number</b></label>
                    <input type='text' id='phone' name='phone' value='' required />
                    <br>
                    <label><b>Email Address</b></label>
                    <input type='text' id='email' name='email' value='' required />
                    <br>
                    <label><b>Username</b></label>
                    <input type='text' id='username' name='username' value='' disabled />
                    <br>
                    <label><b>Password</b></label>
                    <input type='text' id='password' name='password' value='' required />
                    <br>
                    <input class="form-button save-button" type="submit" value="Save" onclick="confirmBox()"> </input>
                    <button class="form-button cancel-button" type="button" onclick="closePopupForm('popup-edit-student')"> <b>Cancel</b></button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>