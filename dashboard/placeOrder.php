<?php session_start(); ?>
<?php require_once "includes/authCheck.php"; ?>
<?php $title = "Place Order"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>

<?php
$get_services = "SELECT * FROM services WHERE active_status = 2";
$services = mysqli_query($db_connect, $get_services);
?>


<div class="wrapper">

    <?php require_once "includes/sidebar.php"; ?>

    <div class="page-wrapper">

        <?php require_once "includes/topbar.php"; ?>
        <div class="content-wrapper">
            <div class="col-lg-6 col-md-12 col-12 mx-auto my-5">
                <h3 class="py-5 text-center bgColor1 text-white fw-bold">Place Your Order</h3>
                <form method="post" action="placeOrderData.php" enctype="multipart/form-data" class="border border-1 rounded p-3 shadow">
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
                        <input name="customerName" type="text" id="form3Example3" class="form-control " />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4">Your Email Address</label>
                        <input name="customerEmail" type="email" id="form3Example4" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4">Service Category</label>
                        <select name="serviceName" class="form-control">
                            <?php
                            foreach ($services as $service) :
                            ?>
                                <option value=" <?= $service['service_name']; ?>"> <?= $service['service_name']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="mb-2" class="form-label" for="form3Example4">Project Details</label>
                        <textarea name="projectDetails" class="form-control" cols="30" rows="4"></textarea>
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
                        SEND
                    </button>
                </form>
            </div>
        </div>

        <?php require_once "includes/footer.php" ?>