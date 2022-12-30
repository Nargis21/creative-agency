<?php
require_once "../includes/db.php";
$id = $_GET['id'];
echo $id;

$delete_user_query = "DELETE FROM users WHERE id=$id";
$user = mysqli_query($db_connect,$delete_user_query);

if($user){
header("location: userPanel.php");
}
?>