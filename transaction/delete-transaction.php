<?php
session_start();
require "connect-db.php";

$delId = $_GET['delete_id'];
$delQry = "DELETE FROM `transaction` WHERE id='$delId'";
$cmd = mysqli_query($conn, $delQry);
if ($cmd) {
  $_SESSION['transaction_upd_succ'] = "Successfully deleted this transaction.";
  header("location:view-transactions.php");
} else {
  echo "Error to Deleting";
}
