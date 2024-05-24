<?php
require "includes/dbconn.php";
session_start();
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
    <!-- navbar -->
    <nav class="navbar bg-body-tertiary p-3" style="background-color:#404040">
        <a class="navbar-brand" href="#">
            <img src="assets/images/university-of-bradford-white-logo.png" width="200" height="50">
        </a>

        <!-- a button for admin to login -->
        <a href="index.php" class="btn btn-light">Admin Login</a>
    </nav>

    <div class="form-container">
        <div class="form-box">
            <div class="form-top">
                <h1>Welcome...</h1>
                <p class="mt-2">Please answer the following questions to describe your <b>Personal Research & Innovation Plan </b> for the current year.</p>
                <div class="line"></div>

                <!-- to dispaly an error if there was a probelm in storing the form data -->
                <div style="color:red;">
                    <?php
                    if (isset($_SESSION['insertError']))
                        echo  $_SESSION['insertError'];
                    unset($_SESSION['insertError']);
                    ?></div>
            </div>

            <!-- user needs to fill this form -->
            <form id="prip-form" action="includes/formHandler.php" method="POST">
                <div class="form-content">
                    <!--Each individual section/page-->
                    <div class="page" id="section-1-page-1">

                        <p>&#x26AC; Staff number</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <input type="number" name="staffNumber" value="<?php if (!empty($_SESSION['staffNumber'])) {
                                                                                echo $_SESSION['staffNumber'];
                                                                            }
                                                                            unset($_SESSION['staffNumber']); ?>">
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['numberErr'])) { ?>
                            <div class="error"> <?= $_SESSION['numberErr'] ?> </div>
                        <?php
                            unset($_SESSION['numberErr']);
                        }
                        ?>

                        <p>&#x26AC; Surname</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <input type="text" name="surename" value="<?php if (!empty($_SESSION['surename'])) {
                                                                            echo $_SESSION['surename'];
                                                                        }
                                                                        unset($_SESSION['surename']); ?>">
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['snameErr'])) { ?>
                            <div class="error"> <?= $_SESSION['snameErr'] ?> </div>
                        <?php
                            unset($_SESSION['snameErr']);
                        }
                        ?>

                        <p>&#x26AC; Forname</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <input type="text" name="forename" value="<?php if (!empty($_SESSION['forename'])) {
                                                                            echo $_SESSION['forename'];
                                                                        }
                                                                        unset($_SESSION['forename']); ?>">
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['forenameErr'])) { ?>
                            <div class="error"> <?= $_SESSION['forenameErr'] ?> </div>
                        <?php
                            unset($_SESSION['forenameErr']);
                        }
                        ?>

                        <p>&#x26AC; University e-mail address - Please ensure this is in the correct format e.g. m.abbas@bradford.ac.uk</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <input type="email" name="email" value="<?php if (!empty($_SESSION['email'])) {
                                                                        echo $_SESSION['email'];
                                                                    }
                                                                    unset($_SESSION['email']); ?>">
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['emailErr'])) { ?>
                            <div class="error"> <?= $_SESSION['emailErr'] ?> </div>
                        <?php
                            unset($_SESSION['emailErr']);
                        }
                        ?>

                        <!-- Q1 -->
                        <p>&#x26AC; Referring back to the PRIP you completed last year please summarise what you have achieved against the plan.
                            If you did not complete a PRIP, leave the fields empty.</p>
                        <div class="multiple-fields-Q">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q1'])) {
                                $Q1Errs = $_SESSION['Q1'];
                            }
                            unset($_SESSION['Q1']); ?>
                            <div> <label>Number of published papers</label> <input type="number" name="papersNo" value="<?php if (isset($Q1Errs)) {
                                                                                                                            echo $Q1Errs[0];
                                                                                                                        }
                                                                                                                        ?>"> </div>
                            <div> <label>Number of grants awarded</label> <input type="number" name="grantsAwardedNo" value="<?php if (!empty($Q1Errs)) {
                                                                                                                                    echo $Q1Errs[1];
                                                                                                                                }
                                                                                                                                ?>"> </div>
                            <div> <label>Number of grants submitted</label> <input type="number" name="grantsSubmittedNo" value="<?php if (!empty($Q1Errs)) {
                                                                                                                                        echo $Q1Errs[2];
                                                                                                                                    }
                                                                                                                                    ?>"> </div>
                            <div> <label>Number of PhD students completed</label> <input type="number" name="completedPhdNo" value="<?php if (!empty($Q1Errs)) {
                                                                                                                                        echo $Q1Errs[3];
                                                                                                                                    }
                                                                                                                                    ?>"> </div>
                            <div> <label>Number of PhD students recruited</label> <input type="number" name="recruitedPhdNo" value="<?php if (!empty($Q1Errs)) {
                                                                                                                                        echo $Q1Errs[4];
                                                                                                                                    }
                                                                                                                                    ?>"> </div>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q1Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q1Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q1Err']);
                        }
                        ?>
                    </div>

                    <!-- Q2 -->
                    <div class="page" id="section-1-page-1-q6+7">
                        <p>&#x26AC; Please summarise any research and innovation activity completed in the last year and not included in your previous PRIP. </p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder="Your answer must not exceed 250 words." name="Q2"><?php if (!empty($_SESSION['Q2'])) {
                                                                                                            echo $_SESSION['Q2'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q2']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q2Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q2Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q2Err']);
                        }
                        ?>

                        <!-- Q3 -->
                        <p>&#x26AC; Reflecting on your answers above please summarise what helped and what hindered you. </p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder="Your answer must not exceed 250 words." name="Q3"><?php if (!empty($_SESSION['Q3'])) {
                                                                                                            echo $_SESSION['Q3'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q3']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q3Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q3Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q3Err']);
                        }
                        ?>

                        <!-- Q4 -->
                        <p>&#x26AC; How can the Faculty facilitate your plans to secure external income in the research and contract spaces? </p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder="Your answer must not exceed 250 words." name="Q4"><?php if (!empty($_SESSION['Q4'])) {
                                                                                                            echo $_SESSION['Q4'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q4']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q4Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q4Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q4Err']);
                        }
                        ?>

                        <!-- Q5 -->
                        <p>&#x26AC; How does your research align with the Faculty research themes? </p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder="Your answer must not exceed 250 words." name="Q5"><?php if (!empty($_SESSION['Q5'])) {
                                                                                                            echo $_SESSION['Q5'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q5']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q5Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q5Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q5Err']);
                        }
                        ?>

                        <!-- Q6 -->
                        <p>&#x26AC; University/Faculty Research Grouping(s) to which you are currently affiliated. </p>
                        <div class="multiple-fields-Q">
                            <div style="justify-content: normal"> <input type="checkbox" name="ResearchGroupings[]" id="option1" value="option1"> Healthcare Technology Innovation <br> </div>
                            <div style="justify-content: normal"> <input type="checkbox" name="ResearchGroupings[]" id="option2" value="option2"> Smart Industrial Systems <br> </div>
                            <div style="justify-content: normal"> <input type="checkbox" name="ResearchGroupings[]" id="option3" value="option3"> Advanced Materials <br> </div>
                            <div style="justify-content: normal"> <input type="checkbox" name="ResearchGroupings[]" id="option4" value="option4"> Sustainable Environments <br> </div>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q6Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q6Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q6Err']);
                        }
                        ?>
                    </div>

                    <!-- Q7 -->
                    <div class="page" id="section-2-page-1">
                        <p>&#x26AC; In which areas do you intend to focus your research over the next five years, and why have you selected these areas?</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder=" Your answer must not exceed 250 words." name="Q7"><?php if (!empty($_SESSION['Q7'])) {
                                                                                                            echo $_SESSION['Q7'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q7']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any

                        if (isset($_SESSION['Q7Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q7Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q7Err']);
                        }
                        ?>

                        <!-- Q8 -->
                        <p>&#x26AC; Interdisciplinarity: with which other Faculties/Research Groupings do your plans align? Also how do you plan to engage with them (eg Joint funding, applications, publications etc)?</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder=" Your answer must not exceed 250 words." name="Q8"><?php if (!empty($_SESSION['Q8'])) {
                                                                                                            echo $_SESSION['Q8'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q8']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q8Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q8Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q8Err']);
                        }
                        ?>

                        <!-- Q9 -->
                        <p>&#x26AC; With which companies/external organisations do you plan to engage? (please note individual contacts are not required)</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder=" Your answer must not exceed 250 words." name="Q9"><?php if (!empty($_SESSION['Q9'])) {
                                                                                                            echo $_SESSION['Q9'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q9']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q9Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q9Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q9Err']);
                        }
                        ?>

                        <!-- Q10 -->
                        <p>&#x26AC; What activities do you intend to undertake over the next five years to ensure your research has impact outside of academia?</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder=" Your answer must not exceed 250 words." name="Q10"><?php if (!empty($_SESSION['Q10'])) {
                                                                                                            echo $_SESSION['Q10'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q10']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q10Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q10Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q10Err']);
                        }
                        ?>

                        <!-- Q11 -->
                        <p>&#x26AC; How many bids do you plan in the next 5 years and to which funders?</p>
                        <div class="multiple-fields-Q">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q11'])) {
                                $Q11Errs = $_SESSION['Q11'];
                            }
                            unset($_SESSION['Q11']); ?>
                            <div> <label>UKRI</label> <input type="number" name="ukriBids" value="<?php if (isset($Q11Errs)) {
                                                                                                        echo $Q11Errs[0];
                                                                                                    }
                                                                                                    ?>"> </div>
                            <div> <label>Innovate UK</label> <input type="number" name="innovateBids" value="<?php if (isset($Q11Errs)) {
                                                                                                                    echo $Q11Errs[1];
                                                                                                                }
                                                                                                                ?>"> </div>
                            <div> <label>Horizon Europe</label> <input type="number" name="horizonBids" value="<?php if (isset($Q11Errs)) {
                                                                                                                    echo $Q11Errs[2];
                                                                                                                }
                                                                                                                ?>"> </div>
                            <label>Other:</label>
                            <div class="input-field">
                                <textarea name="otherBids"><?php if (isset($Q11Errs)) {
                                                                echo $Q11Errs[3];
                                                            }
                                                            ?></textarea>
                            </div>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q11Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q11Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q11Err']);
                        }
                        ?>

                        <!-- Q12 Project1 -->
                        <p>&#x26AC; Please outline details of projects you have under development / planned for
                            submission up to December next year – Project 1</p>
                        <div class="project-info">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q12P1'])) {
                                $Q12P1Errs = $_SESSION['Q12P1'];
                            }
                            unset($_SESSION['Q12P1']); ?>

                            <!-- the user has to select if they are a PI or Co-I in the project -->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">Are you a PI or a CO-I in this project?</span>
                                <select name="resType1" class="form-select" id="researcherType1" onchange="showDetails('researcherType1','project-field1','piTitle1','coiTitle1')">
                                    <option value="1">PI</option>
                                    <option value="2" selected>CO-I</option>
                                </select>
                            </div>

                            <!-- this field is for the PI to enter the title of a new project -->
                            <div id="piTitle1" style="display: none;">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Title for project 1</span>
                                    <input type="text" class="form-control" name="proTitle1PI" value="<?php if (isset($Q12P1Errs)) {
                                                                                                            echo $Q12P1Errs[0];
                                                                                                        }
                                                                                                        ?>">
                                </div>
                            </div>

                            <?php
                            //get all titles of the current year projects, so
                            //that the CO-I can choose one of them
                            $currentYear = date("Y");
                            $sql = "SELECT project_title FROM projects 
                                    WHERE year(date_of_submission) = $currentYear";
                            $query = mysqli_query($conn, $sql);
                            $allTitles = mysqli_fetch_all($query);
                            ?>
                            <!-- this field is for a Co-I to choose form exsiting projects -->
                            <div id="coiTitle1">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Title for project 1</span>
                                    <select name="proTitle1COI" class="form-control">
                                        <?php
                                        foreach ($allTitles as $title) { ?>
                                            <option><?= $title[0] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <p style="font-size:smaller">*When You're a CO-I You Can Only Be Added to an Existing Project</p>
                            </div>

                            <!-- field for bid value of the project -->
                            <div class="input-group flex-nowrap project-field1" style="display: none;">
                                <span class="input-group-text">Bid value</span>
                                <input name="bidValue1" type="number" class="form-control" value="<?php if (isset($Q12P1Errs)) {
                                                                                                        echo $Q12P1Errs[1];
                                                                                                    }
                                                                                                    ?>">
                            </div>

                            <!-- field for stage of development of the project -->
                            <div class="input-group flex-nowrap project-field1" style="display: none;">
                                <span class="input-group-text">Stage of Development for Project 1</span>
                                <input type="text" class="form-control" name="stageOfDev1" value="<?php if (isset($Q12P1Errs)) {
                                                                                                        echo $Q12P1Errs[2];
                                                                                                    }
                                                                                                    ?>">
                            </div>

                            <!-- field to select the theme of the project -->
                            <div style="display: none;" class="input-group flex-nowrap project-field1">
                                <span class="input-group-text">Select project theme</span>
                                <select class="form-select" name="proTheme1">
                                    <option value="1" selected>Advanced Materials</option>
                                    <option value="2">Sustainable Environments</option>
                                    <option value="3">Smart Industrial Systems</option>
                                    <option value="4">Healthcare Technology Innovation</option>
                                </select>
                            </div>

                            <!-- field to enter the collaborators of the project -->
                            <div class="input-group flex-nowrap project-field1" style="display: none;">
                                <span class="input-group-text">Collaborator(s) for Project 1</span>
                                <input type="text" class="form-control" name="proCollaborators1" value="<?php if (isset($Q12P1Errs)) {
                                                                                                            echo $Q12P1Errs[3];
                                                                                                        }
                                                                                                        ?>">
                            </div>

                            <!-- field to enter the funder of the project -->
                            <div class="input-group flex-nowrap project-field1" style="display: none;">
                                <span class="input-group-text">Funder for Project 1 (incl URL & calldetails)</span>
                                <textarea class="form-control" name="proFunder1"><?php if (isset($Q12P1Errs)) {
                                                                                        echo $Q12P1Errs[4];
                                                                                    }
                                                                                    ?></textarea>
                            </div>

                            <!-- field to enter the deadline of the project -->
                            <div class="input-group flex-nowrap project-field1" style="display: none;">
                                <span class="input-group-text">Target timelines/submission deadline for Project 1</span>
                                <input type="date" class="form-control" name="proDeadline1">
                            </div>
                        </div>
                        <?php
                        //display the errors for this question if there is any
                        if (isset($_SESSION['Q12P1Err'])) {
                            foreach ($_SESSION['Q12P1Err'] as $err) { ?>
                                <div class="error"> <?= $err ?> </div>
                        <?php
                            }
                            unset($_SESSION['Q12P1Err']);
                        }
                        ?>


                        <!-- Q12 Project2 -->
                        <p class="mt-3">&#x26AC; Please outline details of projects you have under development / planned for
                            submission up to December next year – Project 2 <b>(If you don't have other projects, tick the "I don't have other projects" box.)</b></p>
                        <div style="text-align: left;"><input type="checkbox" name="noOtherProjects2" id="box1"> <label for="box1"> I don't have other projects.</label></div>
                        <div class="project-info">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q12P2'])) {
                                $Q12P2Errs = $_SESSION['Q12P2'];
                            }
                            unset($_SESSION['Q12P2']); ?>

                            <!-- the user has to select if they are a PI or Co-I in the project -->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">Are you a PI or a CO-I in this project?</span>
                                <select class="form-select" id="researcherType2" name="resType2" onchange="showDetails('researcherType2','project-field2','piTitle2','coiTitle2')">
                                    <option value="1">PI</option>
                                    <option value="2" selected>CO-I</option>
                                </select>
                            </div>

                            <!-- this field is for the PI to enter the title of a new project -->
                            <div id="piTitle2" style="display: none;">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Title for project 2</span>
                                    <input type="text" class="form-control" name="proTitle2PI" value="<?php if (isset($Q12P2Errs)) {
                                                                                                            echo $Q12P2Errs[0];
                                                                                                        }
                                                                                                        ?>">
                                </div>
                            </div>

                            <!-- this field is for a Co-I to choose form exsiting projects -->
                            <div id="coiTitle2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Title for project 2</span>
                                    <select name="proTitle2COI" class="form-control">
                                        <?php
                                        //titles of the current year's projects were fetched previously
                                        foreach ($allTitles as $title) { ?>
                                            <option><?= $title[0] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <p style="font-size:smaller">*When You're a CO-I You Can Only Be Added to an Existing Project</p>
                            </div>

                            <!-- field for bid value of the project -->
                            <div class="input-group flex-nowrap project-field2" style="display: none;">
                                <span class="input-group-text">Bid value</span>
                                <input type="number" class="form-control" name="bidValue2" value="<?php if (isset($Q12P2Errs)) {
                                                                                                        echo $Q12P2Errs[1];
                                                                                                    }
                                                                                                    ?>">
                            </div>

                            <!-- field for stage of development of the project -->
                            <div class="input-group flex-nowrap project-field2" style="display: none;">
                                <span class="input-group-text">Stage of Development for Project 2</span>
                                <input type="text" class="form-control" name="stageOfDev2" value="<?php if (isset($Q12P2Errs)) {
                                                                                                        echo $Q12P2Errs[2];
                                                                                                    }
                                                                                                    ?>">
                            </div>

                            <!-- field to select the theme of the project -->
                            <div style="display: none;" class="input-group flex-nowrap project-field2">
                                <span class="input-group-text">Select project theme</span>
                                <select class="form-select" name="proTheme2">
                                    <option value="1" selected>Advanced Materials</option>
                                    <option value="2">Sustainable Environments</option>
                                    <option value="3">Smart Industrial Systems</option>
                                    <option value="4">Healthcare Technology Innovation</option>
                                </select>
                            </div>

                            <!-- field to enter the collaborators of the project -->
                            <div class="input-group flex-nowrap project-field2" style="display: none;">
                                <span class="input-group-text">Collaborator(s) for Project 2</span>
                                <input type="text" class="form-control" name="proCollaborators2" value="<?php if (isset($Q12P2Errs)) {
                                                                                                            echo $Q12P2Errs[3];
                                                                                                        }
                                                                                                        ?>">
                            </div>

                            <!-- field to enter the funder of the project -->
                            <div class="input-group flex-nowrap project-field2" style="display: none;">
                                <span class="input-group-text">Funder for Project 2 (incl URL & calldetails)</span>
                                <textarea class="form-control" name="proFunder2"><?php if (isset($Q12P2Errs)) {
                                                                                        echo $Q12P2Errs[4];
                                                                                    }
                                                                                    ?></textarea>
                            </div>

                            <!-- field to enter the deadline of the project -->
                            <div class="input-group flex-nowrap project-field2" style="display: none;">
                                <span class="input-group-text">Target timelines/submission deadline for Project 2</span>
                                <input type="date" class="form-control" name="proDeadline2">
                            </div>
                        </div>
                        <?php
                        //dispaly error for this question if there is any
                        if (isset($_SESSION['Q12P2Err'])) {
                            foreach ($_SESSION['Q12P2Err'] as $err) { ?>
                                <div class="error"> <?= $err ?> </div>
                        <?php
                            }
                            unset($_SESSION['Q12P2Err']);
                        }
                        ?>

                        <!-- Q12 Project3 -->
                        <p class="mt-3">&#x26AC; Please outline details of projects you have under development / planned for
                            submission up to December next year – Project 3 <b>(If you don't have other projects, tick the "I don't have other projects" box.)</b></p>
                        <div style="text-align: left;"><input type="checkbox" name="noOtherProjects3" id="box2"> <label for="box2"> I don't have other projects.</label></div>
                        <div class="project-info">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q12P3'])) {
                                $Q12P3Errs = $_SESSION['Q12P3'];
                            }
                            unset($_SESSION['Q12P3']); ?>
                            <div class="input-group flex-nowrap">
                                <!-- the user has to select if they are a PI or Co-I in the project -->
                                <span class="input-group-text">Are you a PI or a CO-I in this project?</span>
                                <select class="form-select" name="resType3" id="researcherType3" onchange="showDetails('researcherType3','project-field3','piTitle3','coiTitle3')">
                                    <option value="1">PI</option>
                                    <option value="2" selected>CO-I</option>
                                </select>
                            </div>

                            <!-- this field is for the PI to enter the title of a new project -->
                            <div id="piTitle3" style="display: none;">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Title for project 3</span>
                                    <input type="text" class="form-control" name="proTitle3PI" value="<?php if (isset($Q12P3Errs)) {
                                                                                                            echo $Q12P3Errs[0];
                                                                                                        }
                                                                                                        ?>">
                                </div>
                            </div>

                            <!-- this field is for a Co-I to choose form exsiting projects -->
                            <div id="coiTitle3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Title for project 3</span>
                                    <select name="proTitle3COI" class="form-control">
                                        <?php
                                        //titles of the current year's projects were fetched previously
                                        foreach ($allTitles as $title) { ?>
                                            <option><?= $title[0] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <p style="font-size:smaller">*When You're a CO-I You Can Only Be Added to an Existing Project</p>
                            </div>

                            <!-- field for bid value of the project -->
                            <div class="input-group flex-nowrap project-field3" style="display: none;">
                                <span class="input-group-text">Bid value</span>
                                <input type="number" class="form-control" name="bidValue3" value="<?php if (isset($Q12P3Errs)) {
                                                                                                        echo $Q12P3Errs[1];
                                                                                                    }
                                                                                                    ?>">
                            </div>

                            <!-- field for stage of development of the project -->
                            <div class="input-group flex-nowrap project-field3" style="display: none;">
                                <span class="input-group-text">Stage of Development for Project 3</span>
                                <input type="text" class="form-control" name="stageOfDev3" value="<?php if (isset($Q12P3Errs)) {
                                                                                                        echo $Q12P3Errs[2];
                                                                                                    }
                                                                                                    ?>">
                            </div>

                            <!-- field to select the theme of the project -->
                            <div style="display: none;" class="input-group flex-nowrap project-field3">
                                <span class="input-group-text">Select project theme</span>
                                <select class="form-select" name="proTheme3">
                                    <option value="1" selected>Advanced Materials</option>
                                    <option value="2">Sustainable Environments</option>
                                    <option value="3">Smart Industrial Systems</option>
                                    <option value="4">Healthcare Technology Innovation</option>
                                </select>
                            </div>

                            <!-- field to enter the collaborators of the project -->
                            <div class="input-group flex-nowrap project-field3" style="display: none;">
                                <span class="input-group-text">Collaborator(s) for Project 3</span>
                                <input type="text" class="form-control" name="proCollaborators3" value="<?php if (isset($Q12P3Errs)) {
                                                                                                            echo $Q12P3Errs[3];
                                                                                                        }
                                                                                                        ?>">
                            </div>

                            <!-- field to enter the funder of the project -->
                            <div class="input-group flex-nowrap project-field3" style="display: none;">
                                <span class="input-group-text">Funder for Project 3 (incl URL & calldetails)</span>
                                <textarea class="form-control" name="proFunder3"><?php if (isset($Q12P3Errs)) {
                                                                                        echo $Q12P3Errs[4];
                                                                                    }
                                                                                    ?></textarea>
                            </div>

                            <!-- field to enter the deadline of the project -->
                            <div class="input-group flex-nowrap project-field3" style="display: none;">
                                <span class="input-group-text">Target timelines/submission deadline for Project 3</span>
                                <input type="date" class="form-control" name="proDeadline3">
                            </div>
                        </div>
                        <?php
                        //display errors for this question if they exist
                        if (isset($_SESSION['Q12P3Err'])) {
                            foreach ($_SESSION['Q12P3Err'] as $err) { ?>
                                <div class="error"> <?= $err ?> </div>
                        <?php
                            }
                            unset($_SESSION['Q12P3Err']);
                        }
                        ?>


                        <!-- Q12 Project4 -->
                        <p class="mt-3">&#x26AC; Please outline details of projects you have under development / planned for
                            submission up to December next year – Project 4 <b>(If you don't have other projects, , tick the "I don't have other projects" box.)</b></p>
                        <div style="text-align: left;"><input type="checkbox" name="noOtherProjects4" id="box3"> <label for="box3"> I don't have other projects.</label></div>
                        <div class="project-info">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q12P4'])) {
                                $Q12P4Errs = $_SESSION['Q12P4'];
                            }
                            unset($_SESSION['Q12P4']); ?>

                            <!-- the user has to select if they are a PI or Co-I in the project -->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">Are you a PI or a CO-I in this project?</span>
                                <select class="form-select" id="researcherType4" name="resType4" onchange="showDetails('researcherType4','project-field4','piTitle4','coiTitle4')">
                                    <option value="1">PI</option>
                                    <option value="2" selected>CO-I</option>
                                </select>
                            </div>

                            <!-- this field is for the PI to enter the title of a new project -->
                            <div id="piTitle4" style="display: none;">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Title for project 4</span>
                                    <input type="text" class="form-control" name="proTitle4PI" value="<?php if (isset($Q12P4Errs)) {
                                                                                                            echo $Q12P4Errs[0];
                                                                                                        }
                                                                                                        ?>">
                                </div>
                            </div>

                            <!-- this field is for a Co-I to choose form exsiting projects -->
                            <div id="coiTitle4">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">Title for project 4</span>
                                    <select name="proTitle4COI" class="form-control">
                                        <?php
                                        //titles of the current year's projects were fetched previously
                                        foreach ($allTitles as $title) { ?>
                                            <option><?= $title[0] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <p style="font-size:smaller">*When You're a CO-I You Can Only Be Added to an Existing Project</p>
                            </div>

                            <!-- field for bid value of the project -->
                            <div class="input-group flex-nowrap project-field4" style="display: none;">
                                <span class="input-group-text">Bid value</span>
                                <input type="number" class="form-control" name="bidValue4" value="<?php if (isset($Q12P4Errs)) {
                                                                                                        echo $Q12P4Errs[1];
                                                                                                    }
                                                                                                    ?>">
                            </div>

                            <!-- field for stage of development of the project -->
                            <div class="input-group flex-nowrap project-field4" style="display: none;">
                                <span class="input-group-text">Stage of Development for Project 4</span>
                                <input type="text" class="form-control" name="stageOfDev4" value="<?php if (isset($Q12P4Errs)) {
                                                                                                        echo $Q12P4Errs[2];
                                                                                                    }
                                                                                                    ?>">
                            </div>

                            <!-- field to select the theme of the project -->
                            <div style="display: none;" class="input-group flex-nowrap project-field4">
                                <span class="input-group-text">Select project theme</span>
                                <select class="form-select" name="proTheme4">
                                    <option value="1" selected>Advanced Materials</option>
                                    <option value="2">Sustainable Environments</option>
                                    <option value="3">Smart Industrial Systems</option>
                                    <option value="4">Healthcare Technology Innovation</option>
                                </select>
                            </div>

                            <!-- field to enter the collaborators of the project -->
                            <div class="input-group flex-nowrap project-field4" style="display: none;">
                                <span class="input-group-text">Collaborator(s) for Project 4</span>
                                <input type="text" class="form-control" name="proCollaborators4" value="<?php if (isset($Q12P4Errs)) {
                                                                                                            echo $Q12P4Errs[3];
                                                                                                        }
                                                                                                        ?>">
                            </div>

                            <!-- field to enter the funder of the project -->
                            <div class="input-group flex-nowrap project-field4" style="display: none;">
                                <span class="input-group-text">Funder for Project 4 (incl URL & calldetails)</span>
                                <textarea class="form-control" name="proFunder4"><?php if (isset($Q12P4Errs)) {
                                                                                        echo $Q12P4Errs[4];
                                                                                    }
                                                                                    ?></textarea>
                            </div>

                            <!-- field to enter the deadline of the project -->
                            <div class="input-group flex-nowrap project-field4" style="display: none;">
                                <span class="input-group-text">Target timelines/submission deadline for Project 4</span>
                                <input type="date" class="form-control" name="proDeadline4">
                            </div>
                        </div>
                        <?php
                        //display errors for this question if ther is any
                        if (isset($_SESSION['Q12P4Err'])) {
                            foreach ($_SESSION['Q12P4Err'] as $err) { ?>
                                <div class="error"> <?= $err ?> </div>
                        <?php
                            }
                            unset($_SESSION['Q12P4Err']);
                        }
                        ?>

                        <!-- Q13 -->
                        <p>&#x26AC; Staffing/equipment: What new staffing and/or equipment will you require to achieve your plans?</p>
                        <div class="input-field">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <textarea placeholder=" Your answer must not exceed 250 words." name="Q13"><?php if (!empty($_SESSION['Q13'])) {
                                                                                                            echo $_SESSION['Q13'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q13']); ?></textarea>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q13Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q13Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q13Err']);
                        }
                        ?>

                    </div>

                    <div class="page" id="section-1-page-3">
                        <!-- Q14 -->
                        <p>&#x26AC; How many outputs(i.e papers, books, monographs etc) do you estimate that you will publish over the next 24 months?</p>
                        <div class="multiple-fields-Q">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q14'])) {
                                $Q14Errs = $_SESSION['Q14'];
                            }
                            unset($_SESSION['Q14']); ?>
                            <div><label>Journal Papers</label> <input type="number" name="jornalPapersNo" value="<?php if (isset($Q14Errs)) {
                                                                                                                        echo $Q14Errs[0];
                                                                                                                    }
                                                                                                                    ?>"></div>
                            <div><label>Conference Papers</label> <input type="number" name="conferencePapersNo" value="<?php if (isset($Q14Errs)) {
                                                                                                                            echo $Q14Errs[1];
                                                                                                                        }
                                                                                                                        ?>"></div>
                            <div><label>Books</label> <input type="number" name="booksNo" value="<?php if (isset($Q14Errs)) {
                                                                                                        echo $Q14Errs[2];
                                                                                                    }
                                                                                                    ?>"></div>
                            <div><label>Monographs</label> <input type="number" name="monographsNo" value="<?php if (isset($Q14Errs)) {
                                                                                                                echo $Q14Errs[3];
                                                                                                            }
                                                                                                            ?>"></div>
                            <label>Other:</label>
                            <div class="input-field">
                                <textarea name="otherOutputs"><?php if (isset($Q14Errs)) {
                                                                    echo $Q14Errs[4];
                                                                }
                                                                ?></textarea>
                            </div>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q14Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q14Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q14Err']);
                        }
                        ?>

                        <!-- Q15 -->
                        <p>&#x26AC; How many PGRs do you currently supervise?</p>
                        <div class="multiple-fields-Q">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q15'])) {
                                $Q15Errs = $_SESSION['Q15'];
                            }
                            unset($_SESSION['Q15']); ?>
                            <div><label>Principal Supervisor</label> <input type="number" name="Q15psv" value="<?php if (isset($Q15Errs)) {
                                                                                                                    echo $Q15Errs[0];
                                                                                                                }
                                                                                                                ?>"> </div>
                            <div><label>Co-Supervisor</label> <input type="number" name="Q15csv" value="<?php if (isset($Q15Errs)) {
                                                                                                            echo $Q15Errs[1];
                                                                                                        }
                                                                                                        ?>"> </div>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q15Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q15Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q15Err']);
                        }
                        ?>

                        <!-- Q16 -->
                        <p>&#x26AC; How many of your current PhD students are likely to complete over the next five years?</p>
                        <div class="multiple-fields-Q">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q16'])) {
                                $Q16Errs = $_SESSION['Q16'];
                            }
                            unset($_SESSION['Q16']); ?>
                            <div><label>Principal Supervisor</label> <input type="number" name="Q16psv" value="<?php if (isset($Q16Errs)) {
                                                                                                                    echo $Q16Errs[0];
                                                                                                                }
                                                                                                                ?>"> </div>
                            <div><label>Co-Supervisor</label> <input type="number" name="Q16csv" value="<?php if (isset($Q16Errs)) {
                                                                                                            echo $Q16Errs[1];
                                                                                                        }
                                                                                                        ?>"> </div>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q16Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q16Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q16Err']);
                        }
                        ?>

                        <!-- Q17 -->
                        <p>&#x26AC; How many new PHD students do you intend to recruit over the next two years?</p>
                        <div class="multiple-fields-Q">
                            <!-- display the value enterd by user if the form was not submitted succsessfully -->
                            <?php
                            if (!empty($_SESSION['Q17'])) {
                                $Q17Errs = $_SESSION['Q17'];
                            }
                            unset($_SESSION['Q17']); ?>
                            <div><label>Principal Supervisor</label> <input type="number" name="Q17psv" value="<?php if (isset($Q17Errs)) {
                                                                                                                    echo $Q17Errs[0];
                                                                                                                }
                                                                                                                ?>"> </div>
                            <div><label>Co-Supervisor</label> <input type="number" name="Q17csv" value="<?php if (isset($Q17Errs)) {
                                                                                                            echo $Q17Errs[1];
                                                                                                        }
                                                                                                        ?>"> </div>
                        </div>
                        <?php
                        //dispaly any errors if there is any
                        if (isset($_SESSION['Q17Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q17Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q17Err']);
                        }
                        ?>

                        <!-- Q18 -->
                        <p>&#x26AC; Please specify your IT requirements for the next two years - this should relate to infrastructure requirements and/or data storage. </p>
                        <div class="input-field">
                            <textarea placeholder=" Your answer must not exceed 250 words." name="Q18"><?php if (!empty($_SESSION['Q18'])) {
                                                                                                            echo $_SESSION['Q18'];
                                                                                                        }
                                                                                                        unset($_SESSION['Q18']); ?></textarea>
                        </div>
                        <?php
                        if (isset($_SESSION['Q18Err'])) { ?>
                            <div class="error"> <?= $_SESSION['Q18Err'] ?> </div>
                        <?php
                            unset($_SESSION['Q18Err']);
                        }
                        ?>

                        <!-- sumbit button -->
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                        <p style="font-size:smaller" class="text-center">If you're not getting a success message after submitting, check each question for any error messages.</p>
                    </div>
                </div>

                <!--Hiding/Showing different divs for dynamic form pagination-->
                <div class="form-pagination">
                    <button type="button" class="prev-page">Previous</button>
                    <button type="button" class="next-page">Next</button>
                </div>
            </form>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <img src="assets/images/university-of-bradford-white-logo.png" width="200" height="50">
        <div>
            <p>University of Bradford</p>
            <p>Bradford, West Yorkshire, BD7 1DP, UK</p>
            <p>Tel: <a href="tel:+441274232323">+44 (0) 1274 232323</a></p>
        </div>

    </footer>

    <!--Javascript-->
    <script src="assets/js/jscript.js">

    </script>

    <!-- bootstrap V5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>