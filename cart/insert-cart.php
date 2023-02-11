<?php
session_start();
require "../connect-db.php";

if (isset($_POST['add_cart'])) {
  $userId = $_POST['user_id'];
  $sessionId = $_POST['session_id'];
  $token = $_POST['token'];
  $firstName = $_POST['first_name'];
  $middleName = $_POST['middle_name'];
  $lastName = $_POST['last_name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $line1 = $_POST['line_1'];
  $line2 = $_POST['line_2'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $country = $_POST['country'];
  $createdAt = date('Y-m-d H:i:s');

  //insert 
  $insertCart = "INSERT INTO cart(userId,sessionId,token,status,firstName,middleName,lastName,mobile,email,line1,line2,city,province,country,createdAt) VALUES('$userId','$sessionId','$token','0','$firstName','$middleName','$lastName','$mobile','$email','$line1','$line2','$city','$province','$country','$createdAt')";
  $insertCmd = mysqli_query($conn, $insertCart);
  $_SESSION['cart_ins_succ'] = "Cart inserted successfully.";
  header("location:add-cart.php");
} else {
  echo "cart not inserted";
}
