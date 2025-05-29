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
   
    [17, "Pan con chicharrón", "chichalon.jpg", 13.00],
    [18, "Chicharrón 1/4", "chichalon2.jpg", 25.00],
    [19, "Chicharrón 1 Kilo", "1kilo.jpg", 90.00],
    [20, "Tamal", "tamal.jpg", 10.00],
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
