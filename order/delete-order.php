<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM `order` WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['order_upd_succ'] = "Successfully deleted this Order.";
  header("location:view-orders.php");
} else {
  echo "Error to Deleting";
}
