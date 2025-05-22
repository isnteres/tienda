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
        <nav class="nav-menu  ">
            <ul>
                <li><a href="/tienda/php1.0/index2.php" class="boton">Inicio</a></li>
                <li><a href="/tienda/php1.0/productos/todos.php" class="boton">Productos</a></li> 
                <li><a href="/tienda/php1.0/nosotros2.php" class="boton">Nosotros</a></li>
            </ul>
           
        </div>
         <div class="carrito-container">
    <button id="carrito-btn" class="carrito-icono">🛒</button>
</div>

<script>
    document.getElementById("carrito-btn").addEventListener("click", function() {
        window.location.href = "carrito.php";
    });
</script>
  
           <div class="perfil-container">
                <button id="perfil-btn" class="perfil-icono">
                                          👤
                </button>
               <div id="menu-perfil" class="menu-perfil oculto">
                       <a href="#">Perfil</a>
                       <a href="#">Reservas</a>
                       <a href="index.php?vista=logaut">Cerrar sesión</a>
                 </div>
                 
                </div>
            
    </header> 
<script>
document.getElementById("perfil-btn").addEventListener("click", function() {
    const menu = document.getElementById("menu-perfil");
    menu.classList.toggle("oculto");
});
</script>