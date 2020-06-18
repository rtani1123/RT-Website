var slideIndex = 0;
var timeoutVar;
showSlides();
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slideshowPics");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if(slideIndex > slides.length) {slideIndex=1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    timeoutVar = setTimeout(showSlides, 4000);
}

function currentSlide(currentIndex) {
    clearTimeout(timeoutVar);
    var i;
    var slides = document.getElementsByClassName("slideshowPics");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[currentIndex-1].style.display = "block";

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    dots[currentIndex-1].className += " active";

    slideIndex = currentIndex;
    setTimeout(showSlides, 4000);
}
