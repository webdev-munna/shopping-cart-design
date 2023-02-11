<?php require "includes/header.php" ?>
<?php require 'connect-db.php' ?>

<?php if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
    </ol>
  </div>

  <div class="col-lg-9 m-auto stretch-card">
    <?php
    $updId = $_GET['update_id'];
    $selectQry = "SELECT * FROM user WHERE id='$updId'";
    $dbCmd = mysqli_query($conn, $selectQry);
    $afterAssoc = mysqli_fetch_assoc($dbCmd);
    ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mb-0 font-weight-bold">
          Update user Profile
        </h3>
      </div>
      <div class="card-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">

            <form action="update-user.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $afterAssoc['id']; ?>" name="upd_id">
              <div class="form-group mt-3">
                <label for="name" class="form-label font-weight-bold">Current Name</label>
                <input type="text" class="form-control" id="name" placeholder="Change user name" name="upd_name" value="<?php echo $afterAssoc['lastName']; ?>">
              </div>
              <div class="form-group mt-3">
                <label for="designation" class="form-label font-weight-bold">Current Email</label>
                <input type="text" class="form-control" id="designation" name="upd_email" value="<?php echo $afterAssoc['email']; ?>">
              </div>
              <div class="form-group mt-3">
                <label for="mobile" class="form-label font-weight-bold">Current Mobile Number</label>
                <input type="text" class="form-control" id="mobile" name="upd_phone" value="<?php echo $afterAssoc['mobile']; ?>">
              </div>
              <div class="form-group mt-3">
                <label for="" class="form-label font-weight-bold">Current Type => (<?php echo $afterAssoc['user_type']; ?>)</label>
                <select class="form-control m-b-md" name="upd_type">
                  <option value="" disabled selected>--Select user type--</option>
                  <option value="Super Admin">Super Admin</option>
                  <option value="Admin">Admin</option>
                  <option value="Moderator">Moderator</option>
                  <option value="Editor">Editor</option>
                </select>
              </div>
              <!-- <div class="form-group mt-3">
                  <label for="mobile">Current Image</label></br></br>
                  <image src="../../assets/admin/images/avatars/munna.jpg" width="80px" height="80px" alt="image"></image>
                </div>
                <div class="form-group mt-3">
                  <label for="email">New Image</label>
                  <input type="file" class="form-control" id="upd_img" name="upd_img">
                </div> -->
              <div class="form-group mt-5">
                <button type="submit" class="btn btn-success mr-2" name="update_btn">Update User</button>
              </div>
            </form>
          </div><!-- tab content ends -->
        </div>
      </div>
    </div>
  </div>

<?php } else {
  require "access_denied.php";
} ?>

<?php require "includes/footer.php" ?>