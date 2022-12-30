<?php
require_once "../includes/db.php";

$get_services = "SELECT * FROM services WHERE active_status = 2";
$services = mysqli_query($db_connect, $get_services);
?>

<div class="row row-cols-1 row-cols-lg-3 row-cols-md- gy-4 py-3 serviceCard">
    <?php
    foreach ($services as $service) :
    ?>
        <div class="text-center p-4 rounded col ">
            <img width="20%" src="../dashboard/uploads/service/<?= $service['service_image']; ?>" />
            <h3 class="py-3"> <?= $service['service_name']; ?></h3>
            <p><?= $service['description']; ?></p>
        </div>
    <?php endforeach; ?>
</div>