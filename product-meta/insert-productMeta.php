<?php
session_start();
require "connect-db.php";

if (isset($_POST['sumit_meta'])) {
  $productId = $_POST['product_id'];
  $productKey = $_POST['key'];
  $productContent = $_POST['content'];

  //insert 
  $insertProductMeta = "INSERT INTO product_meta(productId,product_key,content) VALUES('$productId','$productKey','$productContent')";
  $insertCmd = mysqli_query($conn, $insertProductMeta);
  $_SESSION['meta_ins_succ'] = "Product meta inserted successfully.";
  header("location:product-meta.php");
} else {
  echo "not set";
}
