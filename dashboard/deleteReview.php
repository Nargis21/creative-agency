<?php
require_once "../includes/db.php";
$id = $_GET['id'];
echo $id;

$delete_review_query = "DELETE FROM reviews WHERE id=$id";
$review = mysqli_query($db_connect,$delete_review_query);

if($review){
header("location: manageReview.php");
}
?>