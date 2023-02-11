<?php
require 'includes/header.php';
require "connect-db.php";
// products
$qryForProductReview = "SELECT * FROM category";
$qryCmd = mysqli_query($conn, $qryForProductReview);
?>
<div class="page-titles">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">View Category</a></li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <?php
        if (isset($_SESSION['category_upd_succ'])) { ?>
          <strong class="text-success m-left font-weight-bold" id="category_upd_succ"><?php echo $_SESSION['category_upd_succ'] ?></strong>
        <?php
        }
        unset($_SESSION['category_upd_succ']);
        ?>
        <strong class="h3 font-weight-bold m-auto">View Categories</strong>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="user_table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Parent Id</th>
              <th scope="col">Title</th>
              <th scope="col">Meta Title</th>
              <th scope="col">Slug</th>
              <th scope="col">Content</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($qryCmd as $key => $categories) { ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $categories['parentId']; ?></td>
                <td><?= $categories['title'] ?></td>
                <td><?= $categories['metaTitle'] ?></td>
                <td><?= $categories['slug'] ?></td>
                <td><?= $categories['content'] ?></td>
                <td>
                  <!-- update product -->
                  <a href="edit-category.php?update_id=<?php echo $categories['id']; ?>"><i class="fa fa-edit" style="color:green"></i>
                  </a>

                  <!-- delete product -->
                  <?php if ($_SESSION['genarate_type'] == 'Super Admin' || $_SESSION['genarate_type'] == 'Admin') { ?>
                    <a href="Id-><?php echo $categories['id']; ?>" data-toggle="modal" data-target="#id<?php echo $categories['id']; ?>"><i class="fa fa-trash" style="color:red;margin-left:7px;"></i></a>
                  <?php } ?>
                </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="id<?php echo $categories['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                      <a href="delete-category.php?delete_id=<?php echo $categories['id']; ?>" class="btn btn-danger">Delete</a>
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