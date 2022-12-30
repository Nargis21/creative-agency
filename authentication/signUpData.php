<?php session_start(); ?>
<?php require_once "../includes/db.php"; ?>
<?php require_once "../frontend/includes/header.php"; ?>
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// echo "Name: ".$_POST["firstName"]." ".$_POST["lastName"];
// echo "<br>";
// echo "Email : ".$_POST["userEmail"];
// echo "<br>";
// echo "Password: ".$_POST["password"];
// echo "<br>";
// echo "Message: ".$_POST["message"];

//------Get duplicate email-------
$userEmail = $_POST["userEmail"];

$check_duplicate = "SELECT * FROM users WHERE email='$userEmail'";
$duplicate = mysqli_query($db_connect,$check_duplicate);

//------Get password from the signup form------
$password = $_POST["password"];

//------set the password strength using preg_match which is a php build in function for regex match------
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

//-------check empty field-------
if(empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["userEmail"]) || empty($_POST["dateOfBirth"])|| empty($_POST["gender"])|| empty($_POST["password"]) || empty($_POST["userType"]) ){
  $_SESSION['SignUpBlankError'] = "Please fill up the form correctly, you are missing something!";
  header("location: signUp.php");
}

//--------check validate email--------
elseif (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
  $_SESSION['SignUpEmailError'] = "Please provide a valid email!";
  header("location: signUp.php");
}

//--------check password strength--------
elseif(!($uppercase && $lowercase && $number && $specialChars && strlen($password) >= 8)) {
  $_SESSION['SignUpPasswordError'] = "Password should be at least 8 characters in length should include at least one upper case letter, one number, and one special character.";
  header("location: signUp.php");
}

//--------check duplicate email--------
elseif($duplicate->num_rows==1) {
  echo '<div class="alert alert-danger" role="alert">
 User already exists!
</div>';
$_SESSION['SignUpDuplicateUserError'] = "User already exists!";
  header("location: signUp.php");
}

//-----default message-------
else{

    // echo "You have successfully registered";

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];
    $userType = $_POST["userType"];
    $encryptedPassword = md5($password);

    $insert_query = "INSERT INTO users(first_name, last_name, email, date_of_birth, gender, password, user_type) VALUES ('$firstName','$lastName','$userEmail','$dateOfBirth','$gender','$encryptedPassword','$userType')";

    $insert = mysqli_query($db_connect, $insert_query);

       if($insert){
        header("location: ../frontend/index.php");
       }
       else{
        echo "Something wrong!";
       }
}

?>