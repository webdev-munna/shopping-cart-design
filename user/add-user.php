<?php
require "../includes/header.php";
?>
<?php
if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add User</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-9 m-auto">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_SESSION['insert_succ'])) { ?>
            <strong class="alert alert-success"><?= $_SESSION['insert_succ'] . "<br>"; ?></strong>
          <?php
          }
          unset($_SESSION['insert_succ']);
          ?>
          <h3>Add User</h3>
        </div>
        <div class="card-body">
          <form action="insert-user.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="fName" class="font-weight-bold">First Name</label>
              <br>
              <?php
              if (isset($_SESSION['error_fname'])) { ?>
                <strong class="text-danger"><?php echo $_SESSION['error_fname'] ?></strong>
              <?php
              }
              unset($_SESSION['error_fname']);
              ?>
              <input type="text" id="fName" class="form-control" name="fname" value="<?php if (isset($_SESSION['store_fname'])) {
                                                                                        echo $_SESSION['store_fname'];
                                                                                      }
                                                                                      unset($_SESSION['store_fname']); ?>">
            </div>

            <div class="form-group mb-3">
              <label for="mName" class="font-weight-bold">Middle Name</label>
              <br>
              <?php
              if (isset($_SESSION['error_mname'])) { ?>
                <strong class="text-danger"><?php echo $_SESSION['error_mname'] ?></strong>
              <?php
              }
              unset($_SESSION['error_mname']);
              ?>
              <input type="text" id="mName" class="form-control" name="mname" value="<?php if (isset($_SESSION['store_mname'])) {
                                                                                        echo $_SESSION['store_mname'];
                                                                                        unset($_SESSION['store_mname']);
                                                                                      } ?>">
            </div>

            <div class="mb-3">
              <label for="lName" class="font-weight-bold">Last Name</label>
              <br>
              <?php
              if (isset($_SESSION['error_lname'])) { ?>
                <strong class="text-danger"><?php echo $_SESSION['error_lname'] ?></strong>
              <?php
              }
              unset($_SESSION['error_lname']);
              ?>
              <input type="text" id="lName" class="form-control" name="lname" value="<?php if (isset($_SESSION['store_lname'])) {
                                                                                        echo $_SESSION['store_lname'];
                                                                                        unset($_SESSION['store_lname']);
                                                                                      } ?>">
            </div>
            <div class="mb-3">
              <label for="mobile" class="font-weight-bold">Mobile</label>
              <br>
              <?php
              if (isset($_SESSION['error_phone'])) { ?>
                <strong class="text-danger"><?php echo $_SESSION['error_phone'] ?></strong>
              <?php
              }
              unset($_SESSION['error_phone']);
              ?>
              <input type="number" id="mobile" class="form-control" name="phone" value="<?php if (isset($_SESSION['store_phone'])) {
                                                                                          echo $_SESSION['store_phone'];
                                                                                          unset($_SESSION['store_phone']);
                                                                                        } ?>">
            </div>

            <div class="form-group mb-3">
              <label for="email" class="font-weight-bold">Email</label>
              <br>
              <?php
              if (isset($_SESSION['error_email'])) { ?>
                <strong class="text-danger" id="error_email"><?php echo $_SESSION['error_email'] ?></strong>
              <?php
              }
              unset($_SESSION['error_email']);
              ?>
              <input type="text" id="email" class="form-control" name="email" value="<?php if (isset($_SESSION['store_email'])) {
                                                                                        echo $_SESSION['store_email'];
                                                                                        unset($_SESSION['store_email']);
                                                                                      } ?>">
            </div>

            <div class="form-group mb-3">
              <label for="" class="font-weight-bold">User Type</label>
              <br>
              <?php
              if (isset($_SESSION['error_user_type'])) { ?>
                <strong class="text-danger" id="error_user_type"><?php echo $_SESSION['error_user_type'] ?></strong>
              <?php
              }
              unset($_SESSION['error_user_type']);
              ?>
              <select name="user_type" id="" class="form-control">
                <option value="" disabled selected>---Select Type---</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Admin">Admin</option>
                <option value="Moderator">Moderator</option>
                <option value="Editor">Editor</option>
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="" class="font-weight-bold">User Status</label>
              <br>
              <?php
              if (isset($_SESSION['error_user_status'])) { ?>
                <strong class="text-danger" id="error_user_status"><?php echo $_SESSION['error_user_status'] ?></strong>
              <?php
              }
              unset($_SESSION['error_user_status']);
              ?>
              <select name="user_status" id="" class="form-control">
                <option value="" disabled selected>---Select Status---</option>
                <option value="Enable">Enable</option>
                <option value="Disable">Disable</option>
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="password" class="font-weight-bold">Password</label>
              <br>
              <?php
              if (isset($_SESSION['error_password'])) { ?>
                <strong class="text-danger" id="error_password"><?php echo $_SESSION['error_password'] ?></strong>
              <?php
              }
              unset($_SESSION['error_password']);
              ?>
              <input type="password" id="password" class="form-control" name="password">
            </div>
            <div class="form-group mb-3">
              <label for="c_password" class="font-weight-bold">Confirm Password</label>
              <br>
              <?php
              if (isset($_SESSION['error_Cpassword'])) { ?>
                <strong class="text-danger" id="error_Cpassword"><?php echo $_SESSION['error_Cpassword'] ?></strong>
              <?php
              }
              unset($_SESSION['error_Cpassword']);
              ?>
              <input type="password" id="c_password" class="form-control" name="c_password">
            </div>

            <div class="mb-3 mt-4">
              <button type="submit" class="btn btn-primary">Add User</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

<?php
} else {
  require "../access-denied.php";
}
?>

<?php
require "../includes/footer.php"
?>