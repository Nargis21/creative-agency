<?php session_start()?>
<?php require_once "includes/header.php"; ?>
<?php require_once "../includes/db.php"; ?>
<?php $email = $_SESSION['login']; ?>
<?php
//get form data
$id = $_POST['id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dateOfBirth = $_POST['dateOfBirth'];
$gender = $_POST['gender'];

//get file info
$imageName = $_FILES['userImage']['name'];
$imagePath = $_FILES['userImage']['tmp_name'];
$imageError = $_FILES['userImage']['error'];
$imageSize = $_FILES['userImage']['size'];

//get old shoe file
$selectUser = "SELECT user_image FROM users WHERE id=$id";
$oldImage = mysqli_fetch_assoc(mysqli_query($db_connect, $selectUser))['user_image'];


if(empty($firstName) ||empty($lastName) ||empty($dateOfBirth) || empty($gender) ){
    $_SESSION['userFormError'] = "Please fill up the form correctly, you are missing something!";
    header("location: editMyProfile.php?id=$id");
}
else{
    if ($imageError === 0) {
        if ($imageSize <= 1000000) {
            $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageExtLower = strtolower($imageExt);
            $acceptedType = ['jpg', 'jpeg', 'png'];
    
            if (in_array($imageExtLower, $acceptedType)) {
                $newImageName = uniqid('user-', true) . "." . $imageExtLower;
                $newImagePath = 'uploads/user/' . $newImageName;
                move_uploaded_file($imagePath, $newImagePath);

                $oldImagePath = 'uploads/user/'.$oldImage;
                unlink($oldImagePath);
    
                $update_query = "UPDATE users SET first_name = '$firstName', last_name = '$lastName',date_of_birth = '$dateOfBirth', gender = '$gender', user_image = '$newImageName' WHERE id = $id";
    
                $update = mysqli_query($db_connect, $update_query);
    
                if ($update) {
                    header("location: myProfile.php");
                }
            } else {
                $_SESSION['userImageError'] = "File type not supported";
                header("location: editMyProfile.php?id=$id");
            }
        } else {
            $_SESSION['userImageError'] = "File is too large, maximum image size is 1MB";
            header("location: editMyProfile.php?id=$id");
        }
    } else {
        $update_query = "UPDATE users SET first_name = '$firstName', last_name = '$lastName',date_of_birth = '$dateOfBirth', gender = '$gender', user_image = '$oldImage' WHERE id = $id";
    
        $update = mysqli_query($db_connect, $update_query);

        if ($update) {
            header("location: myProfile.php");
        }
    }
}

?>