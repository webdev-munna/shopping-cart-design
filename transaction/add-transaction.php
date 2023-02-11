<?php
require "includes/header.php"
?>
<?php
if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Transaction</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-9 m-auto">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_SESSION['transaciton_ins_succ'])) { ?>
            <strong class="alert alert-success"><?= $_SESSION['transaciton_ins_succ'] . "<br>"; ?></strong>
          <?php
          }
          unset($_SESSION['transaciton_ins_succ']);
          ?>
          <h3>Add Transaction</h3>
        </div>
        <div class="card-body">
          <form action="insert-transaction.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="session_id" class="font-weight-bold">User Id</label>
              <input type="number" id="session_id" class="form-control" name="user_id">
            </div>

            <div class="mb-3">
              <label for="token" class="font-weight-bold">Order Id</label>
              <input type="number" id="token" class="form-control" name="order_id">
            </div>
            <div class="mb-3">
              <label for="sub" class="font-weight-bold">Code</label>
              <input type="text" id="sub" class="form-control" name="code">
            </div>
            <div class="mb-3">
              <label for="i_dis" class="font-weight-bold">Type</label>
              <input type="number" id="i_dis" class="form-control" name="type">
            </div>
            <div class="mb-3">
              <label for="tax" class="font-weight-bold">Mode</label>
              <input type="number" id="tax" class="form-control" name="mode">
            </div>
            <div class="mb-3">
              <label for="shipping" class="font-weight-bold">Status</label>
              <input type="number" id="shipping" class="form-control" name="status">

              <div class="mb-3 mt-4">
                <button type="submit" class="btn btn-primary" name="add_transaction">Add Transaction</button>
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