<?php
session_start();
//if (!session_is_registered(myusername)) {
//    header("location:../login/login.php");
//}
?>
<?php include_once("../inc/analyticstracking.php") ?>    

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../inc/analyticstracking.php';
//require '../inc/menu.php';
require '../inc/database.php';

$email = $_GET['myemail'];
$username = $_GET['myusername'];
$password = $_GET['mypassword'];

echo "################################<br>";

    $con = connect_db();
    
    $sqlcmd = "INSERT INTO user (username, password, email)
    VALUES ('$username', '$password', '$email')";
    //$result = mysqli_query($con,"SELECT * FROM belonging");
    //echo "$sqlcmd<br>";

    if (!mysqli_query($con, $sqlcmd)) {
        die('Error: ' . mysqli_error($con));
    } else {
        echo (gettext("Registration successful."));
        echo (gettext("Hello"));
    }

    mysqli_close($con);
?>