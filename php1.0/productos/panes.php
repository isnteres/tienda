<?php 
// Inicia la sesión
session_start();
require('../layout/header1.php'); 
require('../layout/heaproductos.php');

// Contador del carrito
define('URI_ACTUAL', htmlspecialchars($_SERVER['REQUEST_URI']));
$cantidadTotal = 0;
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $cantidadTotal += $item['cantidad'];
    }
}

$productos = [
    [1, "Pan serranito", "serrano.jpg", 1.00],
    [2, "Pan con Queso", "queso.jpg", 2.50],
    [3, "Pan con Queso y Oregano", "quesoyoregano.png", 2.50],
    [4, "Pan con Pollo al Horno", "pollohorno.jpg", 2.50],
    [5, "Pan con Cabanossi y Queso", "cabanossiyqueso.png", 2.50],
    [6, "Pan con Cabanossi y Jamon", "jamon.jpg", 2.50],
    [7, "Pan con Chocolate con Pecana", "chocolate.jpg", 2.50],
    [8, "Pan con Manjar", "manjar.jpg", 2.50],
    [9, "Pan con Salchicha Huachana", "huachana.jpg", 2.50],
    [10, "Mini pizza Americana", "pizza.jpg", 5.00]
];
?>

<main>
    <div class="product-container">
        <?php foreach ($productos as [$id, $nombre, $imagen, $precio]): ?>
            <div class="product">
                <img src="../imagenes/<?= htmlspecialchars($imagen) ?>" alt="<?= htmlspecialchars($nombre) ?>" width="150">
                <p><?= htmlspecialchars($nombre) ?></p>
                <p class="price">S/ <?= number_format($precio, 2) ?></p>
                <form method="POST" action="../agregar_carrito.php">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                    <input type="hidden" name="precio" value="<?= $precio ?>">
                    <input type="hidden" name="origen" value="<?= URI_ACTUAL ?>">
                    <button class="button-1" type="submit">Agregar</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (isset($_GET['agregado'])): ?>
        <div id="mensaje-agregado" style="
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            z-index: 9999;
            font-weight: bold;
        ">
            ✅ Producto agregado al carrito
        </div>
        <script>
            setTimeout(() => {
                const mensaje = document.getElementById("mensaje-agregado");
                if (mensaje) mensaje.style.display = "none";
            }, 2500);
        </script>
    <?php endif; ?>

    <!-- Carrito flotante -->
    <div class="carrito-flotante-container">
        <a href="/tienda/php1.0/carrito.php" class="btn-carrito-flotante">🛒</a>
        <?php if ($cantidadTotal > 0): ?>
            <span id="contador-carrito"><?= $cantidadTotal ?></span>
        <?php endif; ?>
    </div>
</main>

<?php require('../layout/footer1.php'); ?>
