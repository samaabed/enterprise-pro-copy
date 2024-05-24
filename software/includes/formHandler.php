<?php
require 'dbconn.php';

session_start();

//CHECK ADMIN LOGIN HERE
//if admin is not logged in, redirect to prip.php page
if (!isset($_SESSION['logged_in_staff_number'])) {
    header('location: prip.php');
}

//this flag will be raised if any of the entered data is not valid.
$flag = 0;

if (isset($_POST['submit'])) {

    extract($_POST);

    //validate staffNumber 
    if (empty($staffNumber)) {
        $numberErr = "*Staff Number Is Required";
    } else if (!is_numeric($staffNumber)) {
        $numberErr = "*Entered Staff Number Is Not Valid";
    } else if ($staffNumber <= 0) {
        $numberErr = "*Entered Staff Number Must Be Positive";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($numberErr)) {
        $_SESSION['numberErr'] = $numberErr;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['staffNumber'] = $staffNumber;



    //validate surename
    if (empty($surename)) {
        $snameErr = "*Surename Is Required";
    } else if (!is_string($surename)) {
        $snameErr = "*Entered Surename Is Not A String";
    } else if (strlen($surename) > 50 or strlen($surename) < 3) {
        $snameErr = "*Surename Must Be Between 3 And 50 Characters";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($snameErr)) {
        $_SESSION['snameErr'] = $snameErr;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['surename'] = $surename;


    //valiadte forename
    if (empty($forename)) {
        $forenameErr = "*Forename Is Required";
    } else if (!is_string($forename)) {
        $forenameErr = "*Entered Forename Is Not A String";
    } else if (strlen($forename) > 50 or strlen($forename) < 3) {
        $forenameErr = "*Forename Must Be Between 3 And 50 Characters";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($forenameErr)) {
        $_SESSION['forenameErr'] = $forenameErr;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['forename'] = $forename;



    //validate email
    //define the pattern that the email should follow
    $pattern = '/^[a-zA-Z0-9._]+@bradford\.ac\.uk$/';
    if (empty($email)) {
        $emailErr = "*Email Is Reequired";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) or strlen($email) > 320) {
        $emailErr = "*Entered Email Is Not Valid";
    } else if (!preg_match($pattern, $email)) {
        $emailErr = "*Enterd Email Must Follow The Form: something@bradford.ac.uk";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($emailErr)) {
        $_SESSION['emailErr'] = $emailErr;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['email'] = $email;



    //validate Q1
    if ((empty($papersNo) and $papersNo != 0)  or (empty($grantsAwardedNo) and $grantsAwardedNo != 0) or (empty($grantsSubmittedNo) and $grantsSubmittedNo != 0) or (empty($completedPhdNo) and $completedPhdNo != 0) or (empty($recruitedPhdNo) and $recruitedPhdNo != 0)) {
        $Q1Err = "*This Question Is Required";
    } else if (!is_numeric($papersNo) or !is_numeric($grantsAwardedNo) or !is_numeric($grantsSubmittedNo) or !is_numeric($completedPhdNo) or !is_numeric($recruitedPhdNo)) {
        $Q1Err = "*Answers To This Question Must Be Numeric";
    } else if ($papersNo < 0 or $grantsAwardedNo < 0 or $grantsSubmittedNo < 0 or $completedPhdNo < 0 or $recruitedPhdNo < 0) {
        $Q1Err = "*Entered Numbers Must Be Positive";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q1Err)) {
        $_SESSION['Q1Err'] = $Q1Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q1'] = [$papersNo, $grantsAwardedNo, $grantsSubmittedNo, $completedPhdNo, $recruitedPhdNo];



    //validate Q2
    if (empty($Q2)) {
        $Q2Err = "*This Question Is Required";
    } else if (str_word_count($Q2) > 250) {
        $Q2Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q2Err)) {
        $_SESSION['Q2Err'] = $Q2Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q2'] = $Q2;


    //validate Q3
    if (empty($Q3)) {
        $Q3Err = "*This Question Is Required";
    } else if (str_word_count($Q3) > 250) {
        $Q3Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q3Err)) {
        $_SESSION['Q3Err'] = $Q3Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q3'] = $Q3;


    //validate Q4
    if (empty($Q4)) {
        $Q4Err = "*This Question Is Required";
    } else if (str_word_count($Q4) > 250) {
        $Q4Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q4Err)) {
        $_SESSION['Q4Err'] = $Q4Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q4'] = $Q4;


    //validate Q5
    if (empty($Q5)) {
        $Q5Err = "*This Question Is Required";
    } else if (str_word_count($Q5) > 250) {
        $Q5Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q5Err)) {
        $_SESSION['Q5Err'] = $Q5Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q5'] = $Q5;


    //validate Q6
    $validGroups = ['option1', 'option2', 'option3', 'option4']; //this array holds all the possible answers for this question
    $Q6totalAnswer = ""; //this variable will combine the user's chooses for this question 
    if (empty($ResearchGroupings)) {
        $Q6Err = "*This Question is Required";
    } else {
        foreach ($ResearchGroupings as $group) {
            if ($group == 'option1') $x = "Healthcare Technology Innovation";
            else if ($group == 'option2') $x = "Smart Industrial Systems";
            else if ($group == 'option3') $x = "Advanced Materials";
            else if ($group == 'option4') $x = "Sustainable Environments";

            $Q6totalAnswer = $Q6totalAnswer . $x . ", ";
            if (!in_array($group, $validGroups)) {
                $Q6Err = "*Please Select a Valid Research Group";
            }
        }
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q6Err)) {
        $_SESSION['Q6Err'] = $Q6Err;
        $flag = 1;
    }


    //validate Q7
    if (empty($Q7)) {
        $Q7Err = "*This Question is Required";
    } else if (str_word_count($Q7) > 250) {
        $Q7Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q7Err)) {
        $_SESSION['Q7Err'] = $Q7Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q7'] = $Q7;


    //validate Q8
    if (empty($Q8)) {
        $Q8Err = "*This Question Is Required";
    } else if (str_word_count($Q8) > 250) {
        $Q8Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q8Err)) {
        $_SESSION['Q8Err'] = $Q8Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q8'] = $Q8;


    //validate Q9
    if (empty($Q9)) {
        $Q9Err = "*This Question Is Required";
    } else if (str_word_count($Q9) > 250) {
        $Q9Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q9Err)) {
        $_SESSION['Q9Err'] = $Q9Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q9'] = $Q9;


    //validate Q10
    if (empty($Q10)) {
        $Q10Err = "*This Question Is Required";
    } else if (str_word_count($Q10) > 250) {
        $Q10Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q10Err)) {
        $_SESSION['Q10Err'] = $Q10Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q10'] = $Q10;


    //validate Q11
    if ((empty($ukriBids) and $ukriBids != 0) or (empty($innovateBids) and $innovateBids != 0) or (empty($horizonBids) and $horizonBids != 0)) {
        $Q11Err = "*First Three Fields of This Question are Required";
    } else if (!is_numeric($ukriBids) or !is_numeric($innovateBids) or !is_numeric($horizonBids)) {
        $Q11Err = "*Answers To This Question Must Be Numeric";
    } else if ($ukriBids < 0 or $innovateBids < 0 or $horizonBids < 0) {
        $Q11Err = "*Entered Numbers Must Be Positive";
    }
    if (str_word_count($otherBids) > 250) {
        $Q11Err = "*The Last Field Must Not Exceed 250 Words.";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q11Err)) {
        $_SESSION['Q11Err'] = $Q11Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q11'] = [$ukriBids, $innovateBids, $horizonBids, $otherBids];



    //validate Q12 project 1
    $Q12P1Err = validateProject(
        $resType1,
        $proTitle1PI,
        $proTitle1COI,
        $bidValue1,
        $stageOfDev1,
        $proTheme1,
        $proCollaborators1,
        $proFunder1,
        $proDeadline1,
        $staffNumber
    );
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q12P1Err)) {
        $_SESSION['Q12P1Err'] = $Q12P1Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q12P1'] = [
        $proTitle1PI, $bidValue1, $stageOfDev1,
        $proCollaborators1, $proFunder1
    ];



    //validate Q12 project 2
    //validate only if the user hasn't checked the 
    //"i don't have other projects" box
    if (!isset($noOtherProjects2)) {
        $Q12P2Err = validateProject(
            $resType2,
            $proTitle2PI,
            $proTitle2COI,
            $bidValue2,
            $stageOfDev2,
            $proTheme2,
            $proCollaborators2,
            $proFunder2,
            $proDeadline2,
            $staffNumber
        );
        //store the error message in a session to dispaly it in the "prip.php" page 
        if (!empty($Q12P2Err)) {
            $_SESSION['Q12P2Err'] = $Q12P2Err;
            $flag = 1;
        }
        //store the answer of the question, so that it can be displayed
        //in its field if the form couldn't be submitted successfully
        $_SESSION['Q12P2'] = [
            $proTitle2PI, $bidValue2, $stageOfDev2,
            $proCollaborators2, $proFunder2
        ];
    }


    //validate Q12 project 3
    //validate only if the user hasn't checked the 
    //"i don't have other projects" box
    if (!isset($noOtherProjects3)) {
        $Q12P3Err = validateProject(
            $resType3,
            $proTitle3PI,
            $proTitle3COI,
            $bidValue3,
            $stageOfDev3,
            $proTheme3,
            $proCollaborators3,
            $proFunder3,
            $proDeadline3,
            $staffNumber
        );
        //store the error message in a session to dispaly it in the "prip.php" page 
        if (!empty($Q12P3Err)) {
            $_SESSION['Q12P3Err'] = $Q12P3Err;
            $flag = 1;
        }
        //store the answer of the question, so that it can be displayed
        //in its field if the form couldn't be submitted successfully
        $_SESSION['Q12P3'] = [
            $proTitle3PI, $bidValue3, $stageOfDev3,
            $proCollaborators3, $proFunder3
        ];
    }


    //validate Q12 project 4
    //validate only if the user hasn't checked the 
    //"i don't have other projects" box
    if (!isset($noOtherProjects4)) {
        $Q12P4Err = validateProject(
            $resType4,
            $proTitle4PI,
            $proTitle4COI,
            $bidValue4,
            $stageOfDev4,
            $proTheme4,
            $proCollaborators4,
            $proFunder4,
            $proDeadline4,
            $staffNumber
        );
        //store the error message in a session to dispaly it in the "prip.php" page 
        if (!empty($Q12P4Err)) {
            $_SESSION['Q12P4Err'] = $Q12P4Err;
            $flag = 1;
        }
        //store the answer of the question, so that it can be displayed
        //in its field if the form couldn't be submitted successfully
        $_SESSION['Q12P4'] = [
            $proTitle4PI, $bidValue4, $stageOfDev4,
            $proCollaborators4, $proFunder4
        ];
    }


    //validate Q13
    if (empty($Q13)) {
        $Q13Err = "*This Question Is Required";
    } else if (str_word_count($Q13) > 250) {
        $Q13Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q13Err)) {
        $_SESSION['Q13Err'] = $Q13Err;
        $flag = 1;
    }

    $_SESSION['Q13'] = $Q13;


    //validate Q14
    if ((empty($jornalPapersNo) and $jornalPapersNo != 0) or (empty($conferencePapersNo) and $conferencePapersNo != 0) or (empty($booksNo) and $booksNo != 0) or (empty($monographsNo) and $monographsNo != 0)) {
        $Q14Err = "*First Four Fields of This Question are Required";
    } else if (!is_numeric($jornalPapersNo) or !is_numeric($conferencePapersNo) or !is_numeric($booksNo) or !is_numeric($monographsNo)) {
        $Q14Err = "*Answers To This Question Must Be Numeric";
    } else if ($jornalPapersNo < 0 or $conferencePapersNo < 0 or $booksNo < 0 or $monographsNo < 0) {
        $Q14Err = "*Entered Numbers Must Be Positive";
    }
    if (str_word_count($otherOutputs) > 250) {
        $Q14Err = "*The Last Field Must Not Exceed 250 Words.";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q14Err)) {
        $_SESSION['Q14Err'] = $Q14Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q14'] = [$jornalPapersNo, $conferencePapersNo, $booksNo, $monographsNo, $otherOutputs];


    //validate Q15
    if ((empty($Q15psv) and $Q15psv != 0) or (empty($Q15csv) and $Q15csv != 0)) {
        $Q15Err = "*This Question is Required";
    } else if (!is_numeric($Q15psv) or !is_numeric($Q15csv)) {
        $Q15Err = "*Answers To This Question Must Be Numeric";
    } else if ($Q15psv < 0 or $Q15csv < 0) {
        $Q15Err = "*Entered Numbers Must Be Positive";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q15Err)) {
        $_SESSION['Q15Err'] = $Q15Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q15'] = [$Q15psv, $Q15csv];


    //validate Q16
    if ((empty($Q16psv) and $Q16psv != 0) or (empty($Q16csv) and $Q16csv != 0)) {
        $Q16Err = "*This Question is Required";
    } else if (!is_numeric($Q16psv) or !is_numeric($Q16csv)) {
        $Q16Err = "*Answers To This Question Must Be Numeric";
    } else if ($Q16psv < 0 or $Q16csv < 0) {
        $Q16Err = "*Entered Numbers Must Be Positive";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q16Err)) {
        $_SESSION['Q16Err'] = $Q16Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q16'] = [$Q16psv, $Q16csv];


    //validate Q17
    if ((empty($Q17psv) and $Q17psv != 0) or (empty($Q17csv) and $Q17csv != 0)) {
        $Q17Err = "*This Question is Required";
    } else if (!is_numeric($Q17psv) or !is_numeric($Q17csv)) {
        $Q17Err = "*Answers To This Question Must Be Numeric";
    } else if ($Q17psv < 0 or $Q17csv < 0) {
        $Q17Err = "*Entered Numbers Must Be Positive";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q17Err)) {
        $_SESSION['Q17Err'] = $Q17Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q17'] = [$Q17psv, $Q17csv];


    //validate Q18
    if (empty($Q18)) {
        $Q18Err = "*This Question Is Required";
    } else if (str_word_count($Q18) > 250) {
        $Q18Err = "*Answer For This Question Must Not Exceed 250 Words";
    }
    //store the error message in a session to dispaly it in the "prip.php" page 
    if (!empty($Q18Err)) {
        $_SESSION['Q18Err'] = $Q18Err;
        $flag = 1;
    }
    //store the answer of the question, so that it can be displayed
    //in its field if the form couldn't be submitted successfully
    $_SESSION['Q18'] = $Q18;


    //return the user to the prip.php page if there is any errors
    if ($flag) {
        header('location: ../prip.php');
    } else {
        try {
            //if there is no errors, store the entered data in the database

            //first start a transaction
            mysqli_begin_transaction($conn);

            //this flag will be raised if an error occurrs while inserting 
            //data to the DB
            $insertErrorFlag = 0;

            //for the "reseachers" table:
            //store the researcher's info only if that researcher does not exist in the "reseachers" table
            $sql = "SELECT * FROM researchers
                WHERE staff_number = $staffNumber";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) == 0) {
                $sql = "INSERT INTO researchers(`staff_number`,`surename`,`forename`,`email`)
            VALUES('$staffNumber','$surename','$forename','$email')";
                $query = mysqli_query($conn, $sql);
            }



            //for the "prips" table:
            //get the current date to store it as the "submission date"
            $currentDate = date("Y-m-d");
            //store the answers of the questions (except for Q12)
            $sql = "INSERT INTO prips(`staff_number`,`surname`,`forename`,`no_of_published_papers_ly`,`no_of_grants_awarded_ly`,
        `no_of_grants_submitted_ly`,`no_of_phd_students_completed_ly`,`no_of_phd_students_recruited_ly`
        ,`other_research_activity_ly`,`what_helped_and_hindered_ly`,`faculty_role`,`how_research_align_with_themes`,
        `research_groupings`,`research_focus_areas`,`interdisciplinarity`,`external_organisations`
        ,`next_5years_activities`,`no_of_bids_next5years_ukri`,`no_of_bids_next5years_innovatuk`,`no_of_bids_next5years_horizant`
        ,`other_bids_next5years`,`staffing_and_equipment`,`no_of_journal_papers_next24months`,`no_of_conference_papers_next24months`,
        `no_of_books_next24months`,`no_of_monographs_next24months`,`other_outputs_next24months`,`no_of_pgrs_psv`,
        `no_of_pgrs_csv`,`no_of_phd_completed_next5years_psv`,`no_of_phd_completed_next5years_csv`,
        `no_of_phd_recruited_next2years_psv`,`no_of_phd_recruited_next2years_csv`,
        `it_requirements_next2years`,`submission_date`)
        VALUES('$staffNumber','$surename','$forename','$papersNo','$grantsAwardedNo',
        '$grantsSubmittedNo','$completedPhdNo','$recruitedPhdNo',
        '$Q2','$Q3','$Q4','$Q5','$Q6totalAnswer','$Q7','$Q8','$Q9','$Q10','$ukriBids',
        '$innovateBids','$horizonBids','$otherBids','$Q13','$jornalPapersNo','$conferencePapersNo',
        '$booksNo','$monographsNo','$otherOutputs','$Q15psv','$Q15csv',
        '$Q16psv','$Q16csv','$Q17psv','$Q17csv','$Q18','$currentDate')";
            $query = mysqli_query($conn, $sql);




            //for the "projects" table and the "researchers_projects" table:

            //project 1
            if ($resType1 == '1') {
                //when the researcher type is PI
                //get the project theme as text
                $textTheme = "";
                if ($proTheme1 == '1')  $textTheme = "Advanced Materials";
                else if ($proTheme1 == '2') $textTheme = "Sustainable Environments";
                else if ($proTheme1 == '3') $textTheme = "Smart Industrial Systems";
                else if ($proTheme1 == '4') $textTheme = "Healthcare Technology Innovation";

                //get the id pf the prip submitted by this researcher
                $currentYear = date("Y");;
                $sql = "SELECT prip_id FROM prips
                        WHERE staff_number = $staffNumber AND YEAR(submission_date) = $currentYear";
                $query = mysqli_query($conn, $sql);
                $data = mysqli_fetch_row($query);
                $pripID = $data[0];

                //store the data of the first project int the "projects"table
                $sql = "INSERT INTO projects(`project_title`,`project_theme`,`bid_value`,
            `stage_of_development`,`collaborators`,`funder`,`deadline`,`date_of_submission`, `prip_id`)
            VALUES('$proTitle1PI','$textTheme','$bidValue1','$stageOfDev1',
            '$proCollaborators1','$proFunder1','$proDeadline1','$currentDate','$pripID')";
                $query = mysqli_query($conn, $sql);



                //in the "researchers_projects" table, we have to store that this
                //researcher is the PI of this project.
                //but first, fetch the id of the project we stored in the previous query:
                $sql = "SELECT project_id FROM projects
                    WHERE project_title = '$proTitle1PI'";
                $query = mysqli_query($conn, $sql);
                $projectID = mysqli_fetch_row($query);


                $sql = "INSERT INTO researchers_projects(`staff_number`,`project_id`,`type_of_staff`)
            VALUES('$staffNumber','$projectID[0]','PI')";
                $query = mysqli_query($conn, $sql);
            } else {
                //when the researcher type is CO-I, we store in the "researchers_projects" table that
                //this researcher is a CO-I in this project .
                //we don't have to store anything in the "projects" table since that 
                //a CO-I can only be added to an existing project.

                //but first, fetch the id of the project that the CO-I has chosen
                $sql = "SELECT project_id FROM projects
                    WHERE project_title = '$proTitle1COI'";
                $query = mysqli_query($conn, $sql);
                $projectID = mysqli_fetch_row($query);

                $sql = "INSERT INTO researchers_projects(`staff_number`,`project_id`,`type_of_staff`)
            VALUES('$staffNumber','$projectID[0]','CO-I')";
                $query = mysqli_query($conn, $sql);
            }


            //project 2
            //store the info of the project only if the user has
            // checked the "i don't have other projects" box.
            if (!isset($noOtherProjects2)) {
                if ($resType2 == '1') {
                    //when the researcher type is PI
                    //get the project theme as text
                    $textTheme = "";
                    if ($proTheme2 == '1')  $textTheme = "Advanced Materials";
                    else if ($proTheme2 == '2') $textTheme = "Sustainable Environments";
                    else if ($proTheme2 == '3') $textTheme = "Smart Industrial Systems";
                    else if ($proTheme2 == '4') $textTheme = "Healthcare Technology Innovation";

                    //get the id pf the prip submitted by this researcher
                    $currentYear = date("Y");;
                    $sql = "SELECT prip_id FROM prips
                        WHERE staff_number = $staffNumber AND YEAR(submission_date) = $currentYear";
                    $query = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_row($query);
                    $pripID = $data[0];

                    //store the data of the  project int the "projects"table
                    $sql = "INSERT INTO projects(`project_title`,`project_theme`,`bid_value`,
            `stage_of_development`,`collaborators`,`funder`,`deadline`,`date_of_submission`,`prip_id`)
            VALUES('$proTitle2PI','$textTheme','$bidValue2','$stageOfDev2',
            '$proCollaborators2','$proFunder2','$proDeadline2','$currentDate','$pripID')";
                    $query = mysqli_query($conn, $sql);


                    //in the "researchers_projects" table, we have to store that this
                    //researcher is the PI of this project.
                    //but first, fetch the id of the project we stored in the previous query:
                    $sql = "SELECT project_id FROM projects
                    WHERE project_title = '$proTitle2PI'";
                    $query = mysqli_query($conn, $sql);
                    $projectID = mysqli_fetch_row($query);


                    $sql = "INSERT INTO researchers_projects(`staff_number`,`project_id`,`type_of_staff`)
            VALUES('$staffNumber','$projectID[0]','PI')";
                    $query = mysqli_query($conn, $sql);
                } else {
                    //when the researcher type is CO-I, we store in the "researchers_projects" table that
                    //this researcher is a CO-I in this project .
                    //we don't have to store anything in the "projects" table since that 
                    //a CO-I can only be added to an existing project.

                    //but first, fetch the id of the project that the CO-I has chosen
                    $sql = "SELECT project_id FROM projects
                    WHERE project_title = '$proTitle2COI'";
                    $query = mysqli_query($conn, $sql);
                    $projectID = mysqli_fetch_row($query);

                    $sql = "INSERT INTO researchers_projects(`staff_number`,`project_id`,`type_of_staff`)
            VALUES('$staffNumber','$projectID[0]','CO-I')";
                    $query = mysqli_query($conn, $sql);
                }
            }


            //project 3
            //store the info of the project only if the user has
            // checked the "i don't have other projects" box.
            if (!isset($noOtherProjects3)) {
                if ($resType3 == '1') {
                    //when the researcher type is PI
                    //get the project theme as text
                    $textTheme = "";
                    if ($proTheme3 == '1')  $textTheme = "Advanced Materials";
                    else if ($proTheme3 == '2') $textTheme = "Sustainable Environments";
                    else if ($proTheme3 == '3') $textTheme = "Smart Industrial Systems";
                    else if ($proTheme3 == '4') $textTheme = "Healthcare Technology Innovation";

                    //get the id pf the prip submitted by this researcher
                    $currentYear = date("Y");;
                    $sql = "SELECT prip_id FROM prips
                        WHERE staff_number = $staffNumber AND YEAR(submission_date) = $currentYear";
                    $query = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_row($query);
                    $pripID = $data[0];

                    //store the data of the  project int the "projects"table
                    $sql = "INSERT INTO projects(`project_title`,`project_theme`,`bid_value`,
            `stage_of_development`,`collaborators`,`funder`,`deadline`,`date_of_submission`, `prip_id`)
            VALUES('$proTitle3PI','$textTheme','$bidValue3','$stageOfDev3',
            '$proCollaborators3','$proFunder3','$proDeadline3','$currentDate', '$pripID')";
                    $query = mysqli_query($conn, $sql);



                    //in the "researchers_projects" table, we have to store that this
                    //researcher is the PI of this project.
                    //but first, fetch the id of the project we stored in the previous query:
                    $sql = "SELECT project_id FROM projects
                    WHERE project_title = '$proTitle3PI'";
                    $query = mysqli_query($conn, $sql);
                    $projectID = mysqli_fetch_row($query);


                    $sql = "INSERT INTO researchers_projects(`staff_number`,`project_id`,`type_of_staff`)
            VALUES('$staffNumber','$projectID[0]','PI')";
                    $query = mysqli_query($conn, $sql);
                } else {
                    //when the researcher type is CO-I, we store in the "researchers_projects" table that
                    //this researcher is a CO-I in this project .
                    //we don't have to store anything in the "projects" table since that 
                    //a CO-I can only be added to an existing project.

                    //but first, fetch the id of the project that the CO-I has chosen
                    $sql = "SELECT project_id FROM projects
                    WHERE project_title = '$proTitle3COI'";
                    $query = mysqli_query($conn, $sql);
                    $projectID = mysqli_fetch_row($query);

                    $sql = "INSERT INTO researchers_projects(`staff_number`,`project_id`,`type_of_staff`)
            VALUES('$staffNumber','$projectID[0]','CO-I')";
                    $query = mysqli_query($conn, $sql);
                }
            }

            //project 4
            //store the info of the project only if the user has
            // checked the "i don't have other projects" box.
            if (!isset($noOtherProjects4)) {
                if ($resType4 == '1') {
                    //when the researcher type is PI
                    //get the project theme as text
                    $textTheme = "";
                    if ($proTheme4 == '1')  $textTheme = "Advanced Materials";
                    else if ($proTheme4 == '2') $textTheme = "Sustainable Environments";
                    else if ($proTheme4 == '3') $textTheme = "Smart Industrial Systems";
                    else if ($proTheme4 == '4') $textTheme = "Healthcare Technology Innovation";

                    //get the id of the prip submitted by this researcher
                    $currentYear = date("Y");;
                    $sql = "SELECT prip_id FROM prips
                        WHERE staff_number = $staffNumber AND YEAR(submission_date) = $currentYear";
                    $query = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_row($query);
                    $pripID = $data[0];

                    //store the data of the project int the "projects"table
                    $sql = "INSERT INTO projects(`project_title`,`project_theme`,`bid_value`,
            `stage_of_development`,`collaborators`,`funder`,`deadline`,`date_of_submission`, `prip_id`)
            VALUES('$proTitle4PI','$textTheme','$bidValue4','$stageOfDev4',
            '$proCollaborators4','$proFunder4','$proDeadline4','$currentDate', '$pripID')";
                    $query = mysqli_query($conn, $sql);


                    //in the "researchers_projects" table, we have to store that this
                    //researcher is the PI of this project.
                    //but first, fetch the id of the project we stored in the previous query:
                    $sql = "SELECT project_id FROM projects
                    WHERE project_title = '$proTitle4PI'";
                    $query = mysqli_query($conn, $sql);
                    $projectID = mysqli_fetch_row($query);


                    $sql = "INSERT INTO researchers_projects(`staff_number`,`project_id`,`type_of_staff`)
            VALUES('$staffNumber','$projectID[0]','PI')";
                    $query = mysqli_query($conn, $sql);
                } else {
                    //when the researcher type is CO-I, we store in the "researchers_projects" table that
                    //this researcher is a CO-I in this project .
                    //we don't have to store anything in the "projects" table since that 
                    //a CO-I can only be added to an existing project.

                    //but first, fetch the id of the project that the CO-I has chosen
                    $sql = "SELECT project_id FROM projects
                    WHERE project_title = '$proTitle4COI'";
                    $query = mysqli_query($conn, $sql);
                    $projectID = mysqli_fetch_row($query);

                    $sql = "INSERT INTO researchers_projects(`staff_number`,`project_id`,`type_of_staff`)
            VALUES('$staffNumber','$projectID[0]','CO-I')";
                    $query = mysqli_query($conn, $sql);
                }
            }



            mysqli_commit($conn);
            header('location: ../success.html');
        } //try
        catch (Exception $e) {
            mysqli_rollback($conn);
            $_SESSION['insertError'] = "*An error occurred while submitting your data, please try again.";
            header('location: ../prip.php');
        } //catch
    }
} else {
    header('location: ../prip.php');
}



//This function is used to validate the entered information for each project (Q12)
function validateProject(
    $researcherType,
    $projectTitlePI,
    $projectTitleCOI,
    $bidValue,
    $stageOfDev,
    $projectTheme,
    $projectCollaborators,
    $projetcFunder,
    $projectDeadline,
    $staffNumber

) {
    require "dbconn.php";
    $researcherTypes = [1, 2];
    $Q12Err = [];
    if (empty($researcherType)) {
        $Q12Err[] = "*Researcher Type is Required";
    } else if (!in_array($researcherType, $researcherTypes)) {
        $Q12Err[] = "*Not Valid Researcher Type";
    } else {
        //get all titles for this year's projects
        $currentYear = date("Y");
        $sql = "SELECT project_title FROM projects 
                WHERE year(date_of_submission) = $currentYear";
        $query = mysqli_query($conn, $sql);
        $allTitles = mysqli_fetch_all($query);

        //when researcher type is PI
        if ($researcherType == 1) {
            //check project title here
            if (empty($projectTitlePI)) {
                $Q12Err[] = "*Project Title is Required";
            }
            foreach ($allTitles as $title) {

                $percent = checkSimilarity($title[0], $projectTitlePI);
                if ($percent >= 60) {
                    $Q12Err[] = "*This Projrct Already Exists and Has a PI";
                    break;
                }
            }


            //check bid value
            if (empty($bidValue)) {
                $Q12Err[] = "*Bid Value is Required";
            } else if (!is_numeric($bidValue)) {
                $Q12Err[] = "*Bid Value Must Be a Number";
            } else if ($bidValue < 0) {
                $Q12Err[] = "*Bid Value Must Be Positive";
            }

            //check stage of development
            if (empty($stageOfDev)) {
                $Q12Err[] = "*Stage of Development is Required";
            } else if (!is_string($stageOfDev)) {
                $Q12Err[] = "*Entered Stage of Development is Not a String";
            }

            //check project theme
            $themes = [1, 2, 3, 4];
            if (empty($projectTheme)) {
                $Q12Err[] = "*Project Theme is Required";
            } else if (!in_array($projectTheme, $themes)) {
                $Q12Err[] = "*Not Valid Project Theme";
            }

            //check collaborators 
            if (empty($projectCollaborators)) {
                $Q12Err[] = "*Collaborators Field is Required";
            } else if (!is_string($projectCollaborators)) {
                $Q12Err[] = "*Collaborators Field Must Be a String";
            }

            //check funder
            if (empty($projetcFunder)) {
                $Q12Err[] = "*Funder Field is Required";
            } else if (!is_string($projetcFunder)) {
                $Q12Err[] = "*Funder Field Must Be a String";
            }

            //check deadline
            if (empty($projectDeadline)) {
                $Q12Err[] = "*Deadline Field is Required";
            }
        }


        //when researcher type is CO-I
        if ($researcherType == 2) {
            //this flag will be raised when the entered title exists in the DB.
            $found = 0;
            foreach ($allTitles as $title) {
                if (trim(strtolower($title[0])) == trim(strtolower($projectTitleCOI))) {
                    $found = 1;
                    break;
                }
            }

            if ($found == 0) {
                $Q12Err[] = "*The Selected Project Does Not Exist";
            }
        }
    }

    return $Q12Err;
}



//this function returns the similarity percent of the two given strings.
//it is used to find if the title entered by a PI has similarity with a title stored 
//in the DB.
function checkSimilarity($string1, $string2)
{

    $string1 = trim(strtolower($string1));
    $string2 = trim(strtolower($string2));

    //divide the string into words and store it in an array
    $array1 = explode(" ", $string1);
    $array2 = explode(" ", $string2);

    //fund the  "jaccard similarity coefficient" by finding the 
    //union and intersection of the two arrays.
    $union = array_unique(array_merge($array1, $array2));
    $intersection = array_intersect($array1, $array2);
    $similarity = count($intersection) / count($union);

    //convert the coefficient to a percentage
    $similarity_percent = round($similarity * 100, 2);


    return $similarity_percent;
}

//this function checks if the coi is already added to the selected project
// function isAdded($staffNumber, $projectTitle)
// {
//     require 'dbconn.php';
//     $sql = "SELECT project_id FROM projetcs
//             WHERE lower(trim(project_title)) = lower(trim($projectTitle))";
//     $query = mysqli_query($conn, $sql);
//     $data = mysqli_fetch_row($query);
//     $projectID = $data[0];

//     $sql = "SELECT * FROM researchers_projects 
//             WHERE staff_number = $staffNumber AND project_id = $projectID";
//     $query = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($query) > 0) {
//         return true;
//     } else {
//         return false;
//     }
// }
