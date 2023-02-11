<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM user WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['user_succ'] = "Successfully Deleted this user.";
  header("location:view-users.php");
} else {
  echo "Error to Deleting";
}
