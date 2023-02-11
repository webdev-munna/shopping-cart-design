<?php
session_start();
require "connect-db.php";

if (isset($_POST['update_btn'])) {
    $updId = $_POST['upd_id'];
    $updName = $_POST['upd_name'];
    $updEmail = $_POST['upd_email'];
    $updPhone = $_POST['upd_phone'];
    $updType = $_POST['upd_type'];
    //$updImg = $_FILES['upd_img'];
    /* change image start here */
    //  if(isset($_POST['update_btn'])){
    //     $userImg = $_FILES['change_img'];
    //         $afterExplode = explode('.',$userImg['name']);
    //         $extention = end($afterExplode);
    //         $acceptedFormat = ['jpg','jpeg','png','jfif','gif','webp'];
    //         if(in_array($extention,$acceptedFormat)){
    //             if($userImg['size'] <= 2000000){
    //                 $imgName = $genId. ".". $extention;
    //                 $localPath = "images/users/".$imgName;
    //                 $moveFile = move_uploaded_file($userImg['tmp_name'],$localPath);
    //                 if($moveFile){
    //                    $_SESSION['img_upd_succ']= "successfully uploaded user photo.";
    //                    header("location:profile.php");
    //                 } else{
    //                     echo "not ok";
    //                 }
    //             }else{
    //                 $_SESSION['err_img_name'] = "this image too large to uploading.";
    //                 header("location:profile.php");
    //             }   
    //         }else{
    //             $_SESSION['err_img_name'] = "Image format not accepted.";
    //             header("location:profile.php");
    //         }

    //  }
    /* change image end here */

    $updateQry = "UPDATE user SET lastName='$updName ', email='$updEmail', mobile='$updPhone', user_type='$updType' WHERE id='$updId'";
    $updateCmd = mysqli_query($conn, $updateQry);
    if ($updateCmd) {
        $_SESSION['user_succ'] = "Successfully updated user data -> ID = $updId";
        header("location:view-users.php");
    } else {
        echo "user data not updated";
    }
}
