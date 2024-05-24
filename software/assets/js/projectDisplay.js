//DASHBOARD/THEME/PROJECT BACKEND FUNCTIONS

// AJAX request for projectScript.php. Sends the ID of the button clicked and returns and stores the specified SQL rows.
function executePHP(buttonID, staff, year, projectID) {
  var xhttp = new XMLHttpRequest();
  // What runs when the AJAX request is completed
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var rows = JSON.parse(this.responseText);
      if (staff == undefined) {
        localStorage.setItem("projects", JSON.stringify(rows));
        localStorage.setItem("buttonID", buttonID);
        window.location.href = "theme.php";
      } else {
        var rows = JSON.parse(this.responseText);
        localStorage.setItem("staff", JSON.stringify(rows));
        window.location.href = "project.php";
      }
    }
  };

  // AJAX request
  xhttp.open("POST", "includes/projectScript.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("buttonID=" + buttonID + "&" + "staff=" + staff + "&" + "year=" + year + "&" + "projectID=" + projectID);
}

function initializeThemePage() {
  var allProjects = JSON.parse(localStorage["projects"]);
  var table = document.getElementById("theme-table");
  var projectYearInput = document.getElementById("project-year");
  var header = document.getElementById("theme-header");

  //Setting the header
  switch (localStorage.getItem("buttonID")) {
  case "healthcare-btn":
    header.innerHTML = "Healthcare Technology Innovation";
    break;
  case "smart-btn":
    header.innerHTML = "Smart Industrial Systems";
    break;
  case "advanced-btn":
    header.innerHTML = "Advanced Materials";
    break;
  case "sustainable-btn":
    header.innerHTML = "Sustainable Environments";
    break;
  }

  //Creating the table
  for (var i = 0; i < allProjects.length; i++) {
    var row = allProjects[i];

    var tableRow = table.insertRow(-1);
    var cell1 = tableRow.insertCell(0);
    var cell2 = tableRow.insertCell(1);
    var cell3 = tableRow.insertCell(2);

    cell1.innerHTML = i + 1;
    cell2.innerHTML = row["project_title"];
    cell3.innerHTML = row["date_of_submission"]

    tableRow.style.cursor = "pointer";
  }

  //Handling selection of table rows
  table.querySelectorAll('tr').forEach((row, index) => {
    row.addEventListener('click', () => {
      localStorage.setItem("projectNumber", index);
      projectID = allProjects[localStorage.getItem("projectNumber")]["project_id"]
      localStorage.setItem("projectID", projectID);
      executePHP(localStorage.getItem("buttonID"), true, "undefined", projectID);
    });
  });

  // Selecting the year for the projects you want to view
  let themeForm = document.getElementById("theme-form");
  themeForm.addEventListener("submit", (e) => {
    projectYear = projectYearInput.value;
    if (projectYear.length == 4 || projectYear == "") {
      executePHP(localStorage.getItem("buttonID"), undefined, projectYear);
    } else {
      projectYearInput.value = "";
      projectYearInput.placeholder = "Please enter a valid year";
    }
  })
}

function removeThemeTableRows() {
  var table = document.getElementById("theme-table");
  var rowCount = table.rows.length;

  for (var x = rowCount - 1; x >= 0; x--) {
     table.deleteRow(x);
  }
}

function fillProject() {
  var allProjects = JSON.parse(localStorage["projects"]);
  var allStaff = JSON.parse(localStorage["staff"]);
  const project = allProjects[localStorage.getItem("projectNumber")];

  document.getElementById("title").innerHTML = project["project_title"];
  document.getElementById("theme").innerHTML = project["project_theme"];
  document.getElementById("bid").innerHTML = project["bid_value"];
  document.getElementById("stage").innerHTML = project["stage_of_development"];
  document.getElementById("collaborators").innerHTML = project["collaborators"];

  for (var i = 0; i < allStaff.length; i++) {
    var staff = allStaff[i];
    if (staff["type_of_staff"] == "PI") {
      piInput = document.getElementById("PI");
      piInput.innerHTML = staff["forename"] + " " + staff["surename"];
    } else {
      coInput = document.getElementById("CO-I");
      coInput.innerHTML += staff["forename"] + " " + staff["surename"] + ", ";
    }
  }

  document.getElementById("funder").innerHTML = project["funder"];
  document.getElementById("deadline-date").innerHTML = project["deadline"];
  document.getElementById("submission-date").innerHTML = project["date_of_submission"];

  console.log(project["date_of_submission"]);
}
