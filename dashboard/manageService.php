<?php session_start(); ?>
<?php require_once "includes/authCheck.php"; ?>
<?php require_once "includes/adminCheck.php"; ?>
<?php $title = "Manage Service"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>

<?php
$get_services = "SELECT * FROM services";
$services = mysqli_query($db_connect, $get_services);
?>

<div class="wrapper">
    <?php require_once "includes/sidebar.php"; ?>
    <div class="page-wrapper">
        <!-- topbar -->
        <?php require_once "includes/topbar.php"; ?>
        <div class="content-wrapper">

            <div class="m-5 p-5">
                <h3 class="py-4 mb-4 text-center text-white fw-bold bgColor1">Manage Services</h3>
                <table class="table table-bordered overflow-scroll" id="myTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Service Image</th>
                            <th scope="col">Service Title</th>
                            <th scope="col">Description</th>
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
                                    <img width="40%"  src="uploads/service/<?= $service['service_image']; ?>" alt="">
                                </td> <!-- //instead of "php echo" we can use "=" -->
                                <td>
                                    <?= $service['service_name']; ?>
                                </td>
                                <td>
                                    <?= $service['description']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($service['active_status'] == 1) :
                                    ?>
                                        <a href="updateServiceStatus.php?id=<?= $service['id']; ?>&type=active" class="btn btn-info btn-sm">Active</a>
                                    <?php endif; ?>
                                    <?php
                                    if ($service['active_status'] == 2) :
                                    ?>
                                        <a href="updateServiceStatus.php?id=<?= $service['id']; ?>&type=deactive" class="btn btn-danger btn-sm">Deactive</a>
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <a href="editService.php?id=<?= $service['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <button value="deleteService.php?id=<?= $service['id']; ?>" class="btn btn-danger btn-sm deleteBtn">Delete</button>
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
                        title: 'Are you sure want to delete this service?',
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