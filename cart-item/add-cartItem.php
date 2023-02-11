<?php
require "includes/header.php"
?>
<?php
if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Cart Item</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-9 m-auto">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_SESSION['cartItem_ins_succ'])) { ?>
            <strong class="alert alert-success"><?= $_SESSION['cartItem_ins_succ'] . "<br>"; ?></strong>
          <?php
          }
          unset($_SESSION['cartItem_ins_succ']);
          ?>
          <h3>Add Cart Item</h3>
        </div>
        <div class="card-body">
          <form action="insert-cartItem.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="u_id" class="font-weight-bold">Product Id</label>
              <input type="number" id="u_id" class="form-control" name="product_id">
            </div>

            <div class="form-group mb-3">
              <label for="session_id" class="font-weight-bold">Cart Id</label>
              <input type="number" id="session_id" class="form-control" name="cart_id">
            </div>

            <div class="mb-3">
              <label for="token" class="font-weight-bold">Sku</label>
              <input type="text" id="token" class="form-control" name="sku">
            </div>
            <div class="mb-3">
              <label for="fname" class="font-weight-bold">Price</label>
              <input type="number" id="fname" class="form-control" name="price">
            </div>
            <div class="mb-3">
              <label for="mname" class="font-weight-bold">Discount</label>
              <input type="number" id="mname" class="form-control" name="discount">
            </div>
            <div class="mb-3">
              <label for="lname" class="font-weight-bold">Quantity</label>
              <input type="number" id="lname" class="form-control" name="quantity">
            </div>
            <div class="mb-3">
              <label for="mobile" class="font-weight-bold">Active</label>
              <input type="text" id="mobile" class="form-control" name="active">
            </div>

            <div class="mb-3 mt-4">
              <button type="submit" class="btn btn-primary" name="add_cart_item">Add Cart Item</button>
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