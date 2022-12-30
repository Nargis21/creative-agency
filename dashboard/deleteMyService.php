<?php
require_once "../includes/db.php";
$id = $_GET['id'];
echo $id;

$delete_myService_query = "DELETE FROM orders WHERE id=$id";
$myService = mysqli_query($db_connect,$delete_myService_query);

if($myService){
header("location: myService.php");
}
?>