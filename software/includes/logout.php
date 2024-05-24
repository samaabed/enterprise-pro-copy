<?php
//CHECK ADMIN LOGIN HERE
//if admin is not logged in, redirect to prip.php page
if(!isset($_SESSION['logged_in_staff_number'])){
    header('location: prip.php');
}

//destroy the session  to log out the admin
session_start();
unset($_SESSION['logged_in_staff_number']);
header('location: ../index.php');
?>