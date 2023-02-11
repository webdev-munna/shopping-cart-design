<?php
session_start();
require "connect-db.php";

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $orderId = $_POST['order_id'];
  $code = $_POST['code'];
  $type = $_POST['type'];
  $status = $_POST['status'];
  $updatedAt = date('Y-m-d H:i:s');

  $updateQry = "UPDATE `transaction` SET orderId='$orderId', code='$code', type='$type', status='$status',updatedAt='$updatedAt' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['transaction_upd_succ'] = "Successfully updated transaction-> ID = $updId";
    header("location:view-transactions.php");
  } else {
    echo "data not updated";
  }
}
