<?php
session_start();
require "connect-db.php";

$genId = $_SESSION['genarate_id'];
$genPass = $_SESSION['genarate_pass'];

/* change name start here */
if (isset($_POST['change_name_btn'])) {
  $newName = $_POST['change_name'];
  $validName = preg_match("/^[a-zA-Z\s'-]*$/", $newName);
  if (empty($newName)) {
    $_SESSION['err_nw_name'] = "Please enter your new name.";
    header("location:profile.php");
  } elseif (!$validName) {
    $_SESSION['err_nw_name'] = "Name is not valid! It must not contain numbers or special characters.";
    header("location:profile.php");
  } else {
    $updateQuery = "UPDATE user SET lastName='$newName' WHERE id='$genId'";
    $dbCommand = mysqli_query($conn, $updateQuery);
    $_SESSION['genarate_name'] = $newName;
    $_SESSION['upd_name_succ'] = "Successfully Updated Your Name";
    header("location:profile.php");
  }
} else {
  echo "Undefined Change Name Button";
}
/* change name end here */

/* change phone start here */
if (isset($_POST['change_phn_btn'])) {
  $newPhone = $_POST['change_phone'];
  $validPhone = preg_match("/^(013|014|015|016|017|018|019)+[0-9]{8}+$/", $newPhone);
  if (empty($newPhone)) {
    $_SESSION['err_nw_phone'] = "Please enter your new phone number.";
    header("location:profile.php");
  } elseif (!$validPhone) {
    $_SESSION['err_nw_phone'] = "Phone number is not valid!";
    header("location:profile.php");
  } else {
    // query for duplicate phone number
    $selectPhone = "SELECT COUNT(*) AS phones FROM user WHERE mobile='$newPhone'";
    $cmd2 = mysqli_query($conn, $selectPhone);
    $afterAssoc2 = mysqli_fetch_assoc($cmd2);
    if ($afterAssoc2['phones'] > 0) {
      $_SESSION['error_phone'] = "$newPhone this mobile number already been taken please try with new one!";
      header("location:add-user.php");
    } else {
      $updateQuery2 = "UPDATE user SET mobile='$newPhone' WHERE id='$genId'";
      $dbCommand2 = mysqli_query($conn, $updateQuery2);
      $_SESSION['genarate_phone'] = $newPhone;
      $_SESSION['upd_phone_succ'] = "Successfully Updated Your Phone Number.";
      header("location:profile.php");
    }
  }
} else {
  echo "Undefined Change Phone Button";
}
/* change phone end here */

/* change image start here */
if (isset($_POST['change_img_btn'])) {
  $userImg = $_FILES['change_img'];
  $afterExplode = explode('.', $userImg['name']);
  $extention = end($afterExplode);
  $acceptedFormat = ['jpg', 'jpeg', 'png', 'jfif', 'gif', 'webp'];
  if (in_array($extention, $acceptedFormat)) {
    if ($userImg['size'] <= 4000000) {
      $selectOldImg = "SELECT * FROM user WHERE id='$genId'";
      $selectCmd = mysqli_query($conn, $selectOldImg);
      $afterAsocImg = mysqli_fetch_assoc($selectCmd);
      $oldImg = $afterAsocImg['user_image'];
      $removeOldImg = "../../src/back-end/images/users/" . $oldImg;
      unlink($removeOldImg);
      $imgName = $genId . "." . $extention;
      $localPath = "../../src/back-end/images/users/" . $imgName;
      $moveFile = move_uploaded_file($userImg['tmp_name'], $localPath);
      if ($moveFile) {
        $updImgName = "UPDATE user SET user_image='$imgName' WHERE id='$genId'";
        $imgUpdCmd = mysqli_query($conn, $updImgName);
        $_SESSION['img_upd_succ'] = "successfully uploaded user photo.";
        $_SESSION['genarate_img'] = $imgName;
        header("location:profile.php");
      } else {
        $_SESSION['img_upd_succ'] = "Error Image Upload";
        header("location:profile.php");
      }
    } else {
      $_SESSION['err_img_name'] = "this image too large to uploading.";
      header("location:profile.php");
    }
  } else {
    $_SESSION['err_img_name'] = "Image format not accepted.";
    header("location:profile.php");
  }
}
/* change image end here */

/* change password start here */
if (isset($_POST['change_pass_btn'])) {
  $oldPass = $_POST['old_password'];
  $newPass = $_POST['new_password'];
  $uppLowCase = preg_match('/[a-zA-Z0-9]/', $newPass); // accept all letters and numbers. character.
  $speChars = preg_match('/[^a-zA-Z0-9]/', $newPass);  // accept any special character.
  $confirmPass = $_POST['confirm_password'];

  $_SESSION['store_old_pass'] = $oldPass;

  if (empty($oldPass)) {
    $_SESSION['err_old_pass'] = "Please enter your old password.";
    header("location:profile.php?#password");
  } elseif ($genPass != $oldPass) {
    $_SESSION['store_old_pass'] = NULL;
    $_SESSION['err_old_pass'] = " Your old password doesn't matched.";
    header("location:profile.php?#password");
  } elseif (empty($newPass)) {
    $_SESSION['err_new_pass'] = "Please enter new password.";
    header("location:profile.php?#password");
  } elseif (!$uppLowCase || !$speChars) {
    $_SESSION['err_new_pass'] = "Password must be at least 8 characters with containing letters, numbers, and special characters..";
    header("location:profile.php?#password");
  } else if (strlen($newPass) < 8) {
    $_SESSION['err_new_pass'] = "Please enter at least 8 character.";
    header("location:profile.php?#password");
  } elseif (empty($confirmPass)) {
    $_SESSION['err_conf_pass'] = "Please enter confirm password.";
    header("location:profile.php?#password");
  } elseif ($newPass != $confirmPass) {
    $_SESSION['err_conf_pass'] = " Confirm password doesn't matched.";
    header("location:profile.php?#password");
  } else {
    $matchData = "SELECT COUNT(*) AS result FROM user WHERE id='$genId' && passwordHash='$oldPass'";
    $dbCommand4 = mysqli_query($conn, $matchData);
    $after_assoc_data = mysqli_fetch_assoc($dbCommand4);
    if ($after_assoc_data['result'] == 1) {
      $updatePassQuery = "UPDATE user SET passwordHash='$newPass' WHERE id='$genId'";
      $dbCommand4 = mysqli_query($conn, $updatePassQuery);
      $_SESSION['genarate_pass'] = $newPass;
      $_SESSION['upd_pass_succ'] = "Successfully Updated Your Password";
      header("location:profile.php?#pass_succ");
    }
  }       // 2ND WAY TO UPDATE PASSWORD
  /* else{
     $updateQuery4 = "UPDATE users SET user_password='$newPass' WHERE user_id='$genId'";
     $dbCommand4 = mysqli_query($conn,$updateQuery4);
     $_SESSION['upd_pass_succ'] = "Successfully Updated Your Name";
     header("location:profile.php?#password");
    } */
} else {
  echo "Undefined Change Password Button";
}
/* change password end here */
