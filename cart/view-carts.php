<?php
require '../includes/header.php';
require "../connect-db.php";
// products
$qryForCart = "SELECT * FROM cart";
$qryCmd = mysqli_query($conn, $qryForCart);
?>
<div class="page-titles">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">View Cart</a></li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <?php
        if (isset($_SESSION['cart_upd_succ'])) { ?>
          <strong class="text-success m-left font-weight-bold" id="cart_upd_succ"><?php echo $_SESSION['cart_upd_succ'] ?></strong>
        <?php
        }
        unset($_SESSION['cart_upd_succ']);
        ?>
        <strong class="h3 font-weight-bold m-auto">View Carts</strong>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="user_table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">User Id</th>
              <th scope="col">Session Id</th>
              <th scope="col">Name</th>
              <th scope="col">Mobile</th>
              <th scope="col">Email</th>
              <th scope="col">City</th>
              <th scope="col">Country</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($qryCmd as $key => $carts) { ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $carts['userId']; ?></td>
                <td><?= $carts['sessionId']; ?></td>
                <td><?= $carts['lastName'] ?></td>
                <td><?= $carts['mobile'] ?></td>
                <td><?= $carts['email'] ?></td>
                <td><?= $carts['city'] ?></td>
                <td><?= $carts['country'] ?></td>
                <td>
                  <!-- update product -->
                  <a href="edit-cart.php?update_id=<?php echo $carts['id']; ?>"><i class="fa fa-edit" style="color:green"></i>
                  </a>

                  <!-- delete product -->
                  <?php if ($_SESSION['genarate_type'] == 'Super Admin' || $_SESSION['genarate_type'] == 'Admin') { ?>
                    <a href="Id-><?php echo $carts['id']; ?>" data-toggle="modal" data-target="#id<?php echo $carts['id']; ?>"><i class="fa fa-trash" style="color:red;margin-left:7px;"></i></a>
                  <?php } ?>
                </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="id<?php echo $carts['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title text-danger" id="exampleModalCenterTitle">Attention Please!!</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h4 class="text-danger">Are You Sure?</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                      <a href="delete-cart.php?delete_id=<?php echo $carts['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php
require '../includes/footer.php'
?>