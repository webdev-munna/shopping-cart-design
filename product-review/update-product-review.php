<?php
session_start();
require "connect-db.php";

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $pId = $_POST['product_id'];
  $parentId = $_POST['parent_id'];
  $title = $_POST['title'];
  $rating = $_POST['rating'];

  $updateQry = "UPDATE product_review SET productId='$pId', parentId='$parentId', title='$title', rating='$rating' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['product_review_upd_succ'] = "Successfully updated product Meta -> ID = $updId";
    header("location:view-product_reviews.php");
  } else {
    echo "user data not updated";
  }
}
