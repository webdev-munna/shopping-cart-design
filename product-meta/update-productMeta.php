<?php
session_start();
require "connect-db.php";

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $pId = $_POST['product_id'];
  $pKey = $_POST['product_key'];
  $content = $_POST['content'];

  $updateQry = "UPDATE product_meta SET productId='$pId', product_key='$pKey', content='$content' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['productM_upd_succ'] = "Successfully updated product Meta -> ID = $updId";
    header("location:product-meta.php");
  } else {
    echo "user data not updated";
  }
}
