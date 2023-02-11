<?php
require "../includes/header.php";
?>
<?php
if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Cart</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-9 m-auto">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_SESSION['cart_ins_succ'])) { ?>
            <strong class="alert alert-success"><?= $_SESSION['cart_ins_succ'] . "<br>"; ?></strong>
          <?php
          }
          unset($_SESSION['cart_ins_succ']);
          ?>
          <h3>Add Cart</h3>
        </div>
        <div class="card-body">
          <form action="insert-cart.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="u_id" class="font-weight-bold">User Id</label>
              <input type="number" id="u_id" class="form-control" name="user_id">
            </div>

            <div class="form-group mb-3">
              <label for="session_id" class="font-weight-bold">Session Id</label>
              <input type="text" id="session_id" class="form-control" name="session_id">
            </div>

            <div class="mb-3">
              <label for="token" class="font-weight-bold">Token</label>
              <input type="text" id="token" class="form-control" name="token">
            </div>
            <div class="mb-3">
              <label for="fname" class="font-weight-bold">First Name</label>
              <input type="text" id="fname" class="form-control" name="first_name">
            </div>
            <div class="mb-3">
              <label for="mname" class="font-weight-bold">Middle Name</label>
              <input type="text" id="mname" class="form-control" name="middle_name">
            </div>
            <div class="mb-3">
              <label for="lname" class="font-weight-bold">Last Name</label>
              <input type="text" id="lname" class="form-control" name="last_name">
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
              <label for="l1" class="font-weight-bold">Line 1</label>
              <input type="text" id="l1" class="form-control" name="line_1">
            </div>
            <div class="mb-3">
              <label for="l2" class="font-weight-bold">Line 2</label>
              <input type="text" id="l2" class="form-control" name="line_2">
            </div>
            <div class="mb-3">
              <label for="city" class="font-weight-bold">City</label>
              <input type="text" id="city" class="form-control" name="city">
            </div>
            <div class="mb-3">
              <label for="prov" class="font-weight-bold">Province</label>
              <input type="text" id="prov" class="form-control" name="province">
            </div>
            <div class="mb-3">
              <label for="country" class="font-weight-bold">Country</label>
              <input type="text" id="country" class="form-control" name="country">
            </div>
            <div class="mb-3">
              <label for="cre_at" class="font-weight-bold">CreatedAt</label>
              <input type="date" id="cre_at" class="form-control" name="created_at">
            </div>

            <div class="mb-3 mt-4">
              <button type="submit" class="btn btn-primary" name="add_cart">Add Cart</button>
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
require "../includes/footer.php";
?>