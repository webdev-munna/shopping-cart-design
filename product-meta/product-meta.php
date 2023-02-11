<?php
require "includes/header.php";
?>
<?php if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Meta</a></li>
    </ol>
  </div>

  <div class="row">
    <!-- view product meta -->
    <div class="col-lg-7">
      <div class="card">
        <div class="card-header">
          <h3>View Product Meta</h3>
        </div>
        <div class="card-body">
          <?php if (isset($_SESSION['productM_upd_succ'])) { ?>
            <h4 class="text-success"><?= $_SESSION['productM_upd_succ']  ?></h4>
          <?php }
          unset($_SESSION['productM_upd_succ']); ?>
          <table class="table table-striped" id="user_table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">product Id</th>
                <th scope="col">Key</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // products
              $qryForProductMeta = "SELECT * FROM product_meta";
              $metaQryCmd = mysqli_query($conn, $qryForProductMeta);
              foreach ($metaQryCmd as $key => $productMetaInfos) { ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $productMetaInfos['productId']; ?></td>
                  <td><?= $productMetaInfos['product_key']; ?></td>
                  <td><?= $productMetaInfos['content'] ?></td>
                  <td>
                    <!-- update product meta -->
                    <a href="edit-productMeta.php?update_id=<?php echo $productMetaInfos['id']; ?>"><i class="fa fa-edit" style="color:green"></i>
                    </a>

                    <!-- delete product meta -->
                    <?php if ($_SESSION['genarate_type'] == 'Super Admin' || $_SESSION['genarate_type'] == 'Admin') { ?>
                      <a href="Id-><?php echo $productMetaInfos['id']; ?>" data-toggle="modal" data-target="#id<?php echo $productMetaInfos['id']; ?>"><i class="fa fa-trash" style="color:red;margin-left:7px;"></i></a>
                    <?php } ?>
                  </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="id<?php echo $productMetaInfos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <a href="delete-productMeta.php?delete_id=<?php echo $productMetaInfos['id']; ?>" class="btn btn-danger">Delete</a>
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
    <!-- add product meta -->
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header">
          <h3>Add Product Meta</h3>
        </div>
        <div class="card-body">
          <?php
          if (isset($_SESSION['meta_ins_succ'])) { ?>
            <h5 class="text-success"><?= $_SESSION['meta_ins_succ']; ?></h5>
          <?php }
          unset($_SESSION['meta_ins_succ']); ?>
          <form action="insert-productMeta.php" method="POST">
            <div class="form-group mb-3">
              <label for="p_id" class="form-label font-weight-bold">Product Id</label>
              <input type="number" class="form-control" id="p_id" name="product_id">
            </div>
            <div class="form-group mb-3">
              <label for="key" class="form-label font-weight-bold">Product Key</label>
              <input type="text" class="form-control" id="key" name="key">
            </div>
            <div class="form-group mb-3">
              <label for="content" class="form-label font-weight-bold">Content</label>
              <input type="text" class="form-control" id="content" name="content">
            </div>
            <div class="form-group mb-3">
              <button type="submit" name="sumit_meta" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php } ?>

<?php
require "includes/footer.php"
?>