<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuego Ancestral</title>
    <link rel="stylesheet" href="/tienda/php1.0/estilos/style.css">
    <link rel="stylesheet" href="/tienda/php1.0/estilos/productos.css">
    <link rel="stylesheet" href="/tienda/php1.0/estilos/nosotros.css">
    <link rel="stylesheet" href="/tienda/php1.0/estilos/perfil.css">
    <script defer src="/tienda/php1.0/js/app.js"></script>
    <script defer src="/tienda/php1.0/js/carrusel.js"></script> 
    
</head>
<body>
<header class="header">
    <div class="img">
        <img src="/tienda/php1.0/imagenes/logofuego.jpeg" alt="logo-fuegoancestral">
    </div>

    <button class="button">
        <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>

    <nav class="nav-menu">
        <ul>
            <li><a href="/tienda/php1.0/index2.php" class="boton">Inicio</a></li>
            <li><a href="/tienda/php1.0/productos/todos.php" class="boton">Productos</a></li>
            <li><a href="/tienda/php1.0/nosotros2.php" class="boton">Nosotros</a></li>
        </ul>
    </nav>

<button id="carrito-btn" class="carrito-icono">🛒</button>


<div id="fondo-modal" style="
    display:none; 
    position:fixed; 
    top:0; left:0; right:0; bottom:0; 
    background:rgba(0,0,0,0.5); 
    z-index:9998;">
</div>


<div id="modal-carrito" style="
    display:none; 
    position:fixed; 
    top:50%; left:50%; 
    transform: translate(-50%, -50%);
    background:#fff; 
    padding:20px; 
    border-radius:8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    max-width:600px; 
    max-height:70vh; 
    overflow-y:auto; 
    z-index:9999;
">
    <button id="cerrar-modal" style="float:right; background:#f44336; color:#fff; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Cerrar</button>
    <div id="contenido-carrito">Cargando...</div>
    <br>
    <a href="php1.0/carrito.php" style="display:block; margin-top:10px; text-align:center;">Ver carrito completo</a>

</div>

<script>
    const btnCarrito = document.getElementById("carrito-btn");
    const modal = document.getElementById("modal-carrito");
    const fondo = document.getElementById("fondo-modal");
    const contenido = document.getElementById("contenido-carrito");
    const btnCerrar = document.getElementById("cerrar-modal");

    btnCarrito.addEventListener("click", function() {
        modal.style.display = "block";
        fondo.style.display = "block";
        contenido.innerHTML = "Cargando...";

        fetch('/tienda/php1.0/carrito.php?ajax=1')
            .then(res => res.text())
            .then(html => {
                contenido.innerHTML = html;
            })
            .catch(() => {
                contenido.innerHTML = "<p>Error al cargar el carrito.</p>";
            });
    });

    btnCerrar.addEventListener("click", function() {
        modal.style.display = "none";
        fondo.style.display = "none";
    });

    fondo.addEventListener("click", function() {
        modal.style.display = "none";
        fondo.style.display = "none";
    });
</script>





    <div class="perfil-container">
        <button id="perfil-btn" class="perfil-icono">👤</button>
        <div id="menu-perfil" class="menu-perfil oculto">
            <a href="/tienda/php1.0/perfil.php">Perfil</a>
            <a href="#">Reservas</a>
            <a href="/tienda/php1.0/index.php?vista=logaut">Cerrar sesión</a>
        </div>
    </div>
</header>

<script>
     //document.getElementById("carrito-btn").addEventListener("click", function() {
      //  window.location.href = "/tienda/php1.0/carrito.php";
    //});

    document.getElementById("perfil-btn").addEventListener("click", function() {
        const menu = document.getElementById("menu-perfil");
        menu.classList.toggle("oculto");
    });
</script>
