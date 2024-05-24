<?php

session_start();

//CHECK ADMIN LOGIN HERE
//if admin is not logged in, redirect to prip.php page
if(!isset($_SESSION['logged_in_staff_number'])){
  header('location: prip.php');
}

require("dbconn.php");

$theme;
$sqlQuery = "SELECT * FROM projects WHERE project_theme = '";
$additionalQuery;
$rows = array();
// AND p.project_id = rp.project_id AND rp.staff_number = r.staff_number" 
// Get the parameter passed in the AJAX request
if (isset($_POST["buttonID"])) {
  $buttonID = $_POST["buttonID"];
  $additionalQuery = "";
}
if (isset($_POST["year"]) && $_POST["year"] != "undefined") {
  $year = $_POST["year"];
  $additionalQuery = " AND date_of_submission LIKE '%$year%'";
}
if (isset($_POST["projectID"]) && $_POST["projectID"] != "undefined") {
  $projectID = $_POST["projectID"];
  $additionalQuery = " AND p.project_id = '$projectID'";
}
if (isset($_POST["staff"]) && $_POST["staff"] != "undefined") {
  $staff = $_POST["staff"];
  $sqlQuery = "SELECT p.project_id, rp.type_of_staff, forename, surename FROM projects p, researchers_projects rp, researchers r WHERE project_theme = '";
  $additionalQuery = "AND p.project_id = rp.project_id AND rp.staff_number = r.staff_number" . $additionalQuery;
}

// Determine which button was clicked and execute the appropriate code
if (isset($_POST["buttonID"])) {
  if ($buttonID == "healthcare-btn") {
    // Code to execute for button 1
    $theme = "Healthcare Technology Innovation"; 
    $sqlQuery = mysqli_query($conn, $sqlQuery . $theme . "'" . $additionalQuery);
    while ($row = mysqli_fetch_assoc($sqlQuery)) {
      $rows[] = $row;
    }

  } elseif ($buttonID == "smart-btn") {
    // Code to execute for button 2
    $theme = "Smart Industrial Systems"; 
    $sqlQuery = mysqli_query($conn, $sqlQuery . $theme . "'" . $additionalQuery);
    while ($row = mysqli_fetch_assoc($sqlQuery)) {
      $rows[] = $row;
    }


  } elseif ($buttonID == "advanced-btn") {
    $theme = "Advanced Materials"; 
    $sqlQuery = mysqli_query($conn, $sqlQuery . $theme . "'" . $additionalQuery);
    while ($row = mysqli_fetch_assoc($sqlQuery)) {
      $rows[] = $row;
    }

  } elseif ($buttonID == "sustainable-btn") {
    $theme = "Sustainable Environments"; 
    $sqlQuery = mysqli_query($conn, $sqlQuery . $theme . "'" . $additionalQuery);
    while ($row = mysqli_fetch_assoc($sqlQuery)) {
      $rows[] = $row;
    }
  } else {
    
  }
  echo json_encode($rows);
} else {
  
}
// Send the response back to the JavaScript function
?>