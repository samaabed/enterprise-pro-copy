<?php
//CHECK IF ADMIN IS LOGGED IN HERE
//if admin is not logged in, redirect to prip.php page
session_start();
if(!isset($_SESSION['logged_in_staff_number'])){
    header('location: prip.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap V5.2 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Inter'>
</head>

<body>
    <?php
    //nav bar
    require('includes/navbar.php');

    //connect to DB
    require "includes/dbconn.php";

    //get current email of the admin to display it.
    //a prepared statement is used to prevent sql injection
    $sql = "SELECT * FROM admin";
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $adminInfo = mysqli_fetch_assoc($result);
    $currentEmail = $adminInfo['email'];
    ?>

    <!-- page content -->
    <form action="includes/changeInfoHandler.php" method="POST" class="form-container">
        <div class="mb-3 row m-4 text-center w-80">
            <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" value="<?= $currentEmail ?>" name="email">
            </div>
        </div>
        <div class="mb-3 row m-4 text-center w-80">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="password" placeholder="Password will not be shown for security">
            </div>
        </div>
        <div class="text-center ">
            <input type="submit" value="Change" class="btn btn-dark" name="change">
        </div>

        <?php

        //display the errors if they exist
        if (isset($_SESSION['emailChangeErr'])) { ?>
            <div class="alert alert-danger m-3"><?= $_SESSION['emailChangeErr'] ?></div>
        <?php
            unset($_SESSION['emailChangeErr']);
        }
        if (isset($_SESSION['passwordChangeErr'])) { ?>
            <div class="alert alert-danger m-3"><?= $_SESSION['passwordChangeErr'] ?></div>
        <?php
            unset($_SESSION['passwordChangeErr']);
        }
        if (isset($_SESSION['UpdateErrorMsg'])) { ?>
            <div class="alert alert-danger m-3"><?= $_SESSION['UpdateErrorMsg'] ?></div>
        <?php
            unset($_SESSION['UpdateErrorMsg']);
        }

        //if there is no errors then dispaly a success message
        if (isset($_SESSION['changeSuccessMsg'])) { ?>
            <div class="alert alert-success m-3"><?= $_SESSION['changeSuccessMsg'] ?></div>
        <?php
            unset($_SESSION['changeSuccessMsg']);
        }
        ?>
    </form>


    <?php
    //close connection with DB
    mysqli_close($conn);
    ?>

    <!--Javascript-->
    <script src="assets/js/projectDisplay.js"></script>
    <!-- bootstrap V5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>