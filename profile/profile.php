<?php
require "../includes/header.php";
//users
$sessionId = $_SESSION['genarate_id'];
$selectImg = "SELECT * FROM user WHERE id='$sessionId'";
$dbCommand = mysqli_query($conn, $selectImg);
$afterAssocImg = mysqli_fetch_assoc($dbCommand);
$imgFromFolder = "../../../src/back-end/images/users/" . $afterAssocImg['user_image'];
?>
<div class="page-titles">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
  </ol>
</div>

<div class="row user-profile">
  <div class="col-lg-4 side-left d-flex align-items-stretch">
    <div class="container-fluid">
      <div class="card">
        <div class="">
          <h5 class="font-weight-bold text-center h3 mt-2">
            PROFILE INFOS
          </h5>
        </div>
        <div class="card-body">
          <h4 class="card-title mb-0">Name</h4>
          <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
          </ul>
          <p class="mt-2"><?= $_SESSION['genarate_name']; ?></p>
          <h4 class="card-title mb-0">Email</h4>
          <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
          </ul>
          <p class="mt-2"><?= $_SESSION['genarate_email']; ?></p>
          <h4 class="card-title mb-0">Phone</h4>
          <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
          </ul>
          <p class="mt-2"><?= $_SESSION['genarate_phone']; ?></p>
          <h4 class="card-title mb-0">Image</h4>
          <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
          </ul>
          <p></p>
          <?php
          if ($afterAssocImg['user_image'] == "") {
          ?>
            <img src="../../src/back-end/images/users/default_img.jpg" alt="image" width="250px" height="200px" />
          <?php } else { ?>
            <img src="../../src/back-end/images/users/<?= $afterAssocImg['user_image']; ?>" alt="image" width="250px" height="200px" />
          <?php } ?>
        </div>
      </div>
    </div>

  </div>
  <div class="container col-lg-8 side-right">
    <div class="card">
      <h5 class="font-weight-bold text-center h3 mt-2">
        UPDATE YOUR PROFILE
      </h5>
      <hr>
      <div class="card-body">
        <div class="row">
          <!-- name part start -->
          <div class="col-xl-6">
            <div class="card widget widget-list">
              <?php if (isset($_SESSION['upd_name_succ'])) { ?>
                <span class="alert alert-primary" role="alert">
                  <?= $_SESSION['upd_name_succ']; ?>
                </span>
              <?php }
              unset($_SESSION['upd_name_succ']); ?>
              <div class="">
                <h5 class="">Change Name</h5>
                <span style="color:red;"><?php if (isset($_SESSION['err_nw_name'])) {
                                            echo $_SESSION['err_nw_name'];
                                          }
                                          unset($_SESSION['err_nw_name']); ?></span>
              </div>
              <div class="">
                <form action="profile-post.php" method="POST">
                  <input type="text" class="form-control mt-3 shadow-sm" name="change_name" placeholder="Enter your new name">
                  <button type="submit" name="change_name_btn" class="btn btn-success mt-3">Update Name</button>
                </form>
              </div>
            </div>
          </div>
          <!-- Name part end -->
          <!-- Phone Part Start  -->
          <div class="col-xl-6">
            <div class="card widget widget-list">
              <?php if (isset($_SESSION['upd_phone_succ'])) { ?>
                <span class="alert alert-primary" role="alert">
                  <?= $_SESSION['upd_phone_succ']; ?>
                </span>
              <?php }
              unset($_SESSION['upd_phone_succ']); ?>
              <div class="">
                <h5 class="">Change Phone</h5>
                <span style="color:red;"><?php if (isset($_SESSION['err_nw_phone'])) {
                                            echo $_SESSION['err_nw_phone'];
                                          }
                                          unset($_SESSION['err_nw_phone']); ?></span>
              </div>
              <div class="">
                <form action="profile-post.php" method="POST">
                  <input type="text" class="form-control mt-3 shadow-sm" name="change_phone" placeholder="Enter your new phone number">
                  <button type="submit" name="change_phn_btn" class="btn btn-success mt-3">Update Phone</button>
                </form>
              </div>
            </div>
          </div>
          <!-- Phone Part End  -->
          <!-- Photo Part Start  -->
          <div class="col-xl-6 mt-5">
            <div class="card widget widget-list">
              <?php if (isset($_SESSION['img_upd_succ'])) { ?>
                <span class="alert alert-primary" role="alert">
                  <?= $_SESSION['img_upd_succ']; ?>
                </span>
              <?php }
              unset($_SESSION['img_upd_succ']); ?>
              <div class="">
                <h5 class="mt-4">Upload New Image</h5>
                <span style="color:red;"><?php if (isset($_SESSION['err_img_name'])) {
                                            echo $_SESSION['err_img_name'];
                                          }
                                          unset($_SESSION['err_img_name']); ?></span>
              </div>
              <div class="">
                <form action="profile-post.php" method="POST" enctype="multipart/form-data">
                  <input type="file" class="form-control mt-3 shadow-sm" name="change_img">

                  <button type="submit" name="change_img_btn" class="btn btn-success mt-3">Update Image</button>
                </form>
              </div>
            </div>
          </div>
          <!-- Photo Part End  -->
          <!-- Password Part Start  -->
          <div class="col-xl-6 mt-5" id="pass_succ">
            <div class="card widget widget-list">
              <?php if (isset($_SESSION['upd_pass_succ'])) { ?>
                <span class="alert alert-primary" role="alert">
                  <?= $_SESSION['upd_pass_succ']; ?>
                </span>
              <?php }
              unset($_SESSION['upd_pass_succ']); ?>
              <div class="">
                <h5 class="mt-4">Change Password</h5>
              </div>
              <div class="">
                <form action="profile-post.php" method="POST" id="password" enctype="multipart/form-data">
                  <h6 class="mt-4">Old Password</h6>
                  <bold style="color:red;"><?php if (isset($_SESSION['err_old_pass'])) {
                                              echo $_SESSION['err_old_pass'];
                                            }
                                            unset($_SESSION['err_old_pass']); ?></bold>
                  <input type="password" class="form-control mt-3 shadow-sm" name="old_password" placeholder="Old Password" value="<?php if (isset($_SESSION['store_old_pass'])) {
                                                                                                                                      echo $_SESSION['store_old_pass'];
                                                                                                                                    }
                                                                                                                                    unset($_SESSION['store_old_pass']); ?>">
                  <h6 class="mt-2"> New Password</h6>
                  <span style="color:red;"><?php if (isset($_SESSION['err_new_pass'])) {
                                              echo $_SESSION['err_new_pass'];
                                            }
                                            unset($_SESSION['err_new_pass']); ?></span>
                  <input type="password" id="new_password" class="form-control mt-3 shadow-sm" name="new_password" placeholder="New Password">
                  <h6 class="mt-2">Confirm Password</h6>
                  <span style="color:red;"><?php if (isset($_SESSION['err_conf_pass'])) {
                                              echo $_SESSION['err_conf_pass'];
                                            }
                                            unset($_SESSION['err_conf_pass']); ?></span>
                  <input type="password" class="form-control mt-3 shadow-sm" name="confirm_password" placeholder="Confirm Password" id="confirm_password">

                  <input type="checkbox" class="mt-3" onclick="show_password()" id="show_hide_pass">
                  <span class="ml-1">Show password</span>

                  <div class="form-group mt-4">
                    <button type="submit" name="change_pass_btn" class="btn btn-success mt-2">Update Password</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Password Part End  -->
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require "../includes/footer.php";
?>