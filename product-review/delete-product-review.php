<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM product_review WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['product_review_upd_succ'] = "Successfully deleted this product review.";
  header("location:view-product_reviews.php");
} else {
  echo "Error to Deleting";
}
