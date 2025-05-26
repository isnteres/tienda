<?php require('../layout/header1.php') ?>
<?php require('../layout/heaproductos.php') ?>

<main>
    <div class="product-container">

<?php
$productos = [
    ["Pan serranito", "serrano.jpg", 1.00],
    ["Pan con Queso", "queso.jpg", 2.50],
    ["Pan con Queso y Oregano", "quesoyoregano.png", 2.50],
    ["Pan con pollo al horno", "pollohorno.jpg", 2.50],
    ["Pan con Cabanossi y Queso", "cabanossiyqueso.png", 2.50],
    ["Pan con Cabanossi y Jamon", "jamon.jpg", 2.50],
    ["Pan con Chocolate y Pecana", "chocolate.jpg", 2.50],
    ["Pan con Manjar", "manjar.jpg", 2.50],
    ["Pan con Salchicha huachana", "huachana.jpg", 2.50],
    ["Mini Pizza Americana", "pizza.jpg", 5.00],
    ["Café Americano", "americano.jpg", 3.00],
    ["Chocolate Caliente", "chocolatecaliente.jpg", 3.50],
    ["Cafe con Canela", "Café_canela.jpg", 3.50],
    ["Cafe con vainilla", "cafe_vainilla.jpg", 3.50],
    ["Té Verde", "te_verde.jpg", 2.50],
    ["Manzanilla", "Manzanilla.jpg", 1.50],
    ["Hierba Luisa", "Hierba Luisa.png", 2.00],
    ["Emoliente", "Emoliente caliente.jpg", 3.50],
    ["Pan con chicharrón", "chichalon.jpg", 13.00],
    ["Chicharrón 1/4", "chichalon2.jpg", 25.00],
    ["Chicharrón 1 Kilo", "1kilo.jpg", 90.00],
    ["Tamal", "tamal.jpg", 10.00],
    ["Jugo de Papaya", "papaya.jpg", 2.50],
    ["Jugo de Piña", "piña.jpg", 2.50],
    ["Jugo de Naranja", "naranja.png", 2.50],
    ["Jugo de Fresa con Leche", "fresa2.jpg", 2.50],
    ["Jugo de Platano con Leche", "banana.jpg", 2.50],
    ["Jugo Surtido", "sur.png", 2.50],
];

$id = 1;
foreach ($productos as $producto) {
    $nombre = $producto[0];
    $imagen = $producto[1];
    $precio = $producto[2];
    echo '
        <div class="product">
            <img src="../imagenes/' . $imagen . '" alt="' . $nombre . '" width="150">
            <p>' . $nombre . '</p>
            <p class="price">S/ ' . number_format($precio, 2) . '</p>
            <form method="POST" action="../agregar_carrito.php?origen=productos/todos.php">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="nombre" value="' . $nombre . '">
                <input type="hidden" name="precio" value="' . $precio . '">
                <button type="submit" class="button-1">Agregar</button>
            </form>
        </div>
    ';
    $id++;
}
?>

    </div>
</main>

<?php require('../layout/footer1.php') ?>
