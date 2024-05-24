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

  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Inter'>

</head>

<body>

  <div class="allButFooter">


    <!-- navbar -->
    <?php 
    require('includes/navbar.php')
    
    ?>



    <h1 class="main-header" id="theme-header"></h1>

    <!-- To select the year of submission -->
    <form onsubmit="return false" id="theme-form">
      <div class="input-group flex-nowrap ms-5 w-50">
        <span class="input-group-text">Enter the year you want to display the Projects for:</span>
        <input id="project-year" type="number" class="form-control" name="year">
        <input type="submit" value="GO" name="go" class="btn btn-dark">
      </div>
    </form>

    <!-- this table displays the projects in the "Healthcare Technology Innovation" theme -->
    <table class="table table-striped table-light table-hover table-formating  mt-5">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Project Name</th>
          <th scope="col">Submission Date</th>
        </tr>
      </thead>
      <tbody id="theme-table">
      </tbody>
    </table>

  </div>


  <!-- FOOTER -->
  <footer>
    <img src="assets/images/university-of-bradford-white-logo.png" width="200" height="50">
    <div>
      <p>University of Bradford</p>
      <p>Bradford, West Yorkshire, BD7 1DP, UK</p>
      <p>Tel: <a href="tel:+441274232323">+44 (0) 1274 232323</a></p>
    </div>

  </footer>

  <!--Javascript-->


  <script src = "assets/js/projectDisplay.js"></script>
  <script>
    initializeThemePage();
  </script>
  
  <!-- bootstrap V5.2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>