<?php session_start(); ?>
<?php require_once "includes/authCheck.php"; ?>
<?php $title = "Add Review"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>


<div class="wrapper">

    <?php require_once "includes/sidebar.php"; ?>

    <div class="page-wrapper">

        <?php require_once "includes/topbar.php"; ?>
        <div class="content-wrapper">
            <div class="col-lg-6 col-md-12 col-12 mx-auto my-5">
                <h3 class="py-5 text-center bgColor1 text-white fw-bold">Add Review</h3>
                <form method="post" action="addReviewData.php" enctype="multipart/form-data" class="border border-1 rounded p-3 shadow">
                    <!-- Show shoe form error message -->
                    <?php
                    if (isset($_SESSION['reviewFormError'])) : ?>
                        <p class="text-danger text-center">
                            <?php echo $_SESSION['reviewFormError'];
                            unset($_SESSION['reviewFormError']);
                            ?>
                        </p>
                    <?php endif ?>
                    <div class="form-outline mb-4 ">
                        <label class="form-label" for="form3Example3">Your name</label>
                        <input name="reviewerName" type="text" id="form3Example3" class="form-control " />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4"> Company's name, Designation</label>
                        <input name="companyDesignation" type="text" id="form3Example4" class="form-control" />
                    </div>
                   
                    <div class="form-outline mb-4">
                        <label class="mb-2" class="form-label" for="form3Example4">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="4"></textarea>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4">Upload Your Photo/ Company Logo</label>
                        <input name="reviewerImage" type="file" id="form3Example4" class="form-control" />
                    </div>
                    <!-- Show shoe image error message -->
                    <?php
                    if (isset($_SESSION['reviewImageError'])) : ?>
                        <p class="text-danger text-center">
                            <?php echo $_SESSION['reviewImageError'];
                            unset($_SESSION['reviewImageError']);
                            ?>
                        </p>
                    <?php endif ?>
                    <button type="submit" class="submitBtn btn-block mb-4 w-50 mx-auto">
                        SUBMIT
                    </button>
                </form>
            </div>
        </div>

        <?php require_once "includes/footer.php" ?>