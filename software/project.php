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

    <div class="allButFooter ">
        <!-- navbar -->
        <?php require('includes/navbar.php') ?>

        <!-- page content -->
        <table class="table table-striped table-light table-hover table-formating  mt-5">
            <thead>
                <tr>
                    <th scope="col">Info</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody id="project-table">
                <tr>
                    <th scope="row">Project Title</th>
                    <td id="title"></td>
                </tr>

                <tr>
                    <th scope="row">Project Theme</th>
                    <td id="theme"></td>
                </tr>

                <tr>
                    <th scope="row">Bid value</th>
                    <td id="bid">&#163;</td>
                </tr>

                <tr>
                    <th scope="row">Stage of Development</th>
                    <td id="stage"></td>
                </tr>

                <tr>
                    <th scope="row">Collaborators</th>
                    <td id="collaborators"></td>
                </tr>

                <tr>
                    <th scope="row">PI</th>
                    <td><a id="PI" href="#"></a></td>
                </tr>

                <tr>
                    <th scope="row">CO-Is</th>
                    <td id="CO-I">
                    </td>
                </tr>


                <tr>
                    <th scope="row">Funder</th>
                    <td id="funder"></td>
                </tr>

                <tr>
                    <th scope="row">Target timelines/submission deadline</th>
                    <td id="deadline-date"></td>
                </tr>

                <tr>
                    <th scope="row">Date of submitting this Info</th>
                    <td id="submission-date"></td>
                </tr>


            </tbody>
        </table>






    </div>



    <!--Javascript-->
    <script src="assets/js/projectDisplay.js">
    </script>

    <script>
        fillProject();
    </script>

    <!-- bootstrap V5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>