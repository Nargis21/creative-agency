<?php session_start()?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>
<?php $email = $_SESSION['login']; ?>
<?php
//get form data
$id = $_POST['id'];
$customerName = $_POST['customerName'];
$customerEmail = $_POST['customerEmail'];
$serviceName = $_POST['serviceName'];
$projectDetails = $_POST['projectDetails'];

//get file info
$fileName = $_FILES['projectFile']['name'];
$filePath = $_FILES['projectFile']['tmp_name'];
$fileError = $_FILES['projectFile']['error'];
$fileSize = $_FILES['projectFile']['size'];

//get old shoe file
$selectService = "SELECT project_file FROM orders WHERE id=$id";
$oldFile = mysqli_fetch_assoc(mysqli_query($db_connect, $selectService))['project_file'];


if(empty($customerName) || empty($customerEmail) || empty($serviceName) || empty($projectDetails) ){
    $_SESSION['orderFormError'] = "Please fill up the form correctly, you are missing something!";
    header("location: editMyService.php?id=$id");
}
else{
    if ($fileError === 0) {
        if ($fileSize <= 2000000) {
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileExtLower = strtolower($fileExt);
            $acceptedType = ['jpg', 'jpeg', 'png', 'zip','pdf'];
    
            if (in_array($fileExtLower, $acceptedType)) {
                $newFileName = uniqid('order-', true) . "." . $fileExtLower;
                $newFilePath = 'uploads/order/' . $newFileName;
                move_uploaded_file($filePath, $newFilePath);

                $oldFilePath = 'uploads/order/'.$oldFile;
                unlink($oldFilePath);
    
                $update_query = "UPDATE orders SET customer_name = '$customerName', customer_email = '$customerEmail', service_name = '$serviceName', project_details = '$projectDetails', project_file = '$newFileName' WHERE id = $id";
    
                $update = mysqli_query($db_connect, $update_query);
    
                if ($update) {
                    header("location: myService.php");
                }
            } else {
                $_SESSION['shoeFileError'] = "File type not supported";
                header("location: editMyService.php?id=$id");
            }
        } else {
            $_SESSION['shoeFileError'] = "File is too large, maximum file size is 1MB";
            header("location: editMyService.php?id=$id");
        }
    } else {
        $update_query ="UPDATE orders SET customer_name = '$customerName', customer_email = '$customerEmail', service_name = '$serviceName', project_details = '$projectDetails', project_file = '$oldFile' WHERE id = $id";
    
        $update = mysqli_query($db_connect, $update_query);

        if ($update) {
            header("location: myService.php");
        }
    }
}


?>