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

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Inter'>

</head>

<body>
    <!-- navbar -->
    <?php
    require('includes/navbar.php');
    require('includes/dbconn.php');
    ?>

    <?php

    //get the current year (info from the currentyear will be dispalyed by default)
    $year = date('Y');
    //get the year entered by the user 
    if (isset($_GET['year'])) {
        $year = $_GET['year'];
    }

    //calculate the following:
    //total number of staff which is equal to the number of submitted prips.
    //total number of bids which is equal to the number of projects.
    //value of grants which is equal to the sum of bid_value column of the projects table.
    //total no of PIs
    $sqlQuery = "SELECT 
    (SELECT COUNT(*) FROM prips WHERE year(submission_date) = $year) AS totalStaff,
    (SELECT COUNT(*) FROM projects WHERE year(date_of_submission) = $year ) AS totalBids,
    (SELECT SUM(bid_value) FROM projects WHERE year(date_of_submission) = $year ) AS valueOfGrants,
    (SELECT COUNT(*) FROM researchers_projects WHERE type_of_staff = 'PI' AND year(submission_date) = $year) AS totalPI";

    $sqlQuery = mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_assoc($sqlQuery);

    //calculate the total number of publications
    $sql = "SELECT SUM(no_of_journal_papers_next24months), SUM(no_of_conference_papers_next24months),
    SUM(no_of_books_next24months), SUM(no_of_monographs_next24months)
    FROM prips WHERE year(submission_date) = $year";

    $query = mysqli_query($conn,$sql);

    $info = mysqli_fetch_row($query);

    $totalNoOfPublications = $info[0] + $info[1] + $info[2] + $info[3];

    ?>


    <h1 class="main-header">Summary</h1>

    <!-- admin chooses a year to display the summary fot it -->
    <form action="summary.php" method="GET">
        <div class="input-group flex-nowrap ms-5 w-50">
            <span class="input-group-text">Enter the year you want to show the summary for:</span>
            <input type="number" class="form-control" name="year" value="<?= $year ?>">
            <input type="submit" value="go" name="go" class="btn btn-dark">
        </div>
    </form>



    <!-- a table to view the summary -->
    <table class="table table-striped table-light table-hover table-formating mt-5">
        <thead>
            <tr>
                <th>Info</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total no of staff</td>
                <td><?= $row["totalStaff"] ?></td>
            </tr>

            <tr>
                <td>Total no of bids</td>
                <td><?= $row["totalBids"] ?></td>
            </tr>

            <tr>
                <td>Value of grants</td>
                <td><?= $row["valueOfGrants"] ?> &#163;</td>
            </tr>

            <tr>
                <td>Total no of possible PIs</td>
                <td><?= $row["totalPI"] ?></td>
            </tr>

            <tr>
                <td>Total no of Publications<br>(next 24 months)</td>
                <td><?= $totalNoOfPublications ?></td>
            </tr>

            <tr>
                <td>No of Publications in Detail<br>(next 24 months)</td>
                <td><?= "Journal Papers: $info[0] <br>
                         Conference Papers: $info[1] <br>
                         Books: $info[2] <br>
                         Monographs: $info[3]" ?></td>
            </tr>
        </tbody>

    </table>

    <!-- bootstrap V5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="assets/js/jscript.js"></script>

    <script>

    </script>
</body>