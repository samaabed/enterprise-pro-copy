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

</head>

<body>
    <!-- navbar -->
    <?php require('includes/navbar.php'); ?>

    <!-- search bar to search for a researcher using staff number -->
    <div class="wrapper w-80 m-auto mb-5 mt-2">
        <div id="search-by-staff-number">
            <div class="row">
                <div class="col-md-7">
                    <form action="" method="GET">
                        <div class="input-group">
                            <div class="input-field" style="width:65%;">
                                <!-- input field for staff number -->
                                <input type="number" required name="search-staff-number" class="form-control mt-2 me-3 w-100" placeholder="Search for researcher using staff number" id="index-input" value="<?php if (isset($_GET['search-staff-number'])) {
                                                                                                                                                                                                                    echo $_GET['search-staff-number'];
                                                                                                                                                                                                                } ?>">
                                <!-- search button -->
                                <div class="search-btn">
                                    <button><i class="fas fa-search" style="font-size: 1.5em;"> </i> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- get method fetches data from database and displays in a table -->
                <div class="col-md-12">
                    <div class="card w-95 m-auto">
                        <div class="card-body table-responsive">
                            <table style="width:100%;" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Staff Number</th>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>PI in Projects:</th>
                                        <th>Co-I in Projects:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- admin can only search for researchers' details using their staff number -->
                                    <!-- when a specific staff number is entered, staff number, surname, forename and email of that researcher are displayed in the table -->
                                    <!-- also the projects in which the researcher participate will b shown -->
                                    <!-- if staff number does not exist in the database, 'no record found' displays in the table -->
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "enterprisepro");
                                    if (isset($_GET['search-staff-number'])) {
                                        //get staff number, surname, forename and email of the researcher
                                        $filtervalues = $_GET['search-staff-number'];
                                        $query = "SELECT * FROM researchers WHERE CONCAT(staff_number) = '$filtervalues' ";
                                        $query_run = mysqli_query($conn, $query);

                                        //get all projects in which the researcher participates as a PI
                                        $sql = "SELECT project_title FROM researchers_projects rp JOIN projects p
                                               ON rp.project_id = p.project_id
                                               WHERE staff_number = $filtervalues and type_of_staff = 'PI'";
                                        $query = mysqli_query($conn, $sql);
                                        $PiProjectsArray = mysqli_fetch_all($query);
                                        //convert all project titles into one string
                                        $PiProjectsString = "";
                                        foreach($PiProjectsArray as $project){
                                            $PiProjectsString = $PiProjectsString . $project[0] . ", ";
                                        }

                                        //get all projects in which the researcher participates as a Co-I
                                        $sql = "SELECT project_title FROM researchers_projects rp JOIN projects p
                                               ON rp.project_id = p.project_id
                                               WHERE staff_number = $filtervalues and type_of_staff = 'CO-I'";
                                        $query = mysqli_query($conn, $sql);
                                        $CoIProjectsArray = mysqli_fetch_all($query);
                                        //convert all project titles into one string
                                        $CoIProjectsString = "";
                                        foreach($CoIProjectsArray as $project){
                                            $CoIProjectsString = $CoIProjectsString . $project[0] . ", ";
                                        }




                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $items) {
                                    ?>
                                                <tr>
                                                    <td><?= $items['staff_number']; ?></td>
                                                    <td><?= $items['surename']; ?></td>
                                                    <td><?= $items['forename']; ?></td>
                                                    <td><?= $items['email']; ?></td>
                                                <?php } ?>
                                                    <td><?= $PiProjectsString ?></td>
                                                    <td><?= $CoIProjectsString ?></td>
                                                </tr>
                                            <?php

                                        } else {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                        <?php
                                        }
                                    }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- search bar to search for a project using its title -->
    <div class="wrapper w-80 m-auto mb-3">
        <div id="search-by-project-title">
            <div class="row">
                <div class="col-md-7">
                    <form action="" method="GET">
                        <div class="input-group">
                            <div class="input-field" style="width:65%;">
                                <!-- input field or title -->
                                <input type="text" required name="search-project-title" class="form-control mt-2 me-3 w-100" placeholder="Search for project using project title" id="index-input" value="<?php if (isset($_GET['search-project-title'])) {
                                                                                                                                                                                                                echo $_GET['search-project-title'];
                                                                                                                                                                                                            } ?>">
                                <!-- search button -->
                                <div class="search-btn">
                                    <button><i class="fas fa-search" style="font-size: 1.5em;"> </i> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- get method fetches data from database and displays in a table -->
                <div class="col-md-12">
                    <div style="width:100%;" class="card">
                        <div class="card-body table-responsive">
                            <table style="width:100%;" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Project ID</th>
                                        <th>Project Title</th>
                                        <th>Project Theme</th>
                                        <th>Bid Value</th>
                                        <th>Stage of Dveleopment</th>
                                        <th>Collaborators</th>
                                        <th>Funder</th>
                                        <th>Deadline</th>
                                        <th>Date of Submission</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- admin can only search for project details using their project title -->
                                    <!-- when specific project title entered, project id, title and theme display in the table -->
                                    <!-- if project title does not exist in the database, 'no record found' displays in the table -->
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "enterprisepro");


                                    if (isset($_GET['search-project-title'])) {
                                        $filtervalues = trim($_GET['search-project-title']);
                                        $query = "SELECT * FROM projects WHERE CONCAT(project_title) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $items) {
                                    ?>
                                                <tr>
                                                    <td><?= $items['project_id']; ?></td>
                                                    <td><?= $items['project_title']; ?></td>
                                                    <td><?= $items['project_theme']; ?></td>
                                                    <td><?= $items['bid_value']; ?></td>
                                                    <td><?= $items['stage_of_development']; ?></td>
                                                    <td><?= $items['collaborators']; ?></td>
                                                    <td><?= $items['funder']; ?></td>
                                                    <td><?= $items['deadline']; ?></td>
                                                    <td><?= $items['date_of_submission']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <!-- bootstrap V5.2 JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>