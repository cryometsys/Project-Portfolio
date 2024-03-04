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