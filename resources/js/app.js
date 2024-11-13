import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


//open modal on the home page to display blog posts 
var elements = document.getElementsByClassName("read-more-button");
var smelements = document.getElementsByClassName("close-button");

//add event listener to each open button on a post  
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', (e) => openModal(e));
}

//add event listener to each close button in the modal 
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

// //open modal on the profile page for account deletion  
// var delements = document.getElementById("delete-account-button");
// var melemnets = document.getElementById("close-modal-button");

// //add event listener to open button 
// delements.addEventListener('click', (e) => openDeleteModal(e));

// //add event listener to the close button 
// melemnets.addEventListener('click', (e) => closeDeleteModal(e));

// function openDeleteModal(e) {
//     document.getElementById("delete-modal").style.display = 'block';
// }

// function closeDeleteModal(e) {
//     document.getElementById("delete-modal").style.display = 'none';
// }


var celements = document.getElementById("openDeleteUserFormButton");

celements.addEventListener('click', (e) => openDeleteStuff(e));

function openDeleteStuff() {
    document.getElementById("deleteUserForm").style.height = 'auto';
}