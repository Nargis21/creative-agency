<?php
require_once "../includes/db.php";

$id = $_GET['id'];
$type = $_GET['type'];

if ($type == 'active') {
    $update_query = "UPDATE reviews SET active_status = 2 WHERE id = $id";
} else {
    $update_query = "UPDATE reviews SET active_status = 1 WHERE id = $id";
}
$updateReview = mysqli_query($db_connect, $update_query);

if ($updateReview) {
    header("location: manageReview.php");
}
?>