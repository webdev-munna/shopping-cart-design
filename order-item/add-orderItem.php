<?php
require "includes/header.php"
?>
<?php
if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add OrderItem</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-9 m-auto">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_SESSION['orderItem_ins_succ'])) { ?>
            <strong class="alert alert-success"><?= $_SESSION['orderItem_ins_succ'] . "<br>"; ?></strong>
          <?php
          }
          unset($_SESSION['orderItem_ins_succ']);
          ?>
          <h3>Add Order Item</h3>
        </div>
        <div class="card-body">
          <form action="insert-orderItem.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="session_id" class="font-weight-bold">Product Id</label>
              <input type="number" id="session_id" class="form-control" name="product_id">
            </div>

            <div class="mb-3">
              <label for="token" class="font-weight-bold">Order Id</label>
              <input type="number" id="token" class="form-control" name="order_id">
            </div>
            <div class="mb-3">
              <label for="sub" class="font-weight-bold">Sku</label>
              <input type="text" id="sub" class="form-control" name="sku">
            </div>
            <div class="mb-3">
              <label for="i_dis" class="font-weight-bold">price</label>
              <input type="number" id="i_dis" class="form-control" name="price">
            </div>
            <div class="mb-3">
              <label for="tax" class="font-weight-bold">Discount</label>
              <input type="number" id="tax" class="form-control" name="discount">
            </div>
            <div class="mb-3">
              <label for="shipping" class="font-weight-bold">Quantity</label>
              <input type="number" id="shipping" class="form-control" name="quantity">

              <div class="mb-3 mt-4">
                <button type="submit" class="btn btn-primary" name="add_orderItem">Add OrderItem</button>
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