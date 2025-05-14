<?php

require_once '../includes/funciones_carrito.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['item_id']) && isset($_POST['cantidad']) && is_numeric($_POST['item_id']) && is_numeric($_POST['cantidad']) && $_POST['cantidad'] >= 0) {
        $item_id = $_POST['item_id'];
        $nueva_cantidad = intval($_POST['cantidad']);

        actualizarCantidad($item_id, $nueva_cantidad);
        header('Location: carrito.php');
        exit();
    } else {
       
        header('Location: carrito.php?error=datos_invalidos');
        exit();
    }
} else {
   
    header('Location: carrito.php');
    exit();
}

?>