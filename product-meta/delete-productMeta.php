<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM product_meta WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['productM_upd_succ'] = "Successfully deleted this product meta.";
  header("location:product-meta.php");
} else {
  echo "Error to Deleting";
}
