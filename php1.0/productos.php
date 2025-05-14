<?php require('./layout/header.php') ?>

<?php require('./layout/heaproductos.php') ?>


<main>
    <div class="product-container">

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

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Pan con Pollo al Horno" width="150">
            <p>Pan con Pollo al Horno</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="4">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Pan con Cabanossi y Queso" width="150">
            <p>Pan con Cabanossi y Queso</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="5">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Pan con Cabanossi y Jamón" width="150">
            <p>Pan con Cabanossi y Jamón</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="6">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Pan con Chocolate y Pecanas" width="150">
            <p>Pan con Chocolate y Pecanas</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="7">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Pan con Manjar" width="150">
            <p>Pan con Manjar</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="8">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Pan con Salchicha Huachana" width="150">
            <p>Pan con Salchicha Huachana</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="9">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Mini Pizza Americana" width="150">
            <p>Mini Pizza Americana</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="10">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Fugazzas Simple" width="150">
            <p>Fugazzas Simple</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="11">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>

        <div class="product">
            <img src="imagenes/Aceituna.jpg" alt="Fugazzas Mixtas" width="150">
            <p>Fugazzas Mixtas</p>
            <p class="price">S/ 2.50</p>
            <form action="agregar_carrito.php" method="POST">
                <input type="hidden" name="producto_id" value="12">
                <input type="hidden" name="cantidad" value="1">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>
    </div>
</main>

     
   
    <?php require('./layout/footer.php') ?>

