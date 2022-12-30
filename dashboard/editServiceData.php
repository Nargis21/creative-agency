<?php session_start()?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>
<?php $email = $_SESSION['login']; ?>
<?php
//get form data
$id = $_POST['id'];
$serviceName = $_POST['serviceName'];
$description = $_POST['description'];

//get file info
$imageName = $_FILES['serviceImage']['name'];
$imagePath = $_FILES['serviceImage']['tmp_name'];
$imageError = $_FILES['serviceImage']['error'];
$imageSize = $_FILES['serviceImage']['size'];

//get old shoe file
$selectService = "SELECT service_image FROM services WHERE id=$id";
$oldImage = mysqli_fetch_assoc(mysqli_query($db_connect, $selectService))['service_image'];


if(empty($serviceName) || empty($description) ){
    $_SESSION['serviceFormError'] = "Please fill up the form correctly, you are missing something!";
    header("location: editService.phpphp?id=$id");
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

                $oldImagePath = 'uploads/service/'.$oldImage;
                unlink($oldImagePath);
    
                $update_query = "UPDATE services SET service_name = '$serviceName', description = '$description', service_image = '$newImageName' WHERE id = $id";
    
                $update = mysqli_query($db_connect, $update_query);
    
                if ($update) {
                    header("location: manageService.php");
                }
            } else {
                $_SESSION['serviceImageError'] = "File type not supported";
                header("location: editShoe.php?id=$id");
            }
        } else {
            $_SESSION['serviceImageError'] = "File is too large, maximum image size is 1MB";
            header("location: editService.php?id=$id");
        }
    } else {
        $update_query = "UPDATE services SET service_name = '$serviceName', description = '$description', service_image = '$oldImage' WHERE id = $id";
    
        $update = mysqli_query($db_connect, $update_query);

        if ($update) {
            header("location: manageService.php");
        }
    }
}

?>