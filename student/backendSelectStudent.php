<?php
function applicationListTable()
{
    include "../backendConnectDB.php";
    $sql = "SELECT * FROM application";
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        echo "<td>No</td>";
        echo "<td>App</td>";
        //echo "<td><button title='Approve application' class='save-button'><i class='fa-solid fa-check'></i></button></td>";
        echo
        "<td>
        <a href='applicationModify.php'>
        <button title='Approve application' class='save-button'><i class='fa-solid fa-check'></i></a>
        <button title='Reject Application' class='cancel-button'><i class='fa-solid fa-xmark'></i></button>
        </td>";
        echo "</tr>";
    }
}

function getStudentName()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT fullname FROM student WHERE id='{$_SESSION['id']}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    echo $row['fullname'];
}


function loadStudentProfile()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT * FROM student WHERE id='{$_SESSION['id']}'";
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


function loadApplyButton()
{
    include "../backendConnectDB.php";
    session_start();
    $sql = "SELECT * FROM application WHERE student_id={$_SESSION['id']} AND year={$_SESSION['year']} AND semester={$_SESSION['semester']} AND (status='Pending' OR status='Approved')";
    $result = mysqli_query($con, $sql);
    //$row = mysqli_fetch_array($result);
    $row_count = mysqli_num_rows($result);
    if ($row_count == 1) {
        echo "<input type='submit' value='You Already Applied' class='blueSubmit' disabled>";
    } else {
        echo "<input type='submit' value='Apply' class='blueSubmit'>";
    }
}

function loadApplyResult()
{
    include "../backendConnectDB.php";
    $sql = "SELECT *,DATE_FORMAT(apply_date,'%e-%m-%Y') AS fdate FROM application WHERE student_id={$_SESSION['id']} AND year={$_SESSION['year']} AND semester={$_SESSION['semester']}";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    // <tr>
    //     <th style='width:30%;'>Booking ID</th>
    //     <td style='width:70%;'>{$row['id']}</td>
    // </tr>
    echo "
    <tr>
        <th>College</th>
        <td>{$row['college_name']}</td>
    </tr>
    <tr>
        <th>Date Applied</th>
        <td>{$row['fdate']}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{$row['status']}</td>
    </tr>";
}

//Admin
