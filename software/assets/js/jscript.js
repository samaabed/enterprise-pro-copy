
function hideDiv() {
  var x = document.getElementById("form-content");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

const form = document.querySelector('#prip-form');
const pages = form.querySelectorAll('.page');
const prevBtn = form.querySelector('.prev-page');
const nextBtn = form.querySelector('.next-page');

let currentPage = 0;

function showPage(page) {
  pages.forEach((pages, index) => {
    if (index === page) {
      pages.style.display = 'block';
    } else {
      pages.style.display = 'none';
    }
  });
}

prevBtn.addEventListener('click', () => {
  if (currentPage > 0) {
    currentPage--;
    showPage(currentPage);
  }
});

nextBtn.addEventListener('click', () => {
  if (currentPage < pages.length - 1) {
    currentPage++;
    showPage(currentPage);
  }
});


showPage(currentPage);


//this function will show/hide the project fields in the prip form
//based on the type of the researcher (PI/CO-I) 
function showDetails(typePara, allProjectFieldsPara, PItitlePara, COItitlePara) {
  var type = document.getElementById(typePara).value;
  var allProjectFields = document.getElementsByClassName(allProjectFieldsPara);
  var PItitle  = document.getElementById(PItitlePara);
  var COItitle = document.getElementById(COItitlePara);

  if (type == 1) {
    for (let i = 0; i < allProjectFields.length; i++) {
      allProjectFields[i].style.display = "flex";
    }
    PItitle.style.display = "flex";
    COItitle.style.display = "none";


  }
  else {
    for (let i = 0; i < allProjectFields.length; i++) {
      allProjectFields[i].style.display = "none";
    }
    PItitle.style.display = "none";
    COItitle.style.display = "block";
  }
}
