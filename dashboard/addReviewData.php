<?php session_start(); ?>
<?php
require_once "../includes/db.php";

//get form data
$reviewerName = $_POST['reviewerName'];
$companyDesignation = $_POST['companyDesignation'];
$description = $_POST['description'];

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

//get file info
$imageName = $_FILES['reviewerImage']['name'];
$imagePath = $_FILES['reviewerImage']['tmp_name'];
$imageError = $_FILES['reviewerImage']['error'];
$imageSize = $_FILES['reviewerImage']['size'];


//-------check empty field-------
if(empty($reviewerName) || empty($companyDesignation) || empty($description) ){
    $_SESSION['reviewFormError'] = "Please fill up the form correctly, you are missing something!";
    header("location: addReview.php");
}
else{
    if ($imageError === 0) {
        if ($imageSize <= 1000000) {
            $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageExtLower = strtolower($imageExt);
            $acceptedType = ['jpg', 'jpeg', 'png'];
    
            if (in_array($imageExtLower, $acceptedType)) {
                $newImageName = uniqid('review-', true) . "." . $imageExtLower;
                $newImagePath = 'uploads/review/' . $newImageName;
                move_uploaded_file($imagePath, $newImagePath);
    
                $insert_review = "INSERT INTO reviews(reviewer_name, company_designation, description,reviewer_image) VALUES ('$reviewerName', '$companyDesignation','$description', '$newImageName')";
    
                $insert = mysqli_query($db_connect, $insert_review);
    
                if ($insert) {
                    header("location: addReview.php");
                }
            } else {
                $_SESSION['reviewImageError'] = "File type not supported";
                header("location: addReview.php");
            }
        } else {
            $_SESSION['reviewImageError'] = "File is too large, maximum image size is 1MB";
            header("location: addReview.php");
        }
    } else {
        $_SESSION['reviewImageError'] = "Something went wrong!";
        header("location: addReview.php");
        
    }
}

// die();


?>