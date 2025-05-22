<?php require('../layout/header1.php') ?>

<?php require('../layout/heaproductos.php') ?>

<main>
    <div class="product-container">

        <div class="product">
            <img src="../imagenes/americano.jpg" alt="Café Americano" width="150">
            <p>Café Americano</p>
            <p class="price">S/ 3.00</p>
            <form method="POST" action="agregar_carrito.php?origen=index.php">
                <input type="hidden" name="id" value="1">
                <input type="hidden" name="nombre" value="Café Americano">
                <input type="hidden" name="precio" value="3.00">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="../imagenes/chocolatecaliente.jpg" alt="Chocolate Caliente" width="150">
            <p>Chocolate Caliente</p>
            <p class="price">S/ 3.50</p>
            <form method="POST" action="agregar_carrito.php?origen=index.php">
                <input type="hidden" name="id" value="2">
                <input type="hidden" name="nombre" value="Chocolate Caliente">
                <input type="hidden" name="precio" value="3.50">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="../imagenes/Café_canela.jpg" alt="Cafe con Canela" width="150">
            <p>Cafe con Canela</p>
            <p class="price">S/ 3.50</p>
            <form method="POST" action="agregar_carrito.php?origen=index.php">
                <input type="hidden" name="id" value="3">
                <input type="hidden" name="nombre" value="Cafe con Canela">
                <input type="hidden" name="precio" value="3.50">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="../imagenes/cafe_vainilla.jpg" alt="Cafe con Vainilla" width="150">
            <p>Cafe con vainilla</p>
            <p class="price">S/ 3.50</p>
            <form method="POST" action="agregar_carrito.php?origen=index.php">
                <input type="hidden" name="id" value="4">
                <input type="hidden" name="nombre" value="Cafe con Vainilla">
                <input type="hidden" name="precio" value="3.50">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="../imagenes/te_verde.jpg" alt="Té Verde" width="150">
            <p>Té Verde</p>
            <p class="price">S/ 2.50</p>
            <form method="POST" action="agregar_carrito.php?origen=index.php">
                <input type="hidden" name="id" value="5">
                <input type="hidden" name="nombre" value="Té Verde">
                <input type="hidden" name="precio" value="2.50">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="../imagenes/Manzanilla.jpg" alt="Manzanilla" width="150">
            <p>Manzanilla</p>
            <p class="price">S/ 1.50</p>
            <form method="POST" action="agregar_carrito.php?origen=index.php">
                <input type="hidden" name="id" value="6">
                <input type="hidden" name="nombre" value="Manzanilla">
                <input type="hidden" name="precio" value="1.50">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="../imagenes/Hierba Luisa.png" alt="Hierba Luisa" width="150">
            <p>Hierba Luisa</p>
            <p class="price">S/ 2.00</p>
            <form method="POST" action="agregar_carrito.php?origen=index.php">
                <input type="hidden" name="id" value="7">
                <input type="hidden" name="nombre" value="Hierba Luisa">
                <input type="hidden" name="precio" value="2.00">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="../imagenes/Emoliente caliente.jpg" alt="Emoliente" width="150">
            <p>Emoliente</p>
            <p class="price">S/ 3.50</p>
            <form method="POST" action="agregar_carrito.php?origen=index.php">
                <input type="hidden" name="id" value="8">
                <input type="hidden" name="nombre" value="Emoliente">
                <input type="hidden" name="precio" value="3.50">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

    </div>
</main>

<?php require('../layout/footer1.php') ?>
