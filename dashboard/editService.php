<?php session_start(); ?>
<?php $title = "Edit My Service"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>
<?php
$id = $_GET['id'];

$get_service = "SELECT * FROM services WHERE id = $id";
$service = mysqli_query($db_connect, $get_service);

$assoc_service = mysqli_fetch_assoc($service);

?>

<div class="col-lg-6 col-md-12 col-12 mx-auto mb-5">
    <h3 class="py-4 text-center fw-bold">Update Service</h3>
    <form method="post" action="editServiceData.php" enctype="multipart/form-data" class="border border-1 rounded p-3 shadow">
        <input type="hidden" value="<?= $assoc_service['id']; ?>" name="id">

        <!-- Show shoe form error message -->
        <!-- Show shoe form error message -->
        <?php
        if (isset($_SESSION['serviceFormError'])) : ?>
            <p class="text-danger text-center">
                <?php echo $_SESSION['serviceFormError'];
                unset($_SESSION['serviceFormError']);
                ?>
            </p>
        <?php endif ?>
        <div class="form-outline mb-4 ">
            <label class="form-label" for="form3Example3">Service Title</label>
            <input value="<?= $assoc_service['service_name']; ?>" name="serviceName" type="text" id="form3Example3" class="form-control " />
        </div>
        <div class="form-outline mb-4">
            <label class="mb-2" class="form-label" for="form3Example4">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="4"><?= $assoc_service['description']; ?></textarea>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example4">Upload Photo</label>
            <input name="serviceImage" type="file" id="form3Example4" class="form-control" />
        </div>
        <!-- Show shoe image error message -->
        <?php
        if (isset($_SESSION['serviceImageError'])) : ?>
            <p class="text-danger text-center">
                <?php echo $_SESSION['serviceImageError'];
                unset($_SESSION['serviceImageError']);
                ?>
            </p>
        <?php endif ?>
        <button type="submit" class="submitBtn btn-block mb-4 w-50 mx-auto">
            UPDATE
        </button>
    </form>
</div>