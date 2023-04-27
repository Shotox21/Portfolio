$(document).ready(function(){
    $('.carousel').carousel();
    $('.modal').modal();
    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.dropdown-trigger').dropdown({'hover': true,'coverTrigger': false});
});

function nextImage() {
    $('.carousel').carousel('next');
    $('body').css("background-video", "");
}

setInterval(function () {
    nextImage();
}, 2000);

function closeSidenav() {
    $('.sidenav').sidenav('close');
}

new WOW().init();