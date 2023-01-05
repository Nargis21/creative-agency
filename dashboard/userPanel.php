<?php session_start(); ?>
<?php require_once "includes/authCheck.php"; ?>
<?php require_once "includes/adminCheck.php"; ?>
<?php $title = "User Panel"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>

<?php
$get_users = "SELECT * FROM users"  ;
$users = mysqli_query($db_connect, $get_users);
?>

<div class="wrapper">
  <?php require_once "includes/sidebar.php"; ?>
  <div class="page-wrapper">
    <!-- topbar -->
    <?php require_once "includes/topbar.php"; ?>
    <div class="content-wrapper">

      <div class="m-5 p-5">
        <h3 class="py-4 mb-4 text-center text-white fw-bold bgColor1">User Panel</h3>
        <table class="table table-bordered overflow-scroll" id="myTable">
          <thead class="table-primary">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody class="">
            <?php
            $number = 1;
            foreach ($users as $user) :
            ?>
              <tr>
                <td>
                  <?= $number++; ?>
                </td>
                <td>
                  <?php echo $user['id']; ?>
                </td>
                <td>
                  <?= $user['first_name']." ".$user['last_name']; ?>
                </td> <!-- //instead of "php echo" we can use "=" -->
                <td>
                  <?= $user['email']; ?>
                </td>
                <td>
                <?php
                  if ($user['user_type'] == 'user') :
                  ?>
                   <p class="text-info fw-bold">User</p>
                  <?php endif; ?>
                <?php
                  if ($user['user_type'] == 'approvedAdmin') :
                  ?>
                   <p class="text-info fw-bold">Admin</p>
                  <?php endif; ?>
                <?php
                  if ($user['user_type'] == 'pendingAdmin') :
                  ?>
                   <p class="text-info fw-bold">Admin Request Pending</p>
                  <?php endif; ?>
                  
                </td>
                <td class="d-flex justify-content-between">
                <?php
                  if ($user['user_type'] == 'approvedAdmin') :
                  ?>
                  <a href="removeAdmin.php?id=<?= $user['id']; ?>" class="btn btn-danger btn-sm">Remove Admin</a>
                  <?php endif; ?>
                 <?php
                  if ($user['user_type'] == 'pendingAdmin') :
                  ?>
                  <a href="approvedAdmin.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Approved admin</a>
                  <?php endif; ?>
                 <?php
                  if ($user['user_type'] == 'user') :
                  ?>
                  <button value="deleteUser.php?id=<?= $user['id']; ?>" class="btn btn-danger btn-sm deleteBtn">Remove User</button>
                  <?php endif; ?>
                 
                </td>
              </tr>
            <?php
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php require_once "includes/footer.php" ?>
    <script>
      $(document).ready(function() {
        $('#myTable').DataTable({
          pageLength: 5,
          lengthMenu: [
            [5, 10, 20, -1],
            [5, 10, 20, 'All']
          ]
        });
      });
      $(document).ready(function() {
        $("#myTable").on('click', '.deleteBtn', function() {
          Swal.fire({
            title: 'Are you sure want to delete this user?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete'
          }).then((result) => {
            if (result.isConfirmed) {
              var deleteLink = $(this).val();
              window.location.href = deleteLink;
            }
          })
        })
      })
    </script>