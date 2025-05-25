<?php require('../layout/header1.php') ?>
<?php require('../layout/heaproductos.php') ?>

<main>
    <div class="product-container">
        <?php
        $productos = [
            ["id" => 1, "nombre" => "Café Americano", "precio" => 3.00, "imagen" => "../imagenes/americano.jpg"],
            ["id" => 2, "nombre" => "Chocolate Caliente", "precio" => 3.50, "imagen" => "../imagenes/chocolatecaliente.jpg"],
            ["id" => 3, "nombre" => "Cafe con Canela", "precio" => 3.50, "imagen" => "../imagenes/Café_canela.jpg"],
            ["id" => 4, "nombre" => "Cafe con Vainilla", "precio" => 3.50, "imagen" => "../imagenes/cafe_vainilla.jpg"],
            ["id" => 5, "nombre" => "Té Verde", "precio" => 2.50, "imagen" => "../imagenes/te_verde.jpg"],
            ["id" => 6, "nombre" => "Manzanilla", "precio" => 1.50, "imagen" => "../imagenes/Manzanilla.jpg"],
            ["id" => 7, "nombre" => "Hierba Luisa", "precio" => 2.00, "imagen" => "../imagenes/Hierba Luisa.png"],
            ["id" => 8, "nombre" => "Emoliente", "precio" => 3.50, "imagen" => "../imagenes/Emoliente caliente.jpg"]
        ];

        foreach ($productos as $p):
        ?>
            <div class="product">
                <img src="<?= $p['imagen'] ?>" alt="<?= htmlspecialchars($p['nombre']) ?>" width="150">
                <p><?= htmlspecialchars($p['nombre']) ?></p>
                <p class="price">S/ <?= number_format($p['precio'], 2) ?></p>
                <form method="POST" action="agregar_carrito.php?origen=index.php">
                    <input type="hidden" name="id" value="<?= $p['id'] ?>">
                    <input type="hidden" name="nombre" value="<?= htmlspecialchars($p['nombre']) ?>">
                    <input type="hidden" name="precio" value="<?= $p['precio'] ?>">
                    <button type="submit" class="button-1">Agregar</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require('../layout/footer1.php') ?>
