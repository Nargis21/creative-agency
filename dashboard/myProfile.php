<?php session_start(); ?>
<?php $email = $_SESSION['login'] ?>
<?php require_once "includes/authCheck.php"; ?>
<?php $title = "My Profile"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>

<?php
$get_user = "SELECT * FROM users WHERE email = '$email'";
$user = mysqli_query($db_connect, $get_user);
$assoc_user = mysqli_fetch_assoc($user);
?>

<div class="wrapper">
    <?php require_once "includes/sidebar.php"; ?>
    <div class="page-wrapper">
        <!-- topbar -->
        <?php require_once "includes/topbar.php"; ?>
        <div class="content-wrapper row">
            <div class="m-5 px-0 col-md-8 col-lg-8 col-12 mx-auto border border-1 shadow">
                <h3 class="py-4 mb-4 text-center text-white fw-bold bgColor1">My Profile</h3>
                    <div class="row gy-4 p-3">
                        <div class="text-center col-12 col-md-6 col-lg-6">
                            <?php if ($assoc_user['user_image']) : ?>
                                <img height="200px" width="200px" class="rounded-circle" src="uploads/user/<?= $assoc_user['user_image']; ?>" alt="">
                            <?php else : ?>
                                <img width="40%" class="rounded-circle" src="images/avatar.png" alt="">
                            <?php endif; ?>
                            <br>
                            <a href="editMyProfile.php?id=<?= $assoc_user['id']; ?>" class="btn btn-link fw-bold text-primary text-decoration-underline text-capitalize mt-3">Edit Profile</a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">

                            <p class="fw-bold mb-1">Full Name:</p>
                            <h5 class="fw-bold mb-4"><?= $assoc_user['first_name'] . ' ' . $assoc_user['last_name'] ?></h5>
                            <p class="fw-bold mb-1">Email Address:</p>
                            <h5 class="fw-bold mb-4"><?= $assoc_user['email']; ?></h5>
                            <p class="fw-bold mb-1">Date Of Birth:</p>
                            <h5 class="fw-bold mb-4"><?= $assoc_user['date_of_birth']; ?></h5>
                            <p class="fw-bold mb-1">Gender:</p>
                            <h5 class="fw-bold mb-4"><?= $assoc_user['gender']; ?></h5>
                        </div>
                    </div>
            </div>
        </div>

        <?php require_once "includes/footer.php" ?>