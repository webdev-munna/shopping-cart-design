<?php
session_start();
require "connect-db.php"; // connect database

if (isset($_POST['add_orderItem'])) {
  $productId = $_POST['product_id'];
  $orderId = $_POST['order_id'];
  $sku = $_POST['sku'];
  $price = $_POST['price'];
  $discount = $_POST['discount'];
  $quantity = $_POST['quantity'];
  $createdAt = date('Y-m-d H:i:s');

  //insert 
  $res = "INSERT INTO order_item(productId, orderId, sku, price, `discount`, quantity, createdAt) VALUES ('$productId','$orderId','$sku','$price','$discount','$quantity','$createdAt')";
  $result = mysqli_query($conn, $res);
  $_SESSION['orderItem_ins_succ'] = "Order item inserted successfully.";
  header("location:add-orderItem.php");
} else {
  echo "Data not inserted";
}
