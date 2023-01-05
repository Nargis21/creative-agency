<?php session_start(); ?>
<?php $email = $_SESSION['login'] ?>
<?php require_once "includes/authCheck.php"; ?>
<?php require_once "includes/adminCheck.php"; ?>
<?php $title = "Manage Review"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>

<?php
$get_reviews = "SELECT * FROM reviews";
$reviews = mysqli_query($db_connect, $get_reviews);
?>

<div class="wrapper">
    <?php require_once "includes/sidebar.php"; ?>
    <div class="page-wrapper">
        <!-- topbar -->
        <?php require_once "includes/topbar.php"; ?>
        <div class="content-wrapper">

            <div class="m-5 p-5">
                <h3 class="py-4 mb-4 text-center text-white fw-bold bgColor1">Manage Review</h3>
                <table class="table table-bordered overflow-scroll" id="myTable">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Company name, Designation</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        $number = 1;
                        foreach ($reviews as $review) :
                        ?>
                            <tr>
                                <td>
                                    <?= $number++; ?>
                                </td>
                                <td>
                                    <?php echo $review['id']; ?>
                                </td>
                                <td>
                                    <img width="90%"  src="uploads/review/<?= $review['reviewer_image']; ?>" alt="">
                                </td> 
                                <td>
                                    <?= $review['reviewer_name']; ?>
                                </td> <!-- //instead of "php echo" we can use "=" -->
                                <td>
                                    <?= $review['company_designation']; ?>
                                </td>
                                <td>
                                    <?= $review['description']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($review['active_status'] == 1) :
                                    ?>
                                        <a href="updateReviewStatus.php?id=<?= $review['id']; ?>&type=active" class="btn btn-info btn-sm">Active</a>
                                    <?php endif; ?>
                                    <?php
                                    if ($review['active_status'] == 2) :
                                    ?>
                                        <a href="updateReviewStatus.php?id=<?= $review['id']; ?>&type=deactive" class="btn btn-danger btn-sm">Deactive</a>
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <button value="deleteReview.php?id=<?= $review['id']; ?>" class="btn btn-danger btn-sm deleteBtn">Delete</button>
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
                        title: 'Are you sure want to delete this review?',
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