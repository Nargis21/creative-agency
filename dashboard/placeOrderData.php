<?php session_start(); ?>
<?php
require_once "../includes/db.php";
$email = $_SESSION['login'];
//get form data
$customerName = $_POST['customerName'];
$customerEmail = $_POST['customerEmail'];
$serviceName = $_POST['serviceName'];
$projectDetails = $_POST['projectDetails'];

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

//get file info
$fileName = $_FILES['projectFile']['name'];
$filePath = $_FILES['projectFile']['tmp_name'];
$fileError = $_FILES['projectFile']['error'];
$fileSize = $_FILES['projectFile']['size'];


//-------check empty field-------
if(empty($customerName) || empty($customerEmail) || empty($serviceName) || empty($projectDetails) ){
    $_SESSION['orderFormError'] = "Please fill up the form correctly, you are missing something!";
    header("location: placeOrder.php");
}
else{
    if ($fileError === 0) {
        if ($fileSize <= 2000000) {
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileExtLower = strtolower($fileExt);
            $acceptedType = ['jpg', 'jpeg', 'png', 'zip', 'pdf'];
    
            if (in_array($fileExtLower, $acceptedType)) {
                $newFileName = uniqid('order-', true) . "." . $fileExtLower;
                $newFilePath = 'uploads/order/' . $newFileName;
                move_uploaded_file($filePath, $newFilePath);
    
                $insert_order = "INSERT INTO orders(user_email,customer_name, customer_email, service_name, project_details, project_file) VALUES ('$email','$customerName', '$customerEmail','$serviceName', '$projectDetails', '$newFileName')";
    
                $insert = mysqli_query($db_connect, $insert_order);
    
                if ($insert) {
                    header("location: placeOrder.php");
                }
            } else {
                $_SESSION['orderFileError'] = "File type not supported";
                header("location: placeOrder.php");
            }
        } else {
            $_SESSION['orderFileError'] = "File is too large, maximum image size is 1MB";
            header("location: placeOrder.php");
        }
    } else {
        $_SESSION['orderFileError'] = "Something went wrong!";
        header("location: placeOrder.php");
        
    }
}

// die();


?>