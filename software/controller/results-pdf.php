<?php
include '../includes/dbconn.php';
include '../plugins/fpdf/fpdf.php';

$prip_id = $_GET['prip'];

if ($prip_id == null || $prip_id == "") {
    die("Invalid Prip Id");
}

//get data from Prip table
$getPripSql = "SELECT * FROM prips WHERE prip_id=".$prip_id;
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

$pdf = new FPDF();

$pdf->AddPage("P","A4");
$pdf->SetTitle("PRIP Results");
$pdf->SetFont('Arial','',11);

$pdf->SetXY(7,25);
$pdf->Cell(80,6,"Staff number",1,0,"L");
$pdf->SetXY(87,25);
$pdf->Cell(110,6,"$staff_no",1,0,"L");

$pdf->SetXY(7,31);
$pdf->Cell(80,6,"Surname",1,0,"L");
$pdf->SetXY(87,31);
$pdf->Cell(110,6,"$surname",1,0,"L");

$pdf->SetXY(7,37);
$pdf->Cell(80,6,"Forname",1,0,"L");
$pdf->SetXY(87,37);
$pdf->Cell(110,6,"$forname",1,0,"L");

$pdf->SetXY(7,43);
$pdf->Cell(80,6,"University e-mail address",1,0,"L");
$pdf->SetXY(87,43);
$pdf->Cell(110,6,"$uni_email",1,0,"L");

$pdf->SetXY(7,49);
$pdf->Cell(80,30,"",1,0,"L");
$pdf->SetXY(7,49);
$pdf->Cell(80,6,"Referring back to the PRIP you completed",0,0,"L");
$pdf->SetXY(7,55);
$pdf->Cell(80,6,"last year please summarise what you ",0,0,"L");
$pdf->SetXY(7,61);
$pdf->Cell(80,6,"have achieved against the plan.",0,0,"L");
$pdf->SetXY(7,67);
$pdf->Cell(80,6," ",0,0,"L");
$pdf->SetXY(7,73);
$pdf->Cell(80,6," ",0,0,"L");

$pdf->SetXY(87,49);
$pdf->Cell(90,6,"Number of published papers",1,0,"L");
$pdf->SetXY(177,49);
$pdf->Cell(20,6,"$no_of_published_papers_ly",1,0,"L");
$pdf->SetXY(87,55);
$pdf->Cell(90,6,"Number of grants awarded",1,0,"L");
$pdf->SetXY(177,55);
$pdf->Cell(20,6,"$no_of_grants_awarded_ly",1,0,"L");
$pdf->SetXY(87,61);
$pdf->Cell(90,6,"Number of grants submitted",1,0,"L");
$pdf->SetXY(177,61);
$pdf->Cell(20,6,"$no_of_grants_submitted_ly",1,0,"L");
$pdf->SetXY(87,67);
$pdf->Cell(90,6,"Number of PhD students completed",1,0,"L");
$pdf->SetXY(177,67);
$pdf->Cell(20,6,"$no_of_phd_students_completed_ly",1,0,"L");
$pdf->SetXY(87,73);
$pdf->Cell(90,6,"Number of PhD students recruited",1,0,"L");
$pdf->SetXY(177,73);
$pdf->Cell(20,6,"$no_of_phd_students_recruited_ly",1,0,"L");

$pdf->SetXY(7,79);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,79);
$pdf->Cell(80,6,"Please summarise any research",0,0,"L");
$pdf->SetXY(7,85);
$pdf->Cell(80,6,"and innovation activity completed in the last",0,0,"L");
$pdf->SetXY(7,91);
$pdf->Cell(80,6,"year and not included in your previous PRIP.",0,0,"L");

$pdf->SetXY(87,79);
$pdf->MultiCell(110,6,"$other_research_activity_ly",0);
$pdf->SetXY(87,79);
$pdf->Cell(110,60,"",1,0,"L");

$pdf->SetXY(7,139);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,139);
$pdf->Cell(80,6,"Reflecting on your answers above please",0,0,"L");
$pdf->SetXY(7,145);
$pdf->Cell(80,6,"summarise what helped and what hindered",0,0,"L");
$pdf->SetXY(7,151);
$pdf->Cell(80,6,"you.",0,0,"L");

$pdf->SetXY(87,139);
$pdf->MultiCell(110,6,"$what_helped_and_hindered_ly",0);
$pdf->SetXY(87,139);
$pdf->Cell(110,60,"",1,0,"L");

$pdf->SetXY(7,199);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,199);
$pdf->Cell(80,6,"How can the Faculty facilitate your plans to",0,0,"L");
$pdf->SetXY(7,205);
$pdf->Cell(80,6,"secure external income in the research and",0,0,"L");
$pdf->SetXY(7,211);
$pdf->Cell(80,6,"contract spaces?",0,0,"L");

$pdf->SetXY(87,199);
$pdf->MultiCell(110,6,"$faculty_role",0);
$pdf->SetXY(87,199);
$pdf->Cell(110,60,"",1,0,"L");

$pdf->AddPage("P","A4");
$pdf->SetFont('Arial','',11);

$pdf->SetXY(7,25);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,25);
$pdf->Cell(80,6,"How does your research align with the ",0,0,"L");
$pdf->SetXY(7,31);
$pdf->Cell(80,6,"Faculty research themes?",0,0,"L");

$pdf->SetXY(87,25);
$pdf->MultiCell(110,6,"$how_research_align_with_themes",0);
$pdf->SetXY(87,25);
$pdf->Cell(110,60,"",1,0,"L");

$pdf->SetXY(7,85);
$pdf->Cell(80,24,"",1,0,"L");
$pdf->SetXY(7,85);
$pdf->Cell(80,6,"University/Faculty Research Grouping(s) to ",0,0,"L");
$pdf->SetXY(7,91);
$pdf->Cell(80,6,"which you are currently affiliated.",0,0,"L");

$y=85;
foreach ($research_groupings as $research_group) {
    $pdf->SetXY(87,$y);
    $pdf->Cell(110,6,"$research_group",0,0,"L");
    $y +=6;
}
$pdf->SetXY(87,85);
$pdf->Cell(110,24,"",1,0,"L");

$pdf->SetXY(7,109);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,109);
$pdf->Cell(80,6,"In which areas do you intend to focus your",0,0,"L");
$pdf->SetXY(7,115);
$pdf->Cell(80,6,"research over the next five years, and why ",0,0,"L");
$pdf->SetXY(7,121);
$pdf->Cell(80,6,"have you selected these areas?",0,0,"L");

$pdf->SetXY(87,109);
$pdf->MultiCell(110,6,"$research_focus_areas",0);
$pdf->SetXY(87,109);
$pdf->Cell(110,60,"",1,0,"L");

$pdf->SetXY(7,169);
$pdf->Cell(80,72,"",1,0,"L");
$pdf->SetXY(7,169);
$pdf->Cell(80,6,"Interdisciplinarity: with which other ",0,0,"L");
$pdf->SetXY(7,175);
$pdf->Cell(80,6,"Faculties/Research Groupings do your plans",0,0,"L");
$pdf->SetXY(7,181);
$pdf->Cell(80,6,"align? Also how do you plan to engage with ",0,0,"L");
$pdf->SetXY(7,187);
$pdf->Cell(80,6,"them (eg Joint funding, applications, ",0,0,"L");
$pdf->SetXY(7,193);
$pdf->Cell(80,6,"publications, etc)?",0,0,"L");

$pdf->SetXY(87,169);
$pdf->MultiCell(110,6,"$interdisciplinarity",0);
$pdf->SetXY(87,169);
$pdf->Cell(110,72,"",1,0,"L");

$pdf->AddPage("P","A4");
$pdf->SetFont('Arial','',11);

$pdf->SetXY(7,25);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,25);
$pdf->Cell(80,6,"With which companies/external organisations ",0,0,"L");
$pdf->SetXY(7,31);
$pdf->Cell(80,6,"do you plan to engage? ",0,0,"L");
$pdf->SetXY(7,37);
$pdf->Cell(80,6,"(please note individual contacts are ",0,0,"L");
$pdf->SetXY(7,43);
$pdf->Cell(80,6,"not required)",0,0,"L");

$pdf->SetXY(87,25);
$pdf->MultiCell(110,6,"$external_organisations",0);
$pdf->SetXY(87,25);
$pdf->Cell(110,60,"",1,0,"L");

$pdf->SetXY(7,85);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,85);
$pdf->Cell(80,6,"What activities do you intend to undertake ",0,0,"L");
$pdf->SetXY(7,91);
$pdf->Cell(80,6,"over the next five years to ensure your ",0,0,"L");
$pdf->SetXY(7,97);
$pdf->Cell(80,6,"research has impact outside of academia?",0,0,"L");

$pdf->SetXY(87,85);
$pdf->MultiCell(110,6,"$next_5years_activities",0);
$pdf->SetXY(87,85);
$pdf->Cell(110,60,"",1,0,"L");

$pdf->SetXY(7,145);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,145);
$pdf->Cell(80,6,"How many bids do you plan in the",0,0,"L");
$pdf->SetXY(7,151);
$pdf->Cell(80,6,"next 5 years and to which funders?",0,0,"L");

$pdf->SetXY(87,145);
$pdf->Cell(30,6,"UKRI",1,0,"L");
$pdf->SetXY(117,145);
$pdf->Cell(80,6,"$no_of_bids_next5years_ukri",1,0,"L");
$pdf->SetXY(87,151);
$pdf->Cell(30,6,"Innovat UK",1,0,"L");
$pdf->SetXY(117,151);
$pdf->Cell(80,6,"$no_of_bids_next5years_innovatuk",1,0,"L");
$pdf->SetXY(87,157);
$pdf->Cell(30,6,"Horizon Europe",1,0,"L");
$pdf->SetXY(117,157);
$pdf->Cell(80,6,"$no_of_bids_next5years_horizant",1,0,"L");
$pdf->SetXY(87,163);
$pdf->Cell(30,6,"Other",1,0,"L");
$pdf->SetXY(117,163);
$pdf->MultiCell(80,6,"$other_bids_next5years",0);
$pdf->SetXY(87,145);
$pdf->Cell(110,60,"",1,0,"L");


$y = 205;
$index = 0;
$page = 0;
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

        // fetching researchers_projects
        $getResearchersProjects = "SELECT * FROM researchers_projects WHERE staff_number=".$staff_no." AND project_id=".$project_id;
        $projectResurchResult = $conn->query($getResearchersProjects);
        if ($projectResult->num_rows > 0) {

            while($row3 = $projectResurchResult->fetch_assoc()) {
                $type_of_staff  = $row3['type_of_staff'];
            }
        }

        if ($y == 247) {
            $pdf->AddPage("P","A4");
            $pdf->SetFont('Arial','',11);
            $y = 25;
            $page = 1;
        }

        $index++;


        $pdf->SetXY(7,$y);
        $pdf->Cell(80,48,"",1,0,"L");
        $pdf->SetXY(7,$y);
        $pdf->Cell(80,6,"Please outline details of projects you have",0,0,"L");
        $pdf->SetXY(87,$y);
        $pdf->Cell(110,48,"",1,0,"L");
        $pdf->SetXY(87,$y);
        $pdf->Cell(40,6,"Title for project $index",1,0,"L");
        $pdf->SetXY(127,$y);
        $pdf->Cell(70,6,"$project_title",1,0,"L");
        $y += 6;
        $pdf->SetXY(7,$y);
        $pdf->Cell(80,6,"under development / planned for submission",0,0,"L");
        $pdf->SetXY(87,$y);
        $pdf->Cell(40,6,"PI or a CO-I",1,0,"L");
        $pdf->SetXY(127,$y);
        $pdf->Cell(70,6,"$type_of_staff",1,0,"L");
        $y += 6;
        $pdf->SetXY(7,$y);
        $pdf->Cell(80,6,"up to December 2023 - Project $index",0,0,"L");
        $pdf->SetXY(87,$y);
        $pdf->Cell(40,6,"Bid value",1,0,"L");
        $pdf->SetXY(127,$y);
        $pdf->Cell(70,6,"$bid_value",1,0,"L");
        $y += 6;
        $pdf->SetXY(87,$y);
        $pdf->Cell(40,6,"Stage of Development",1,0,"L");
        $pdf->SetXY(127,$y);
        $pdf->Cell(70,6,"$stage_of_development",1,0,"L");
        $y += 6;
        $pdf->SetXY(87,$y);
        $pdf->Cell(40,6,"Project theme",1,0,"L");
        $pdf->SetXY(127,$y);
        $pdf->Cell(70,6,"$project_theme",1,0,"L");
        $y += 6;
        $pdf->SetXY(87,$y);
        $pdf->Cell(40,6,"Collaborator(s) ",1,0,"L");
        $pdf->SetXY(127,$y);
        $pdf->Cell(70,6,"$collaborators",1,0,"L");
        $y += 6;
        $pdf->SetXY(87,$y);
        $pdf->Cell(40,6,"Funder ",1,0,"L");
        $pdf->SetXY(127,$y);
        $pdf->Cell(70,6,"$funder",1,0,"L");
        $y += 6;
        $pdf->SetXY(87,$y);
        $pdf->Cell(40,6,"Submission deadline ",1,0,"L");
        $pdf->SetXY(127,$y);
        $pdf->Cell(70,6,"$deadline",1,0,"L");

        if ($page==1 && $index > 1) {
            $y += 6;
            $page = 0;
        }
    }
}

if ($y >= 247) {
    $pdf->AddPage("P","A4");
    $pdf->SetFont('Arial','',11);
    $y = 25;
}

if ($index == 4) {
    $pdf->AddPage("P","A4");
    $pdf->SetFont('Arial','',11);
    $y = 25;
}

$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(87,$y);
$pdf->MultiCell(110,6,"$staffing_and_equipment",0);
$pdf->SetXY(87,$y);
$pdf->Cell(110,60,"",1,0,"L");
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"Staffing/equipment: What new staffing and/or ",0,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"equipment will you require to achieve",0,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6," your plans?",0,0,"L");
$y += 48;



$pdf->SetXY(87,$y);
$pdf->Cell(110,60,"",1,0,"L");
$pdf->SetXY(7,$y);
$pdf->Cell(80,60,"",1,0,"L");
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"How many bids do you plan in the",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Journal Papers",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_journal_papers_next24months",1,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"next 5 years and to which funders?",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Conference Papers",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_conference_papers_next24months",1,0,"L");
$y += 6;
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Books",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_books_papers_next24months",1,0,"L");
$y += 6;
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Monographs",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_monographs_papers_next24months",1,0,"L");
$y += 6;
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Other",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->MultiCell(70,6,"$other_outputs_next24months",0);
$y += 36;
$pdf->SetXY(7,$y);
$pdf->Cell(80,12,"",1,0,"L");
$pdf->SetXY(7,$y);
$pdf->Cell(80,6," How many PGRs do you currently",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Principal Supervisor",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_pgrs_psv",1,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6," supervise?",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Co-Supervisor",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_pgrs_csv",1,0,"L");

if ($index == 3) {
    $pdf->AddPage("P", "A4");
    $pdf->SetFont('Arial', '', 11);
    $y = 25;
}
else {
    $y += 6;
}

$pdf->SetXY(7,$y);
$pdf->Cell(80,12,"",1,0,"L");
$pdf->SetXY(7,$y);
$pdf->Cell(80,6," How many of your current PhD students are ",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Principal Supervisor",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_phd_completed_next5years_psv",1,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"likely to complete over the next five years?",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Co-Supervisor",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_phd_completed_next5years_csv",1,0,"L");


$y += 6;
$pdf->SetXY(87,$y);
$pdf->Cell(110,12,"",1,0,"L");
$pdf->SetXY(7,$y);
$pdf->Cell(80,12,"",1,0,"L");
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"How many new PHD students do you intend ",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Principal Supervisor",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_phd_recruited_next2years_psv",1,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"to recruit over the next two years?",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->Cell(40,6,"Co-Supervisor",1,0,"L");
$pdf->SetXY(127,$y);
$pdf->Cell(70,6,"$no_of_phd_recruited_next2years_csv",1,0,"L");


if ($index == 2) {
    $pdf->AddPage("P", "A4");
    $pdf->SetFont('Arial', '', 11);
    $y = 25;
}

if ($index != 2) {
    $y += 6;
}
$pdf->SetXY(7,$y);
$pdf->Cell(80,72,"",1,0,"L");
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"Please specify your IT requirements for the ",0,0,"L");
$pdf->SetXY(87,$y);
$pdf->MultiCell(110,6,"$it_requirements_next2years",0);
$pdf->SetXY(87,$y);
$pdf->Cell(110,72,"",1,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"next two years - this should relate to ",0,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"infrastructure requirements and/or ",0,0,"L");
$y += 6;
$pdf->SetXY(7,$y);
$pdf->Cell(80,6,"data storage.",0,0,"L");




$pdf->Output("I", "PRIP Results.pdf");