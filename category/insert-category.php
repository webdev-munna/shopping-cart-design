<?php
session_start();
require "connect-db.php";

if (isset($_POST['add_category'])) {
  $parentId = $_POST['parent_id'];
  $title = $_POST['title'];
  $metaTitle = $_POST['meta_title'];
  $slug = $_POST['slug'];
  $content = $_POST['content'];

  //insert 
  $insertCategory = "INSERT INTO category(parentId,title,metaTitle,slug,content) VALUES('$parentId','$title','$metaTitle','$slug','$content')";
  $insertCmd = mysqli_query($conn, $insertCategory);
  $_SESSION['category_ins_succ'] = "Category inserted successfully.";
  header("location:add-category.php");
} else {
  echo "not set";
}
