<?php
require 'includes/header.php';
require "connect-db.php"; // connect db
// order
$qryForOrder = "SELECT * FROM `transaction`";
$qryCmd = mysqli_query($conn, $qryForOrder);
?>
<div class="page-titles">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">View Transaction</a></li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <?php
        if (isset($_SESSION['transaction_upd_succ'])) { ?>
          <strong class="text-success m-left font-weight-bold" id="transaction"><?php echo $_SESSION['transaction_upd_succ'] ?></strong>
        <?php
        }
        unset($_SESSION['transaction_upd_succ']);
        ?>
        <strong class="h3 font-weight-bold m-auto">View Transactions</strong>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="user_table">
          <thead>
            <tr>
              <th scope="col">Sl</th>
              <th scope="col">Order Id</th>
              <th scope="col">Code</th>
              <th scope="col">Type</th>
              <th scope="col">Status</th>
              <th scope="col">CreatedAt</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($qryCmd as $key => $transactionInfos) { ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $transactionInfos['orderId'] ?></td>
                <td><?= $transactionInfos['code'] ?></td>
                <td><?= $transactionInfos['type'] ?></td>
                <td><?= $transactionInfos['status'] ?></td>
                <td><?= $transactionInfos['createdAt'] ?></td>
                <td>
                  <!-- update order -->
                  <a href="edit-transaction.php?update_id=<?php echo $transactionInfos['id']; ?>"><i class="fa fa-edit" style="color:green"></i>
                  </a>

                  <!-- delete product -->
                  <?php if ($_SESSION['genarate_type'] == 'Super Admin' || $_SESSION['genarate_type'] == 'Admin') { ?>
                    <a href="Id-><?php echo $transactionInfos['id']; ?>" data-toggle="modal" data-target="#id<?php echo $transactionInfos['id']; ?>"><i class="fa fa-trash" style="color:red;margin-left:7px;"></i></a>
                  <?php } ?>
                </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="id<?php echo $transactionInfos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                      <a href="delete-transaction.php?delete_id=<?php echo $transactionInfos['id']; ?>" class="btn btn-danger">Delete</a>
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
require 'includes/footer.php'
?>