<?php require "includes/header.php" ?>
<?php require 'connect-db.php' ?>

<?php if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Transactions</a></li>
    </ol>
  </div>

  <div class="col-lg-9 m-auto stretch-card">
    <?php
    $updId = $_GET['update_id'];
    $selectQry = "SELECT * FROM `transaction` WHERE id='$updId'";
    $dbCmd = mysqli_query($conn, $selectQry);
    $afterAssoc = mysqli_fetch_assoc($dbCmd);
    ?>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mb-0 font-weight-bold">
          Edit Order
        </h3>
      </div>
      <div class="card-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">

            <form action="update-transaction.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $afterAssoc['id']; ?>" name="upd_id">
              <div class="form-group mt-3">
                <label for="name" class="form-label font-weight-bold">Order Id</label>
                <input type="number" class="form-control" id="name" name="order_id" value="<?php echo $afterAssoc['orderId']; ?>">
              </div>
              <div class="form-group mt-3">
                <label for="designation" class="form-label font-weight-bold">Code</label>
                <input type="text" class="form-control" id="designation" name="code" value="<?php echo $afterAssoc['code']; ?>">
              </div>
              <div class="form-group mt-3">
                <label for="city" class="form-label font-weight-bold">Type</label>
                <input type="text" class="form-control" id="city" name="type" value="<?php echo $afterAssoc['type']; ?>">
              </div>
              <div class="form-group mt-3">
                <label for="" class="form-label font-weight-bold">Status</label>
                <input type="number" class="form-control" id="mobile" name="status" value="<?php echo $afterAssoc['status']; ?>">
              </div>

              <div class="form-group mt-5">
                <button type="submit" class="btn btn-success mr-2" name="update_btn">Update Transaction</button>
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