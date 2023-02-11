<?php
session_start();
require "connect-db.php"; // conncet db

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $price = $_POST['price'];
  $discount = $_POST['discount'];
  $quantity = $_POST['quantity'];
  $updatedAt = date('Y-m-d H:i:s');

  $updateQry = "UPDATE `order_item` SET price='$price', discount='$discount', quantity='$quantity',updatedAt='$updatedAt' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['orderItem_upd_succ'] = "Successfully updated Order Item-> ID = $updId";
    header("location:view-orderItem.php");
  } else {
    echo "data not updated";
  }
}
