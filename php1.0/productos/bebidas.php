<?php 
session_start(); 
require('../layout/header1.php'); 
require('../layout/heaproductos.php'); 

define('URI_ACTUAL', htmlspecialchars($_SERVER['REQUEST_URI']));

$cantidadTotal = 0;
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $cantidadTotal += $item['cantidad'];
    }
}

$productos = [
    ["id" => 21, "nombre" => "Café Americano", "precio" => 3.00, "imagen" => "../imagenes/americano.jpg"],
    ["id" => 22, "nombre" => "Chocolate Caliente", "precio" => 3.50, "imagen" => "../imagenes/chocolatecaliente.jpg"],
    ["id" => 23, "nombre" => "Cafe con Canela", "precio" => 3.50, "imagen" => "../imagenes/Café_canela.jpg"],
    ["id" => 24, "nombre" => "Cafe con Vainilla", "precio" => 3.50, "imagen" => "../imagenes/cafe_vainilla.jpg"],
    ["id" => 25, "nombre" => "Té Verde", "precio" => 2.50, "imagen" => "../imagenes/te_verde.jpg"],
    ["id" => 26, "nombre" => "Manzanilla", "precio" => 1.50, "imagen" => "../imagenes/Manzanilla.jpg"],
    ["id" => 27, "nombre" => "Hierba Luisa", "precio" => 2.00, "imagen" => "../imagenes/Hierba Luisa.png"],
    ["id" => 28, "nombre" => "Emoliente", "precio" => 3.50, "imagen" => "../imagenes/Emoliente caliente.jpg"]
];
?>

<main>
    <div class="product-container">
        <?php foreach ($productos as $p): ?>
            <div class="product">
                <img src="<?= htmlspecialchars($p['imagen']) ?>" alt="<?= htmlspecialchars($p['nombre']) ?>" width="150">
                <p><?= htmlspecialchars($p['nombre']) ?></p>
                <p class="price">S/ <?= number_format($p['precio'], 2) ?></p>
                <form method="POST" action="../agregar_carrito.php">
                    <input type="hidden" name="id" value="<?= $p['id'] ?>">
                    <input type="hidden" name="nombre" value="<?= htmlspecialchars($p['nombre']) ?>">
                    <input type="hidden" name="precio" value="<?= $p['precio'] ?>">
                    <input type="hidden" name="origen" value="<?= URI_ACTUAL ?>">
                    <button type="submit" class="button-1">Agregar</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="carrito-flotante-container">
        <a href="/tienda/php1.0/carrito.php" class="btn-carrito-flotante">🛒</a>
        <?php if ($cantidadTotal > 0): ?>
            <span id="contador-carrito"><?= $cantidadTotal ?></span>
        <?php endif; ?>
    </div>
</main>

<?php require('../layout/footer1.php'); ?>
