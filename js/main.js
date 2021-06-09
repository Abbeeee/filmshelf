var slideIndex = 0;
var theButton;

function slideShow() {
  var i;
  var slides = document.getElementsByClassName("jumbotron-custom");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(slideShow, 6000); // Change image every 6 seconds
}

function goBack() {
  var theButton = document.getElementById("add-btn");
  if (theButton.value === "Added to list") {
    history.go(-2);
  } else {
    history.go(-1);
  }
  
}

function change() {
  var theButton = document.getElementById("add-btn");
  theButton.value = "Added to list";
  theButton.classList.add("disabled");
  theButton.style = "background-color: rgba(78, 78, 78)";
}