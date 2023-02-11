<?php
session_start();
require "connect-db.php"; // connect database

if (isset($_POST['add_transaction'])) {
  $userId = $_POST['user_id'];
  $orderId = $_POST['order_id'];
  $code = $_POST['code'];
  $type = $_POST['type'];
  $mode = $_POST['mode'];
  $status = $_POST['status'];
  $createdAt = date('Y-m-d H:i:s');

  //insert 
  $res = "INSERT INTO `transaction`(userId, orderId, code, type, `mode`, status, createdAt) VALUES ('$userId','$orderId','$code','$type','$mode','$status','$createdAt')";
  $result = mysqli_query($conn, $res);
  $_SESSION['transaciton_ins_succ'] = "Transaction inserted successfully.";
  header("location:add-transaction.php");
} else {
  echo "Data not inserted";
}
