<?php
session_start();
require "connect-db.php"; // connect database

if (isset($_POST["submit"])) {
  $userEmail = $_POST['login_email'];
  $userPass = $_POST['login_password'];
  //$encriptPass = md5($userPass);
  $selectQry = "SELECT * FROM user WHERE email='$userEmail' && passwordHash='$userPass' && user_status='Enable'";
  $dbCommand = mysqli_query($conn, $selectQry);
  if ($dbCommand->num_rows > 0) {
    $afterAssoc = mysqli_fetch_assoc($dbCommand);
    $_SESSION['genarate_email'] = $userEmail;
    if (isset($_SESSION['genarate_email'])) {
      $_SESSION['genarate_id'] = $afterAssoc['id'];
      $_SESSION['genarate_name'] = $afterAssoc['middleName'];
      $_SESSION['genarate_phone'] = $afterAssoc['mobile'];
      $_SESSION['genarate_type'] = $afterAssoc['user_type'];
      $_SESSION['genarate_pass'] = $afterAssoc['passwordHash'];
      $_SESSION['genarate_img'] = $afterAssoc['user_image'];
      header("location:dashboard.php");
    }
  } else {
    $_SESSION['error_login'] = "Incorrect user email or password";
    header("location:../../admin/index.php");
  }

  // 2nd way to valid user login

  //   $selectQry = "SELECT COUNT(*) AS result FROM users WHERE user_email='$userEmail' &&      user_password='$userPass' && user_status='Enable'";
  //     $dbCommand = mysqli_query($conn, $selectQry);
  //     $afterAssoc = mysqli_fetch_assoc($dbCommand);
  //     if($afterAssoc['result'] > 0){
  //          $_SESSION['gen_uemail'] = $userEmail;
  //          echo $_SESSION['user_name222'] = $userEmail;

  //          $_SESSION['user_type'] = $afterAssoc['user_type'];
  //          header("location:dashboard.php");
  //     }else {
  //          $_SESSION['error_login'] = "Incorrect user email or password";
  //          header("location:../../admin/index.php");
  //     }

  // 2nd way to verify user login


}
