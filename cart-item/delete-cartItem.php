<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM cart_item WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['cartItem_upd_succ'] = "Successfully deleted this cart item.";
  header("location:view-cartItem.php");
} else {
  echo "Error to Deleting";
}
