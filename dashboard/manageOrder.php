<?php session_start(); ?>
<?php require_once "includes/authCheck.php"; ?>
<?php require_once "includes/adminCheck.php"; ?>
<?php $title = "Manage Order"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>

<?php
$get_services = "SELECT * FROM orders"  ;
$services = mysqli_query($db_connect, $get_services);
?>

<div class="wrapper">
  <?php require_once "includes/sidebar.php"; ?>
  <div class="page-wrapper">
    <!-- topbar -->
    <?php require_once "includes/topbar.php"; ?>
    <div class="content-wrapper">

      <div class="m-5 p-5">
        <h3 class="py-4 mb-4 text-center text-white fw-bold bgColor1">Manage Order</h3>
        <table class="table table-bordered overflow-scroll" id="myTable">
          <thead class="table-primary">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Service</th>
              <th scope="col">Project Details</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody class="">
            <?php
            $number = 1;
            foreach ($services as $service) :
            ?>
              <tr>
                <td>
                  <?= $number++; ?>
                </td>
                <td>
                  <?php echo $service['id']; ?>
                </td>
                <td>
                  <?= $service['customer_name']; ?>
                </td> <!-- //instead of "php echo" we can use "=" -->
                <td>
                  <?= $service['customer_email']; ?>
                </td>
                <td>
                  <?= $service['service_name']; ?>
                </td>
                <td>
                  <?= $service['project_details']; ?>
                </td>
                <td>
                <?php
                  if ($service['status'] == 'Pending') :
                  ?>
                   <p class="text-danger fw-bold">Pending</p>
                  <?php endif; ?>
                  <?php
                  if ($service['status'] == 'Done') :
                  ?>
                   <p class="text-success fw-bold">Done</p>
                  <?php endif; ?>
                </td>
                <td class="d-flex justify-content-between">
                <?php
                  if ($service['status'] == 'Pending') :
                  ?>
                  <a href="approvedOrder.php?id=<?= $service['id']; ?>" class="btn btn-success btn-sm">Approved</a>
                 
                  <?php endif; ?>
                  <?php
                  if ($service['status'] == 'Done') :
                  ?>
                    <button value="deleteMyService.php?id=<?= $service['id']; ?>" class="btn btn-danger btn-sm deleteBtn">Delete</button>
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
            title: 'Are you sure want to delete this order?',
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
    <script>
      $(document).ready(function() {
    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })
        <?php if(isset($_SESSION['approvedOrder'])):?>
        Toast.fire({
          icon: 'info',
          title: 'You have Success'
        })
        <?php endif; ?>
      })
  </script>