<?php
session_start();
require "connect-db.php";

if (isset($_POST['add_product_review'])) {
  $productId = $_POST['product_id'];
  $parentId = $_POST['parent_id'];
  $title = $_POST['title'];
  $rating = $_POST['rating'];
  $published = $_POST['published'];
  $createdDate = date('y-m-d h:i:s');

  //insert 
  $insertProductReview = "INSERT INTO product_review(productId,parentId,title,rating,published,createdAt) VALUES('$productId','$parentId','$title','$rating','$published','$createdDate')";
  $insertCmd = mysqli_query($conn, $insertProductReview);
  $_SESSION['review_ins_succ'] = "Product meta inserted successfully.";
  header("location:add-product_review.php");
} else {
  echo "not set";
}
