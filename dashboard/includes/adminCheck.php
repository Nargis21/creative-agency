<?php
if(!isset($_SESSION['userType'])){
    session_destroy();
    header("location: ../authentication/login.php");
}
?>