<?php
include '../includes/dbconn.php';

//get the entered email
$email = trim($_POST['email']);
// get the entered password
$password = trim($_POST['password']);

//fetch email and password from the database
$sql = "SELECT * FROM admin";
$query = mysqli_query($conn, $sql);
$adminInfo = mysqli_fetch_assoc($query);

//compare entered data with data from the database
if($email == $adminInfo['email'] and password_verify($password, $adminInfo['password'])){
    //data is correct:
    //set session variables and send admin to the dashboard
    session_start();
    $_SESSION['logged_in_staff_number'] = 1;
    header('location: ../dashboard.php');
}else{
    //data is incorrect:
    //set session variables and send admin to the login page
    session_start();
    $_SESSION['invalid_login'] = "Incorrect email or password";
    header('location: ../index.php');
}

?>
