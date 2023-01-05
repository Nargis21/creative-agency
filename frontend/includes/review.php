<?php
require_once "../includes/db.php";

$get_reviews = "SELECT * FROM reviews WHERE active_status = 2 ORDER BY id DESC LIMIT 3";
$reviews = mysqli_query($db_connect, $get_reviews);
?>


<section class="container py-5">
    <h2 class="py-5 textCol text-center">Clients <span class="text-success">Feedback!</span></h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 slide-background pb-4 px-3">
        <?php
        foreach ($reviews as $review) :
        ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-lg rounded-3">
                    <div class="d-flex justify-content-center align-items-center pt-3">
                        <img src="../dashboard/uploads/review/<?= $review['reviewer_image']; ?>" class="w-25 rounded" alt="Shoe Image">
                    </div>
                    <div class="card-body d-flex align-items-center flex-column">
                        <h5 class="card-title text-center textCol fw-bold">
                            <?= $review['reviewer_name']; ?>
                        </h5>
                        <h6 class="card-text ">
                            <?= $review['company_designation']; ?>
                        </h6>
                        <small class="text-center pt-2">
                            "<?= $review['description']; ?>"
                        </small>

                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</section>