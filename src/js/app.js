document.addEventListener('DOMContentLoaded', function() {

    eventListeners();
    darkMode();
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){   //para que cambie automaticamente a dark mode
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else {
        navegacion.classList.add('mostrar');
    }
    //navegacion.classList.toogle('mostrar');    si tiene la clase se lo quita y si no la tiene se la agrega
}