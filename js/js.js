$(document).ready(function(){
  var slideIndex = 1;
  showSlides(slideIndex);


  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }


  $(".prev").click(function(){
    showSlides(slideIndex -= 1);
  });


  $(".next").click(function(){
    showSlides(slideIndex += 1);
  });


  $(".dot").click(function(){
    var index = $(this).index() + 1;
    showSlides(slideIndex = index);
  });


  // автоматическое переключение слайдов
  var timerId = setInterval(function() {
    showSlides(slideIndex += 1);
  }, 3000);
});

function onEntry(entry) {
  entry.forEach(change => {
    if (change.isIntersecting) {
      change.target.classList.add('element-show');
    }
  });
}
let options = { threshold: [0.5] };
let observer = new IntersectionObserver(onEntry, options);
let elements = document.querySelectorAll('.element-animation');
for (let elm of elements) {
  observer.observe(elm);
}