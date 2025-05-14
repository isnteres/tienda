<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuego Ancestral</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/productos.css">
    <link rel="stylesheet" href="estilos/nosotros.css">
    <link rel="stylesheet" href="estilos/perfil.css">
    <script defer src="js/app.js"></script>
    <script defer src="js/carrusel.js"></script> 
    
</head>
<body>

    <header class="header">
        <div class="img">
            <img src="imagenes/logofuego.jpeg" alt="logo-fuegoancestral">
        </div>
        
        <button class="button">
            <svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <nav class="nav-menu  ">
            <ul>
                <li><a href="index2.php" class="boton">Inicio</a></li>
                <li><a href="productos2.php" class="boton">Productos</a></li>
                <li><a href="nosotros2.php" class="boton">Nosotros</a></li>
            </ul>
           <div class="perfil-container">
                <button id="perfil-btn" class="perfil-icono">
                                          👤
                </button>

                 
                </div>
              <div id="menu-perfil" class="menu-perfil oculto">
                       <a href="#">Perfil</a>
                       <a href="#">Reservas</a>
                       <a href="logout.php">Cerrar sesión</a>
                 </div>
    </header> 
<script>
document.getElementById("perfil-btn").addEventListener("click", function() {
    const menu = document.getElementById("menu-perfil");
    menu.classList.toggle("oculto");
});
</script>