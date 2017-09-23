document.addEventListener('DOMContentLoaded', function() {
    var typed = new Typed('#typed', {
        strings: ['<span class="fa fa-wifi"></span>  Web Developer', '<span class="fa fa-user-o"></span>  Frontend Design', '<span class="fa fa-database"></span>  Backend Basic'],
        typeSpeed: 0,
        backSpeed: 0,
        fadeOut: true,
        loop: true
    });
});

const burgerButton = document.getElementById('burger-button');
burgerButton.addEventListener('click', toggleMenu);

const burgerButtonClose = document.getElementById('burger-buttonClose');
burgerButtonClose.addEventListener('click', toggleMenu);

const sectionDatos = document.getElementById('datos');
const sectionPortada = document.getElementById('portada');

function toggleMenu(){
    sectionDatos.classList.toggle('active');
    sectionPortada.classList.toggle('active');
    comprobarMenu();
};

function comprobarMenu(){
    if (sectionDatos.classList.contains('active')) {
        burgerButton.style.display = "none";
    } else {
        burgerButton.style.display = "initial";
    }
}

// function showMenu(){
//     $menu.classList.add('active');
// };

// function hideMenu(){
//     $menu.classList.remove('active');
// };


