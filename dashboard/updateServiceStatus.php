<?php
require_once "../includes/db.php";

$id = $_GET['id'];
$type = $_GET['type'];

if ($type == 'active') {
    $update_query = "UPDATE services SET active_status = 2 WHERE id = $id";
} else {
    $update_query = "UPDATE services SET active_status = 1 WHERE id = $id";
}
$updateService = mysqli_query($db_connect, $update_query);

if ($updateService) {
    header("location: manageService.php");
}
?>