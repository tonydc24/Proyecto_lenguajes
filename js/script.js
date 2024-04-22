

function aplicarActivo(id) {
    var botonesMenu = document.querySelectorAll('.menu button');
    botonesMenu.forEach(function(boton) {
        boton.classList.remove('active');
    });

    document.getElementById(id).classList.add('active');
}


function handleClick(event) {
    var id = event.target.id;
    aplicarActivo(id);
    localStorage.setItem('activeButton', id);
}

var activeButtonId = localStorage.getItem('activeButton');
if (activeButtonId) {
    aplicarActivo(activeButtonId);
}

var botonesMenu = document.querySelectorAll('.menu button');
botonesMenu.forEach(function(boton) {
    boton.addEventListener('click', handleClick);
});
