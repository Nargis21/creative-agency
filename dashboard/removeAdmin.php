
<?php require_once "../includes/db.php" ?>

<?php
$id = $_GET["id"];


$update_userType_query = "UPDATE users SET user_type = 'pendingAdmin' WHERE id=$id";
$userType = mysqli_query($db_connect,$update_userType_query);
if($userType){
    header("location: userPanel.php");
}