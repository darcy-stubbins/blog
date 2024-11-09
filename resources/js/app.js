import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var elements = document.getElementsByClassName("read-more-button");
var smelements = document.getElementsByClassName("close-button");
//add event listener to each post 
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', (e) => openModal(e));
}
//add event listener to each button 
for (var i = 0; i < smelements.length; i++) {
    smelements[i].addEventListener('click', (e) => closeModal(e));
}
function openModal(e) {
    var modalId = e.target.getAttribute('data-target');
    document.getElementById(modalId).style.display = 'block';
}
function closeModal(e) {
    var modalId = e.target.getAttribute('data-target');
    document.getElementById(modalId).style.display = 'none';
}