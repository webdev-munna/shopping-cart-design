<?php
require "includes/header.php"
?>
<?php
if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Product</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-9 m-auto">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_SESSION['product_ins_succ'])) { ?>
            <strong class="alert alert-success"><?= $_SESSION['product_ins_succ'] . "<br>"; ?></strong>
          <?php
          }
          unset($_SESSION['product_ins_succ']);
          ?>
          <h3>Add Product</h3>
        </div>
        <div class="card-body">
          <form action="insert-product.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="title" class="font-weight-bold">Title</label>
              <br>
              <?php
              if (isset($_SESSION['error_fname'])) { ?>
                <strong class="text-danger"><?php echo $_SESSION['error_fname'] ?></strong>
              <?php
              }
              unset($_SESSION['error_fname']);
              ?>
              <input type="text" id="title" class="form-control" name="title" value="<?php if (isset($_SESSION['store_fname'])) {
                                                                                        echo $_SESSION['store_fname'];
                                                                                      }
                                                                                      unset($_SESSION['store_fname']); ?>">
            </div>

            <div class="form-group mb-3">
              <label for="meta_title" class="font-weight-bold">metaTitle</label>
              <br>
              <?php
              if (isset($_SESSION['error_mname'])) { ?>
                <strong class="text-danger"><?php echo $_SESSION['error_mname'] ?></strong>
              <?php
              }
              unset($_SESSION['error_mname']);
              ?>
              <input type="text" id="meta_title" class="form-control" name="meta_title" value="<?php if (isset($_SESSION['store_mname'])) {
                                                                                                  echo $_SESSION['store_mname'];
                                                                                                  unset($_SESSION['store_mname']);
                                                                                                } ?>">
            </div>

            <div class="mb-3">
              <label for="slug" class="font-weight-bold">Slug</label>
              <br>
              <?php
              if (isset($_SESSION['error_lname'])) { ?>
                <strong class="text-danger"><?php echo $_SESSION['error_lname'] ?></strong>
              <?php
              }
              unset($_SESSION['error_lname']);
              ?>
              <input type="text" id="slug" class="form-control" name="slug" value="<?php if (isset($_SESSION['store_lname'])) {
                                                                                      echo $_SESSION['store_lname'];
                                                                                      unset($_SESSION['store_lname']);
                                                                                    } ?>">
            </div>
            <div class="mb-3">
              <label for="summary" class="font-weight-bold">Summary</label>
              <br>
              <?php
              if (isset($_SESSION['error_phone'])) { ?>
                <strong class="text-danger"><?php echo $_SESSION['error_phone'] ?></strong>
              <?php
              }
              unset($_SESSION['error_phone']);
              ?>
              <input type="text" id="summary" class="form-control" name="summary" value="<?php if (isset($_SESSION['store_phone'])) {
                                                                                            echo $_SESSION['store_phone'];
                                                                                            unset($_SESSION['store_phone']);
                                                                                          } ?>">
            </div>

            <div class="form-group mb-3">
              <label for="type" class="font-weight-bold">Type</label>
              <br>
              <?php
              if (isset($_SESSION['error_email'])) { ?>
                <strong class="text-danger" id="error_email"><?php echo $_SESSION['error_email'] ?></strong>
              <?php
              }
              unset($_SESSION['error_email']);
              ?>
              <input type="text" id="type" class="form-control" name="type" value="<?php if (isset($_SESSION['store_email'])) {
                                                                                      echo $_SESSION['store_email'];
                                                                                      unset($_SESSION['store_email']);
                                                                                    } ?>">
            </div>

            <div class="form-group mb-3">
              <label for="sku" class="font-weight-bold">Sku</label>
              <br>
              <?php
              if (isset($_SESSION['error_user_type'])) { ?>
                <strong class="text-danger" id="error_user_type"><?php echo $_SESSION['error_user_type'] ?></strong>
              <?php
              }
              unset($_SESSION['error_user_type']);
              ?>
              <input type="text" id="sku" class="form-control" name="sku" value="<?php if (isset($_SESSION['store_email'])) {
                                                                                    echo $_SESSION['store_email'];
                                                                                    unset($_SESSION['store_email']);
                                                                                  } ?>">
            </div>

            <div class="form-group mb-3">
              <label for="price" class="font-weight-bold">Price</label>
              <br>
              <?php
              if (isset($_SESSION['error_user_status'])) { ?>
                <strong class="text-danger" id="error_user_status"><?php echo $_SESSION['error_user_status'] ?></strong>
              <?php
              }
              unset($_SESSION['error_user_status']);
              ?>
              <input type="text" id="price" class="form-control" name="price" value="<?php if (isset($_SESSION['store_email'])) {
                                                                                        echo $_SESSION['store_email'];
                                                                                        unset($_SESSION['store_email']);
                                                                                      } ?>">
            </div>

            <div class="form-group mb-3">
              <label for="discount" class="font-weight-bold">Discount</label>
              <br>
              <?php
              if (isset($_SESSION['error_password'])) { ?>
                <strong class="text-danger" id="error_password"><?php echo $_SESSION['error_password'] ?></strong>
              <?php
              }
              unset($_SESSION['error_password']);
              ?>
              <input type="text" id="discount" class="form-control" name="discount">
            </div>
            <div class="form-group mb-3">
              <label for="quantity" class="font-weight-bold">Quantity</label>
              <br>
              <?php
              if (isset($_SESSION['error_Cpassword'])) { ?>
                <strong class="text-danger" id="error_Cpassword"><?php echo $_SESSION['error_Cpassword'] ?></strong>
              <?php
              }
              unset($_SESSION['error_Cpassword']);
              ?>
              <input type="number" id="quantity" class="form-control" name="quantity">
            </div>

            <div class="form-group mb-3">
              <label for="shop" class="font-weight-bold">Shop</label>
              <br>
              <?php
              if (isset($_SESSION['error_Cpassword'])) { ?>
                <strong class="text-danger" id="error_Cpassword"><?php echo $_SESSION['error_Cpassword'] ?></strong>
              <?php
              }
              unset($_SESSION['error_Cpassword']);
              ?>
              <input type="number" id="shop" class="form-control" name="shop">
            </div>

            <div class="mb-3 mt-4">
              <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

<?php
} else {
  require "access-denied.php";
}
?>

<?php
require "includes/footer.php"
?>