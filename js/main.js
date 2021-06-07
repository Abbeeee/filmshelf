// ================================
//      Slideshow
// ================================

var slideIndex = 0;

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



// ================================
//      Something else
// ================================