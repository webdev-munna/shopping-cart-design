<?php
require '../includes/header.php';
?>
<div class="page-titles">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0)">View Users</a></li>
  </ol>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <?php
        if (isset($_SESSION['user_succ'])) { ?>
          <strong class="text-success m-left font-weight-bold" id="user_succ"><?php echo $_SESSION['user_succ'] ?></strong>
        <?php
        }
        unset($_SESSION['user_succ']);
        ?>
        <strong class="h3 font-weight-bold m-auto">View Users</strong>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="user_table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">User Role</th>
              <th scope="col">RegisteredAt</th>
              <th scope="col">User Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $qryForUsers = "SELECT * FROM user";
            $qryCmd = mysqli_query($conn, $qryForUsers);
            foreach ($qryCmd as $key => $userData) { ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $userData['middleName'] . ' ' . $userData['lastName'] ?></td>
                <td><?= $userData['mobile'] ?></td>
                <td><?= $userData['email'] ?></td>
                <td><?= $userData['user_type'] ?></td>
                <td><?= $userData['registeredAt'] ?></td>
                <td><?= $userData['user_status'] ?></td>
                <td>
                  <!-- update user -->
                  <a href="edit-user.php?update_id=<?php echo $userData['id']; ?>"><i class="fa fa-edit" style="color:green"></i>
                  </a>
                  <!-- enable disable user -->
                  <?php if ($userData['user_status'] == 'Enable') { ?>
                    <a href="update-status.php?update_id=<?php echo $userData['id']; ?> & status=Disable"><i class="fa fa-close" style="margin-left: 7px;color:red"></i>
                    </a>
                  <?php } else if ($userData['user_status'] == 'Disable') {
                  ?>
                    <a href="update-status.php?update_id=<?php echo $userData['id']; ?> & status=Enable"><i class="fa fa-check" style="margin-left: 7px;color:green;"></i>
                    </a>
                  <?php } ?>
                  <!-- delete user -->
                  <?php if ($_SESSION['genarate_type'] == 'Super Admin') { ?>
                    <a href="" data-toggle="modal" data-target="#id<?php echo $userData['id']; ?>"><i class="fa fa-trash" style="color:red;margin-left:7px;"></i></a>
                  <?php } ?>
                </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="id<?php echo $userData['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                      <a href="delete-user.php?delete_id=<?php echo $userData['id']; ?>" class="btn btn-danger">Delete</a>
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