<?php session_start(); ?>
<?php $title = "Edit My Service"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>
<?php
$id = $_GET['id'];

$get_service = "SELECT * FROM orders WHERE id = $id";
$service = mysqli_query($db_connect, $get_service);

$assoc_service = mysqli_fetch_assoc($service);

?>
<?php
$get_activeServices = "SELECT * FROM services WHERE active_status = 2";
$activeServices = mysqli_query($db_connect, $get_activeServices);
?>
<div class="col-lg-6 col-md-12 col-12 mx-auto mb-5">
    <h3 class="py-4 text-center fw-bold">Update Shoe</h3>
    <form method="post" action="editMyServiceData.php" enctype="multipart/form-data" class="border border-1 rounded p-3 shadow">
        <input type="hidden" value="<?= $assoc_service['id']; ?>" name="id">

        <!-- Show shoe form error message -->
        <?php
        if (isset($_SESSION['orderFormError'])) : ?>
            <p class="text-danger text-center">
                <?php echo $_SESSION['orderFormError'];
                unset($_SESSION['orderFormError']);
                ?>
            </p>
        <?php endif ?>
        <div class="form-outline mb-4 ">
            <label class="form-label" for="form3Example3">Your name/ Company's name</label>
            <input value="<?= $assoc_service['customer_name']; ?>" name="customerName" type="text" id="form3Example3" class="form-control " />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example4">Your Email Address</label>
            <input value="<?= $assoc_service['customer_email']; ?>" name="customerEmail" type="email" id="form3Example4" class="form-control" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example4">Service Category</label>
            <select value="<?= $assoc_service['service_name']; ?>" name="serviceName" class="form-control">
                <?php
                    foreach ($activeServices as $activeService) :
                    ?> <option <?php if ($assoc_service['service_name'] == $activeService['service_name']) : ?> selected <?php endif; ?> value=" <?= $activeService['service_name']; ?>"> <?= $activeService['service_name']; ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>
        <div class="form-outline mb-4">
            <label class="mb-2" class="form-label" for="form3Example4">Project Details</label>
            <textarea name="projectDetails" class="form-control" cols="30" rows="4"><?= $assoc_service['project_details']; ?></textarea>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example4">Upload Project File</label>
            <input name="projectFile" type="file" id="form3Example4" class="form-control" />
        </div>
        <!-- Show shoe image error message -->
        <?php
        if (isset($_SESSION['orderFileError'])) : ?>
            <p class="text-danger text-center">
                <?php echo $_SESSION['orderFileError'];
                unset($_SESSION['orderFileError']);
                ?>
            </p>
        <?php endif ?>
        <button type="submit" class="submitBtn btn-block mb-4 w-50 mx-auto">
            UPDATE
        </button>
    </form>
</div>