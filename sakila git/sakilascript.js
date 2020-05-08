var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      collapseAll();
      content.style.display = "block";
    }
    this.classList.toggle("active");
  });
}

function collapseAll(){
    for (i = 1; i < coll.length; i++) {
        coll[i].nextElementSibling.style.display = "none";
        coll[i].classList.remove("active");
    }
}

function openSideBar(){
    document.getElementById("mySideBar").style.width = "250px";
}

function closeSideBar(){
    document.getElementById("mySideBar").style.width = "0";
}