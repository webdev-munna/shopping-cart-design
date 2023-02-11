<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM product WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['product_upd_succ'] = "Successfully deleted this product.";
  header("location:view-products.php");
} else {
  echo "Error to Deleting";
}
