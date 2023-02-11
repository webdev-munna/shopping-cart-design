<?php
session_start();
require "connect-db.php"; // connect database

if (isset($_POST['add_product'])) {
  $userId = $_SESSION['genarate_id'];
  $title = $_POST['title'];
  $metaTitle = $_POST['meta_title'];
  $slug = str_replace(' ', '-', $title) . '-' . rand(100000, 999999);
  $summary = $_POST['summary'];
  $type = $_POST['type'];
  $sku = $_POST['sku'];
  $price = $_POST['price'];
  $discount = $_POST['discount'];
  $quantity = $_POST['quantity'];
  $shop = $_POST['shop'];
  $date = date("Y-m-d H:i:s");

  $insertInto = "INSERT INTO product(userId,title,metaTitle,slug,summary,type,sku,price,discount,quantity,shop,createdAt)VALUES('$userId','$title','$metaTitle','$slug','$summary','$type','$sku','$price','$discount','$quantity','$shop','$date')";
  $insCmd = mysqli_query($conn, $insertInto);
  if ($insCmd) {
    $_SESSION['product_ins_succ'] = "Product inserted successfully.";
    header("location:add-product.php");
  } else {
    echo "product not inserted";
  }
}
