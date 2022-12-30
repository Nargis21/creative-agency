<?php session_start(); ?>

<?php require_once "../includes/db.php"; ?>
<?php require_once "../frontend/includes/header.php"; ?>

<?php

$userEmail = $_POST['userEmail'];
$password = md5($_POST['password']);

$check_user = "SELECT * FROM users WHERE email='$userEmail' AND password='$password'";
$user = mysqli_query($db_connect, $check_user);
$user_assoc = mysqli_fetch_assoc($user);


if ($user->num_rows == 1) {
    $_SESSION['login'] = $userEmail;

    if ($user_assoc["user_type"] == "user") {
        header("location: ../frontend/index.php");
    } else if ($user_assoc["user_type"] == "approvedAdmin") {
        $_SESSION['userType'] = "admin";
        header("location: ../frontend/index.php");
    } else if ($user_assoc["user_type"] == "pendingAdmin") {
        $_SESSION['loginError'] = "Your admin credential is not approved yet!";
        header("location: login.php");
    } else {
        $_SESSION['loginError'] = "Your are not a user!";
        header("location: login.php");
    }
} else {
    $_SESSION['loginError'] = "Your Email or Password Invalid";
    header("location: login.php");
}
