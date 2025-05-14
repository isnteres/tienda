

<?php
session_start(); // Necesario para acceder al id del usuario logueado
require('./layout/header1.php');
require('./layout/heaproductos.php');
?>

<main>
    <div class="product-container">

        <!-- Producto 1 -->
        <div class="product">
            <img src="imagenes/Serrano.jpg" alt="Pan serranito" width="150">
            <p>Pan serranito</p>
            <p class="price">S/ 1.00 x 4U</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="1">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <!-- Producto 2 -->
        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Pan con Aceituna" width="150">
            <p>Pan con Aceituna</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="2">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <!-- Producto 3 -->
        <div class="product">
            <img src="imagenes/quesoyoregano.png" alt="Pan con Queso y Orégano" width="150">
            <p>Pan c/ queso y Orégano</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="3">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <!-- Resto de productos... -->
        <!-- Solo copia y repite como ya lo tienes para los productos 4 al 12 -->

    </div>
</main>

<?php require('./layout/footer.php'); ?>
