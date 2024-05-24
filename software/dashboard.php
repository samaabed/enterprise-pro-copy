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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Inter'>

</head>

<body>

    <!-- navbar -->
    <?php require ('includes/navbar.php') ?>

    <!-- page content -->
    <h1 class="main-header">Admin Dashboard</h1>
    <!-- four cards to show the four research themes and a button that links to
     the projects in each theme -->
    <div class="theme-cards">
        <div class="card text-bg-light mb-3" style="width: 18rem;">
            <div class="card-header">Theme 1</div>
            <div class="card-body">
                <h5 class="card-title">Healthcare Technology Innovation</h5>
                <a class="btn btn-secondary" id="healthcare-btn" onclick="executePHP(this.id)">View Projects In This
                    Theme</a>
            </div>
        </div>

        <div class="card text-bg-light mb-3" style="width: 18rem;">
            <div class="card-header">Theme 2</div>
            <div class="card-body">
                <h5 class="card-title">Smart Industrial Systems</h5>
                <a class="btn btn-secondary mt-3" id="smart-btn" onclick="executePHP(this.id)">View Projects In This
                    Theme</a>
            </div>
        </div>
    </div>

    <div class="theme-cards">
        <div class="card text-bg-light mb-3" style="width: 18rem;">
            <div class="card-header">Theme 3</div>
            <div class="card-body">
                <h5 class="card-title">Advanced Materials</h5>
                <a class="btn btn-secondary" id="advanced-btn" onclick="executePHP(this.id)">View Projects In This
                    Theme</a>
            </div>
        </div>

        <div class="card text-bg-light mb-3" style="width: 18rem;">
            <div class="card-header">Theme 4</div>
            <div class="card-body">
                <h5 class="card-title">Sustainable Environments</h5>
                <a class="btn btn-secondary" id="sustainable-btn" onclick="executePHP(this.id)">View Projects In This
                    Theme</a>
            </div>
        </div>

    </div>

    <!--Javascript-->
    <script src="assets/js/projectDisplay.js"></script>

    <!-- bootstrap V5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>