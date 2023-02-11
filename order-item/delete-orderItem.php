<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM order_item WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['orderItem_upd_succ'] = "Successfully deleted this Order Item.";
  header("location:view-orderItem.php");
} else {
  echo "Error to Deleting";
}
