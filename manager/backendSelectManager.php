<?php

function getManagerName()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT fullname FROM manager WHERE id='{$_SESSION['id']}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    echo $row['fullname'];
}

function loadManagerProfile()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT * FROM {$_SESSION['role']} WHERE id='{$_SESSION['id']}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    //cho "<label><b>ID</b></label>";
    //echo "<input type='text' id='ID' name='ID' value='{$row['id']}' disabled />";

    echo "<br><label><b>Full Name</b></label>";
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

function loadApplication()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT a.*, s.fullname, s.gender, DATE_FORMAT(apply_date,'%e-%m-%Y') AS fdate
    FROM application a
    INNER JOIN student s ON a.student_id = s.id
    WHERE status='Pending'
    ";
    $result = mysqli_query($con, $sql);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0){
        echo "<tr><td colspan=6> No Record Found </td></tr>";
    }

    while($row = mysqli_fetch_array($result)){
    echo "
    <tr>
    <td> {$row['id']} </td>
    <td> {$row['fullname']} </td>
    <td> {$row['gender']} </td>
    <td> {$row['college_name']} </td>
    <td> {$row['fdate']} </td>
    <td>
        <a href='backendUpdateManager.php?do=updateApp&id={$row['id']}&status=Approved&college_name={$row['college_name']}'><button title='Approve application' class='save-button' action=''><i class='fa-solid fa-check'></i></button></a>
        <a href='backendUpdateManager.php?do=updateApp&id={$row['id']}&status=Rejected&college_name={$row['college_name']}'><button title='Reject Application' class='cancel-button' action=''><i class='fa-solid fa-xmark'></i></button></a>
    </td>
    </tr>";
    }
}

function loadReport()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT a.*, s.fullname, s.gender, DATE_FORMAT(apply_date,'%e-%m-%Y') AS fdate
    FROM application a
    INNER JOIN student s ON a.student_id = s.id
    ";
    $result = mysqli_query($con, $sql);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0){
        echo "<tr><td colspan=6> No Record Found </td></tr>";
    }

    while($row = mysqli_fetch_array($result)){
    echo "
    <tr>
    <td> {$row['id']} </td>
    <td> {$row['fullname']} </td>
    <td> {$row['gender']} </td>
    <td> {$row['college_name']} </td>
    <td> {$row['fdate']} </td>
    <td> {$row['status']} </td>
    </tr>";
    }
}

?>