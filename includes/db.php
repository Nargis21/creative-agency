<?php
    define("HOSTNAME","localhost");
    define("USERNAME","root");
    define("PASSWORD","");
    define("DB_NAME","creative_agency");

    $db_connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB_NAME);
    
    if(!$db_connect){
        die("Database connection failed: " . mysqli_connect_error());
    }
?>