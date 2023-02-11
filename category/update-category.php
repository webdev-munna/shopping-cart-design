<?php
session_start();
require "connect-db.php";

if (isset($_POST['update_btn'])) {
  $updId = $_POST['upd_id'];
  $parentId = $_POST['parent_id'];
  $title = $_POST['title'];
  $metaTitle = $_POST['meta_title'];
  $slug = $_POST['slug'];

  $updateQry = "UPDATE category SET parentId='$parentId', title='$title', metaTitle='$metaTitle', slug='$slug' WHERE id='$updId'";
  $updateCmd = mysqli_query($conn, $updateQry);
  if ($updateCmd) {
    $_SESSION['category_upd_succ'] = "Successfully updated Category-> ID = $updId";
    header("location:view-categories.php");
  } else {
    echo "user data not updated";
  }
}
