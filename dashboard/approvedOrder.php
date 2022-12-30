
<?php require_once "../includes/db.php" ?>

<?php
$id = $_GET["id"];


$updateStatus_query = "UPDATE orders SET status = 'Done' WHERE id=$id";
$updateStatus = mysqli_query($db_connect,$updateStatus_query);
if($updateStatus){
    header("location: manageOrder.php");
}