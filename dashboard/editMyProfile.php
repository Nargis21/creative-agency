<?php session_start(); ?>
<?php $email = $_SESSION['login'] ?>
<?php require_once "includes/authCheck.php"; ?>
<?php $title = "Edit Profile"; ?>
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
            <a href="myProfile.php" class="pl-5 ml-2 fw-bold text-decoration-underline mt-3">Back</a>
            <div class=" col-md-10 col-lg-10 col-12 mx-auto">
                <h3 class="py-4 text-center text-white fw-bold bgColor1">Edit Profile</h3>
                <form method="post" action="editMyProfileData.php" enctype="multipart/form-data" class="border border-1 rounded p-5 shadow">
                    <div class="row g-5">
                        <div class="text-center col-12 col-md-4 col-lg-4">
                            <?php if ($assoc_user['user_image']) : ?>
                                <img height="200px" width="200px" class="rounded-circle" src="uploads/user/<?= $assoc_user['user_image']; ?>" alt="">
                            <?php else : ?>
                                <img width="50%" class="rounded-circle" src="images/avatar.png" alt="">
                            <?php endif; ?>
                            <br>
                            <div class="form-outline mb-4">
                                <label class="form-label pt-4 pb-1" for="form3Example3">Upload Photo</label>
                                <input name="userImage" type="file" id="form3Example4" class="form-control" />
                            </div>
                            <!-- Show shoe image error message -->
                            <?php
                            if (isset($_SESSION['userImageError'])) : ?>
                                <p class="text-danger text-center">
                                    <?php echo $_SESSION['userImageError'];
                                    unset($_SESSION['userImageError']);
                                    ?>
                                </p>
                            <?php endif ?>

                        </div>
                        <div class="col-12 col-md-8 col-lg-8 ">
                            <input type="hidden" value="<?= $assoc_user['id']; ?>" name="id">

                            <!-- Show shoe form error message -->
                            <?php
                            if (isset($_SESSION['userFormError'])) : ?>
                                <p class="text-danger my-2">
                                    <?php echo $_SESSION['userFormError'];
                                    unset($_SESSION['userFormError']);
                                    ?>
                                </p>
                            <?php endif ?>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1">First name</label>
                                        <input value="<?= $assoc_user['first_name'] ?>" name="firstName" type="text" id="form3Example1" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example2">Last name</label>
                                        <input value="<?= $assoc_user['last_name'] ?>" name="lastName" type="text" id="form3Example2" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email address (Email Address cannot be changed)</label>
                                <input disabled value="<?= $assoc_user['email']; ?>" name="userEmail" type="text" id="form3Example3" class="form-control" />
                            </div>

                            <!--Date of birth-->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Date Of Birth: </label>
                                <input value="<?= $assoc_user['date_of_birth']; ?>" class="form-control" type="date" name="dateOfBirth">
                            </div>

                            <!-- Gender Select -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Gender: </label>
                                  <input type="radio" name="gender" value="Male">
                                  <label for="html">Male</label>
                                  <input type="radio" name="gender" value="Female">
                                  <label for="css">Female</label><br>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="submitBtn btn-block w-25">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <?php require_once "includes/footer.php" ?>