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
    var modal = document.getElementById("myModal")
    var modalImg = document.getElementById("img01")
    var images = document.querySelectorAll('.slides img')
    modalImg.src = images[index].src
    modal.style.display = "block"
}

function closeModal() {
    var modal = document.getElementById("myModal")
    modal.style.display = "none"
}

// document.addEventListener('DOMContentLoaded', function () {
//     const contactForm = document.getElementById('contact-form');
//     contactForm.addEventListener('submit', function (event) {
//         event.preventDefault()

//         const formData = new FormData(contactForm);
        
//         fetch('./php/mail.php', {
//             method: 'POST',
//             body: formData
//         })
//         .then(response => {
//             if (response.ok) {
//                 alert('Message sent successfully!');
//                 clearForm()
//                 window.location.reload();
//             } else {
//                 throw new Error('Failed to send message');
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             alert('Failed to send message. Please try again.')
//         })
//     })
// })

function clearForm() {
    document.getElementById('contactForm').reset();
}

document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    clearForm();
    alert('Message sent successfully!');
    setTimeout(function() {
        location.reload();
    }, 2000);
})

window.addEventListener('load', function() {
    var slides = document.querySelectorAll('.slides');
    slides.forEach(function(slide) {
        var img = slide.querySelector('img');
        if (img) {
            img.onload = function() {
                var aspectRatio = img.naturalWidth / img.naturalHeight;
                var container = slide.parentElement;
                var containerAspectRatio = container.offsetWidth / container.offsetHeight;
                
                if (aspectRatio > containerAspectRatio) {
                    img.style.width = '100%';
                    img.style.height = 'auto';
                } else {
                    img.style.height = '100%';
                    img.style.width = 'auto';
                }
            }
        }
    })
})

document.addEventListener('DOMContentLoaded', function () {
    var slides = document.querySelectorAll('.slides');

    slides.forEach(function (slide) {
        var darkOverlay = slide.querySelector('.dark-overlay');
        var slideText = slide.querySelector('.slide-text');

        slide.addEventListener('mouseenter', function () {
            darkOverlay.style.display = 'flex';
            slideText.style.display = 'block';
        });

        slide.addEventListener('mouseleave', function () {
            darkOverlay.style.display = 'none';
            slideText.style.display = 'none';
        })
    })
})