<?php
require "includes/header.php"
?>
<?php
if ($_SESSION['genarate_type'] == 'Admin' || $_SESSION['genarate_type'] == 'Super Admin') { ?>
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Category</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-9 m-auto">
      <div class="card">
        <div class="card-header">
          <?php
          if (isset($_SESSION['category_ins_succ'])) { ?>
            <strong class="alert alert-success"><?= $_SESSION['category_ins_succ'] . "<br>"; ?></strong>
          <?php
          }
          unset($_SESSION['category_ins_succ']);
          ?>
          <h3>Add Category</h3>
        </div>
        <div class="card-body">
          <form action="insert-category.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="title" class="font-weight-bold">Parent Id</label>
              <input type="number" id="title" class="form-control" name="parent_id">
            </div>

            <div class="form-group mb-3">
              <label for="meta_title" class="font-weight-bold">Title</label>
              <input type="text" id="meta_title" class="form-control" name="title">
            </div>

            <div class="mb-3">
              <label for="slug" class="font-weight-bold">Meta Title</label>
              <input type="text" id="slug" class="form-control" name="meta_title">
            </div>
            <div class="mb-3">
              <label for="summary" class="font-weight-bold">Slug</label>
              <input type="text" id="summary" class="form-control" name="slug">
            </div>
            <div class="mb-3">
              <label for="summary" class="font-weight-bold">Content</label>
              <input type="text" id="summary" class="form-control" name="content">
            </div>

            <div class="mb-3 mt-4">
              <button type="submit" class="btn btn-primary" name="add_category">Add Category</button>
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