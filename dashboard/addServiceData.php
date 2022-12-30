<?php session_start(); ?>
<?php
require_once "../includes/db.php";

//get form data
$serviceName = $_POST['serviceName'];
$description = $_POST['description'];

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

//get file info
$imageName = $_FILES['serviceImage']['name'];
$imagePath = $_FILES['serviceImage']['tmp_name'];
$imageError = $_FILES['serviceImage']['error'];
$imageSize = $_FILES['serviceImage']['size'];


//-------check empty field-------
if(empty($serviceName) || empty($description) ){
    $_SESSION['serviceFormError'] = "Please fill up the form correctly, you are missing something!";
    header("location: addService.php");
}
else{
    if ($imageError === 0) {
        if ($imageSize <= 1000000) {
            $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageExtLower = strtolower($imageExt);
            $acceptedType = ['jpg', 'jpeg', 'png'];
    
            if (in_array($imageExtLower, $acceptedType)) {
                $newImageName = uniqid('service-', true) . "." . $imageExtLower;
                $newImagePath = 'uploads/service/' . $newImageName;
                move_uploaded_file($imagePath, $newImagePath);
    
                $insert_service = "INSERT INTO services(service_name, description,service_image) VALUES ('$serviceName', '$description', '$newImageName')";
    
                $insert = mysqli_query($db_connect, $insert_service);
    
                if ($insert) {
                    header("location: addService.php");
                }
            } else {
                $_SESSION['serviceImageError'] = "File type not supported";
                header("location: addService.php");
            }
        } else {
            $_SESSION['serviceImageError'] = "File is too large, maximum image size is 1MB";
            header("location: addService.php");
        }
    } else {
        $_SESSION['serviceImageError'] = "Something went wrong!";
        header("location: addService.php");
        
    }
}

// die();


?>