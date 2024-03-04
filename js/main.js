const navMenu = document.getElementById('nav-menu'),
navToggle = document.getElementById('nav-toggle'),
navClose = document.getElementById('nav-close')

if(navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu')
    })
}

if(navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu')
    })
}

const upArrow = document.querySelectorAll('.icon-arrow')
upArrow.forEach((button) => {
    button.addEventListener('click', () => {
        location.href='#'
    })
});

window.addEventListener('load', () => {
    window.scrollTo(0, 0)
})

// let slideIndex = 1;
// showSlides(slideIndex);

// function showSlides(n) {
//   let i;
//   let slides = document.getElementsByClassName("slides");
//   let dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
// }

let slideIndex = 0;
let timeoutID;
showSlides();

const plusSlides = (n) => {
    clearTimeout(timeoutID);
    showSlides(slideIndex += n - 1);
}

const currentSlide = (n) => {
    clearTimeout(timeoutID);
    showSlides(slideIndex += n - 1);
}

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("slides");
  for (i = 0; i < slides.length; i++)
    slides[i].style.display = "none"
  slideIndex++;
  if (slideIndex > slides.length) slideIndex = 1;
  if(slideIndex < 1) slideIndex = slides.length;
  slides[slideIndex-1].style.display = "block";
  timeoutID = setTimeout(showSlides, 5000);
}

document.addEventListener('DOMContentLoaded', function () {
    var slides = document.querySelectorAll('.slides');
    slides.forEach(function (slide, index) {
        slide.addEventListener('click', function () {
            openModal(index);
        });
    });
});

function openModal(index) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("img01"); // Corrected ID here
    var images = document.querySelectorAll('.slides img'); // Assuming you have img tags inside .slides
    modalImg.src = images[index].src;
    modal.style.display = "block";
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
