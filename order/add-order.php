<?php
require "includes/header.php"
?>
<?php
if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Order</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-9 m-auto">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_SESSION['order_ins_succ'])) { ?>
            <strong class="alert alert-success"><?= $_SESSION['order_ins_succ'] . "<br>"; ?></strong>
          <?php
          }
          unset($_SESSION['order_ins_succ']);
          ?>
          <h3>Add Order</h3>
        </div>
        <div class="card-body">
          <form action="insert-order.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="session_id" class="font-weight-bold">Session Id</label>
              <input type="text" id="session_id" class="form-control" name="session_id">
            </div>

            <div class="mb-3">
              <label for="token" class="font-weight-bold">Token</label>
              <input type="text" id="token" class="form-control" name="token">
            </div>
            <div class="mb-3">
              <label for="sub" class="font-weight-bold">Sub Total</label>
              <input type="number" id="sub" class="form-control" name="sub_total">
            </div>
            <div class="mb-3">
              <label for="i_dis" class="font-weight-bold">Item Discount</label>
              <input type="number" id="i_dis" class="form-control" name="item_discount">
            </div>
            <div class="mb-3">
              <label for="tax" class="font-weight-bold">tax</label>
              <input type="number" id="tax" class="form-control" name="tax">
            </div>
            <div class="mb-3">
              <label for="shipping" class="font-weight-bold">Shipping</label>
              <input type="number" id="shipping" class="form-control" name="shipping">
            </div>
            <div class="mb-3">
              <label for="total" class="font-weight-bold">Total</label>
              <input type="number" id="total" class="form-control" name="total">
            </div>
            <div class="mb-3">
              <label for="discount" class="font-weight-bold">Discount</label>
              <input type="number" id="discount" class="form-control" name="discount">
            </div>
            <div class="mb-3">
              <label for="grand_total" class="font-weight-bold">Grand Total</label>
              <input type="number" id="grand_total" class="form-control" name="grand_total">
            </div>
            <div class="mb-3">
              <label for="last_name" class="font-weight-bold">Name</label>
              <input type="text" id="last_name" class="form-control" name="last_name">
            </div>
            <div class="mb-3">
              <label for="mobile" class="font-weight-bold">Mobile</label>
              <input type="text" id="mobile" class="form-control" name="mobile">
            </div>
            <div class="mb-3">
              <label for="email" class="font-weight-bold">Email</label>
              <input type="text" id="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
              <label for="city" class="font-weight-bold">City</label>
              <input type="text" id="city" class="form-control" name="city">
            </div>
            <div class="mb-3">
              <label for="country" class="font-weight-bold">Country</label>
              <input type="text" id="country" class="form-control" name="country">
            </div>

            <div class="mb-3 mt-4">
              <button type="submit" class="btn btn-primary" name="add_order">Add Order</button>
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