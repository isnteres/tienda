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

  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        /* Nuevo nombre de clase para el botón del carrito */
        .btn-carrito-flotante {
               font-size: 30px;
               background: none;
               border: none;
               color: #ff6347; 
               padding: 0; 
               cursor: pointer;
               position: fixed;
               top: 40px;
               right: 70px;
               z-index: 100;
               transition: color 0.3s ease;
        }

        .btn-carrito-flotante:hover {
            background-color: #e5533d;
        }

        /* Fondo del modal */
        #fondo-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }

        /* Modal */
        #modal-carrito {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 90%;
            max-height: 70vh;
            overflow-y: auto;
            z-index: 9999;
            font-family: 'Arial', sans-serif;
        }

        #modal-carrito,
        #modal-carrito * {
            color: #222 !important;
        }

        /* Botón cerrar */
        #cerrar-modal {
            float: right;
            background: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        /* Contenido del carrito */
        #contenido-carrito {
            font-size: 16px;
        }

        /* Estilos productos carrito */
        #carrito-html-generado ul {
            list-style: none;
            padding: 0;
        }

        #carrito-html-generado li {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        #carrito-html-generado li strong {
            font-size: 18px;
            color: #333;
        }

        #carrito-html-generado p {
            font-size: 16px;
            color: #333;
            margin-top: 10px;
        }

        #carrito-html-generado hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 10px 0;
        }
    </style>


<!-- Botón del carrito con nueva clase -->
<button id="carrito-btn" class="btn-carrito-flotante">🛒</button>

<!-- Fondo del modal -->
<div id="fondo-modal"></div>

<!-- Modal del carrito -->
<div id="modal-carrito">
    <button id="cerrar-modal">Cerrar</button>
    <div id="contenido-carrito">Cargando...</div>
    <br>
    <a href="#" style="display:block; margin-top:10px; text-align:center;">Ver carrito completo</a>
</div>

<!-- Contenido generado desde PHP (oculto) -->
<div id="carrito-html-generado" style="display:none;">
    <h3>Tu carrito</h3>
    <?php
    echo "<table class='tabla-carrito'>";
    echo "<thead>
            <tr>
                <th>ID</th>
                <th>Nombre de producto</th>
                <th>Precio (S/)</th>
                <th>Cantidad</th>
                <th>Subtotal (S/)</th>
            </tr>
          </thead>";
    echo "<tbody>";

    if (!empty($_SESSION['carrito'])) {
        $total = 0;
        foreach ($_SESSION['carrito'] as $item) {
            $subtotal = $item['precio'] * $item['cantidad'];
            $total += $subtotal;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['id']) . "</td>";
            echo "<td>" . htmlspecialchars($item['nombre']) . "</td>";
            echo "<td>" . number_format($item['precio'], 2) . "</td>";
            echo "<td>" . intval($item['cantidad']) . "</td>";
            echo "<td>" . number_format($subtotal, 2) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table><hr>";
        echo "<p><strong>Total: S/ " . number_format($total, 2) . "</strong></p>";
    } else {
        echo "<tr><td colspan='5' style='text-align:center;'>El carrito está vacío.</td></tr>";
        echo "</tbody></table>";
    }
    ?>
</div>

<style>
    /* Estilos para la tabla dentro del modal */
    .tabla-carrito {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
    }

    .tabla-carrito th, .tabla-carrito td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .tabla-carrito th {
        background-color: #f2f2f2;
        color: #333;
    }

    .tabla-carrito tbody tr:hover {
        background-color: #f9f9f9;
    }
</style>

<script>
    const btnCarrito = document.getElementById("carrito-btn");
    const modal = document.getElementById("modal-carrito");
    const fondo = document.getElementById("fondo-modal");
    const contenido = document.getElementById("contenido-carrito");
    const btnCerrar = document.getElementById("cerrar-modal");

    btnCarrito.addEventListener("click", function () {
        modal.style.display = "block";
        fondo.style.display = "block";
        contenido.innerHTML = document.getElementById("carrito-html-generado").innerHTML;
    });

    btnCerrar.addEventListener("click", function () {
        modal.style.display = "none";
        fondo.style.display = "none";
    });

    fondo.addEventListener("click", function () {
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
