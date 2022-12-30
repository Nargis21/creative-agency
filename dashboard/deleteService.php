<?php
require_once "../includes/db.php";
$id = $_GET['id'];
echo $id;

$delete_Service_query = "DELETE FROM services WHERE id=$id";
$Service = mysqli_query($db_connect,$delete_Service_query);

if($Service){
header("location: manageService.php");
}
?>