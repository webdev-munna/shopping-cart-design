<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM cart WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['cart_upd_succ'] = "Successfully deleted this cart.";
  header("location:view-carts.php");
} else {
  echo "Error to Deleting";
}
