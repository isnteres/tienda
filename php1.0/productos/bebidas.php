<?php require('./layout/header1.php') ?>

<?php require('./layout/heaproductos.php') ?>

<main>
    <div class="product-container">
        <!-- Aquí irían los productos de bebidas -->
        <div class="product">
            <img src="imagenes/cafe.jpg" alt="Café Americano" width="150">
            <p>Café Americano</p>
            <p class="price">S/ 3.00</p>
            <button class="button-1">Agregar</button>
        </div>

        <div class="product">
            <img src="imagenes/te.jpg" alt="Té Verde" width="150">
            <p>Té Verde</p>
            <p class="price">S/ 2.50</p>
            <button class="button-1">Agregar</button>
        </div>

        <div class="product">
            <img src="imagenes/chocolatecaliente.jpg" alt="Chocolate Caliente" width="150">
            <p>Chocolate Caliente</p>
            <p class="price">S/ 3.50</p>
            <button class="button-1">Agregar</button>
        </div>

        <!-- Puedes agregar más productos de bebidas de manera similar -->
    </div>
</main>

<?php require('./layout/footer1.php') ?>
