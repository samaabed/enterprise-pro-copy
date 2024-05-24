<?php
//CHECK IF ADMIN IS LOGGED IN HERE
//if admin is not logged in, redirect to prip.php page
session_start();
if(!isset($_SESSION['logged_in_staff_number'])){
    header('location: prip.php');
}

//connect to database
require('includes/dbconn.php');

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
    <!-- custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Inter'>

</head>

<body>
    <!-- navbar -->
    <?php require('includes/navbar.php') ?>


    <?php
    //get the current year (info from the currentyear will be dispalyed by default)
    $year = date('Y');
    //get the year entered by the user 
    if (isset($_GET['year'])) {
        if (!is_numeric($_GET['year'])) {
            $year = date('Y');
        } else {
            $year = $_GET['year'];
        }
    }
    ?>

    <!-- To select the year of submission -->
    <form method="GET">
        <div class="input-group flex-nowrap m-4 w-50">
            <span class="input-group-text">Enter the year you want<br> to display the PRIPs for:</span>
            <input type="number" class="form-control" name="year" value="<?= $year ?>">
            <input type="submit" value="GO" name="go" class="btn btn-dark">
        </div>
    </form>

    <!-- Accordion to view wach question and its answers -->
    <div class="accordion m-5" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; Referring back to the PRIP you completed last year please summarise what you have achieved against the plan.
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, no_of_published_papers_ly, no_of_grants_awarded_ly, no_of_grants_submitted_ly, no_of_phd_students_completed_ly, no_of_phd_students_recruited_ly from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }

                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td> <?= "Number of published papers: " . $value[2]
                                                . "<br>Number of grants awarded: " . $value[3]
                                                . "<br>Number of grants submitted: " . $value[4]
                                                . "<br>Number of PhD students completed: " . $value[5]
                                                . "<br>Number of PhD students recruited: " . $value[6]  ?> </td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; Please summarise any research and innovation activity completed in the last year and not included in your previous PRIP.
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, other_research_activity_ly from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; Reflecting on your answers above please summarise what helped and what hindered you.
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, what_helped_and_hindered_ly from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; How can the Faculty facilitate your plans to secure external income in the research and contract spaces?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, faculty_role from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; How does your research align with the Faculty research themes?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //get answers for the current year
                            $sql = "select forename, surname, how_research_align_with_themes from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; University/Faculty Research Grouping(s) to which you are currently affiliated.
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //get answers for the current year
                            $sql = "select forename, surname, research_groupings from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; In which areas do you intend to focus your research over the next five years, and why have you selected these areas?
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, research_focus_areas from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; Interdisciplinarity: with which other Faculties/Research Groupings do your plans align? Also how do you plan to engage with them (eg Joint funding, applications, publications etc)?
                </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, interdisciplinarity from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; With which companies/external organisations do you plan to engage? (please note individual contacts are not required)
                </button>
            </h2>
            <div id="collapseNine" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, external_organisations from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; What activities do you intend to undertake over the next five years to ensure your research has impact outside of academia?
                </button>
            </h2>
            <div id="collapseTen" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, next_5years_activities from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; How many bids do you plan in the next 5 years and to which funders?
                </button>
            </h2>
            <div id="collapse11" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, no_of_bids_next5years_ukri, no_of_bids_next5years_innovatuk, no_of_bids_next5years_horizant, other_bids_next5years from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }

                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td> <?=
                                            "UKRI: " . $value[2]
                                                . "<br>Innovat UK: " . $value[3]
                                                . "<br>Horizon Europe: " . $value[4]
                                                . "<br>Other: " . $value[5]  ?> </td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; Staffing/equipment: What new staffing and/or equipment will you require to achieve your plans?
                </button>
            </h2>
            <div id="collapse12" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, staffing_and_equipment from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; How many outputs(i.e papers, books, monographs etc) do you estimate that you will publish over the next 24 months?
                </button>
            </h2>
            <div id="collapse13" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, no_of_journal_papers_next24months, no_of_conference_papers_next24months, no_of_books_next24months, no_of_monographs_next24months, other_outputs_next24months from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }

                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td> <?= "Journal Papers: " . $value[2]
                                                . "<br>Conference Papers: " . $value[3]
                                                . "<br>Books: " . $value[4]
                                                . "<br>Monographs: " . $value[5]
                                                . "<br>Other: " . $value[6]  ?> </td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; How many PGRs do you currently supervise?
                </button>
            </h2>
            <div id="collapse14" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, no_of_pgrs_psv, no_of_pgrs_csv from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }

                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td> <?=
                                            "Principal Supervisor: " . $value[2]
                                                . "<br>Co-Supervisor: " . $value[3]
                                            ?> </td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; How many of your current PhD students are likely to complete over the next five years?
                </button>
            </h2>
            <div id="collapse15" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, no_of_phd_completed_next5years_psv, no_of_phd_completed_next5years_csv from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }

                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td> <?=
                                            "Principal Supervisor: " . $value[2]
                                                . "<br>Co-Supervisor: " . $value[3]
                                            ?> </td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; How many new PHD students do you intend to recruit over the next two years?
                </button>
            </h2>
            <div id="collapse16" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, no_of_phd_recruited_next2years_psv, no_of_phd_recruited_next2years_csv from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }

                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td> <?=
                                            "Principal Supervisor: " . $value[2]
                                                . "<br>Co-Supervisor: " . $value[3]
                                            ?> </td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="true" aria-controls="collapseOne">
                    &#x26AC; Please specify your IT requirements for the next two years - this should relate to infrastructure requirements and/or data storage.
                </button>
            </h2>
            <div id="collapse17" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table table-striped table-light table-hover mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //get answers for the current year
                            $sql = "select forename, surname, it_requirements_next2years from prips where year(submission_date) = $year";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $Answers = mysqli_fetch_all($query);
                            }


                            //if there is data, display it
                            if (isset($Answers))
                                foreach ($Answers as $value) {
                            ?>
                                <tr>
                                    <td> <?= $value[0] . " " . $value[1] ?> </td>
                                    <td><?= $value[2] ?></td>
                                </tr>
                            <?php
                                } //foreach
                            //if there is no data, dispaly "no data found"
                            else { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">No Data Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- bootstrap V5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>