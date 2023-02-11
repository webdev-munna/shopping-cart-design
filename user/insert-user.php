<?php
session_start();
require "connect-db.php"; // conncect database

$firstName = $_POST['fname'];
$middleName = $_POST['mname'];
$lastName = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$userType = $_POST['user_type'];
$userStatus = $_POST['user_status'];
$password = $_POST['password'];
$uppLowCase = preg_match('/[a-zA-Z0-9]/', $password); // accept all letters and numbers character.
$speChars = preg_match('/[^a-zA-Z0-9]/', $password);  // accept any special character.
$confirmPassword = $_POST['c_password'];
$date = date("Y-m-d H:i:s");

$_SESSION['store_fname'] = $firstName;
$_SESSION['store_mname'] = $middleName;
$_SESSION['store_lname'] = $lastName;
$_SESSION['store_phone'] = $phone;
$_SESSION['store_email'] = $email;

if (empty($firstName)) {
  $_SESSION['error_fname'] = "Please enter first name.";
  header("location:add-user.php");
} elseif (!preg_match("/^[a-zA-Z\s'-]*$/", $firstName)) {
  $_SESSION['error_fname'] = "Name is not valid! It must not contain numbers or special characters!";
  header("location:add-user.php");
} elseif (empty($middleName)) {
  $_SESSION['error_mname'] = "Please enter middle name.";
  header("location:add-user.php");
} elseif (!preg_match("/^[a-zA-Z\s'-]*$/", $middleName)) {
  $_SESSION['error_mname'] = "Name is not valid! It must not contain numbers or special characters!";
  header("location:add-user.php");
} elseif (empty($lastName)) {
  $_SESSION['error_lname'] = "Please enter last name.";
  header("location:add-user.php");
} elseif (!preg_match("/^[a-zA-Z\s'-]*$/", $lastName)) {
  $_SESSION['error_lname'] = "Name is not valid! It must not contain numbers or special characters.";
  header("location:add-user.php");
} elseif (empty($phone)) {
  $_SESSION['error_phone'] = "Please enter a phone number.";
  header("location:add-user.php");
} elseif (!preg_match("/^(013|014|015|016|017|018|019)+[0-9]{8}+$/", $phone)) {
  $_SESSION['error_phone'] = "Please enter a valid phone number!";
  header("location:add-user.php");
} elseif (empty($email)) {
  $_SESSION['error_email'] = "Please enter a email address.";
  header("location:add-user.php?#error_email");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['error_email'] = "Please enter a valid email address!";
  header("location:add-user.php?#error_email");
} elseif (empty($userType)) {
  $_SESSION['error_user_type'] = "Please select a user type.";
  header("location:add-user.php?#error_user_type");
} elseif (empty($userStatus)) {
  $_SESSION['error_user_status'] = "Please select a user status.";
  header("location:add-user.php?#error_user_status");
} elseif (empty($password)) {
  $_SESSION['error_password'] = "Please enter password.";
  header("location:add-user.php?#error_password");
} elseif (strLen($password) < 8 || !$uppLowCase || !$speChars) {
  $_SESSION['error_password'] = "Password must have 8 character & uppercase/ lowercase/number & special characters!";
  header("location:add-user.php?#error_password");
} elseif (empty($confirmPassword)) {
  $_SESSION['error_Cpassword'] = "Please enter password.";
  header("location:add-user.php?#error_Cpassword");
} elseif ($password !== $confirmPassword) {
  $_SESSION['error_Cpassword'] = "Confirm password doesn't match.";
  header("location:add-user.php#error_Cpassword");
} else {
  // query for duplicate email
  $selectEmail = "SELECT COUNT(*) AS emails FROM user WHERE email='$email'";
  $cmd = mysqli_query($conn, $selectEmail);
  $afterAssoc = mysqli_fetch_assoc($cmd);

  // query for duplicate phone number
  $selectPhone = "SELECT COUNT(*) AS phones FROM user WHERE mobile='$phone'";
  $cmd2 = mysqli_query($conn, $selectPhone);
  $afterAssoc2 = mysqli_fetch_assoc($cmd2);
  if ($afterAssoc['emails'] > 0) {
    $_SESSION['error_email'] = "$email this Email already been taken please try with new one!";
    header("location:add-user.php?#error_email");
  } elseif ($afterAssoc2['phones'] > 0) {
    $_SESSION['error_phone'] = "$phone this mobile number already been taken please try with new one!";
    header("location:add-user.php");
  } else {
    $insertInto = "INSERT INTO user(firstName,middleName,lastName,mobile, email,passwordHash,user_type,user_status,registeredAt) VALUES('$firstName','$middleName','$lastName','$phone','$email','$password','$userType','$userStatus','$date')";
    $qryToIns = mysqli_query($conn, $insertInto);
    if ($qryToIns) {
      $_SESSION['insert_succ'] = "User inserted successfully";
      header("location:add-user.php");
    } else {
      echo mysqli_connect_error($cmd);
    }
  }
}
