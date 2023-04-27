let CountButtonHomeClicks = 0;

$('.btn-easter-egg').on('click', function () {
    CountButtonHomeClicks += 1;
    if(CountButtonHomeClicks === 7) {
        alert("Vous passez en mode développeur!");
    }
});

let shutdownHomeClicks = 0;

$('.shutdown-easter-egg').on('click',function (){
    shutdownHomeClicks += 1;
    switch (shutdownHomeClicks) {
        case 2:
            $('.brand-logo-bar').html("Shutdown!");
            break;
        case 3:
            document.documentElement.requestFullscreen();
            let body = $('body');
            let large = '<div class="container"><div class="center-ee"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div> <p class="white-text">Arrêt en cours </p></div></div>'
            body.html(large);
            body.css({
                "background-color": "#0259A0",
            });
    }
});