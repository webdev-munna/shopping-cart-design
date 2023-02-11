<?php
session_start();
require "connect-db.php";

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $title = $_POST['title'];
  $metaTitle = $_POST['metatitle'];
  $price = $_POST['price'];
  $discount = $_POST['discount'];
  $quantity = $_POST['quantity'];
  $updateDate = date("Y-m-d h:i:s");
  $updUserName = $_SESSION['genarate_name'];


  $updateQry = "UPDATE product SET updated_by='$updUserName', title='$title', metaTitle='$metaTitle', price='$price', discount='$discount', quantity='$quantity', updatedAt='$updateDate' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['product_upd_succ'] = "Successfully updated product -> ID = $updId";
    header("location:view-products.php");
  } else {
    echo "user data not updated";
  }
}
