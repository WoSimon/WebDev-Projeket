// Zuweisung von navbar
let navbar = document.querySelector('.navbar');

//Wenn man den Menüknopf betätigt, aktiviert sich das navbar menü
document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}

//Beim Scrollen wird das Menü wieder geschlossen
window.onscroll = () =>{
    navbar.classList.remove('active');
}