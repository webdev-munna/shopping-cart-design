<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM category WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['category_upd_succ'] = "Successfully deleted this category.";
  header("location:view-categories.php");
} else {
  echo "Error to Deleting";
}
