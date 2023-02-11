<?php
session_start();
require "connect-db.php";

if (isset($_POST['add_cart_item'])) {
  $productId = $_POST['product_id'];
  $cartId = $_POST['cart_id'];
  $sku = $_POST['sku'];
  $price = $_POST['price'];
  $discount = $_POST['discount'];
  $quantity = $_POST['quantity'];
  $active = $_POST['active'];
  $createdAt = date('Y-m-d H:i:s');

  //insert 
  $insertCartItem = "INSERT INTO cart_item(productId,cartId,sku,price,discount,quantity,active,createdAt) VALUES('$productId','$cartId','$sku','$price','$discount','$quantity','$active','$createdAt')";
  $insertCmd = mysqli_query($conn, $insertCartItem);
  $_SESSION['cartItem_ins_succ'] = "Cart item inserted successfully.";
  header("location:add-cartItem.php");
} else {
  echo "Data not inserted";
}
