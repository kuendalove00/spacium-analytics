document.addEventListener("DOMContentLoaded", function() {
    var startup = document.getElementById("startup");
    var submenu = startup.querySelector(".submenu");
  
    startup.addEventListener("click", function() {
      submenu.classList.toggle("active");
    });
  });

function showSection(sectionId) {
    var sections = document.querySelectorAll('.content-section');
    sections.forEach(function(section) {
        section.style.display = 'none'; 
    });
    document.getElementById(sectionId).style.display = 'block';
}

