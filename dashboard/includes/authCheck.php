<?php
if(!isset($_SESSION['login'])){
    session_destroy();
    header("location: ../authentication/login.php");
}
?>