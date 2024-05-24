<?php
//start a session to store the messages that will bw dispalyed to the user
session_start();

//CHECK ADMIN LOGIN HERE
//if admin is not logged in, redirect to prip.php page
if(!isset($_SESSION['logged_in_staff_number'])){
    header('location: prip.php');
}

//make sure that user uses the submit button
if (!isset($_POST['change'])) {
    header('location: ../changeInfo.php');
}

//connect to DB
require 'dbconn.php';

//get info from the form
extract($_POST);

//This Flag will be raised if the entered email/password deos not match the constraints
$flag = 0;

//validate email
//define the pattern that the email should follow
$pattern = '/^[a-zA-Z0-9._]+@bradford\.ac\.uk$/';
if (empty($email)) {
    $emailErr = "*You Must Provide an Email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) or strlen($email) > 320) {
    $emailErr = "*Entered Email Is Not Valid";
} else if (!preg_match($pattern, $email)) {
    //the function preg_match is used to find if the entered email matches the specified pattern
    $emailErr = "*Enterd Email Must Follow The Form: something@bradford.ac.uk";
}
//store the error message in a session to dispaly it in the "prip.php" page 
if (!empty($emailErr)) {
    $_SESSION['emailChangeErr'] = $emailErr;
    $flag = 1;
}

//validate password if the user enterd one
if (!empty($password)) {
    if (strlen($password) < 8) {
        $passwordErr = "*Password Must be 8 Characters at Least";
    }
}
//store the error message in a session to dispaly it in the "prip.php" page 
if (!empty($passwordErr)) {
    $_SESSION['passwordChangeErr'] = $passwordErr;
    $flag = 1;
}

//if there is an error return to changeInfo page
if ($flag) {
    header('location: ../changeInfo.php');
} else {
    //if there is no errors then update admin info

    try {
        //start a transaction
        mysqli_begin_transaction($conn);

        //if the password is not empty, then the admin has entered a new one
        if (!empty($password)) {

            //to prevent sql injection, prepare the update statement with placeholders
            $statement = mysqli_prepare($conn, "UPDATE admin SET password=?, email=?");

            //trim extra space from the password and hash it
            //then bind the parameters to the placeholders 
            $password = password_hash(trim($password), PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($statement, "ss", $password, $email);
        } else {
            //if the password is empty, then the admin did not change it
            //so we need to chane the email only

            //to prevent sql injection, prepare the update statement with placeholders
            $statement = mysqli_prepare($conn, "UPDATE admin SET email=?");

            //bind the parameters to the placeholders 
            mysqli_stmt_bind_param($statement, "s", $email);
        }

        //execute the prepared statement
        mysqli_stmt_execute($statement);

        //commit the transaction
        mysqli_commit($conn);

        //store success message to print in changeInfo page
        $_SESSION['changeSuccessMsg'] = "Your info was updated successfully";

        //redirect user to changeInfo page
        header('location: ../changeInfo.php');
    } catch (Exception $e) {
        //rollback the transaction
        mysqli_rollback($conn);
        //store error message int a session
        $_SESSION['UpdateErrorMsg'] = 'An Error occurred While Updating Ypur Info, Please Try Again.';
        //redirect user to changeInfo page
        header('location: ../changeInfo.php');
    }
}
