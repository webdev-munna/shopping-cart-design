<?php
session_start();
require "connect-db.php";

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $discount = $_POST['discount'];
  $total = $_POST['total'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $updatedAt = date('Y-m-d H:i:s');

  $updateQry = "UPDATE `order` SET discount='$discount', total='$total', city='$city', country='$country',updatedAt='$updatedAt' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['order_upd_succ'] = "Successfully updated Order-> ID = $updId";
    header("location:view-orders.php");
  } else {
    echo "data not updated";
  }
}
