var button = document.querySelector('.button');
var nav = document.querySelector('.nav-menu');
button.addEventListener('click', function () {
    nav.classList.toggle('activo');
});

document.getElementById("carrito-btn").addEventListener("click", function() {
   
    document.getElementById("carrito-modal").style.display = "block";
    document.getElementById("fondo-modal").style.display = "block";

  
    fetch('/tienda/php1.0/carrito.php?ajax=1')  
        .then(response => response.text())
        .then(html => {
            document.getElementById("contenido-carrito").innerHTML = html;
        })
        .catch(err => {
            document.getElementById("contenido-carrito").innerHTML = '<p>Error al cargar el carrito.</p>';
            console.error(err);
        });
});

document.getElementById("cerrar-carrito").addEventListener("click", function() {
    document.getElementById("carrito-modal").style.display = "none";
    document.getElementById("fondo-modal").style.display = "none";
});

document.getElementById("fondo-modal").addEventListener("click", function() {
   
    document.getElementById("carrito-modal").style.display = "none";
    document.getElementById("fondo-modal").style.display = "none";
});


