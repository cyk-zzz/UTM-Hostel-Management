<?php
function refreshCollegeRoom(){
    include "../backendConnectDB.php";
    $sql_college = "SELECT name FROM college";
    $result_college = mysqli_query($con,$sql_college);
    while($rowCollege = mysqli_fetch_array($result_college)){
        $collegeName =  $rowCollege['name'];
        $sql_app = "SELECT * FROM application WHERE status='Approved' AND college_name='$collegeName'";
        $result_app = mysqli_query($con,$sql_app);
        $room_filled = mysqli_num_rows($result_app);

        $sql_update = "UPDATE college SET empty_room=room_count-{$room_filled} WHERE name='$collegeName'";
        mysqli_query($con,$sql_update);
    }
}

function loadCollegeOption(){
    include "../backendConnectDB.php";
    $sql = "SELECT name FROM college";
    $result = mysqli_query($con, $sql);
    $row_count = mysqli_num_rows($result);

    if ($row_count != 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<option value='{$row['name']}'>{$row['name']}</option>";
        }
    }
}
function loadCollegeTable()
{
    include "backendConnectDB.php";
    refreshCollegeRoom();
    $sql = "SELECT * FROM college";
    $result = mysqli_query($con, $sql);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo "<tr><th colspan='2'>No College Found</th></tr>";
    } else {
        while ($row = mysqli_fetch_array($result)) {
            echo
            "<tr>
            <td>{$row['name']}</td>
            <td>{$row['empty_room']}</td>
            </tr>";
        }
    }
}
?>