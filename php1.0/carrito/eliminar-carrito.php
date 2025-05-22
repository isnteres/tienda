<?php

require_once 'funciones_carrito.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    eliminarProducto($item_id);

    header('Location: carrito.php');
    exit();
} else {

    header('Location: carrito.php?error=id_no_valido');
    exit();
}

?>