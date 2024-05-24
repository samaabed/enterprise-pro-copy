<?php
include './includes/dbconn.php';

$prip_id = $_GET['prip'];

if ($prip_id == null || $prip_id == "") {
    die("Invalid Prip Id");
}

//get data from Prip table, using a conditional statement. 
// used 
$getPripSql = "SELECT * FROM prips WHERE prip_id=".$prip_id;
// retrieved from SQL database
$pripResult = $conn->query($getPripSql);
if ($pripResult->num_rows > 0) {
    
    while($row = $pripResult->fetch_assoc()) {
        $staff_no = $row['staff_number'];
        $surname = $row['surname'];
        $forname = $row['forename'];
        $no_of_published_papers_ly = $row['no_of_published_papers_ly'];
        $no_of_grants_awarded_ly = $row['no_of_grants_awarded_ly'];
        $no_of_grants_submitted_ly = $row['no_of_grants_submitted_ly'];
        $no_of_phd_students_completed_ly = $row['no_of_phd_students_completed_ly'];
        $no_of_phd_students_recruited_ly = $row['no_of_phd_students_recruited_ly'];
        $other_research_activity_ly = $row['other_research_activity_ly'];
        $what_helped_and_hindered_ly = $row['what_helped_and_hindered_ly'];
        $faculty_role = $row['faculty_role'];
        $how_research_align_with_themes = $row['how_research_align_with_themes'];
        $research_groupings = explode(",", $row['research_groupings']);
        $research_focus_areas = $row['research_focus_areas'];
        $interdisciplinarity = $row['interdisciplinarity'];
        $external_organisations = $row['external_organisations'];
        $next_5years_activities = $row['next_5years_activities'];
        $no_of_bids_next5years_ukri = $row['no_of_bids_next5years_ukri'];
        $no_of_bids_next5years_innovatuk = $row['no_of_bids_next5years_innovatuk'];
        $no_of_bids_next5years_horizant = $row['no_of_bids_next5years_horizant'];
        $other_bids_next5years = $row['other_bids_next5years'];
        $staffing_and_equipment = $row['staffing_and_equipment'];
        $no_of_journal_papers_next24months = $row['no_of_journal_papers_next24months'];
        $no_of_conference_papers_next24months = $row['no_of_conference_papers_next24months'];
        $no_of_books_papers_next24months = $row['no_of_books_next24months'];
        $no_of_monographs_papers_next24months = $row['no_of_monographs_next24months'];
        $other_outputs_next24months = $row['other_outputs_next24months'];
        $no_of_pgrs_psv = $row['no_of_pgrs_psv'];
        $no_of_pgrs_csv = $row['no_of_pgrs_csv'];
        $no_of_phd_completed_next5years_psv = $row['no_of_phd_completed_next5years_psv'];
        $no_of_phd_completed_next5years_csv = $row['no_of_phd_completed_next5years_csv'];
        $no_of_phd_recruited_next2years_psv = $row['no_of_phd_recruited_next2years_psv'];
        $no_of_phd_recruited_next2years_csv = $row['no_of_phd_recruited_next2years_csv'];
        $it_requirements_next2years = $row['it_requirements_next2years']; 
    }
}
else {
    die("Invalid Prip Id");
}

// fetching project details
$getProjectSql = "SELECT * FROM projects WHERE prip_id=".$prip_id;
$projectResult = $conn->query($getProjectSql);
if ($projectResult->num_rows > 0) {
    
    while($row2 = $projectResult->fetch_assoc()) {
        $project_id  = $row2['project_id'];
        $project_title = $row2['project_title'];
        $project_theme = $row2['project_theme'];
        $bid_value = $row2['bid_value'];
        $stage_of_development = $row2['stage_of_development'];
        $collaborators = $row2['collaborators'];
        $funder = $row2['funder'];
        $deadline = $row2['deadline'];
        $date_of_submission = $row2['date_of_submission'];
    }
}
else {
    die("Invalid Project");
}

// fetching researchers_projects
$getResearchersProjects = "SELECT * FROM researchers_projects WHERE staff_number=".$staff_no." AND project_id=".$project_id;
$projectResurchResult = $conn->query($getResearchersProjects);
if ($projectResult->num_rows > 0) {
    
    while($row3 = $projectResurchResult->fetch_assoc()) {
        $type_of_staff  = $row3['type_of_staff'];
    }
}
else {
    die("Invalid Project");
}

// fetching tesearcher datails
$getResearcherSql = "SELECT * FROM researchers WHERE staff_number='".$staff_no."';";
$researcherResult = $conn->query($getResearcherSql);
if ($researcherResult->num_rows > 0) {
    
    while($row4 = $researcherResult->fetch_assoc()) {
        $uni_email  = $row4['email'];
    }
}
else {
    die("Invalid Researcher");
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
     <nav class="navbar bg-body-tertiary p-3" style="background-color:#404040">
        <a class="navbar-brand" href="#">
            <img src="assets/images/university-of-bradford-white-logo.png" width="200" height="50">
        </a>
    </nav>

    <div class="form-container">
        <div class="form-box">
             <form id="prip-form">
                <div class="form-content">
                    <!--Each individual section/page-->
			
                    <h5>Thank you for completeing this survey. This information will be submitted to your Associate Dean (RKT).</h5>
                    <h6>To save a copy of your PRIP please press 'Download as PDF' button below. This can be used to inform the research element of your PDR.</h6>
                    <div class="page" style="margin-top: 30px;">
                        <a href="controller/results-pdf.php?prip=<?php echo($prip_id); ?>" target="_blank">
                            <button type="button" class="btn btn-success">Download as PDF</button></a>
                    </div>

                </div>
            </form>
        </div>
            </div>



    <!--Javascript-->
    <script src="assets/js/jscript.js">

    </script>

     <!-- bootstrap V5.2 JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
