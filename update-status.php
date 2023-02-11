<?php
require("connect-db.php");

$userId = $_GET['update_id'];
$userStatus = $_GET['status'];
if (isset($userId)) {
       $updQry = "UPDATE user SET user_status='$userStatus' WHERE id='$userId'";
       $UpdCmd = mysqli_query($conn, $updQry);
       header("location:view-users.php");
}
