<?php
session_start();
require "../connect-db.php";

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $lastName = $_POST['last_name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $updatedAt = date('Y-m-d H:i:s');

  $updateQry = "UPDATE cart SET lastName='$lastName', mobile='$mobile', email='$email', city='$city', country='$country', updatedAt='$updatedAt' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['cart_upd_succ'] = "Successfully updated cart-> ID = $updId";
    header("location:view-carts.php");
  } else {
    echo "data not updated";
  }
}
