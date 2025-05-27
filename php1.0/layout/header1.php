<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cantidadTotal = 0;
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $cantidadTotal += $item['cantidad'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Fuego Ancestral</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="/tienda/php1.0/estilos/style.css">
    <link rel="stylesheet" href="/tienda/php1.0/estilos/productos.css">
    <link rel="stylesheet" href="/tienda/php1.0/estilos/nosotros.css">
    <link rel="stylesheet" href="/tienda/php1.0/estilos/perfil.css">
    <link rel="stylesheet" href="/tienda/php1.0/estilos/carrito.css">

    <!-- Scripts -->
    <script defer src="/tienda/php1.0/js/app.js"></script>
    <script defer src="/tienda/php1.0/js/carrusel.js"></script> 
</head>
<body>
    <div class="wrapper">
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

    <!-- Carrito flotante -->
    <div class="carrito-flotante-container">
        <button id="carrito-btn" class="btn-carrito-flotante">🛒</button>
        <?php if ($cantidadTotal > 0): ?>
            <span id="contador-carrito"><?= $cantidadTotal ?></span>
        <?php endif; ?>
    </div>

    <!-- Modal fondo y contenido -->
    <div id="fondo-modal"></div>
    <div id="modal-carrito">
        <button id="cerrar-modal">Cerrar</button>
        <div id="contenido-carrito">Cargando...</div>
        <br>
        <a href="/tienda/php1.0/carrito.php" style="display:block; margin-top:10px; text-align:center;">Ver carrito completo</a>
    </div>

    <!-- Contenido generado por PHP para inyectar -->
    <div id="carrito-html-generado" style="display:none;">
        <h3>Tu carrito</h3>
        <table class="tabla-carrito">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de producto</th>
                    <th>Precio (S/)</th>
                    <th>Cantidad</th>
                    <th>Subtotal (S/)</th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                    echo "<p><strong>Total unidades: $cantidadTotal</strong></p>";
                    echo "<p><strong>Total: S/ " . number_format($total, 2) . "</strong></p>";
                } else {
                    echo "<tr><td colspan='5' style='text-align:center;'>El carrito está vacío.</td></tr>";
                    echo "</tbody></table>";
                }
                ?>
    </div>

    <!-- Perfil -->
    <div class="perfil-container">
        <button id="perfil-btn" class="perfil-icono">👤</button>
        <div id="menu-perfil" class="menu-perfil oculto">
            <a href="/tienda/php1.0/perfil.php">Perfil</a>
            <a href="/tienda/php1.0/mis_compras.php">Reservas</a>
            <a href="/tienda/php1.0/index.php?vista=logaut">Cerrar sesión</a>
        </div>
    </div>
</header>

<!-- JS para funcionalidad del carrito y perfil -->
<script>
    const btnCarrito = document.getElementById("carrito-btn");
    const modal = document.getElementById("modal-carrito");
    const fondo = document.getElementById("fondo-modal");
    const contenido = document.getElementById("contenido-carrito");
    const btnCerrar = document.getElementById("cerrar-modal");

    btnCarrito.addEventListener("click", () => {
        modal.style.display = "block";
        fondo.style.display = "block";
        contenido.innerHTML = document.getElementById("carrito-html-generado").innerHTML;
    });

    const cerrarModal = () => {
        modal.style.display = "none";
        fondo.style.display = "none";
    }

    btnCerrar.addEventListener("click", cerrarModal);
    fondo.addEventListener("click", cerrarModal);
    window.addEventListener("keydown", (e) => {
        if (e.key === "Escape") cerrarModal();
    });

    document.getElementById("perfil-btn").addEventListener("click", () => {
        document.getElementById("menu-perfil").classList.toggle("oculto");
    });
</script>
</div>
</body>
</html>
