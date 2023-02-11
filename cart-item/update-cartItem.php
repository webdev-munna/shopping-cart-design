<?php
session_start();
require "connect-db.php";

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $price = $_POST['price'];
  $discount = $_POST['discount'];
  $quantity = $_POST['quantity'];
  $updatedAt = date('Y-m-d H:i:s');

  $updateQry = "UPDATE cart_item SET price='$price', discount='$discount', quantity='$quantity', updatedAt='$updatedAt' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['cartItem_upd_succ'] = "Successfully updated cart item-> ID = $updId";
    header("location:view-cartItem.php");
  } else {
    echo "data not updated";
  }
}
