<?php
function getAdminName()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT fullname FROM admin WHERE id='{$_SESSION['id']}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    echo $row['fullname'];
}


function loadAdminProfile()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT * FROM admin WHERE id='{$_SESSION['id']}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    echo "<label><b>ID</b></label>";
    echo "<input type='text' id='ID' name='ID' value='{$row['id']}' disabled />";

    echo "<label><b>Full Name</b></label>";
    echo "<input type='text' id='fullname' name='fullname' value='{$row['fullname']}' required />";

    echo "<label><b>Gender</b></label><br>";
    echo "<input type='text' id='gender' name='gender' value='{$row['gender']}' disabled />";

    echo "<label><b>Contact Number</b></label>";
    echo "<input type='text' id='phone' name='phone' value='{$row['phone']}' required />";

    echo "<label><b>Email Address</b></label>";
    echo "<input type='text' id='email' name='email' value='{$row['email']}' required />";

    echo "<label><b>Username</b></label>";
    echo "<input type='text' id='username' name='username' value='{$row['username']}' disabled />";

    echo "<label><b>Password</b></label>";
    echo "<input type='text' id='password' name='password' value='{$row['password']}' required />";
}

function loadCollegeTableAdmin()
{
    include "../backendConnectDB.php";
    include "../backendGeneral.php";
    refreshCollegeRoom();
    $sql = "SELECT * FROM college";
    $result = mysqli_query($con, $sql);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo
        "<tr>
        <th colspan='3'>No College Found</th>
        </tr>";
    } else {
        while ($row = mysqli_fetch_array($result)) {
            echo
            "<tr>
            <td>{$row['name']}</td>
            <td>{$row['room_count']}</td>
            <td>{$row['empty_room']}</td>
            </tr>";
        }
    }
}

function loadManagerList(){
    include "../backendConnectDB.php";

    $sql = "SELECT * FROM manager";
    $result = mysqli_query($con, $sql);
    $row_count = mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)){
        echo "
            <tr id='manager{$row['id']}'>
            <td> {$row['id']} </td>
            <td> {$row['fullname']} </td>
            <td> {$row['gender']} </td>
            <td> {$row['phone']}</td>
            <td> {$row['email']} </td>
            <td> {$row['username']} </td>
            <td> {$row['password']} </td>
            <td>
            <button class='action-button save-button' type='button' title='Edit' onclick='openPopupEditForm(\"popup-edit-manager\",\"manager{$row['id']}\",\"edit-manager\")'><i class='fa-solid fa-pen-to-square'></i></button>
            <a href='backendUpdateAdmin.php?do=deleteManager&id={$row['id']}' onclick='return confirmBox()'><button class='action-button cancel-button' type='button' title='Delete'><i class='fa-solid fa-trash'></i></button></a>
        </td>
        </tr>
        ";
    }
}

function loadStudentList(){
    include "../backendConnectDB.php";

    $sql = "SELECT * FROM student";
    $result = mysqli_query($con, $sql);
    $row_count = mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)){
        echo "
            <tr id='student{$row['id']}'>
            <td> {$row['id']} </td>
            <td> {$row['fullname']} </td>
            <td> {$row['gender']} </td>
            <td> {$row['phone']}</td>
            <td> {$row['email']} </td>
            <td> {$row['username']} </td>
            <td> {$row['password']} </td>
            <td>
            <button class='action-button save-button' type='button' title='Edit' onclick='openPopupEditForm(\"popup-edit-student\",\"student{$row['id']}\",\"edit-student\")'><i class='fa-solid fa-pen-to-square'></i></button>
            <a href='backendUpdateAdmin.php?do=deleteStudent&id={$row['id']}' onclick='return confirmBox()'><button class='action-button cancel-button' type='button' title='Delete'><i class='fa-solid fa-trash'></i></button></a>
        </td>
        </tr>
        ";
    }
}

?>